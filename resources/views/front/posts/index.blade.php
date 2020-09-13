@extends('front.layouts.app')
@section('title','Posts')

@section('content')

    <div class="site-section" id="posts-section" style="padding-top:130px;">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="col-7 text-center  mb-5">
            <h2 class="section-title">Imagine Features</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga quos quaerat sapiente nam, id vero.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="feature-big">
      <div class="container">
        @foreach($posts as $post)
        <div class="row mb-5 site-section">
          <div class="col-lg-7" data-aos="fade-right">
            <img src="{{asset('uploads/posts/'.$post->banner_image)}}" alt="Image" class="img-fluid" style="padding:50px">
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto mt-md-5">
            <h2 class="text-black">{{$post->title}}</h2>
            <p class="mb-4">{{$post->content}}</p>
            
            <div class="author-box" data-aos="fade-left">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <!-- <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded-circle"> -->
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">posted by {{$post->user->name}}</strong>
                </div>
              </div>
              <!-- <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote> -->
            </div>
          </div>
        </div>
        @endforeach

        <!-- <div class="mt-5 row mb-5 site-section ">
          <div class="col-lg-7 order-1 order-lg-2" data-aos="fade-left">
            <img src="images/undraw_metrics_gtu7.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 pr-lg-5 mr-auto mt-5 order-2 order-lg-1">
            <h2 class="text-black">Communicate and gather feedback</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem neque nisi architecto autem molestias corrupti officia veniam</p>
            
            

            <div class="author-box" data-aos="fade-right">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">Kimberly Gush</strong> <br>
                  Co-Founder, XYZ Inc.
                </div>
              </div>
              <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote>
            </div>
          </div>
        </div>

        <div class="row mb-5 site-section">
          <div class="col-lg-7" data-aos="fade-right">
            <img src="images/undraw_gift_card_6ekc.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto mt-md-5">
            <h2 class="text-black">Communicate and gather feedback</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem neque nisi architecto autem molestias corrupti officia veniam.</p>
            
            <div class="author-box" data-aos="fade-left">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">Grey Simpson</strong> <br>
                  Co-Founder, XYZ Inc.
                </div>
              </div>
              <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote>
            </div>
          </div>
        </div>

        <div class="mt-5 row mb-5 site-section ">
          <div class="col-lg-7 order-1 order-lg-2" data-aos="fade-left">
            <img src="images/undraw_metrics_gtu7.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 pr-lg-5 mr-auto mt-5 order-2 order-lg-1">
            <h2 class="text-black">Communicate and gather feedback</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem neque nisi architecto autem molestias corrupti officia veniam</p>
            
            

            <div class="author-box" data-aos="fade-right">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">Kimberly Gush</strong> <br>
                  Co-Founder, XYZ Inc.
                </div>
              </div>
              <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote>
            </div>
          </div>
        </div> -->
      </div>
    </div>
@endsection