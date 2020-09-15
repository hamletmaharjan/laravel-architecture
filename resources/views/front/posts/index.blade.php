@extends('front.layouts.app')
@section('title','Posts')

@section('content')

    <div class="site-section" id="blog-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Blog Posts</h2>
          </div>
        </div>
       
        <div class="row">
        @foreach($posts as $post)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="{{asset('uploads/posts/'.$post->banner_image)}}" alt="Image" class="img-fluid">
              <h2><a href="{{url('/posts/'.$post->id)}}">{{$post->title}}</a></h2>
              <div class="meta mb-4">{{$post->user->name}} <span class="mx-2">&bullet;</span> {{$post->updated_at}}<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>{{substr($post->content,0,150)}}...</p>
              <p><a href="{{url('/posts/'.$post->id)}}">Continue Reading...</a></p>
            </div> 
          </div>
          
        @endforeach
        </div>
      </div>
    </div>
@endsection