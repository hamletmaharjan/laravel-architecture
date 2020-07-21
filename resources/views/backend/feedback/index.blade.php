@extends('backend.layouts.app')
@section('title')
    Feedback
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Feedback</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Feedback</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            @include('backend.message.flash')
            <div class="card card-default">
                <div class="card-header with-border">
                    <h3 class="card-title"><strong><i class="fa fa-list"></i> Feedback</strong></h3>
                    <a href="{{url('/feedback/create')}}" class="pull-right cardTopButton" id="add" data-toggle="tooltip"
                       title="Add New"><i class="fa fa-plus-circle fa-2x" style="font-size:20px;"></i></a>

                    <a href="{{url('/feedback')}}" class="pull-right cardTopButton" data-toggle="tooltip"
                       title="View All"><i class="fa fa-list fa-2x" style="font-size:20px;"></i></a>

                    <a href="{{URL::previous()}}" class="pull-right cardTopButton" data-toggle="tooltip" title="Go Back">
                        <i class="fa fa-arrow-circle-left fa-2x" style="font-size:20px;"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example1" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th style="width: 10px">SN</th>
                                <th>Title</th>
                                <th style="width: 50px">Type</th>
                                <th>Date</th>
                                <th style="width: 50px" class="text-right">{{trans('app.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($feedbacks as $key=>$feedback)
                                <tr>
                                    <th scope=row>{{++$key}}</th>
                                    <td>{{$feedback->title}}</td>
                                    <td>
                                        @if($feedback->category == 'bug')
                                            <button class="btn btn-block btn-danger btn-xs">Bug / Error</button>
                                        @elseif($feedback->category == 'suggestion')
                                            <button class="btn btn-block btn-primary btn-xs">Suggestion</button>
                                        @else
                                            <button class="btn btn-block btn-success btn-xs">Feedback</button>
                                        @endif
                                    </td>
                                    <td>{{$feedback->date}}</td>
                                    <td class="text-right">
                                        <a href="{{url('feedback/'.$feedback->id .'/edit')}}"
                                           class="text-info btn btn-xs btn-default">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="{{url('feedback/'.$feedback->id)}}"
                                           class="text-info btn btn-xs btn-default">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div> {{--cONTAINER FLUID CLOSE--}}
        </section>
    </div>
@endsection