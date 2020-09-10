<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('front/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
   
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" >

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-md-3 col-xl-4  d-block">
            <h1 class="mb-0 site-logo"><a href="/" class="text-black h2 mb-0">imagine<span class="text-primary">.</span> </a></h1>
          </div>

          <div class="col-12 col-md-9 col-xl-8 main-menu">
            <nav class="site-navigation position-relative text-right" role="navigation">
                <?php
                    $menus = App\Models\Modules\NavbarMenu::where('parent_id', '=', 0)->get();
                    $allMenus = App\Models\Modules\NavbarMenu::pluck('menu_name','id')->all();
                    $galleries = App\Models\Modules\Gallery::get();
                 ?>

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                <li><a href="/" class="nav-link">Home</a></li>
                @foreach($menus as $menu)
                @if(count($menu->childs))
                    <li class="has-children">
                        <a href="#about-section" class="nav-link">{{$menu->menu_name}}</a>
                        <ul class="dropdown arrow-top">
                            @foreach($menu->childs as $child)
                            @if(count($child->childs))
                                @include('front.layouts.hasChildMenu', ['menu'=> $child])
                                <!-- <li class="has-children">
                                <a href="#">{{$child->menu_name}}</a>
                                <ul class="dropdown">
                                    <li><a href="#">Menu One</a></li>
                                    <li><a href="#">Menu Two</a></li>
                                    <li><a href="#">Menu Three</a></li>
                                </ul>
                                </li> -->
                            @else
                                <li><a href="{{url('pages',$child->page_slug)}}" class="nav-link">{{$child->menu_name}}</a></li>
                            @endif
                            @endforeach
                            
                        </ul>
                    </li>
                @else
                    <li><a href="{{url('pages',$child->page_slug)}}" class="nav-link">{{$menu->menu_name}}</a></li>
                @endif
                @endforeach

                <li class="has-children">
                  <a href="#galleries-section" class="nav-link">Gallery</a>
                  <ul class="dropdown arrow-top">
                    @foreach($galleries as $gallery)
                      <li><a href="{{route('galleries.show',['id'=>$gallery->id])}}" class="nav-link">{{$gallery->gallery_name}}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#about-section" class="nav-link">Insights</a>
                  <ul class="dropdown arrow-top">
                    <li><a href="/posts" class="nav-link">Posts</a></li>
                    <li><a href="/events" class="nav-link">Events</a></li>
                    <li><a href="/news" class="nav-link">News</a></li>
                    <li><a href="/notices" class="nav-link">Notices</a></li>
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>


          <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0" ><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
    
    @yield('content')

    <!-- <div class="site-blocks-cover" style="overflow: hidden;">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" style="position: relative;" data-aos="fade-up" data-aos-delay="200">
            
            <img src="images/undraw_investing_7u74.svg" alt="Image" class="img-fluid img-absolute">

            <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6 mr-auto">
                <h1>Make Your Business More Profitable</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam assumenda ea quo cupiditate facere deleniti fuga officia.</p>
                <div>
                  <a href="#" class="btn btn-primary mr-2 mb-2">Get Started</a>
                </div>
              </div>
              
              
            </div>

          </div>
        </div>
      </div>
    </div>  


    <div class="site-section" id="features-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="col-7 text-center  mb-5">
            <h2 class="section-title">Imagine Features</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga quos quaerat sapiente nam, id vero.</p>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            
            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-autorenew"></span></span>
              </div>
              <div>
                <h3>Marketing Consulting</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-store_mall_directory"></span></span>
              </div>
              <div>
                <h3>Market Analysis</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up"  data-aos-delay="200">
            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-shopping_basket"></span></span>
              </div>
              <div>
                <h3>Easy Purchase</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-settings_backup_restore"></span></span>
              </div>
              <div>
                <h3>Free Updates</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-sentiment_satisfied"></span></span>
              </div>
              <div>
                <h3>100% Satistified</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>

            
          </div>
          
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-power"></span></span>
              </div>
              <div>
                <h3>Easy Plugin</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    <div class="feature-big">
      <div class="container">
        <div class="row mb-5 site-section">
          <div class="col-lg-7" data-aos="fade-right">
            <img src="images/undraw_gift_card_6ekc.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto mt-md-5">
            <h2 class="text-black">Communicate and gather feedback</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem neque nisi architecto autem molestias corrupti officia veniam.</p>
            
            <div class="author-box" data-aos="fade-left">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">Grey Simpson</strong> <br>
                  Co-Founder, XYZ Inc.
                </div>
              </div>
              <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote>
            </div>
          </div>
        </div>

        <div class="mt-5 row mb-5 site-section ">
          <div class="col-lg-7 order-1 order-lg-2" data-aos="fade-left">
            <img src="images/undraw_metrics_gtu7.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 pr-lg-5 mr-auto mt-5 order-2 order-lg-1">
            <h2 class="text-black">Communicate and gather feedback</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem neque nisi architecto autem molestias corrupti officia veniam</p>
            
            

            <div class="author-box" data-aos="fade-right">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">Kimberly Gush</strong> <br>
                  Co-Founder, XYZ Inc.
                </div>
              </div>
              <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote>
            </div>
          </div>
        </div>

        <div class="row mb-5 site-section">
          <div class="col-lg-7" data-aos="fade-right">
            <img src="images/undraw_gift_card_6ekc.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto mt-md-5">
            <h2 class="text-black">Communicate and gather feedback</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem neque nisi architecto autem molestias corrupti officia veniam.</p>
            
            <div class="author-box" data-aos="fade-left">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">Grey Simpson</strong> <br>
                  Co-Founder, XYZ Inc.
                </div>
              </div>
              <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote>
            </div>
          </div>
        </div>

        <div class="mt-5 row mb-5 site-section ">
          <div class="col-lg-7 order-1 order-lg-2" data-aos="fade-left">
            <img src="images/undraw_metrics_gtu7.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 pr-lg-5 mr-auto mt-5 order-2 order-lg-1">
            <h2 class="text-black">Communicate and gather feedback</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem neque nisi architecto autem molestias corrupti officia veniam</p>
            
            

            <div class="author-box" data-aos="fade-right">
              <div class="d-flex mb-4">
                <div class="mr-3">
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="mr-auto text-black">
                  <strong class="font-weight-bold mb-0">Kimberly Gush</strong> <br>
                  Co-Founder, XYZ Inc.
                </div>
              </div>
              <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae ipsa asperiores inventore aperiam iure?&rdquo;</blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light" id="about-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">About Us</h2>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="images/undraw_bookmarks_r6up.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 ml-auto pl-lg-5">
            <h2 class="text-black mb-4 h3 font-weight-bold">Our Mission</h2>
            <p class="mb-4">Eos cumque optio dolores excepturi rerum temporibus magni recusandae eveniet, totam omnis consectetur maxime quibusdam expedita dolorem dolor nobis dicta labore quaerat esse magnam unde, aperiam delectus! At maiores, itaque.</p>
            <ul class="ul-check mb-5 list-unstyled success">
              <li>Laborum enim quasi at modi</li>
              <li>Ad at tempore</li>
              <li>Labore quaerat esse</li>
            </ul>
            <p><a href="#" class="btn btn-primary">Learn More</a></p>
          </div>
        </div>

        
      </div>
    </div>

    <div class="site-section" id="our-team-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="col-7 text-center  mb-5">
            <h2 class="section-title">Our Team</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga quos quaerat sapiente nam, id vero.</p>
          </div>
        </div>
       
        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2 class="text-black h1">Cloe Marena</h2>
              <span class="sub-title d-block mb-3">President</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum excepturi corporis qui doloribus perspiciatis ipsa modi accusantium repellat.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2 class="text-black h1">John Rooster</h2>
              <span class="sub-title d-block mb-3">Marketing</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum excepturi corporis qui doloribus perspiciatis ipsa modi accusantium repellat.</p>
              
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2 class="text-black h1">Will Turner</h2>
              <span class="sub-title d-block mb-3">Marketing</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum excepturi corporis qui doloribus perspiciatis ipsa modi accusantium repellat.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2 class="text-black h1">Nicolas Stainer</h2>
              <span class="sub-title d-block mb-3">Financing</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum excepturi corporis qui doloribus perspiciatis ipsa modi accusantium repellat.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_5.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2 class="text-black h1">George Brook</h2>
              <span class="sub-title d-block mb-3">Founder</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum excepturi corporis qui doloribus perspiciatis ipsa modi accusantium repellat.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_6.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2 class="text-black h1">Emely Hopson</h2>
              <span class="sub-title d-block mb-3">Marketing</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum excepturi corporis qui doloribus perspiciatis ipsa modi accusantium repellat.</p>
              
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="site-section testimonial-wrap bg-light" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Testimonials</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              <figure class="mb-4 d-block align-items-center justify-content-center">
                <div><img src="images/person_3.jpg" alt="Image" class="w-100 img-fluid mb-3 shadow"></div>
              </figure>
              <blockquote class="mb-3">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
              <p class="text-black"><strong>John Smith</strong></p>

              
            </div>
          </div>
          <div>
            <div class="testimonial">
              
              <figure class="mb-4 d-block align-items-center justify-content-center">
                <div><img src="images/person_2.jpg" alt="Image" class="w-100 img-fluid mb-3 shadow"></div>
              </figure>

              <blockquote class="mb-3">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
              
              <p class="text-black"><strong>Robert Aguilar</strong></p>
              
              
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4 d-block align-items-center justify-content-center">
                <div><img src="images/person_4.jpg" alt="Image" class="w-100 img-fluid mb-3 shadow"></div>
              </figure>
              <blockquote class="mb-3">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
              <p class="text-black"><strong>Roger Spears</strong></p>

              
            </div>
           
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4 d-block align-items-center justify-content-center">
                <div><img src="images/person_1.jpg" alt="Image" class="w-100 img-fluid mb-3 shadow"></div>
              </figure>
              <blockquote class="mb-3">
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
              <p class="text-black"><strong>Kyle McDonald</strong></p>

              
            </div>

          </div>

        </div>
    </div>

    <div class="site-section" id="blog-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Blog Posts</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <h2><a href="#">Make Your Business More Profitable</a></h2>
              <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p>
            </div> 
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              <h2><a href="#">Make Your Business More Profitable</a></h2>
              <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              <h2><a href="#">Make Your Business More Profitable</a></h2>
              <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p>
            </div> 
          </div>
          
        </div>
      </div>
    </div>

    <div class="site-section bg-image2 overlay" id="contact-section" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-white">Contact Us</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-7 mb-5">

            

            <form action="#" class="p-5 bg-white">
              
              <h2 class="h4 text-black mb-5">Contact Form</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control rounded-0">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control rounded-0" placeholder="Leave your message here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary mr-2 mb-2">
                </div>
              </div>

  
            </form>
          </div>
        
        </div>
        
      </div>
    </div> -->

    <div class="footer py-5 text-center">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <p class="mb-0">
              <a href="#" class="p-3"><span class="icon-facebook"></span></a>
              <a href="#" class="p-3"><span class="icon-twitter"></span></a>
              <a href="#" class="p-3"><span class="icon-instagram"></span></a>
              <a href="#" class="p-3"><span class="icon-linkedin"></span></a>
              <a href="#" class="p-3"><span class="icon-pinterest"></span></a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="mb-0">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .site-wrap -->

  <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('front/js/jquery-ui.js')}}"></script>
  <script src="{{asset('front/js/popper.min.js')}}"></script>
  <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('front/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('front/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('front/js/aos.js')}}"></script>
  <script src="{{asset('front/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('front/js/jquery.sticky.js')}}"></script>

  
  <script src="{{asset('front/js/main.js')}}"></script>
  
  </body>
</html>