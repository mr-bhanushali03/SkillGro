@extends('website.layout.layouts')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">{{ __('Sign Up') }}</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">{{ __('Home') }}</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">{{ __('Sign Up') }}</span>
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
                        <h2 class="title">{{ __('Create Your Account') }}</h2>
                        <p>{{ __('Hey there! Ready to join the party? We just need a few details from you to get') }} <br>
                            {{ __('started.') }}
                            {{ __("Let's do this!") }}</p>
                        <div class="account__social">
                            <a href="{{ url('authorized/google') }}" class="account__social-btn">
                                <img src="{{ asset('storage/website') }}/img/icons/google.svg" alt="img">
                                {{ __('Continue with google') }}
                            </a>
                        </div>
                        <div class="account__divider">
                            <span>{{ __('or') }}</span>
                        </div>
                        <form action="{{ url('store') }}" class="account__form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gutter-20">
                                <div class="col-md-12">
                                    <div class="form-grp">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            placeholder="Full Name" autocomplete="off" autofocus required>
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="email" autocomplete="off" autofocus required>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-grp">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" placeholder="password"
                                    autocomplete="off" autofocus required>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-grp">
                                <label for="confirm-password">{{ __('Confirm Password') }}</label>
                                <input type="password" id="confirm-password" name="password_confirmation" autocomplete="off"
                                    placeholder="Confirm Password" autofocus required>
                                @error('password_confirmation')
                                    @foreach ($errors->get('password_confirmation') as $error)
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @endforeach
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-two arrow-btn">{{ __('Sign Up') }}<img
                                    src="{{ asset('storage/website') }}/img/icons/right_arrow.svg" alt="img"
                                    class="injectable"></button>
                        </form>
                        <div class="account__switch">
                            <p>{{ __('Already have an account?') }}<a href="{{ url('login') }}">{{ __('Sign In') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->
@endsection
