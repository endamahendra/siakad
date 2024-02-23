<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
  <title>POLITEKNIK BELITUNG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="{{asset('assets/jquery.js')}}"></script> 

  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  
  <link href="{{asset('assets/css/dataTables.bulma.min.css')}}" rel="stylesheet">
 
<link href="{{asset('assets/css/app/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/app/tombol.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" 
integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="{{asset('assets/css/app/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/css/app/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/css/app/datatables.min.js')}}"></script>
<script src="{{asset('assets/css/app/jquery-ui.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
  
  
  <!-- =======================================================
    * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  {{-- @include('layouts.modalhapus') --}}
  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.svg')}}" alt="">
        <span class="d-none d-lg-block"></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
             <span class="d-none d-md-block dropdown-toggle ps-2">Hallo, {{ Auth::user()->nama }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <form method="POST" action="{{ route('logout') }}">
                            @csrf
              <a class="dropdown-item d-flex align-items-center" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
               </form>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
    </nav>
</header>
@include('layout.nav')


  <!-- ======= Hero Section ======= -->
  <main id="main" class="main">




      <div class="row">

@yield('content')

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright"> <strong><span>SIAKAD - Politeknik Belitung</span></strong>
    </div>
    <div class="credits">
     Versi 1.0.0</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>


    @stack('script')
</body>

</html>