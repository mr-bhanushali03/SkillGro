@extends('dashboard.layout.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $Title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">{{ $Title }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-12">
                            <div class="search-box">
                                <input type="text" class="form-control" id="searchCourseList"
                                    placeholder="Search for name or name and instructor...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div id="teamlist">
                            <div class="team-list grid-view-filter row" id="team-member-list">
                                @foreach ($courses as $course)
                                    <div class="col course">
                                        <div class="card team-box">
                                            <div class="team-cover"> <img
                                                    src="{{ str_replace('public', 'storage', asset($course->banner)) }}"
                                                    alt="" class="img-fluid"> </div>
                                            <div class="card-body p-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2"> <button type="button"
                                                                        class="btn btn-light btn-icon rounded-circle btn-sm favourite-btn ">
                                                                        <i class="ri-star-fill fs-14"></i> </button> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div
                                                                class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                @if ($course->profile_photo_path == null)
                                                                    <img src="{{ $course->profile_photo_url }}"
                                                                        alt="img"
                                                                        class="member-img img-fluid d-block rounded-circle"
                                                                        style="height: 100%;">
                                                                @else
                                                                    <img src="{{ asset('storage') }}/{{ $course->profile_photo_path }}"
                                                                        alt="img"
                                                                        class="member-img img-fluid d-block rounded-circle"
                                                                        style="height: 100%;">
                                                                @endif
                                                            </div>
                                                            <div class="team-content"> <a class="member-name"
                                                                    data-bs-toggle="offcanvas" href="#member-overview"
                                                                    aria-controls="member-overview">
                                                                    <h5 class="fs-16 mb-1">{{ $course->title }}</h5>
                                                                </a>
                                                                <p class="text-muted member-designation mb-0">
                                                                    {{ $course->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1 projects-num">{{ $course->student }}</h5>
                                                                <p class="text-muted mb-0">Students</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1 tasks-num">{{ $course->rating }} <i
                                                                        class="ri-star-fill fs-14"></i></h5>
                                                                <p class="text-muted mb-0">Ratings</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end"> <a href="{{ route('courseDetail', ['title' => encrypt($course->title)]) }}"
                                                                class="btn btn-light view-btn">View Course</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="py-4 mt-4 text-center d-none" id="noresult">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
                            <h5 class="mt-4">Sorry! No Result Found</h5>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!--end row-->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#searchCourseList").keyup(function() {
                var search = $(this).val().toLowerCase();
                var courseItems = $(".course");
                var noResultDiv = $("#noresult");

                courseItems.each(function() {
                    var courseTitle = $(this).find(".member-name h5").text().toLowerCase();
                    var courseInstructor = $(this).find(".member-designation").text().toLowerCase();

                    if (courseTitle.includes(search) || courseInstructor.includes(search)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                var anyResults = $('.course:visible').length > 0;
                if (anyResults || search === '') {
                    $('#noresult').addClass('d-none');
                } else {
                    $('#noresult').removeClass('d-none');
                }
            });

        });
    </script>
@endsection
