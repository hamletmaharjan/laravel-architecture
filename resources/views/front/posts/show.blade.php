@extends('front.layouts.app')
@section('title','Posts')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfolio Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="portfolio.html">Post</a></li>
            <li>Post Details</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          
            <img src="{{asset('uploads/posts/'.$post->banner_image)}}" class="img-fluid" alt="">
            
          

          <!-- <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: Web design</li>
              <li><strong>Client</strong>: ASU Company</li>
              <li><strong>Project date</strong>: 01 March, 2020</li>
              <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
            </ul>
          </div> -->

        </div>

        <div class="portfolio-description">
          <h2>{{$post->title}}</h2>
          <p>
            {{$post->content}}
          </p>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->
@endsection