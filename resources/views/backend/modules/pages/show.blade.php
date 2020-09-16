@extends('backend.layouts.app')
@section('title')
    Pages
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
                        <li class="breadcrumb-item">Pages</li>
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
                <h1>{{$page->page_title}}</h1> <br>
                
                <p>{{$page->content}}</p>
                <!-- /.card-body -->
                @if($page->file)
                <p>File: <a href="{{asset('uploads/pages/'.$page->file)}}">download</a></p>
                @endif
            </div>
            <!-- /.card -->
        </div>

    </section>
</div>
@endsection