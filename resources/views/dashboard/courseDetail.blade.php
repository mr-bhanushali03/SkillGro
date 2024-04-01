@extends('dashboard.layout.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-warning-subtle">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-lg-auto">
                                                <div class="avatar-lg">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{ str_replace('public', 'storage', asset($Course->banner)) }}"
                                                            alt="{{ $Course->title }}" class="avatar-lg rounded-circle">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">{{ $Course->title }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-pie-chart-fill align-bottom me-1"></i>
                                                            {{ $Course->category }}
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div><i class="ri-line-chart-fill align-bottom me-1"></i>
                                                            {{ $Course->level }}
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>Created Date : <span
                                                                class="fw-medium">{{ $Course->created_at->format('Y-m-d') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview"
                                            role="tab">
                                            Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-curriculum"
                                            role="tab">
                                            Curriculum
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-tutorial"
                                            role="tab">
                                            Tutorials
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-muted">
                                        <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>
                                        <p>{{ strip_tags($Course->description) }}</p>

                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                            <div class="row align-items-center">
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                                                    <p class="mb-0 text-uppercase fw-medium fs-13">Actual Price :</p>
                                                    <h5 class="fs-15 mb-2">{{ $Course->actualPrice }}</h5>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                                                    <p class="mb-0 text-uppercase fw-medium fs-13">Selling Price :</p>
                                                    <h5 class="fs-15 mb-2">{{ $Course->sellingPrice }}</h5>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                                                    <p class="mb-0 text-uppercase fw-medium fs-13">Students Enrolled :</p>
                                                    <div class="badge bg-info fs-12 mb-2">{{ $Course->student }}</div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                                                    <p class="mb-0 text-uppercase fw-medium fs-13">Ratings :</p>
                                                    <div class="badge bg-success fs-12 mb-2">{{ $Course->rating }} <i
                                                            class="ri-star-fill align-bottom me-1"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="project-curriculum" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $Course->curriculumTitle }}</h5>
                                    <div class="text-muted">
                                        {{ strip_tags($Course->curriculumDescription) }}
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="project-tutorial" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="card-title flex-grow-1">Tutorials</h5>
                                    </div>

                                    <div class="live-preview">
                                        <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                                            id="accordionlefticon">
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
                                                        data-bs-parent="#accordionlefticon">
                                                        <div class="accordion-body">
                                                            @foreach ($tutorial->files as $files)
                                                                @if (is_array($files))
                                                                    @foreach ($files as $file)
                                                                        <div class="d-flex align-items-center mb-3">
                                                                            <div class="avatar-sm">
                                                                                <div
                                                                                    class="avatar-title bg-light text-secondary rounded fs-24">
                                                                                    <i class="ri-video-line"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-14 mb-0"><a
                                                                                        href="{{ asset(str_replace('public', 'storage', $file)) }}"
                                                                                        class="text-body">{{ str_replace('public/tutorial_files/', '', $file) }}</a>
                                                                                </h5>
                                                                            </div>
                                                                            @if (auth()->user()->role == 'Instructor')
                                                                                <div class="dropdown">
                                                                                    <a href="{{ asset(str_replace('public', 'storage', $file)) }}"
                                                                                        class="btn btn-soft-secondary btn-sm btn-icon"
                                                                                        download>
                                                                                        <i class="ri-download-2-fill"></i>
                                                                                    </a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="d-flex align-items-center mb-3">
                                                                        <div class="avatar-sm">
                                                                            <div
                                                                                class="avatar-title bg-light text-secondary rounded fs-24">
                                                                                <i class="ri-video-line"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="ms-3 flex-grow-1">
                                                                            <h5 class="fs-14 mb-0"><a
                                                                                    href="{{ asset(str_replace('public', 'storage', $files)) }}"
                                                                                    class="text-body">{{ str_replace('public/tutorial_files/', '', $files) }}</a>
                                                                            </h5>
                                                                        </div>
                                                                        @if (auth()->user()->role == 'Instructor')
                                                                            <div class="dropdown">
                                                                                <a href="{{ asset(str_replace('public', 'storage', $files)) }}"
                                                                                    class="btn btn-soft-secondary btn-sm btn-icon"
                                                                                    download>
                                                                                    <i class="ri-download-2-fill"></i>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
