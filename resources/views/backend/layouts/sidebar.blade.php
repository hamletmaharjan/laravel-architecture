<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
        <img src="{{asset('/uploads/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"> <strong>Young Minds</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->user_image!=null)
                    <img src="{{asset('/storage/uploads/users/images/profilePic/'.Auth::user()->user_image)}}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{url('/uploads/images/dummyUser.gif')}}" class="img-circle elevation-2" alt="User Image">
                @endif

            </div>
            <div class="info">
                <a href="{{url('dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php
            $firstLevelMenus = App\Models\Roles\Menu::getMenu($id = 0);
            $secondLevelMenus = App\Models\Roles\Menu::getMenu($id = session('menuId'));
            $menus = App\Models\Roles\Menu::getMenus();

            ?>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('/dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if(count($firstLevelMenus)>0)
                    @foreach($menus as $menu)
                        @if($menu->parent_id==0)
                            <?php $secondLevelMenus = App\Models\Roles\Menu::getMenu($menu->id);  ?>

                            @if(count($secondLevelMenus)>0)
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            {!! $menu->menu_icon !!}
                                            <p>
                                                {{$menu->menu_name}}
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>

                                        <ul class="nav nav-treeview">

                                        @foreach($secondLevelMenus as $secondLevelMenu)
                                                <li class="nav-item">
                                                    <a href="{{url("$secondLevelMenu->menu_link")}}" class="nav-link">
                                                        {!! $secondLevelMenu->menu_icon !!}
                                                        <p>{{$secondLevelMenu->menu_name}}</p>
                                                    </a>
                                                </li>

                                        @endforeach
                                    </ul>

                                </li>

                            @else

                                    <li class="nav-item">
                                        <a href="{{url($menu->menu_link)}}" class="nav-link">
                                            {!! $menu->menu_icon !!}
                                            <p>
                                                {{$menu->menu_name}}
                                            </p>
                                        </a>
                                    </li>
                            @endif
                        @endif

                    @endforeach
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

