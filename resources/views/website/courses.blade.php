@extends('website.layout.layouts')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">All Courses</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Courses</span>
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

    <!-- all-courses -->
    <section class="all-courses-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-lg-0">
                    <aside class="courses__sidebar">
                        <div class="courses-widget">
                            <h4 class="widget-title">Categories</h4>
                            <div class="courses-cat-list">
                                <ul class="list-wrap">
                                    @foreach ($Categories as $category)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input category-filter" type="radio"
                                                    name="category" value="{{ $category->category }}"
                                                    id="category_{{ $category->id }}">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="category_{{ $category->id }}">
                                                    {{ $category->category }}
                                                    <i class="{{ $category->icon }} ms-2"></i>
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                            </div>
                        </div>
                        <div class="courses-widget">
                            <h4 class="widget-title">Skill level</h4>
                            <div class="courses-cat-list">
                                <ul class="list-wrap">
                                    @foreach (['Beginner', 'Intermediate', 'Advanced'] as $level)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input skill-filter" type="radio"
                                                    name="skill_level" value="{{ $level }}"
                                                    id="{{ strtolower($level) }}">
                                                <label class="form-check-label"
                                                    for="{{ strtolower($level) }}">{{ $level }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="courses-widget">
                            <h4 class="widget-title">Instructors</h4>
                            <div class="courses-cat-list">
                                <ul class="list-wrap">
                                    @foreach ($Instructors as $instructor)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input instructor-filter" type="radio"
                                                    name="instructor" value="{{ $instructor->name }}"
                                                    id="instructor_{{ $instructor->id }}">
                                                <label class="form-check-label"
                                                    for="instructor_{{ $instructor->id }}">{{ $instructor->name }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="show-more">
                                <a href="{{ route('website.instructors') }}">Show More +</a>
                            </div>
                        </div>
                        <div class="courses-widget">
                            <h4 class="widget-title">Ratings</h4>
                            <div class="courses-rating-list">
                                <ul class="list-wrap">
                                    @foreach (range(5, 1) as $rating)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input rating-filter" type="radio" name="rating"
                                                    value="{{ $rating }}" id="rating_{{ $rating }}">
                                                <div class="rating">
                                                    <ul class="list-wrap">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $rating)
                                                                <li><i class="fas fa-star"></i></li>
                                                            @else
                                                                <li class="delete"><i class="fas fa-star"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="courses-top-wrap courses-top-wrap">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="courses-top-left">
                                    <p>Showing {{ $AllCourses->count() }} total results</p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div
                                    class="d-flex justify-content-center justify-content-md-end align-items-center flex-wrap">
                                    <ul class="nav nav-tabs courses__nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#grid" type="button" role="tab"
                                                aria-controls="grid" aria-selected="true">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 1H2C1.44772 1 1 1.44772 1 2V6C1 6.55228 1.44772 7 2 7H6C6.55228 7 7 6.55228 7 6V2C7 1.44772 6.55228 1 6 1Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M16 1H12C11.4477 1 11 1.44772 11 2V6C11 6.55228 11.4477 7 12 7H16C16.5523 7 17 6.55228 17 6V2C17 1.44772 16.5523 1 16 1Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M6 11H2C1.44772 11 1 11.4477 1 12V16C1 16.5523 1.44772 17 2 17H6C6.55228 17 7 16.5523 7 16V12C7 11.4477 6.55228 11 6 11Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M16 11H12C11.4477 11 11 11.4477 11 12V16C11 16.5523 11.4477 17 12 17H16C16.5523 17 17 16.5523 17 16V12C17 11.4477 16.5523 11 16 11Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="list-tab" data-bs-toggle="tab"
                                                data-bs-target="#list" type="button" role="tab"
                                                aria-controls="list" aria-selected="false">
                                                <svg width="19" height="15" viewBox="0 0 19 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.5 6C0.67 6 0 6.67 0 7.5C0 8.33 0.67 9 1.5 9C2.33 9 3 8.33 3 7.5C3 6.67 2.33 6 1.5 6ZM1.5 0C0.67 0 0 0.67 0 1.5C0 2.33 0.67 3 1.5 3C2.33 3 3 2.33 3 1.5C3 0.67 2.33 0 1.5 0ZM1.5 12C0.67 12 0 12.68 0 13.5C0 14.32 0.68 15 1.5 15C2.32 15 3 14.32 3 13.5C3 12.68 2.33 12 1.5 12ZM5.5 14.5H17.5C18.05 14.5 18.5 14.05 18.5 13.5C18.5 12.95 18.05 12.5 17.5 12.5H5.5C4.95 12.5 4.5 12.95 4.5 13.5C4.5 14.05 4.95 14.5 5.5 14.5ZM5.5 8.5H17.5C18.05 8.5 18.5 8.05 18.5 7.5C18.5 6.95 18.05 6.5 17.5 6.5H5.5C4.95 6.5 4.5 6.95 4.5 7.5C4.5 8.05 4.95 8.5 5.5 8.5ZM4.5 1.5C4.5 2.05 4.95 2.5 5.5 2.5H17.5C18.05 2.5 18.5 2.05 18.5 1.5C18.5 0.95 18.05 0.5 17.5 0.5H5.5C4.95 0.5 4.5 0.95 4.5 1.5Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="grid" role="tabpanel"
                            aria-labelledby="grid-tab">
                            <div
                                class="row courses__grid-wrap row-cols-1 row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-1">
                                @foreach ($Courses as $course)
                                    @php
                                        foreach ($Instructors as $instructor) {
                                            if ($course->user_id == $instructor->id) {
                                                $instructorName = $instructor->name;
                                            }
                                        }
                                    @endphp
                                    <div class="col">
                                        <div class="courses__item shine__animate-item"
                                            data-category="{{ $course->category }}" data-skill="{{ $course->level }}"
                                            data-instructor="{{ $instructorName }}">
                                            <div class="courses__item-thumb">
                                                <a href="{{ url('courseInDetail', ['name' => encrypt($course->title)]) }}"
                                                    class="shine__animate-link">
                                                    <img src="{{ str_replace('public', 'storage', asset($course->banner)) }}"
                                                        alt="img">
                                                </a>
                                            </div>
                                            <div class="courses__item-content">
                                                <ul class="courses__item-meta list-wrap">
                                                    <li class="courses__item-tag">
                                                        <a href="javascript:void(0)">{{ $course->category }}</a>
                                                    </li>
                                                    <li class="avg-rating"><i class="fas fa-star"></i>
                                                        ({{ $course->rating }} Reviews)
                                                    </li>
                                                </ul>
                                                <h5 class="title"><a
                                                        href="{{ url('courseInDetail', ['name' => encrypt($course->title)]) }}">{{ $course->title }}</a>
                                                </h5>
                                                <p class="author">By
                                                    <a href="javascript:void(0)">
                                                        @foreach ($Instructors as $instructor)
                                                            @if ($course->user_id == $instructor->id)
                                                                {{ $instructor->name }}
                                                            @endif
                                                        @endforeach
                                                    </a>
                                                </p>
                                                <div class="courses__item-bottom">
                                                    <div class="button">
                                                        <a
                                                            href="{{ url('courseInDetail', ['name' => encrypt($course->title)]) }}">
                                                            <span class="text">Enroll Now</span>
                                                            <i class="flaticon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                    <h5 class="price">${{ $course->sellingPrice }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                            <div class="row courses__list-wrap row-cols-1">
                                @foreach ($Courses as $course)
                                    <div class="col">
                                        <div class="courses__item courses__item-three shine__animate-item"
                                            data-category="{{ $course->category }}" data-skill="{{ $course->level }}"
                                            data-instructor="{{ $instructor->name }}">
                                            <div class="courses__item-thumb">
                                                <a href="{{ url('courseInDetail', ['name' => encrypt($course->title)]) }}"
                                                    class="shine__animate-link">
                                                    <img src="{{ str_replace('public', 'storage', asset($course->banner)) }}"
                                                        alt="img">
                                                </a>
                                            </div>
                                            <div class="courses__item-content">
                                                <ul class="courses__item-meta list-wrap">
                                                    <li class="courses__item-tag">
                                                        <a href="javascript:void(0)">{{ $course->category }}</a>
                                                        <div class="avg-rating">
                                                            <i class="fas fa-star"></i> ({{ $course->rating }} Reviews)
                                                        </div>
                                                    </li>
                                                    <li class="price">
                                                        <del>${{ $course->actualPrice }}</del>${{ $course->sellingPrice }}
                                                    </li>
                                                </ul>
                                                <h5 class="title"><a
                                                        href="{{ url('courseInDetail', ['name' => encrypt($course->title)]) }}">{{ $course->title }}</a>
                                                </h5>
                                                <p class="author">By
                                                    <a href="javascript:void(0)">
                                                        {{ $course->user_id == $instructor->id ? $instructor->name : '' }}
                                                    </a>
                                                </p>
                                                <p class="info">{!! \Illuminate\Support\Str::limit(strip_tags($course->description), 100) !!}...</p>
                                                <div class="courses__item-bottom">
                                                    <div class="button">
                                                        <a
                                                            href="{{ url('courseInDetail', ['name' => encrypt($course->title)]) }}">
                                                            <span class="text">Enroll Now</span>
                                                            <i class="flaticon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <nav class="mt-30">
                            {{ $Courses->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- all-courses-end -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.category-filter').change(function() {
                var selectedCategory = $(this).val();
                if (selectedCategory) {
                    $('.courses__item').hide();
                    $('.courses__item[data-category="' + selectedCategory + '"]').show();
                    $('.courses__grid-wrap').each(function() {
                        $(this).find('.col').each(function(index, col) {
                            if ($(col).find('.courses__item').is(':visible')) {
                                $(col).css('order', index);
                            } else {
                                $(col).css('order', '9999');
                            }
                        });
                    });
                }
            });

            $('.skill-filter').change(function() {
                var selectedSkill = $(this).val();
                if (selectedSkill) {
                    $('.courses__item').hide();
                    $('.courses__item[data-skill="' + selectedSkill + '"]').show();
                    $('.courses__grid-wrap').each(function() {
                        $(this).find('.col').each(function(index, col) {
                            if ($(col).find('.courses__item').is(':visible')) {
                                $(col).css('order', index);
                            } else {
                                $(col).css('order', '9999');
                            }
                        });
                    });
                }
            });

            $('.instructor-filter').change(function() {
                var selectedInstructor = $(this).val();
                if (selectedInstructor) {
                    $('.courses__item').hide();
                    $('.courses__item[data-instructor="' + selectedInstructor + '"]').show();
                    $('.courses__grid-wrap').each(function() {
                        $(this).find('.col').each(function(index, col) {
                            if ($(col).find('.courses__item').is(':visible')) {
                                $(col).css('order', index);
                            } else {
                                $(col).css('order', '9999');
                            }
                        });
                    });
                }
            });

            $('.rating-filter').change(function() {
                var selectedRating = $(this).val();
                if (selectedRating) {
                    $('.courses__item').hide();
                    $('.courses__item').each(function() {
                        var rating = $(this).find('.avg-rating').text().match(/\d+/);
                        if (rating && rating[0] === selectedRating) {
                            $(this).show();
                        }
                    });
                    $('.courses__grid-wrap').each(function() {
                        $(this).find('.col').each(function(index, col) {
                            if ($(col).find('.courses__item').is(':visible')) {
                                $(col).css('order', index);
                            } else {
                                $(col).css('order', '9999');
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection
