@extends('front.layouts.app')
@section('title','Index')

@section('content')
    <div class="site-section" id="features-section" style="padding-top:130px;">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center"  data-aos="fade-up">
            <div class="col-7 text-center  mb-5">
                <h2 class="section-title">Notices</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga quos quaerat sapiente nam, id vero.</p>
            </div>
            </div>
            <div class="row align-items-stretch">
                @foreach($notices as $notice)
            
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="unit-4 d-block">
                    <div class="unit-4-icon mb-3">
                        <span class="icon-wrap"><span class="text-primary icon-power"></span></span>
                    </div>
                    <div>
                        <h3>{{$notice->title}}</h3>
                        <span class="sub-title d-block mb-3">{{$notice->notice_date}}</span>
                        <p>{{$notice->content}}</p>
                        <p><a href="{{asset('uploads/notices/'.$notice->file)}}">download</a></p>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection