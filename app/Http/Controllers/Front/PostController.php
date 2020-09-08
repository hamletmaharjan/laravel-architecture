<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\Post;

class PostController extends Controller
{
    public function index() {
        $post = Post::get();
    
    }
}
