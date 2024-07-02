<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>RTKU</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('template.backend.header_script.header')
  @yield('style')
</head>
<body>
  <!-- start loader -->
  <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <img src="{{ asset('assets/img/logo.png') }}" height="200">
        <br>
        <br>
        <div class="loader">
        </div>
      </div>
    </div>
  </div>
  <!-- end loader -->
  <!-- Start wrapper-->
  <div id="wrapper">
    @include('template.backend.sidebar.sidebar')
    @include('template.backend.navbar.navbar')
    <div class="clearfix"></div>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
          <div class="col-lg-12">
            <h4 class="page-title">@yield('title')</h4>
          </div>
        </div>

        @yield('content')
        
        <div class="overlay toggle-menu"></div>
      </div>
    </div>

    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    
    <!-- <footer class="footer" style="background-color: white; color: #5a5a5a;">
      <div class="container">
        <div class="text-center">Copyright © 2021 Universitas Ciracas</div>
      </div>
    </footer> -->
  </div>
  <!--End wrapper-->
  @include('template.backend.footer_script.footer')
  @yield('js')
</body>
</html>