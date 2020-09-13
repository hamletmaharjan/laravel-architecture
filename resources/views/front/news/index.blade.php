@extends('front.layouts.app')
@section('title','News')

@section('content')

<div class="site-section" id="news-section" style="padding-top:130px;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">News</h2>
          </div>
        </div>

        <div class="row">
            @foreach($news as $newsItem)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                
                <h2><a href="#">{{$newsItem->title}}</a></h2>
                <div class="meta mb-4">{{$newsItem->user->name}} <span class="mx-2">&bullet;</span> {{$newsItem->created_at}}<span class="mx-2">&bullet;</span> <a href="#"> News</a></div>
                <p>{{$newsItem->details}}</p>
                <p><a href="#">Continue Reading...</a></p>
                </div> 
            </div>
            @endforeach
            
            
          
        </div>
      </div>
    </div>
@endsection