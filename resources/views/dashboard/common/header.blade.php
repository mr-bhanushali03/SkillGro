<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark"
    data-sidebar-size="sm-hover" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ __('Dashboard | SkillGro') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="SkillGro" name="description" />
    <meta content="SkillGro" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/website') }}/img/favicon.png">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/dashboard') }}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet"
        type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets/dashboard') }}/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/dashboard') }}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/dashboard') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/dashboard') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/dashboard') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/dashboard') }}/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('storage/website') }}/img/logo/logo.svg" alt=""
                                        height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('storage/website') }}/img/logo/logo.svg" alt=""
                                        height="30">
                                </span>
                            </a>

                            <a href="{{ route('dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('storage/website') }}/img/logo/logo.svg" alt=""
                                        height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('storage/website') }}/img/logo/logo.svg" alt=""
                                        height="30">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    @if (Auth::user()->profile_photo_path == null)
                                        <img class="rounded-circle header-profile-user"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="Header Avatar">
                                    @else
                                        <img class="rounded-circle header-profile-user"
                                            src="{{ asset('storage/') }}/{{ Auth::user()->profile_photo_path }}"
                                            alt="Header Avatar">
                                    @endif
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ Auth::user()->role }}</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}</h6>
                                <a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                @if (Auth::user()->role == 'Instructor')
                                    <a class="dropdown-item" href="{{ route('roles') }}"><i
                                            class="mdi  mdi-clipboard-account text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Become A Student</span></a>
                                @else
                                    <a class="dropdown-item" href="{{ route('roles') }}"><i
                                            class="mdi mdi-school text-muted fs-16 align-middle me-1"></i> <span
                                            class="align-middle">Become A Instructor</span></a>
                                @endif
                                <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Lock screen</span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
