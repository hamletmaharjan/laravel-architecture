@extends('front.layouts.app')
@section('title','Posts')

@section('content')

<div class="site-section" id="posts-section" style="padding-top:130px;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Posts</h2>
          </div>
        </div>

        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                <img src="{{asset('uploads/posts/'.$post->banner_image)}}" alt="Image" class="img-fluid">
                <h2><a href="#">{{$post->title}}</a></h2>
                <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                <p>{{$post->content}}</p>
                <p><a href="#">Continue Reading...</a></p>
                </div> 
            </div>
            @endforeach
            <!-- <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                <h2><a href="#">Make Your Business More Profitable</a></h2>
                <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                <p><a href="#">Continue Reading...</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                <h2><a href="#">Make Your Business More Profitable</a></h2>
                <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                <p><a href="#">Continue Reading...</a></p>
                </div> 
            </div> -->
          
        </div>
      </div>
    </div>
@endsection