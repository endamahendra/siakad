<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIAKAD - Login Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png" rel="icon')}}">
  <link href="{{asset('assets/img/apple-touch-icon.png" rel="apple-touch-icon')}}">

  
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/app/login.css')}}" rel="stylesheet">
<script src="{{asset('assets/css/app/vfs_fonts.js')}}"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    </head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container-fluid p-0">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                    <div class="card-body">
                    <div class="row">
                    <div>
                        <table class="table" width="100%">
                            <tr>
                                <br><br>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="auth-logo">
                                        <img src="{{asset('assets/img/logo.png')}}" height="35"
                                        class="logo2 mx-auto" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a class="auth-logo">
                                        <img src="{{asset('assets/img/km.png')}}" height="35"
                                            class="logo2 mx-auto" alt="">
                                        </a>
                                    </td>
                                    <td></td>
                                    <td></td>
                            </tr>
                        </table>
                    </div>
                        <div class="card-body">
                            <h5 class="card-title text-center pb-0 fs-4">Masuk ke SIAKAD</h5>

                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">{{ __('Log in') }}</button>
                            </div>
                            
                            <!-- Informasi Kontak -->
                            <div class="contact-info">
                                <div class="text-center">
                                    <br>
                                    <hr>
                                    <b>Kontak Center</b>
                                </div>
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kontak_akademik" role="tab">
                                            <span class="d-sm-block">Akademik</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kontak_it" role="tab">
                                            <span class="d-sm-block">IT</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kontak_keuangan" role="tab">
                                            <span class="d-sm-block">Keuangan</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane" id="kontak_akademik" role="tabpanel">
                                        <p class="mb-0">
                                            Biro Administrasi Akademik<br />
                                            Gedung A Lantai 1<br />
                                            Jalan Cikutra No 204A Bandung Jawa Barat, Indonesia, 40125.<br />
                                            Telepon : +62-22-7275855 ext. 210<br />
                                            Email : registrasi.akademik@widyatama.ac.id<br />
                                            WA : 0855-170-6655<br />
                                            WA : 0855-170-7373<br />
                                            WA : 0855-170-7575
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="kontak_it" role="tabpanel">
                                        <p class="mb-0">
                                            Pusat Teknologi Informasi<br />
                                            Jalan Cikutra No 204A Bandung Jawa Barat, Indonesia, 40125.<br />
                                            Telepon : +62-22-7275855 ext. 243<br />
                                            Email : helpdesk.itc@widyatama.ac.id<br />
                                            WA : +62-895-3530-10007
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="kontak_keuangan" role="tabpanel">
                                        <p class="mb-0">
                                            Bagian PUPd<br />
                                            Gedung B Lantai 1<br />
                                            Jalan Cikutra No 204A Bandung Jawa Barat, Indonesia, 40125.<br />
                                            Telepon : +62-22-7275855<br />
                                            Email : pupd@widyatama.ac.id<br /><br />
                                            Reguler A ext. 240 atau Ibu Amalia Nurfauziah<br />
                                            No. Hp : 0895-353-010533<br />
                                            Reguler B ext. 262 atau Ibu Rohotna Ferawaty S<br />
                                            No. Hp : 0838-3869-3737
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>




