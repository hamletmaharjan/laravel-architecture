@extends('front.layouts.app')
@section('title', $page->page_title)

@section('content')
    <div class="site-section bg-light" id="about-section" style="padding-top:130px;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">{{$page->page_title}}</h2>
          </div>
        </div>
        <div class="row mb-5">
          
            <!-- <h2 class="text-black mb-4 h3 font-weight-bold">Our Mission</h2> -->
            <p class="mb-4">{{$page->content}}</p>
            <p class="text-black">Author: <strong>{{$page->user->name}}</strong></p> <br>
            <a href="{{asset('uploads/pages/'.$page->file)}}">Download</a>
          
        </div>

        
      </div>
    </div>
@endsection