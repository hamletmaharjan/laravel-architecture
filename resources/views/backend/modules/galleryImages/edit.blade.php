<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['admin.galleryImages.update',$edits->id],'files'=>true]) !!}


        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Example: Aliens spotted']) !!}
            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Gallery Name
                <label class="text-danger"> *</label>
            </label>
            <select name="gallery_id" id="cars" class="form-control">
                @foreach($galleries as $gallery)
                    <option value="{{$gallery->id}}" {{($gallery->id == $edits->gallery_id) ? 'selected': ''}} ) >{{$gallery->gallery_name}}</option>
                @endforeach
                
            </select>

        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('image'))?'has-error':'' }}">
            <label>Image</label>
            {!! Form::file('image',null,['class'=>'form-control']) !!}
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