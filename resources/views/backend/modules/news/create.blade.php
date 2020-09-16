@extends('backend.layouts.app')
@section('title')
    News
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{trans('app.configuration')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item">{{trans('app.configuration')}}</li>
                        <li class="breadcrumb-item active">News</li>
                        <li class="breadcrumb-item active">Create</li>
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
                <h3 class="card-title">{{trans('app.add')}}&nbsp;</h3>

            </div>
            <div class="card-body">
            {!! Form::open(['method'=>'post','url'=>'admin/news', 'files'=>true]) !!}


            <!-- /.input group -->
                <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
                    <label>News Title
                        <label class="text-danger"> *</label>
                    </label>
                    {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: Prisoner broke free']) !!}
                    {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}

                <!-- /.input group -->
                </div>
                <!-- <div class="form-group {{ ($errors->has('details'))?'has-error':'' }}">
                    <label>Details
                    </label>
                {!! Form::text('details',null,['class'=>'form-control','placeholder' => 'Example: NP']) !!}
                {!! $errors->first('details', '<span class="text-danger">:message</span>') !!}
               
                </div> -->
                <div class="form-group {{ ($errors->has('details'))?'has-error':'' }}">
                    <label>Details
                    </label>
                {!! Form::textarea('details',null,['class'=>'form-control']) !!}
                {!! $errors->first('details', '<span class="text-danger">:message</span>') !!}
                </div>
                <div class="form-group {{ ($errors->has('file'))?'has-error':'' }}">
                    <label>File</label>
                    {!! Form::file('file',null,['class'=>'form-control']) !!}
                    <!-- {!! $errors->first('country_name', '<span class="text-danger">:message</span>') !!} -->
                </div>
                <div class="form-group {{ ($errors->has('status'))?'has-error':'' }}">
                    <label for="status">{{trans('app.status')}} </label><br>
                    {{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
                    {{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
                </div>
                <!-- /.form group -->
                <div class="card-footer">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary">{{trans('app.save')}}&nbsp;</button>
                    </div>
                    <!-- /.card-footer -->

                </div>
                {!! Form::close() !!}

                </div>
        <!-- /.card-body -->
            </div>
<!-- /.card -->

        </div>
    </section>
        <!-- /.content -->
</div>
@endsection