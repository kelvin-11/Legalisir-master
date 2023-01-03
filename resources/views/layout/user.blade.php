<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="">

    <title>E-LEGALISIR</title>

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


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" style="background-color:darkslategray">

    <!-- Page Wrapper -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand topbar mt-0 mb-4" style="height: 88px">

                <div class="container">
                    <div class="et_pb_module et_pb_image et_pb_image_0_tb_header">
                        <a href="https://smkn1jenpo.sch.id/"><span class="et_pb_image_wrap "><img loading="lazy"
                                    width="310" height="120"
                                    src="https://smkn1jenpo.sch.id/wp-content/uploads/2022/10/logo-pka-2.png"
                                    alt="Logo SMK Negeri 1 Jenangan" title="logo pka"
                                    srcset="https://smkn1jenpo.sch.id/wp-content/uploads/2022/10/logo-pka-2.png 325w, https://smkn1jenpo.sch.id/wp-content/uploads/2022/10/logo-pka-2-300x111.png 300w"
                                    sizes="(max-width: 325px) 100vw, 325px" class="wp-image-258"></span></a>
                    </div>
                    
                    <h6>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        echo date('d-m-Y');
                        // echo ' &nbsp;&nbsp; <i id="h"></i> : <i id="m"></i> : <i id="s"></i>';
                        ?>
                    </h6>

                    <script>
                        window.setTimeout("waktu()", 1000);

                        function waktu() {
                            var waktu = new Date();
                            setTimeout("waktu()", 1000);  
                            document.getElementById("h").innerHTML = waktu.getHours();
                            document.getElementById("m").innerHTML = waktu.getMinutes();
                            document.getElementById("s").innerHTML = waktu.getSeconds();
                        }
                    </script>
                </div>
            </nav>

            {{-- <form action="/history" method="post">
                @csrf
                <div class="modal fade" id="HistoryModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Silahkan Masukkan NISN Terlebih Dahulu?</h5>
                                <button class="close" type="button" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="number" class="form-control" name="nisn">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button"
                                    data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form> --}}

        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}">
    </script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('Atlantis-Lite-master/assets/js/atlantis.min.js') }}"></script>
    @yield('user')
    <!-- End of Content Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <footer class="mt-3">
        <div class="copyright text-center" style="color: grey">
            <h5>Copyright &copy; SMKN 1 Jenangan 2022</h5>
        </div>

    </footer>


    {{-- <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> --}}

</body>

</html>
