@extends('front.layouts.app')
@section('title','Events')

@section('content')
    <div class="feature-big">
      <div class="container">
        @foreach($events as $event)
        <div class="row mb-5 site-section">
          <div class="col-lg-7" data-aos="fade-right" style="background-color:#dedede">
            <h2 class="text-black" style="text-align: center; padding-top:90px; margin:10px;">{{$event->title}}</h2>
            <!-- <img src="images/undraw_gift_card_6ekc.svg" alt="Image" class="img-fluid"> -->
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto mt-md-5">
            <!-- <h2 class="text-black">Communicate and gather feedback</h2> -->
            <p class="mb-4">Start At - <strong class="font-weight-bold mb-0">{{$event->start_date}} {{$event->start_time}}</strong></p>
            <p class="mb-4">Ends At - <strong class="font-weight-bold mb-0">{{$event->end_date}} {{$event->end_time}}</strong></p>
            
            <div class="author-box" data-aos="fade-left">
              <div class="d-flex mb-4">
                <div class="mr-auto text-black">
                  Venue - <strong class="font-weight-bold mb-0">{{$event->venue}}</strong> <br>
                
                </div>
              </div>
              <!-- <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote> -->
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
@endsection