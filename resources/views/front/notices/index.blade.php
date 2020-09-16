@extends('front.layouts.app')
@section('title','Posts')

@section('content')

      <!-- ======= About Lists Section ======= -->
<section class="about-lists">
    <div class="container">

        <div class="row no-gutters">
        @foreach($notices as $notice)
            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
            <span>{{$notice->notice_date}}</span>
            <h4><a href="{{url('/notices/'.$notice->id)}}">{{$notice->title}}</a></h4>
            <p>{{$notice->content}}</p>
            </div>
        @endforeach
        

        </div>

    </div>
</section><!-- End About Lists Section -->
@endsection