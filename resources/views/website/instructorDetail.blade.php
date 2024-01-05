@extends('website.layout.layouts')

@section('content')
    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Instructor Details</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Instructors</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Robert Fox</span>
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
    </div>
    <!-- breadcrumb-area-end -->

    <!-- instructor-details-area -->
    <section class="instructor__details-area section-pt-120 section-pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instructor__details-wrap">
                        <div class="instructor__details-info">
                            <div class="instructor__details-thumb">
                                <img src="{{ asset('storage/website') }}/img/instructor/instructor_details_thumb.png"
                                    alt="img">
                            </div>
                            <div class="instructor__details-content">
                                <h2 class="title">Robert Fox</h2>
                                <span class="designation">Expert Laravel Pro</span>
                                <ul class="list-wrap">
                                    <li class="avg-rating"><i class="fas fa-star"></i>(4.8 Reviews)</li>
                                    <li><i class="far fa-envelope"></i><a href="mailto:info@gmail.com">info@gmail.com</a>
                                    </li>
                                    <li><i class="fas fa-phone-alt"></i><a href="tel:0123456789">+123 9500 600</a></li>
                                </ul>
                                <p>Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur Vesity bulum
                                    a nec odio aea the dumm ipsumm ipsum that dolocons sus suada and farit consectetur elit.
                                </p>
                                <div class="instructor__details-social">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="instructor__details-biography">
                            <h4 class="title">Biography​</h4>
                            <p>Dorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                maecenas accumsan lacus vel facilisis.dolor sit amet, consectetur adipiscing elited do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p>Dorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                utte labore et dolore magna aliquauis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan.</p>
                        </div>
                        <div class="instructor__details-Skill">
                            <h4 class="title">Skills</h4>
                            <p>Dorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                maecenas accumsa.</p>
                            <div class="instructor__progress-wrap">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="progress-item">
                                            <h6 class="title">PHP <span>88%</span></h6>
                                            <div class="progress" role="progressbar" aria-label="Example with label"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 88%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress-item">
                                            <h6 class="title">React <span>65%</span></h6>
                                            <div class="progress" role="progressbar" aria-label="Example with label"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 65%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress-item">
                                            <h6 class="title">Java <span>55%</span></h6>
                                            <div class="progress" role="progressbar" aria-label="Example with label"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 55%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="progress-item">
                                            <h6 class="title">Angular <span>40%</span></h6>
                                            <div class="progress" role="progressbar" aria-label="Example with label"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 40%"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="courses-area section-pb-90"
                            data-background="{{ asset('storage/website') }}/img/bg/courses_bg.jpg">
                            <div class="container">
                                <div class="section__title-wrap">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="section__title text-center mb-40">
                                                <h2 class="title">My Courses</h2>
                                                <p class="desc">Embark on a learning journey with My Courses – where
                                                    knowledge meets curiosity!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="courseTabContent">
                                    <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel"
                                        aria-labelledby="all-tab" tabindex="0">
                                        <div class="swiper courses-swiper-active">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="courses__item shine__animate-item">
                                                        <div class="courses__item-thumb">
                                                            <a href="{{ url('courseDetail') }}"
                                                                class="shine__animate-link">
                                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb01.jpg"
                                                                    alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="courses__item-content">
                                                            <ul class="courses__item-meta list-wrap">
                                                                <li class="courses__item-tag">
                                                                    <a href="{{ url('courses') }}">Development</a>
                                                                </li>
                                                                <li class="avg-rating"><i class="fas fa-star"></i> (4.8
                                                                    Reviews)</li>
                                                            </ul>
                                                            <h5 class="title"><a
                                                                    href="{{ url('courseDetail') }}">Learning JavaScript
                                                                    With Imagination</a></h5>
                                                            <p class="author">By <a href="#">David Millar</a></p>
                                                            <div class="courses__item-bottom">
                                                                <div class="button">
                                                                    <a href="{{ url('courseDetail') }}">
                                                                        <span class="text">Enroll Now</span>
                                                                        <i class="flaticon-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <h5 class="price">$15.00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="courses__item shine__animate-item">
                                                        <div class="courses__item-thumb">
                                                            <a href="{{ url('courseDetail') }}"
                                                                class="shine__animate-link">
                                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb02.jpg"
                                                                    alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="courses__item-content">
                                                            <ul class="courses__item-meta list-wrap">
                                                                <li class="courses__item-tag">
                                                                    <a href="{{ url('courses') }}">Design</a>
                                                                </li>
                                                                <li class="avg-rating"><i class="fas fa-star"></i> (4.5
                                                                    Reviews)</li>
                                                            </ul>
                                                            <h5 class="title"><a href="{{ url('courseDetail') }}">The
                                                                    Complete Graphic Design for Beginners</a></h5>
                                                            <p class="author">By <a href="#">David Millar</a></p>
                                                            <div class="courses__item-bottom">
                                                                <div class="button">
                                                                    <a href="{{ url('courseDetail') }}">
                                                                        <span class="text">Enroll Now</span>
                                                                        <i class="flaticon-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <h5 class="price">$19.00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="courses__item shine__animate-item">
                                                        <div class="courses__item-thumb">
                                                            <a href="{{ url('courseDetail') }}"
                                                                class="shine__animate-link">
                                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb03.jpg"
                                                                    alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="courses__item-content">
                                                            <ul class="courses__item-meta list-wrap">
                                                                <li class="courses__item-tag">
                                                                    <a href="{{ url('courses') }}">Marketing</a>
                                                                </li>
                                                                <li class="avg-rating"><i class="fas fa-star"></i> (4.3
                                                                    Reviews)</li>
                                                            </ul>
                                                            <h5 class="title"><a
                                                                    href="{{ url('courseDetail') }}">Learning Digital
                                                                    Marketing on Facebook</a></h5>
                                                            <p class="author">By <a href="#">David Millar</a></p>
                                                            <div class="courses__item-bottom">
                                                                <div class="button">
                                                                    <a href="{{ url('courseDetail') }}">
                                                                        <span class="text">Enroll Now</span>
                                                                        <i class="flaticon-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <h5 class="price">$24.00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="courses__item shine__animate-item">
                                                        <div class="courses__item-thumb">
                                                            <a href="{{ url('courseDetail') }}"
                                                                class="shine__animate-link">
                                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb04.jpg"
                                                                    alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="courses__item-content">
                                                            <ul class="courses__item-meta list-wrap">
                                                                <li class="courses__item-tag">
                                                                    <a href="{{ url('courses') }}">Business</a>
                                                                </li>
                                                                <li class="avg-rating"><i class="fas fa-star"></i> (4.8
                                                                    Reviews)</li>
                                                            </ul>
                                                            <h5 class="title"><a
                                                                    href="{{ url('courseDetail') }}">Financial Analyst
                                                                    Training & Investing Course</a></h5>
                                                            <p class="author">By <a href="#">David Millar</a></p>
                                                            <div class="courses__item-bottom">
                                                                <div class="button">
                                                                    <a href="{{ url('courseDetail') }}">
                                                                        <span class="text">Enroll Now</span>
                                                                        <i class="flaticon-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <h5 class="price">$12.00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="courses__item shine__animate-item">
                                                        <div class="courses__item-thumb">
                                                            <a href="{{ url('courseDetail') }}"
                                                                class="shine__animate-link">
                                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb05.jpg"
                                                                    alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="courses__item-content">
                                                            <ul class="courses__item-meta list-wrap">
                                                                <li class="courses__item-tag">
                                                                    <a href="{{ url('courses') }}">Data Science</a>
                                                                </li>
                                                                <li class="avg-rating"><i class="fas fa-star"></i> (4.5
                                                                    Reviews)</li>
                                                            </ul>
                                                            <h5 class="title"><a href="{{ url('courseDetail') }}">Data
                                                                    Analysis & Visualization Masterclass</a></h5>
                                                            <p class="author">By <a href="#">David Millar</a></p>
                                                            <div class="courses__item-bottom">
                                                                <div class="button">
                                                                    <a href="{{ url('courseDetail') }}">
                                                                        <span class="text">Enroll Now</span>
                                                                        <i class="flaticon-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <h5 class="price">$27.00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="courses__item shine__animate-item">
                                                        <div class="courses__item-thumb">
                                                            <a href="{{ url('courseDetail') }}"
                                                                class="shine__animate-link">
                                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb06.jpg"
                                                                    alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="courses__item-content">
                                                            <ul class="courses__item-meta list-wrap">
                                                                <li class="courses__item-tag">
                                                                    <a href="{{ url('courses') }}">Mathematic</a>
                                                                </li>
                                                                <li class="avg-rating"><i class="fas fa-star"></i> (4.7
                                                                    Reviews)</li>
                                                            </ul>
                                                            <h5 class="title"><a href="{{ url('courseDetail') }}">Master
                                                                    the Fundamentals of Math</a></h5>
                                                            <p class="author">By <a href="#">David Millar</a></p>
                                                            <div class="courses__item-bottom">
                                                                <div class="button">
                                                                    <a href="{{ url('courseDetail') }}">
                                                                        <span class="text">Enroll Now</span>
                                                                        <i class="flaticon-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <h5 class="price">$10.00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="courses__nav">
                                            <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                                            <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- instructor-details-area-end -->
@endsection
