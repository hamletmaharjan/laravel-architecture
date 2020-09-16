 <!-- ======= Header ======= -->
 <header id="header">
    <div class="container">

        <div class="logo float-left">
            <h1 class="text-light"><a href="index.html"><span>Mamba</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu float-right d-none d-lg-block">
            <?php
                $menus = App\Models\Modules\NavbarMenu::where('parent_id', '=', 0)->get();      
            ?>
            <ul>
            @foreach($menus as $menu)
                @if(count($menu->childs))
                <li class="drop-down"><a href="">{{$menu->menu_name}}</a>
                    <ul>
                        @foreach($menu->childs as $child)
                            @if(count($child->childs))
                                @include('front.layouts.hasChildMenu', ['menu'=> $child])
                            @else
                                <li><a href="{{$child->page_slug}}">{{$child->menu_name}}</a></li>
                            @endif
                        @endforeach
                        
                    </ul>
                </li>
                @else
                <li><a href="{{$menu->page_slug}}">{{$menu->menu_name}}</a></li>
                @endif
            @endforeach
            
                <!-- <li class="active"><a href="index.html">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li class="drop-down"><a href="">Drop Down</a>
                    <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li class="drop-down"><a href="#">Drop Down 2</a>
                        <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                    <li><a href="#">Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact Us</a></li> -->
            </ul>
        </nav><!-- .nav-menu -->

        </div>
  </header><!-- End Header -->
