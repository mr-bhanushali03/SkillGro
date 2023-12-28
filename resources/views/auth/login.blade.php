@extends('website.layout.layouts')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">{{ __('Sign In') }}</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">{{ __('Home') }}</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">{{ __('Sign In') }}</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape01.svg" alt="img"
                class="alltuchtopdown">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right"
                data-aos-delay="300">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up"
                data-aos-delay="400">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape04.svg" alt="img"
                data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left"
                data-aos-delay="400">
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- singUp-area -->
    <section class="singUp-area section-py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="singUp-wrap">
                        <h2 class="title">{{ __('Welcome back!') }}</h2>
                        <p>{{ __("Hey there! Ready to log in? Just enter your username and password below and you'll be back in
                                                                                                                                                                                                                                                                                                                                                                                                    action in no time. Let's go!") }}
                        </p>
                        <div class="account__social">
                            <a href="{{ url('authorized/google') }}" class="account__social-btn">
                                <img src="{{ asset('storage/website') }}/img/icons/google.svg" alt="img">
                                {{ __('Continue with google') }}
                            </a>
                        </div>
                        <div class="account__divider">
                            <span>{{ __('or') }}</span>
                        </div>
                        <form action="{{ url('authenticate') }}" class="account__form" method="POST">
                            @csrf
                            <div class="form-grp">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="text" name="email" value="{{ old('email') }}"
                                    placeholder="email" autocomplete="off" autofocus required>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-grp">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" name="password" placeholder="password"
                                    autocomplete="off" autofocus required>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="account__check">
                                <div class="account__check-remember">
                                    <input type="checkbox" class="form-check-input" name="rememberToken" value="checked"
                                        id="terms-check" autocomplete="off" autofocus>
                                    <label for="terms-check" class="form-check-label">{{ __('Remember me') }}</label>
                                </div>
                                {{-- <div class="account__check-forgot">
                                    <a href="{{ Route::has('forgot-password') }}">{{ __('Forgot Password?') }}</a>
                                </div> --}}
                                <div class="account__check-forgot">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-two arrow-btn">{{ __('Sign In') }}<img
                                    src="{{ asset('storage/website') }}/img/icons/right_arrow.svg" alt="img"
                                    class="injectable"></button>
                        </form>
                        <div class="account__switch">
                            <p>{{ __("Don't have an account?") }}<a href="{{ url('register') }}">{{ __('Sign Up') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->
@endsection