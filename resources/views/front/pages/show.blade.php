@extends('front.layouts.app')
@if($page)
@section('title',$page->page_title)
@else
@section('title','Pages')
@endif
@section('content')
  @if($page)
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$page->page_title}}</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>
          {{$page->content}}
        </p>
      </div>
    </section>
  @endif
@endsection