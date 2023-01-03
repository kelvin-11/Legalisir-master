<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Atlantis -->
    <!-- CSS Files -->
    <link rel="stylesheet" href="Atlantis-Lite-master/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Atlantis-Lite-master/assets/css/atlantis.min.css">
    <!-- EndAtlantis -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-LEGALISIR | SMKN 1 JENPO </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- Font -->
    <script src="assets/fonts/fontawesome/webfonts/webfont.min.js"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/fonts/fontawesome') }}"></script>
    <!-- endfont -->
    <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/logo.png" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top navbar-success d-flex align-items-top flex-row">
        {{-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">

            
                <!-- <a class="navbar-brand brand-logo" href="index.html">
            <img src="images/logo.svg" alt="logo" />
          </a> -->
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="assets/images/logo.png" alt="logo" />
                </a>
            
        </div> --}}
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text text-light">Selamat Datang, <span class="text-black fw-bold">{{ $siswa->nama }}</span></h1>
                </li>
            </ul>
            {{-- <ul class="navbar-item ">
                <li class="nav-nav">
                    <a href="/transaksi/show/{id}" class="nav-link"><b>History</b></a>
                </li>
            </ul> --}}
        </div>
    </nav>
    <!--   Core JS Files   -->
    <script src="Atlantis-Lite-master/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="Atlantis-Lite-master/assets/js/core/popper.min.js"></script>
    <script src="Atlantis-Lite-master/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="Atlantis-Lite-master/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="Atlantis-Lite-master/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="Atlantis-Lite-master/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="Atlantis-Lite-master/assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Atlantis JS -->
    <script src="Atlantis-Lite-master/assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <!-- <script src="Atlantis-Lite-master/assets/js/setting-demo2.js"></script> -->
    @yield('content')
</body>
