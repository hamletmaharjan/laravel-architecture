@extends('front.layouts.app')
@section('title','Gallery')

@section('content')

     <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="section-title">
                <h2>Galleries</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
<!-- 
                <div class="row">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
                </div> -->

                <div class="row portfolio-container">
                @foreach($galleries as $gallery)
                    <?php $galleryImage = $gallery->galleryImages->first();
                     ?>
                    @if($galleryImage)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                        <img src="{{asset('uploads/galleryImages/'.$galleryImage->image)}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$gallery->gallery_name}}</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                            <a href="{{asset('uploads/galleryImages/'.$galleryImage->image)}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                            <a href="{{url('/galleries/'.$gallery->id)}}" title="More Details"><i class="icofont-external-link"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                        <img src="{{asset('front/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$gallery->gallery_name}}</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                            <a href="{{asset('front/img/portfolio/portfolio-4.jpg')}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                            <a href="{{url('/galleries/'.$gallery->id)}}" title="More Details"><i class="icofont-external-link"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>

            </div>

        </div>
    </section><!-- End Our Portfolio Section -->
@endsection