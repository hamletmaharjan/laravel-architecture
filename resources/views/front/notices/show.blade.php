@extends('front.layouts.app')
@section('title','Notices')

@section('content')

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$notice->title}}</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Notices</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>
          {{$notice->content}}
        </p>
        @if($notice->file)
        <p>File: <a href="{{asset('uploads/notices/'.$notice->file)}}">download</a></p>
        @endif
      </div>
    </section>
@endsection