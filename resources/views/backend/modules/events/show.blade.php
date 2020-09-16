@extends('backend.layouts.app')
@section('title')
    Events
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{trans('app.configuration')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">dashboard</a></li>
                        <li class="breadcrumb-item ">front</li>
                        <li class="breadcrumb-item">Events</li>
                        <li class="breadcrumb-item active">show</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default" style="padding:20px;">
                <h1>{{$event->title}}</h1>
                
                <p>Start Date: {{$event->start_date}}</p>
                <p>End Date: {{$event->end_date}}</p>
                <p>Start Time: {{$event->start_time}}</p>
                <p>End Time: {{$event->end_time}}</p>
                <p>Status: {{$event->status}}</p>
                <p>Created by: {{$event->user->name}}</p>
                <p>Venue: {{$event->venue}}</p>
                
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </section>
</div>
@endsection