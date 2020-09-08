<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits, ['method'=>'PUT','route'=>['admin.posts.update',$edits->id], 'files'=>true],) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Post Title
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: My first post']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('content',null,['class'=>'form-control','placeholder' => 'Example: USA']) !!}
            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('banner_image'))?'has-error':'' }}">
            <label>Banner Image</label>
            {!! Form::file('banner_image',null,['class'=>'form-control']) !!}
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
                <button type="submit" class="btn btn-primary">{{trans('app.update')}}&nbsp;</button>
            </div>
            <!-- /.card-footer -->

        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
</div>