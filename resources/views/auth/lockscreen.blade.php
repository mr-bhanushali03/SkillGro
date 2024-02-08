<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark"
    data-sidebar-size="sm-hover" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ __('Lock Screen | SkillGro') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="SkillGro" name="description" />
    <meta content="SkillGro" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/website') }}/img/favicon.png">

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

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="{{ route('website.home') }}" class="d-inline-block auth-logo">
                                    <img src="{{ asset('storage/website') }}/img/logo/logo.svg" alt=""
                                        height="35">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Achieve Your Goal With SkillGrow</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Lock Screen</h5>
                                    <p class="text-muted">Enter your password to unlock the screen!</p>
                                </div>
                                <div class="user-thumb text-center">
                                    @if (session('user_data')['profile_photo_path'] == null)
                                        <img class="rounded-circle img-thumbnail avatar-lg"
                                            src="{{ session('user_data')['profile_photo_url'] }}" alt="thumbnail">
                                    @else
                                        <img class="rounded-circle img-thumbnail avatar-lg"
                                            src="{{ asset('storage/') }}/{{ session('user_data')['profile_photo_path'] }}" alt="thumbnail">
                                    @endif
                                    <h5 class="font-size-15 mt-3">{{ session('user_data')['name'] }}</h5>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('unlock') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter password" required>
                                            @error('password')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="email" value="{{ session('user_data')['email'] }}">
                                        <div class="mb-2 mt-4">
                                            <button class="btn btn-success w-100" type="submit">Unlock</button>
                                        </div>
                                    </form><!-- end form -->

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Not you ? return <a href="{{ route('login') }}"
                                    class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> SkillGro. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i>
                                by Command Sector
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/dashboard') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('assets/dashboard') }}/js/plugins.js"></script>

    <!-- particles js -->
    <script src="{{ asset('assets/dashboard') }}/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="{{ asset('assets/dashboard') }}/js/pages/particles.app.js"></script>
</body>

</html>
