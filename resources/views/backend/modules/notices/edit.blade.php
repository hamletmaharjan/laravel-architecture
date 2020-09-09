<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['admin.notices.update',$edits->id],'files'=>true]) !!}


        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: Day off tomorrow']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
            </label>
        {!! Form::textarea('content',null,['class'=>'form-control']) !!}
        {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('notice_date'))?'has-error':'' }}">
            <label>Notice Date
            </label>
        {!! Form::date('notice_date',null,['class'=>'form-control']) !!}
        {!! $errors->first('notice_date', '<span class="text-danger">:message</span>') !!}
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

        <div class="form-group {{ ($errors->has('display_order'))?'has-error':'' }}">
            <label for="display_order">Display Order
                <label class="text-danger"> *</label>
            </label>
            {!! Form::number('display_order',null,['class'=>'form-control','placeholder'=>'Enter Menu Order']) !!}
            {!! $errors->first('display_order', '<span class="text-danger">:message</span>') !!}
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