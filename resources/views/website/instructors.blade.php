@extends('website.layout.layouts')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">All Instructors</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Instructors</span>
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

    <!-- instructor-area -->
    <section class="instructor__area">
        <div class="container">
            <div class="row">
                @foreach ($Instructor as $instructor)
                    <div class="col-xl-4 col-sm-6">
                        <div class="instructor__item">
                            <div class="instructor__thumb">
                                <a href="{{ url('instructorDetail') }}">
                                    @if ($instructor->profile_photo_path == null)
                                        <img src="{{ $instructor->profile_photo_url }}" alt="img" class="rounded-circle" style="height: 180px; width: 180px;">
                                    @else
                                        <img src="{{ asset('storage') }}/{{ $instructor->profile_photo_path }}" alt="img" class="rounded-circle" style="height: 180px; width: 180px;">
                                    @endif
                                </a>                                
                            </div>
                            <div class="instructor__content">
                                <h2 class="title"><a href="{{ url('instructorDetail') }}">{{ $instructor->name }}</a>
                                </h2>
                                <span class="designation">{{ $instructor->profession }}</span>
                                <p class="avg-rating">
                                    <i class="fas fa-star"></i>
                                    (4.8 Ratings)
                                </p>
                                <div class="instructor__social">
                                    <ul class="list-wrap">
                                        <li><a href="{{ $instructor->youtube }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ $instructor->linkedin }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ $instructor->instagram }}"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a href="{{ $instructor->twitter }}"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-30">
                    {{ $Instructor->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
    <!-- instructor-area-end -->
@endsection
