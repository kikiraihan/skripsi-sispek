<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="aplikasi spk mahasiswa teknik informatika FT-UNG">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets_template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets_template/css/sb-admin-2.css')}}" rel="stylesheet">

    @yield('style-halaman')





</head>


<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts-auth.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">



            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts-auth.nav')

                <!-- Begin Page Content -->
                <div class="container-fluid px-3 px-lg-4">
                @yield('content')
                </div>


            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->


    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        {{-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda siap untuk keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div> --}}
        <div class="modal-body text-center">
        <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/decision_.svg')}}" alt="logout">
        <span class="small d-block">Pilih "Logout" di bawah ini jika anda siap untuk mengakhiri sesi anda saat ini.</span>
        </div>
        <div class="modal-footer">

            <div class="row  w-100 no-gutters">
                <span class="col-6 px-2 ">
                    <button class="w-100 h-100 btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </span>
                <span class="col-6 px-2">
                    <a class="w-100 h-100 btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </span>
            </div>

        </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets_template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets_template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets_template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets_template/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('assets_template/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets_template/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('assets_template/js/demo/chart-pie-demo.js')}}"></script>

    <script>
        $(function() {
            $('#navbarSupportedContent a[href~="' + location.href + '"]').parents('li').addClass('active');
            $('#navbarMobile a[href~="' + location.href + '"]').parents('li').css("background-color","#DDDDDD"); //#E5E5E5
        });


        $(window).resize(function() {
            if ($(window).width() < 768) {
            };
        });
        //$("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");

    </script>



    @yield('script-halaman')

    @include('sweetalert::alert')


</body>
</html>