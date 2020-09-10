<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FileRepository;
use Illuminate\Support\Facades\File;
use App\Models\Modules\Notice;

class NoticeController extends Controller
{
    private $fileRepository;


    public function __construct(FileRepository $fileRepository){
        $this->fileRepository = $fileRepository;
    }

    public function index(){
        $notices = Notice::get();
        return view('backend.modules.notices.index', compact('notices'));
    }

    public function store(Request $request) {

      
        try{
            $notice = new Notice();
            $notice->title = $request->title;
            $notice->content = $request->content;
            $notice->notice_date = $request->notice_date;
            $notice->user_id = Auth::user()->id;
            $notice->status = $request->status;
            $notice->display_order = $request->display_order;
            if($request->hasFile('file')){
                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'notices');
                //$location = public_path('user/images/'.$imageName);
                $notice->file = $fileName;
            }
            
            if($notice->save()){
                session()->flash('success','Successfully created!');
                return back();
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

    public function edit($id) {
        try{
            $id = (int)$id;
            $edits = Notice::findOrFail($id);
            if ($edits->count() > 0)
            {
                $notices = Notice::get();
                return view('backend.modules.notices.index', compact('edits','notices'));
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

    public function update(Request $request, $id) {

        $id = (int)$id;
        try{
            $notice = Notice::findOrFail($id);
            $notice->title = $request->title;
            $notice->content = $request->content;
            $notice->notice_date = $request->notice_date;
            $notice->status = $request->status;
            $notice->display_order = $request->display_order;
            $filePath = public_path()."/uploads/notices/".$notice->file;
        
            if($request->hasFile('file')){
                if(File::exists($filePath)) {
                    File::delete($filePath);
                }

                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'notices');
                $notice->file = $fileName;
            }
            
            if($notice->save()){
               
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
            $notice = Notice::findOrFail($id);
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
