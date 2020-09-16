@extends('backend.layouts.app')
@section('title')
    Posts
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
                        <li class="breadcrumb-item active">posts</li>
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
                <h1>{{$post->title}}</h1>
                <img src="{{asset('uploads/posts/'.$post->banner_image)}}" width="80%" height="auto">
                <p>{{$post->content}}</p>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>
@endsection