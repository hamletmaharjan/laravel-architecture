<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FileRepository;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Modules\NewsRequest;
use App\Repository\Modules\NewsRepository;
use App\Models\Modules\News;

class NewsController extends Controller
{

    private $fileRepository;
    private $newsRepository;

    public function __construct(FileRepository $fileRepository, NewsRepository $newsRepository){
        $this->fileRepository = $fileRepository;
        $this->newsRepository = $newsRepository;
    }

    public function index(){
        $news = $this->newsRepository->all();
        return view('backend.modules.news.index', compact('news'));
    }

    public function create() {
        return view('backend.modules.news.create');
    }

    public function store(NewsRequest $request) {
        
       // dd($request);
        try{
            $input = $request->except('file');
            $input['user_id'] = Auth::user()->id;
           
            if($request->hasFile('file')){
                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'news');
                $input['file'] = $fileName;
            }
            $create = News::create($input);
            if($create){
                session()->flash('success','Successfully created!');
                return redirect()->route('admin.news.index');
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
        $news = $this->newsRepository->findById($id);
        return view('backend.modules.news.show', compact('news'));
    }

    public function edit($id) {
        try{
            $id = (int)$id;
            $edits = $this->newsRepository->findById($id);
            if ($edits->count() > 0)
            {
                return view('backend.modules.news.edit', compact('edits'));
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

    public function update(NewsRequest $request, $id) {
        //dd($request);
        $id = (int)$id;
        try{
            $news = $this->newsRepository->findById($id);
            $filePath = public_path()."/uploads/news/".$news->file;
            $input = $request->except('file');
            if($request->hasFile('file')){
                if(File::exists($filePath)) {
                    File::delete($filePath);
                }

                $file = $request->file('file');
                $fileName = $this->fileRepository->moveFileWithName($file, 'news');
                $input['file'] = $fileName;
            }
            
            if($news){
                $news->fill($input)->save();
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
            $news = $this->newsRepository->findById($id);
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
