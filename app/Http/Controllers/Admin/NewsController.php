<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FileRepository;
use Illuminate\Support\Facades\File;
use App\Models\Modules\News;

class NewsController extends Controller
{

    private $fileRepository;


    public function __construct(FileRepository $fileRepository){
        $this->fileRepository = $fileRepository;
    }

    public function index(){
        $news = News::get();
        return view('backend.modules.news.index', compact('news'));
    }

    public function store(Request $request) {

       // dd($request);
        try{
            $news = new News();
            $news->title = $request->title;
            $news->details = $request->details;
            $news->user_id = Auth::user()->id;
            $news->status = $request->status;
            if($request->hasFile('file')){
                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'news');
                //$location = public_path('user/images/'.$imageName);
                $news->file = $fileName;
            }
            
            if($news->save()){
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
            $edits = News::findOrFail($id);
            if ($edits->count() > 0)
            {
                $news = News::get();
                return view('backend.modules.news.index', compact('edits','news'));
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

        //dd($request);
        $id = (int)$id;
        try{
            $news = News::findOrFail($id);
            $news->title = $request->title;
            $news->details = $request->details;
            $news->status = $request->status;
            $filePath = public_path()."/uploads/news/".$news->file;
        
            if($request->hasFile('file')){
                if(File::exists($filePath)) {
                    File::delete($filePath);
                }

                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'news');
                $news->file = $fileName;
            }
            
            if($news->save()){
               
                session()->flash('success','News updated successfully!');

                return redirect(route('admin.news.index'));
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
       // dd($id);
        $id=(int)$id;
        try{
            $news = News::findOrFail($id);
            $filePath = public_path()."/uploads/news/".$news->file;
            if(File::exists($filePath)) {
                File::delete($filePath);
            }
            $news->delete();
            session()->flash('success','News successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }

    public function status($id)
    {
        try {
            $id = (int)$id;
            $news = News::findOrFail($id);

            if ($news->status == 'inactive') {
                $news->status = 'active';
                $news->save();
                session()->flash('success', 'News has been Activated!');
                return back();
            } else {
                $news->status = 'inactive';
                $news->save();
                session()->flash('success', 'News Year has been Deactivated!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    public function getAll() {
        $news = News::where('status','active')->get();
        return view('front.news.index', compact('news'));
    }
}
