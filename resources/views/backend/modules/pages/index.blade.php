@extends('backend.layouts.app')
@section('title')
    Pages
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Front</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item">Front</li>
                            <li class="breadcrumb-item active">Pages</li>
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

                    <div class="col-md-6" id="listing">
                        @else
                            <div class="col-md-12" id="listing">
                                @endif
                                <div class="card card-default">
                                    <div class="card-header with-border">
                                        <h3 class="card-title"><i class="fa fa-list"></i> Pages</h3>
                                        <?php

                                        $permission = helperPermissionLink(url('/admin/pages'), url('/admin/pages'));

                                        $allowEdit = $permission['isEdit'];

                                        $allowDelete = $permission['isDelete'];

                                        $allowAdd = $permission['isAdd'];
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px;">{{trans('app.sn')}}</th>
                                                <th>Page Title</th>
                                                <th>Slug</th>
                                                <th style="width: 10px"
                                                    class="text-right">Status</th>
                                                <th style="width: 100px"
                                                    class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1;?>
                                            @forelse($pages as $page)
                                                <tr>
                                                    <th scope=row>{{$i}}</th>
                                                    <td>{{$page->page_title}}</td>
                                                    <td>{{$page->slug}}</td>
                                                    <td class="text-center">
                                                        @if($page->status == 'active')
                                                            <a  class="label label-success stat" href="{{url('admin/pages/status',$page->id)}}">
                                                                <strong class="stat"> {{trans('app.active')}}
                                                                </strong>
                                                            </a>

                                                        @elseif($page->status == 'inactive')
                                                            <a class="label label-danger stat" href="{{url('admin/pages/status',$page->id)}}">
                                                                <strong class="stat"> {{trans('app.inactive')}}
                                                                </strong>
                                                            </a>
                                                        @endif
                                                    </td>

                                                    <td class="text-right row" style="margin-right: 0px;">
                                                    @if($allowEdit)
                                                            <a href="{{route('admin.pages.edit',[$page->id])}}"
                                                               class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                               data-placement="top" title="Edit" style="margin:0px 5px;">
                                                                <i class="fa fa-pencil-square-o"></i>
                                                            </a>
                                                        @endif

                                                        @if($allowDelete)
                                                            {!! Form::open(['method' => 'DELETE', 'route'=>['admin.pages.destroy',
                                                                $page->id],'class'=> 'inline']) !!}
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"
                                                                    onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>

                                                            {!! Form::close() !!}
                                                        @endif

                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>

                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                            @if($allowAdd)

                                <div class="col-md-6">
                                    @if(\Request::segment(4)=='edit')
                                        @include('backend.modules.pages.edit')
                                    @else
                                        @include('backend.modules.pages.create')
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