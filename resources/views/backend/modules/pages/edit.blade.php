<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['admin.pages.update',$edits->id],'files'=>true]) !!}


        <div class="form-group {{ ($errors->has('page_title'))?'has-error':'' }}">
            <label>Page Title
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('page_title',null,['class'=>'form-control']) !!}
            {!! $errors->first('page_title', '<span class="text-danger">:message</span>') !!}
        </div>
        

        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
            </label>
        {!! Form::textarea('content',null,['class'=>'form-control']) !!}
        {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
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
                <button type="submit" class="btn btn-primary">{{trans('app.update')}}</button>
            </div>
            <!-- /.card-footer -->
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
</div>