@extends('backend.layouts.app')
@section('title')
    Posts
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
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">dashboard</a></li>
                            <li class="breadcrumb-item ">front</li>
                            <li class="breadcrumb-item active">posts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            @include('backend.message.flash')

            <div class="row">

                @if(helperPermission()['isAdd'])

                    <div class="col-md-9" id="listing">
                        @else
                            <div class="col-md-12" id="listing">
                                @endif
                                <div class="card card-default">
                                    <div class="card-header with-border">
                                        <h3 class="card-title"><i class="fa fa-list"></i> Posts</h3>
                                        <?php

                                        $permission = helperPermissionLink(url('/admin/posts'), url('/admin/posts'));

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        @if(!count($posts)<=0)
                                            <div class="table-responsive">
                                                <table id="example1"
                                                       class="table table-striped table-bordered table-hover table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>S.N</th>
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>User Id</th>
                                                        <th class="text-center">Status</th>
                                                        <th style="width: 70px;" class="text-right">Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    @foreach($posts as $post)
                                                        <tr>
                                                            <th scope=row>{{$i++}}</th>
                                                            <td>{{$post->title}}</td>
                                                            <td>{{$post->content}}</td>
                                                            <td>1</td>
                                                            <td>
                                                            
                                                                    @if($post->status== 'active')

                                                                        <a class="label label-success stat"
                                                                           href="#">
                                                                            <strong class="stat"> Active
                                                                            </strong>
                                                                        </a>

                                                                    @elseif($post->status== 'inactive')
                                                                        <a class="label label-danger stat"
                                                                           href="#">
                                                                            <strong class="stat"> Inactive
                                                                            </strong>
                                                                        </a>
                                                                    @endif
                                                                
                                                            </td>
                                                            <td class="text-right row" style="margin: 0px;">
                                                                @if($allowEdit)
                                                                    <a href="#"
                                                                       class="text-info btn btn-xs btn-default"
                                                                       data-toggle="tooltip"
                                                                       data-placement="top" title="Edit">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                    </a>&nbsp;
                                                                @endif

                                                                
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>

                                                </table>
                                            </div>


                                        @else
                                            <div class="col-md-12">
                                                <label class="form-control label-danger">No records found</label>
                                            </div>
                                        @endif

                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                            @if($allowAdd)

                                <div class="col-md-3">
                                    @if(\Request::segment(4)=='edit')
                                        @include('backend.configurations.department.edit')
                                    @else
                                        @include('backend.modules.posts.create')
                                    @endif

                                </div>
                            @endif

                    </div>
            </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@endsection