<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('backend.layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    @include('backend.layouts.header')
    @include('backend.layouts.sidebar')
    @yield('content')
    @yield('js')

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.2
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

@include('backend.layouts.footer')

</body>

</html>