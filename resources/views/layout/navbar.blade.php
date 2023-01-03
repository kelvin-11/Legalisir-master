<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Atlantis -->
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite-master/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite-master/assets/css/atlantis.min.css') }}">
    <!-- EndAtlantis -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-LEGALISIR | SMKN 1 JENPO </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- Font -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <!-- endfont -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <!--   Core JS Files   -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/atlantis.min.js') }}"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <!-- <script src="Atlantis-Lite-master/assets/js/setting-demo2.js"></script> -->
    @yield('content')
</body>