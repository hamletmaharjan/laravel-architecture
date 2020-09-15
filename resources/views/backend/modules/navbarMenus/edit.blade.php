<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">Edit Menu</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['admin.navbarMenus.update',$edits->id]]) !!}

        <div class="form-group {{ ($errors->has('parent_id'))?'has-error':'' }}">
            <label>Parent Menu
                <label class="text-danger"> *</label>
            </label>
            <select name="parent_id" id="cars" class="form-control" style="width:100%;">
                @if($edits->parent_id == 0)
                    @foreach($navbarMenus as $parentMenu)
                        <option value="{{$parentMenu->id}}"  >{{$parentMenu->menu_name}}</option>
                    @endforeach
                    <option value="0" selected>None</option>
                @else
                    @foreach($navbarMenus as $parentMenu)
                        <option value="{{$parentMenu->id}}" {{($parentMenu->id == $edits->parent_id)? 'selected': ''}}>{{$parentMenu->menu_name}}</option>
                    @endforeach
                    <option value="0" >None</option>
                @endif
                
            </select>
        </div>
   
        <div class="form-group {{ ($errors->has('menu_name'))?'has-error':'' }}">
            <label>Menu Name
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('menu_name',null,['class'=>'form-control']) !!}
            {!! $errors->first('menu_name', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('navbar_menu_type_id'))?'has-error':'' }}">
            <label>Navbar Menu Type
                <label class="text-danger"> *</label>
            </label>
            <select name="navbar_menu_type_id" id="cars" class="form-control">
                @foreach($navbarMenuTypes as $menuType)
                    <option value="{{$menuType->id}}" {{($menuType->id == $edits->navbar_menu_type_id)? 'selected': ''}}>{{$menuType->type_name}}</option>
                @endforeach
                
            </select>
        </div>
        <div class="form-group {{ ($errors->has('page_slug'))?'has-error':'' }}">
            <label>Page Link
                <label class="text-danger"> *</label>
            </label>
            {!! Form::text('page_slug',null,['class'=>'form-control']) !!}
            {!! $errors->first('page_slug', '<span class="text-danger">:message</span>') !!}

        </div>
        
        <div class="form-group {{ ($errors->has('status'))?'has-error':'' }}">
            <label for="status">{{trans('app.status')}} </label><br>
            {{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} {{trans('app.active')}} &nbsp;&nbsp;&nbsp;
            {{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} {{trans('app.inactive')}}
        </div>

        <!-- /.form group -->
        <div class="card-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary pull-right">Save</button>


            </div>
            <!-- /.card-footer -->

        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
</div>