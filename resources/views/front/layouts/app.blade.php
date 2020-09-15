@include('front.layouts.header')

@include('front.layouts.navbar')
 
@yield('hero')

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

@include('front.layouts.footer')