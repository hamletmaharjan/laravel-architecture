<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\ImageRepository;
use App\Repository\Modules\PostRepository;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Modules\PostRequest;
use App\Models\Modules\Post;

class PostController extends Controller
{
    private $imageRepository;
    private $postRepository;

    public function __construct(ImageRepository $imageRepository, PostRepository $postRepository){
        $this->imageRepository = $imageRepository;
        $this->postRepository = $postRepository;
    }

    public function index() {
        $posts = $this->postRepository->all();
        return view('backend.modules.posts.index', compact('posts'));
    }


    public function create(){
    	return view('backend.modules.posts.create');
    }

    public function store(PostRequest $request){
        
    	// dd($request);
    	$input = $request->except('banner_image');
        
        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $imageName = $this->imageRepository->moveImageWithName($image, 'posts');
            $input['banner_image'] = $imageName;
        }
        $input['user_id'] = Auth::user()->id;
        try{
            $create = Post::create($input);
            if($create){
                session()->flash('success','Post successfully created!');
                return redirect(route('admin.posts.index'));
            }else{
                session()->flash('error','Post could not be created!');
                return back();
            }
        }catch (\Exception $e){
            $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
       
    }

    public function show($id) {
        $post = $this->postRepository->findById($id);
        return view('backend.modules.posts.show', compact('post'));
    }

    public function edit($id){
    	$posts = $this->postRepository->all();
    	$edits = $this->postRepository->findById($id);
        
        return view('backend.modules.posts.edit', compact('posts','edits'));
    	
    }

    public function update(PostRequest $request, $id){

        $input = $request->except('banner_image');
        // dd($input);
        $id = (int)$id;
        try{
            $post = $this->postRepository->findById($id);
            
            $imagePath = public_path()."/uploads/posts/".$post->banner_image;
            if($request->hasFile('banner_image')){
                if(File::exists($imagePath)) {
                    File::delete($imagePath);
                }

                $image = $request->file('banner_image');
                $imageName = $this->imageRepository->moveImageWithName($image, 'posts');
                $input['banner_image'] = $imageName;
            }
            
            if($post){
                $post->fill($input)->save();
                session()->flash('success','Post updated successfully!');

                return redirect(route('admin.posts.index'));
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

    public function destroy($id){

        $id=(int)$id;
        try{
            $value = $this->postRepository->findById($id);
            $imagePath = public_path()."/uploads/posts/".$value->banner_image;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $value->delete();
            session()->flash('success','Post successfully deleted!');
            return back();

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    	
    }

}
