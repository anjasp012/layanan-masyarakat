<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiple-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kta.css') }}" rel="stylesheet">
    <link href="{{ asset('js/leaflet/leaflet.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="sb-nav-fixed @if(!auth()->user()->role_id) d-md-block d-none @endif">
        @auth
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">E-KTA FPU</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
                {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form> --}}
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-none d-lg-block" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ auth()->user()->nama_lengkap ?? auth()->user()->nama_pengurus}}</a>
                        <a class="nav-link dropdown-toggle d-block d-lg-none" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Str::limit(auth()->user()->nama_lengkap, 6) ?? Str::limit(auth()->user()->nama_pengurus, 6)}}</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (Str::length(auth()->guard('pelanggan')->user()) > 0)
                                <li><a class="dropdown-item" href="{{ route('profilePelanggan.index') }}">Profile</a></li>
                            @elseif (Str::length(auth()->guard('user')->user()) > 0)
                                <li><a class="dropdown-item" href="{{ route('user.index') }}">Profile</a></li>
                            @endif
                            <li><hr class="dropdown-divider" /></li>
                            <li><form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        @endauth
        <div id="layoutSidenav">
            @include('layouts.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Forum Peduli Umat 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    @if (!auth()->user()->role_id)
        <div id="app" class="sb-nav-fixed @if(!auth()->user()->role_id) d-md-none d-block @endif" style="font-size: 14px">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Assalamualaikum Wr Wb <br> Selamat Datang, {{ auth()->user()->nama_pengurus }}</a>
                    <button class="navbar-toggler" type="button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div class="offcanvas offcanvas-start bg-dark navbar-dark w-75" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header px-0">
                    <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">E-KTA FPU</a>
                </div>
                <div class="offcanvas-body p-0">
                    @include('layouts.offcanvas-body')
                </div>
            </div>
            <div class="mt-4 container-fluid">
                @yield('content-mobile')
            </div>
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.font.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/multiple-select.min.js') }}"></script>
    <script src="{{ asset('js/leaflet/leaflet.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    @yield('script')
</body>
</html>
