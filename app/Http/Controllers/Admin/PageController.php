<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FileRepository;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Modules\PageRequest;
use App\Repository\Modules\PageRepository;
use App\Models\Modules\Page;

class PageController extends Controller
{
    private $fileRepository;
    private $pageRepository;

    public function __construct(FileRepository $fileRepository, PageRepository $pageRepository){
        $this->fileRepository = $fileRepository;
        $this->pageRepository = $pageRepository;
    }

    public function index(){
        $pages = $this->pageRepository->all();
        return view('backend.modules.pages.index', compact('pages'));
    }

    public function create() {
        return view('backend.modules.pages.create');
    }

    public function store(PageRequest $request) {

        $input = $request->except('file');
        
        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = $this->fileRepository->moveFileWithName($file, 'pages');
            $input['file'] = $fileName;
        }
        $input['slug'] = $this->pageRepository->toSlug($request->page_title);
        $input['user_id'] = Auth::user()->id;
        try{
            $create = Page::create($input);
            if($create){
                session()->flash('success','Page successfully created!');
                return redirect()->route('admin.pages.index');
            }else{
                session()->flash('error','Page could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    public function show($id) {
        $page = $this->pageRepository->findById($id);
        return view('backend.modules.pages.show', compact('page'));
    }

    public function edit($id) {
        try{
            $id = (int)$id;
            $edits = $this->pageRepository->findById($id);
            if ($edits->count() > 0)
            {
                
                return view('backend.modules.pages.edit', compact('edits'));
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
        
        $input = $request->except('file');
        // dd($input);
        $id = (int)$id;
        try{
            $page = $this->pageRepository->findById($id);
            $filePath = public_path()."/uploads/pages/".$page->file;
            if($request->hasFile('file')){
                if(File::exists($filePath)) {
                    File::delete($filePath);
                }
                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'pages');
                $input['file'] = $fileName;
            }
            $input['slug'] = $this->pageRepository->toSlug($request->page_title);
            
            if($page){
                $page->fill($input)->save();
                session()->flash('success','Page updated successfully!');

                return redirect(route('admin.pages.index'));
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
    //    dd($id);
        $id=(int)$id;
        try{
            $value = $this->pageRepository->findById($id);
            $filePath = public_path()."/uploads/pages/".$value->file;
            if(File::exists($filePath)) {
                File::delete($filePath);
            }
            $value->delete();
            session()->flash('success','Page successfully deleted!');
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
            $page = Page::findOrFail($id);

            if ($page->status == 'inactive') {
                $page->status = 'active';
                $page->save();
                session()->flash('success', 'Page has been Activated!');
                return back();
            } else {
                $page->status = 'inactive';
                $page->save();
                session()->flash('success', 'Page has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    // public function getBySlug($slug) {
    //     try {
    //         $page = Page::where('slug', '=', $slug)->where('status','active')->first();
    //         return view('front.pages.show', compact('page'));
    //     }catch (\Exception $e) {
    //         $exception = $e->getMessage();
    //         session()->flash('error', 'EXCEPTION :' . $exception);
    //     }
        
    // }
}
