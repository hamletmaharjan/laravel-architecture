<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.add')}}&nbsp;</h3>

    </div>
    <div class="card-body">
    <!-- {!! Form::open(['method'=>'post','url'=>'admin/posts']) !!} -->

    <form method="POST" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
        @csrf
    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Post Title
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: My first post']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
            </label>
        {!! Form::text('content',null,['class'=>'form-control','placeholder' => 'Example: sijfesljfe']) !!}
        {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        <div class="form-group {{ ($errors->has('banner_image'))?'has-error':'' }}">
            <label>Banner Image</label>
            {!! Form::file('banner_image',null,['class'=>'form-control']) !!}
            {!! $errors->first('banner_image', '<span class="text-danger">:message</span>') !!}
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
        </form>
        <!-- {!! Form::close() !!} -->

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

