<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\ImageRepository;
use Illuminate\Support\Facades\File;
use App\Models\Modules\Post;

class PostController extends Controller
{
    private $imageRepository;


    public function __construct(ImageRepository $imageRepository){
        $this->imageRepository = $imageRepository;
    }

    public function index() {
        $posts = Post::get();
        return view('backend.modules.posts.index', compact('posts'));
    }


    public function create(){
    	//
    }

    public function store(Request $request){
         //dd($request);
    	// $request->validate([
        //     'title' => ['required', 'string', 'max:30'],
        //     'content' => ['required', 'string', 'max:255'],
        //     'banner_image' => ['required']
        // ]);

    	$post = new Post();
    	$post->title = $request->title;
    	$post->content = $request->content;
    	$post->user_id = Auth::user()->id;
        $post->status = $request->status;
        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $imageName = $this->imageRepository->moveImageWithName($image, 'posts');
            //$location = public_path('user/images/'.$imageName);
            $post->banner_image = $imageName;
        }
        //dd($post);
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    public function edit($id){
    	$posts = Post::get();
    	$edits = Post::findOrFail($id);
        
        return view('backend.modules.posts.index', compact('posts','edits'));
    	//$post = $this->postServices->getById($id);
    	
    }

    public function update(Request $request, $id){
       //dd($request);
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $imagePath = public_path()."/uploads/posts/".$post->banner_image;
        
        if($request->hasFile('banner_image')){
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $image = $request->file('banner_image');
            $imageName = $this->imageRepository->moveImageWithName($image, 'posts');
            $post->banner_image = $imageName;
        }
        $post->save();
        session()->flash('success','Updated successfully!');
        return redirect()->route('admin.posts.index');
        
    }

    public function destroy($id){
        //dd($id);
        $post = Post::findOrFail($id);
        $imagePath = public_path()."/uploads/posts/".$post->banner_image;
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $post->delete();
        session()->flash('success','Successfully deleted!');
        return back();
    	
    }
}
