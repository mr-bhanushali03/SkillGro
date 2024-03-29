@extends('website.layout.layouts')

@section('content')
    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two"
        data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Course Detail</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('courses') }}">Courses</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">{{ $Course->title }}</span>
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

    <!-- courses-details-area -->
    <section class="courses__details-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="courses__details-thumb">
                        <img src="{{ asset(str_replace('public', 'storage', $Course->banner)) }}" alt="img"
                            height="412px" width="100%">
                    </div>
                    <div class="courses__details-content">
                        <ul class="courses__item-meta list-wrap">
                            <li class="courses__item-tag">
                                <a href="javascript:void(0)">{{ $Course->category }}</a>
                            </li>
                            <li class="avg-rating"><i class="fas fa-star"></i> ({{ $Course->rating }} Reviews)</li>
                        </ul>
                        <h2 class="title">{{ $Course->title }}</h2>
                        <div class="courses__details-meta">
                            <ul class="list-wrap">
                                <li class="author-two">
                                    @if ($Instructors[0]->profile_photo_path == null)
                                        <img src="{{ $Instructors[0]->profile_photo_url }}" alt="img"
                                            class="rounded-circle" style="height: 30px; width: 30px;">
                                    @else
                                        <img src="{{ asset('storage') }}/{{ $Instructors[0]->profile_photo_path }}"
                                            alt="img" class="rounded-circle" style="height: 30px; width: 30px;">
                                    @endif
                                    By
                                    <a
                                        href="javascript:void(0)">{{ $Course->user_id == $Instructors[0]->id ? $Instructors[0]->name : '' }}</a>
                                </li>
                                <li class="date"><i
                                        class="flaticon-calendar"></i>{{ $Course->created_at->format('Y-m-d') }}</li>
                                <li><i class="flaticon-mortarboard"></i>{{ $Course->student }} Students</li>
                            </ul>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#overview-tab-pane" type="button" role="tab"
                                    aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab"
                                    data-bs-target="#curriculum-tab-pane" type="button" role="tab"
                                    aria-controls="curriculum-tab-pane" aria-selected="false">Curriculum</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="instructors-tab" data-bs-toggle="tab"
                                    data-bs-target="#instructors-tab-pane" type="button" role="tab"
                                    aria-controls="instructors-tab-pane" aria-selected="false">Instructors</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                    aria-controls="reviews-tab-pane" aria-selected="false">reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel"
                                aria-labelledby="overview-tab" tabindex="0">
                                <div class="courses__overview-wrap">
                                    <h3 class="title">Course Description</h3>
                                    <p>{{ strip_tags($Course->description) }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="curriculum-tab-pane" role="tabpanel"
                                aria-labelledby="curriculum-tab" tabindex="0">
                                <div class="courses__curriculum-wrap">
                                    <h3 class="title">{{ $Course->curriculumTitle }}</h3>
                                    <p>{{ strip_tags($Course->curriculumDescription) }}</p>
                                    <div class="accordion" id="accordionExample">
                                        @php
                                            $course = json_decode($Course->tutorials);
                                        @endphp
                                        @foreach ($course->tutorials as $tutorial)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="{{ $loop->index }}">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#{{ str_replace(' ', '-', $tutorial->title) }}"
                                                        aria-expanded="true"
                                                        aria-controls="{{ str_replace(' ', '-', $tutorial->title) }}">
                                                        {{ $tutorial->title }}
                                                    </button>
                                                </h2>
                                                <div id="{{ str_replace(' ', '-', $tutorial->title) }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="{{ $loop->index }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <ul class="list-wrap">
                                                            @foreach ($tutorial->files as $file)
                                                                <li class="course-item open-item">
                                                                    <div class="course-item-link popup-video">
                                                                        <i class="fas fa-play"></i>
                                                                        <span
                                                                            class="item-name">{{ str_replace('public/tutorial_files/', '', $file) }}</span>
                                                                        <div class="course-item-meta">
                                                                            <span class="video"
                                                                                style="display: none;">{{ asset(str_replace('public', 'storage', $file)) }}</span>
                                                                            <span class="item-meta duration">
                                                                                <i class="fas fa-clock"></i>
                                                                                <span class="duration-text"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <script>
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                        var videoElements = document.querySelectorAll('.video');
                                                                        videoElements.forEach(function(videoElement) {
                                                                            var videoPath = videoElement.textContent;
                                                                            var video = document.createElement('video');
                                                                            video.preload = "metadata";
                                                                            video.src = videoPath;
                                                                            video.addEventListener('loadedmetadata', function() {
                                                                                var duration = video.duration;
                                                                                var formattedDuration = formatDuration(duration);
                                                                                videoElement.nextElementSibling.querySelector('.duration-text').textContent =
                                                                                    formattedDuration;
                                                                            });
                                                                        });

                                                                        function formatDuration(duration) {
                                                                            var minutes = Math.floor(duration / 60);
                                                                            var seconds = Math.round(duration % 60);
                                                                            return minutes + 'm ' + seconds + 's';
                                                                        }
                                                                    });
                                                                </script>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="instructors-tab-pane" role="tabpanel"
                                aria-labelledby="instructors-tab" tabindex="0">
                                <div class="courses__instructors-wrap">
                                    <div class="courses__instructors-thumb">
                                        @if ($Instructors[0]->profile_photo_path == null)
                                            <img src="{{ $Instructors[0]->profile_photo_url }}" alt="img"
                                                class="rounded-circle" style="height: 200px; width: 200px;">
                                        @else
                                            <img src="{{ asset('storage') }}/{{ $Instructors[0]->profile_photo_path }}"
                                                alt="img" class="rounded-circle"
                                                style="height: 200px; width: 200px;">
                                        @endif
                                    </div>
                                    <div class="courses__instructors-content">
                                        <h2 class="title">{{ $Instructors[0]->name }}</h2>
                                        <span class="designation">{{ $Instructors[0]->profession }}</span>
                                        <p class="avg-rating"><i class="fas fa-star"></i>(4.8 Ratings)</p>
                                        <p>Dorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua Quis ipsum suspendisse ultrices
                                            gravida. Risus commodo viverra maecenas accumsan.</p>
                                        <div class="instructor__social">
                                            <ul class="list-wrap justify-content-start">
                                                <li><a href="{{ $Instructors[0]->youtube }}"><i
                                                            class="fab fa-youtube"></i></a></li>
                                                <li><a href="{{ $Instructors[0]->twitter }}"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="{{ $Instructors[0]->linkedin }}"><i
                                                            class="fab fa-linkedin"></i></a></li>
                                                <li><a href="{{ $Instructors[0]->instagram }}"><i
                                                            class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel"
                                aria-labelledby="reviews-tab" tabindex="0">
                                <div class="courses__rating-wrap">
                                    <h2 class="title">Reviews</h2>
                                    <div class="course-rate">
                                        <div class="course-rate__summary">
                                            <div class="course-rate__summary-value">4.8</div>
                                            <div class="course-rate__summary-stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="course-rate__summary-text">
                                                12 Ratings
                                            </div>
                                        </div>
                                        <div class="course-rate__details">
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    5
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:80%;" title="80%"></div>
                                                    <span class="rating-count">2</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    4
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:50%;" title="50%"></div>
                                                    <span class="rating-count">1</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    3
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:0%;" title="0%"></div>
                                                    <span class="rating-count">0</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    2
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:0%;" title="0%"></div>
                                                    <span class="rating-count">0</span>
                                                </div>
                                            </div>
                                            <div class="course-rate__details-row">
                                                <div class="course-rate__details-row-star">
                                                    1
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="course-rate__details-row-value">
                                                    <div class="rating-gray"></div>
                                                    <div class="rating" style="width:0%;" title="0%"></div>
                                                    <span class="rating-count">0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="courses__details-sidebar">
                        <div class="courses__cost-wrap">
                            <span>This Course Fee:</span>
                            <h2 class="title">${{ $Course->sellingPrice }} <del>${{ $Course->actualPrice }}</del></h2>
                        </div>
                        <div class="courses__information-wrap">
                            <h5 class="title">Course includes:</h5>
                            <ul class="list-wrap">
                                <li>
                                    <img src="{{ asset('storage/website') }}/img/icons/course_icon01.svg" alt="img"
                                        class="injectable">
                                    Level
                                    <span>{{ $Course->level }}</span>
                                </li>
                                @php
                                    $tutorials = json_decode($Course->tutorials);
                                    $totalTutorials = count(json_decode(json_encode($tutorials->tutorials), true));
                                @endphp

                                @foreach ($tutorials->tutorials as $tutorial)
                                    @foreach ($tutorial->files as $file)
                                        <span class="total-Duration"
                                            style="display: none;">{{ asset(str_replace('public', 'storage', $file)) }}</span>
                                    @endforeach
                                @endforeach

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        var videoElements = document.querySelectorAll('.total-Duration');
                                        var totalDuration = 0;

                                        videoElements.forEach(function(videoElement) {
                                            var videoPath = videoElement.textContent.trim();
                                            var video = document.createElement('video');
                                            video.preload = "metadata";
                                            video.src = videoPath;

                                            video.addEventListener('loadedmetadata', function() {
                                                var duration = video.duration;
                                                totalDuration += duration;
                                                var formattedDuration = formatDuration(totalDuration);
                                                document.getElementById('total-duration').textContent = formattedDuration;
                                            });
                                        });

                                        function formatDuration(duration) {
                                            var minutes = Math.floor(duration / 60);
                                            var seconds = Math.round(duration % 60);
                                            return minutes + 'm ' + seconds + 's';
                                        }
                                    });
                                </script>

                                <li>
                                    <img src="{{ asset('storage/website') }}/img/icons/course_icon02.svg" alt="img"
                                        class="injectable">
                                    Duration
                                    <span id="total-duration"></span>
                                </li>
                                <li>
                                    <img src="{{ asset('storage/website') }}/img/icons/course_icon03.svg" alt="img"
                                        class="injectable">
                                    Lessons
                                    <span>{{ $totalTutorials }}</span>
                                </li>
                                <li>
                                    <img src="{{ asset('storage/website') }}/img/icons/course_icon05.svg" alt="img"
                                        class="injectable">
                                    Certifications
                                    <span>Yes</span>
                                </li>
                                <li>
                                    <img src="{{ asset('storage/website') }}/img/icons/course_icon06.svg" alt="img"
                                        class="injectable">
                                    Students
                                    <span>{{ $Course->student }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="courses__payment">
                            <h5 class="title">Secure Payment:</h5>
                            <img src="{{ asset('storage/website') }}/img/others/payment.png" alt="img">
                        </div>
                        <div class="courses__details-enroll">
                            <div class="tg-button-wrap">
                                <form id="paymentForm" action="{{ route('payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_id" id="paymentIdInput" value="">
                                    <button type="button" id="rzp-button" class="btn btn-two arrow-btn">
                                        Enroll Now
                                        <img src="{{ asset('storage/website') }}/img/icons/right_arrow.svg"
                                            alt="img" class="injectable">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- courses-details-area-end -->
@endsection

@section('script')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        @if (auth()->check())
            var options = {
                key: "{{ env('RAZORPAY_KEY_ID') }}",
                amount: {{ $Course->sellingPrice * 100 }},
                currency: 'INR',
                image: "{{ $Students->profile_photo_path == null ? $Students->profile_photo_url : URL::asset('storage/' . $Students->profile_photo_path) }}",
                name: '{{ $Students->name }}',
                email: '{{ $Students->email }}',
                notes: {
                    course_name: '{{ $Course->title }}',
                    student_id: {{ $Students->id }},
                    course_id: {{ $Course->id }},
                    instructor_id: {{ $Course->user_id }},
                    student_name: '{{ $Students->name }}',
                    student_email: '{{ $Students->email }}',
                    student_contact: '{{ $Students->mobile == null ? null : $Students->mobile }}',
                },
                prefill: {
                    name: '{{ $Students->name }}',
                    email: '{{ $Students->email }}',
                    contact: '{{ $Students->mobile == null ? null : $Students->mobile }}',
                },
                handler: function(response) {
                    var paymentId = response.razorpay_payment_id;
                    document.getElementById('paymentIdInput').value = paymentId;
                    document.getElementById('paymentForm').submit();
                }
            };

            document.getElementById('rzp-button').onclick = function() {
                var rzp = new Razorpay(options);
                rzp.open();
            };
        @else
            document.getElementById('rzp-button').onclick = function() {
                window.location.href = "{{ route('login') }}";
            };
        @endif
    </script>
@endsection
