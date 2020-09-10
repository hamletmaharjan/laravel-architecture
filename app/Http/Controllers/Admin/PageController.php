<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FileRepository;
use Illuminate\Support\Facades\File;
use App\Models\Modules\Page;

class PageController extends Controller
{
    private $fileRepository;


    public function __construct(FileRepository $fileRepository){
        $this->fileRepository = $fileRepository;
    }

    public function index(){
        $pages = Page::get();
        return view('backend.modules.pages.index', compact('pages'));
    }

    public function store(Request $request) {

    //    dd($request);
        try{
            $page = new Page();
            $page->page_title = $request->page_title;
            $page->content = $request->content;
            $page->slug = $request->slug;
            $page->user_id = Auth::user()->id;
            $page->status = $request->status;
            if($request->hasFile('file')){
                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'pages');
                //$location = public_path('user/images/'.$imageName);
                $page->file = $fileName;
            }
            
            if($page->save()){
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
            $edits = Page::findOrFail($id);
            if ($edits->count() > 0)
            {
                $pages = Page::get();
                return view('backend.modules.pages.index', compact('edits','pages'));
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

        // dd($request);
        $id = (int)$id;
        try{
            $page = Page::findOrFail($id);
            $page->page_title = $request->page_title;
            $page->content = $request->content;
            $page->slug = $request->slug;
            $page->status = $request->status;
            $filePath = public_path()."/uploads/pages/".$page->file;
        
            if($request->hasFile('file')){
                if(File::exists($filePath)) {
                    File::delete($filePath);
                }

                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'pages');
                $page->file = $fileName;
            }
            
            if($page->save()){
               
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
            $page = Page::findOrFail($id);
            $filePath = public_path()."/uploads/pages/".$page->file;
            if(File::exists($filePath)) {
                File::delete($filePath);
            }
            $page->delete();
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

    public function getBySlug($slug) {
        try {
            $page = Page::where('slug', '=', $slug)->where('status','active')->first();
            return view('front.pages.show', compact('page'));
        }catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
        
    }
}
