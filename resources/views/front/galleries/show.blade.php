@extends('front.layouts.app')
@section('title','Gallery')

@section('content')
    <div class="site-section" id="galleries-section" style="padding-top:130px">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="col-7 text-center  mb-5">
            <h2 class="section-title">{{$gallery->gallery_name}}</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga quos quaerat sapiente nam, id vero.</p>
          </div>
        </div>
       
        <div class="row">
            @foreach($galleryImages as $galleryImage)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="person">
                <div class="bio-img">
                    <figure>
                    <img src="{{asset('uploads/galleryImages/'.$galleryImage->image)}}" alt="Image" class="img-fluid">
                    </figure>
                    <div class="social">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-instagram"></span></a>
                    </div>
                </div>
                <h2 class="text-black h1">{{$galleryImage->title}}</h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum excepturi corporis qui doloribus perspiciatis ipsa modi accusantium repellat.</p> -->
                </div>
            </div>
            @endforeach

        </div>
      </div>
    </div>
@endsection