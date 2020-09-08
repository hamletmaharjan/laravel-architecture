<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

    {!! Form::model($edits,['method'=>'PUT','route'=>['admin.galleries.update',$edits->id]]) !!}


        <div class="form-group {{ ($errors->has('gallery_name'))?'has-error':'' }}">
            <label>Gallery Name
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('gallery_name',null,['class'=>'form-control','placeholder' => 'Example: Trains']) !!}
            {!! $errors->first('gallery_name', '<span class="text-danger">:message</span>') !!}
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