<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Modules\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();
        return view('backend.modules.posts.index', compact('posts'));
    }


    public function create(){
    	//
    }

    public function store(Request $request){
    	$request->validate([
            'title' => ['required', 'string', 'max:30'],
            'content' => ['required', 'string', 'max:255'],
            'banner_image' => ['required']
        ]);

    	$post = new Post();
    	$post->title = $request->title;
    	$post->content = $request->content;
    	$post->user_id = Auth::user()->id;
        
        if($request->hasFile('banner_image')){
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/posts'),$imageName);
            //$location = public_path('user/images/'.$imageName);
            $post->photo = $imageName;
        }
        //dd($post);
        $post->save();
        return redirect()->route('index');
    }

    public function edit($id){
    	$user = Auth::user();
    	$post = Post::findOrFail($id);
    	if ($user->can('update', $post)) {
	      	return view('user.posts.edit',compact('post'));
	    } else {
	      	return 'Not Authorized';
	    }
    	//$post = $this->postServices->getById($id);
    	
    }

    public function update(Request $request, $id){
    	//
    }

    public function delete($id){
    	$user = Auth::user();
    	$post = Post::findOrFail($id);
    	if ($user->can('update', $post)) {
	      	$post->delete();
	      	return redirect()->route('index');
	    } else {
	      	return 'Not Authorized';
	    }
    }
}
