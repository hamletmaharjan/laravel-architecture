@extends('front.layouts.app')
@section('title','News')

@section('content')

  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="news" class="faq section-bg">
    <div class="container">

      <div class="section-title">
        <h2>News Highlights</h2>
      </div>

      <div class="row  d-flex align-items-stretch">
      @foreach($news as $newsItem)
        <div class="col-lg-6 faq-item" data-aos="fade-up">
          <h4>{{$newsItem->title}}</h4>
          <p>
            {{substr($newsItem->details, 0 ,150)}}...
          </p>
          <p><a href="{{url('/news/'.$newsItem->id)}}">Continue Reading...</a></p>
        </div>
      @endforeach
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->
@endsection