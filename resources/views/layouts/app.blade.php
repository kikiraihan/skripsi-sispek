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
    <link href="https://fonts.googleapis.com/css?family=Lato|Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets_template/css/sb-admin-2.css')}}" rel="stylesheet">

    <link rel="icon" href="{{asset('ilustrasi/sispekb.svg')}}">



    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- style-->
    {{-- <link rel="stylesheet" href="{{asset('assets_landing/style.css')}}"> --}}


</head>
<body class="bg-gray-100">

    <div id="app">



        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <i class="fas fa-user-circle"></i>
                    {{ config('app.name', 'Laravel') }} <sup>#1</sup>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <div class="text-center d-block mt-5">
            <a class="text-decoration-none text-black-50 h3 text-uppercase d-block" href="{{ url('/') }}">
                <img src="{{ asset('ilustrasi/sispekb.svg') }}" width="40pt">

                {{-- <i class="fas fa-brain rotate-n-15"></i> --}}
                {{-- <i class="fas fa-user-circle"></i> --}}
                {{ config('app.name', 'Laravel') }} 
                <sup>#1</sup>
                
                {{-- <small class="text-capitalize d-block d-md-inline">Rekomendasi Mahasiswa <sup>#1</sup></small> --}}
            </a>
            <span class="text-capitalize d-block d-md-inline">Informasi dan Rekomendasi Mahasiswa</span>
        </div>
        
        
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="sticky-footer ">
            <div class="container my-auto">
            <div class="copyright text-center my-auto d-flex justify-content-center flex-column flex-md-row">
                
                <span class="py-2 px-3">
                    <a class="text-decoration-none text-black-50" href="https://drive.google.com/drive/folders/12_3GBQMU_mE_H1mgH8nQNKd-L5X8hXcV?usp=sharing">
                        <i class="fa fa-info-circle"></i>
                        Panduan Aplikasi
                    </a>
                </span>
                <span class="py-2 px-3">&copy; Moh Zulkifli Katili {{ now()->year }}</span>
                <span class="py-2 px-3">Coding with &#128420; by 
                    <a class="text-decoration-none" href="https://linktr.ee/kikiraihann">
                        Moh Zulkifli Katili
                    </a>
                </span>
            </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->



    <script>
        $(function() {
            $('#navbarSupportedContent a[href~="' + location.href + '"]').parents('li').addClass('active');
            $('#navbarMobile a[href~="' + location.href + '"]').parents('li').css("background-color","#DDDDDD"); //#E5E5E5
        });
    </script>

    @include('sweetalert::alert')


</body>
</html>
