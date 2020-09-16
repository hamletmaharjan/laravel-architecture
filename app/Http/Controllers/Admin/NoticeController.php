<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FileRepository;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Modules\NoticeRequest;
use App\Repository\Modules\NoticeRepository;
use App\Models\Modules\Notice;

class NoticeController extends Controller
{
    private $fileRepository;
    private $noticeRepository;
    public function __construct(FileRepository $fileRepository, NoticeRepository $noticeRepository){
        $this->fileRepository = $fileRepository;
        $this->noticeRepository = $noticeRepository;
    }

    public function index(){
        $notices = $this->noticeRepository->all();
        return view('backend.modules.notices.index', compact('notices'));
    }

    public function create() {
        return view('backend.modules.notices.create');
    }

    public function store(NoticeRequest $request) {
        try{
            $input = $request->except('file');
            $input['user_id'] = Auth::user()->id;
            if($request->hasFile('file')){
                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'notices');
                $input['file'] = $fileName;
            }
            $create = Notice::create($input);
            if($create){
                session()->flash('success','Successfully created!');
                return redirect()->route('admin.notices.index');
            }else{
                session()->flash('error','Could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    public function show($id) {
        $notice = $this->noticeRepository->findById($id);
        return view('backend.modules.notices.show', compact('notice'));
    }

    public function edit($id) {
        try{
            $id = (int)$id;
            $edits = $this->noticeRepository->findById($id);
            if ($edits->count() > 0) {
                
                return view('backend.modules.notices.edit', compact('edits'));
            }
            else{
                session()->flash('error','Id could not be obtained!');
                return back();
            }

        }catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    public function update(NoticeRequest $request, $id) { 
        $id = (int)$id;
        try{
            $notice = $this->noticeRepository->findById($id);
            $filePath = public_path()."/uploads/notices/".$notice->file;
            $input = $request->except('file');
            if($request->hasFile('file')){
                if(File::exists($filePath)) {
                    File::delete($filePath);
                }
                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'notices');
                $input['file'] = $fileName;
            }
            
            if($notice){
                $notice->fill($input)->save();
                session()->flash('success','Notice updated successfully!');

                return redirect(route('admin.notices.index'));
            }else{

                session()->flash('error','No record with given id!');
                return back();
            }
        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION:'.$exception);
            return back();
        }
    }

    public function destroy($id) {
        $id=(int)$id;
        try{
            $notice = $this->noticeRepository->findById($id);
            $filePath = public_path()."/uploads/notices/".$notice->file;
            if(File::exists($filePath)) {
                File::delete($filePath);
            }
            $notice->delete();
            session()->flash('success','Notice successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function status($id) {
        try {
            $id = (int)$id;
            $notice = Notice::findOrFail($id);

            if ($notice->status == 'inactive') {
                $notice->status = 'active';
                $notice->save();
                session()->flash('success', 'Notice has been Activated!');
                return back();
            } else {
                $notice->status = 'inactive';
                $notice->save();
                session()->flash('success', 'Notice has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    public function getAll() {
        $notices = Notice::where('status', '=', 'active')
                        ->orderBy('display_order', 'asc')
                        ->get();

        return view('front.notices.index', compact('notices'));
    }
}
