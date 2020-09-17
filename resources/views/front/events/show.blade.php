@extends('front.layouts.app')
@section('title','Events')

@section('content')

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$event->title}}</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Events</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>Start Date - {{$event->start_date}}</p>
        <p>Start Date - {{$event->start_date}}</p>
        <p>End Date - {{$event->end_date}}</p>
        <p>Start Time - {{$event->start_time}}</p>
        <p>End Time - {{$event->end_time}}</p>
        <p>Created by - {{$event->user->name}}</p>
        <p>Venue - {{$event->venue}}</p>
      </div>
    </section>
@endsection