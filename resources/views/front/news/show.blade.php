@extends('front.layouts.app')
@section('title','News')

@section('content')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Inner Page</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Inner Page</li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-12">

                <!-- Title -->
                <h1 class="mt-4">{{$news->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">{{$news->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{$news->created_at}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$news->details}}</p>

                <a href="{{asset('uploads/news/'.$news->file)}}">download</a>

                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                    <form>
                        <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            

               

        
            </div>
        </div>
    </section>
@endsection