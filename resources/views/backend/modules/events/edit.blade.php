<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['admin.events.update',$edits->id]]) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: Aliens spotted']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('start_date'))?'has-error':'' }}">
            <label>Start Date
            </label>
        {!! Form::date('start_date',null,['class'=>'form-control']) !!}
        {!! $errors->first('start_date', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('end_date'))?'has-error':'' }}">
            <label>End Date
            </label>
        {!! Form::date('end_date',null,['class'=>'form-control']) !!}
        {!! $errors->first('end_date', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('start_time'))?'has-error':'' }}">
            <label>Start Time
            </label>
        {!! Form::time('start_time',null,['class'=>'form-control']) !!}
        {!! $errors->first('start_time', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('end_time'))?'has-error':'' }}">
            <label>End Time
            </label>
        {!! Form::time('end_time',null,['class'=>'form-control']) !!}
        {!! $errors->first('end_time', '<span class="text-danger">:message</span>') !!}
        </div>
        
        <div class="form-group {{ ($errors->has('venue'))?'has-error':'' }}">
            <label>Venue
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('venue',null,['class'=>'form-control']) !!}
            {!! $errors->first('venue', '<span class="text-danger">:message</span>') !!}
        </div>

        <div class="form-group {{ ($errors->has('status'))?'has-error':'' }}">
            <label for="status">{{trans('app.status')}} </label><br>
            {{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>
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