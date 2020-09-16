@extends('front.layouts.app')
@section('title','Events')

@section('content')

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>All Events</h2>
        </div>

        <div class="row">
        @foreach($events as $event)
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
            <div class="icon"><i class="icofont-tasks-alt"></i></div>
            <h4 class="title"><a href="">{{$event->title}}</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->
@endsection