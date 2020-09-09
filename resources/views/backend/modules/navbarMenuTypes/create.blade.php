<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.add')}}&nbsp;</h3>

    </div>
    <div class="card-body">
    {!! Form::open(['method'=>'post','url'=>'admin/navbarMenuTypes']) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('type_name'))?'has-error':'' }}">
            <label>Type Name
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('type_name',null,['class'=>'form-control','placeholder' => 'Example: About']) !!}
            {!! $errors->first('type_name', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        
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

