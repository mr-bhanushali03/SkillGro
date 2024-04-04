@extends('dashboard.layout.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 id="greeting" class="fs-16 mb-1" data-username="{{ Auth::user()->name }}"></h4>
                                        <p class="text-muted mb-0">Explore endless possibilities in your learning journey
                                            today.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                        <form action="javascript:void(0);">
                                            <div class="row g-3 mb-0 align-items-center">
                                                <div class="col-sm-auto">
                                                    <div class="input-group">
                                                        <input type="text" id="countdown-picker"
                                                            class="form-control border-0 fs-13 dash-filter-picker shadow"
                                                            data-provider="flatpickr" data-date-format="d M, Y H:i:S"
                                                            value="{{ now()->format('d M, Y H:i:s') }}">
                                                        <div
                                                            class="input-group-text bg-secondary border-secondary text-white">
                                                            <i class="ri-calendar-2-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-auto">
                                                    <a href="{{ route('website.courses') }}">
                                                        <button type="button" class="btn btn-soft-success"><i
                                                                class="ri-add-circle-line align-middle me-1"></i>
                                                            Add Course</button></a>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            @if (Auth::user()->role == 'Instructor')
                                <div class="col-xl-4 col-md-4">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Courses</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $Courses->count() }}">0</span>
                                                    </h4>
                                                    <a href="{{ route('course') }}"
                                                        class="text-decoration-underline text-muted">View all
                                                        Courses</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                        <i class="bx bxs-graduation text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-4 col-md-4">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Enroll Course</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $EnrolledCourses->Count() }}">0</span>
                                                    </h4>
                                                    <a href="javascript:void(0)"
                                                        class="text-decoration-underline text-muted">See
                                                        details</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                        <i class="bx bx-user-circle text-warning"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-4 col-md-4">
                                    @php
                                        $payments = 0;
                                        foreach ($Payments as $payment) {
                                            $totalPayment = $payments += $payment->course_price;
                                        }
                                    @endphp
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Total Earnings</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $totalPayment }}">0</span>&#8377;
                                                    </h4>
                                                    <a href="javascript:void(0)" class="text-decoration-underline text-muted">View net
                                                        earnings</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                                        <i class="bx bx-dollar-circle text-success"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            @else
                                <div class="col-xl-6 col-md-6">
                                    @php
                                        $courses = $Courses->count();
                                    @endphp
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Course Enroll</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value" data-target="{{ $courses }}">0</span>
                                                    </h4>
                                                    <a href="{{ route('enrollCourse') }}"
                                                        class="text-decoration-underline text-muted">View all
                                                        Courses</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                        <i class="bx bxs-graduation text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-6 col-md-6">
                                    @php
                                        $payments = 0;
                                        foreach ($Payments as $payment) {
                                            $totalPayment = $payments += $payment->course_price;
                                        }
                                    @endphp
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Payments</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $totalPayment }}">0</span>&#8377;
                                                    </h4>
                                                    <a href="javascript:void(0)"
                                                        class="text-decoration-underline text-muted">See
                                                        details</a>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                        <i class="bx bxs-wallet text-warning"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            @endif
                        </div> <!-- end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" id="contactList">
                                    <div class="card-body">
                                        <div>
                                            <div class="table-responsive table-card mb-3">
                                                @if ($PaymentList->count() > 0)
                                                    <table class="table align-middle table-nowrap mb-0"
                                                        id="customerTable">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">
                                                                    Payment ID</th>
                                                                <th scope="col">
                                                                    Course</th>
                                                                <th scope="col">Price
                                                                </th>
                                                                <th scope="col">
                                                                    Currency
                                                                </th>
                                                                <th scope="col">Payment Status</th>
                                                                <th scope="col">Payment Method
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list form-check-all">
                                                            @foreach ($PaymentList as $payment)
                                                                <tr>
                                                                    <td class="id">{{ $loop->iteration }}</td>
                                                                    <td class="payment_ID">{{ $payment->payment_id }}</td>
                                                                    <td class="course">{{ $payment->course_name }}</td>
                                                                    <td class="price">{{ $payment->course_price }}</td>
                                                                    <td class="currency">{{ $payment->currency }}</td>
                                                                    <td class="payment_Status">
                                                                        {{ $payment->payment_status }}
                                                                    </td>
                                                                    <td class="payment_Method">
                                                                        {{ $payment->payment_method }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <div class="noresult" style="display: block">
                                                        <div class="text-center">
                                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                                                trigger="loop" colors="primary:#121331,secondary:#08a88a"
                                                                style="width:75px;height:75px">
                                                            </lord-icon>
                                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                                            <p class="text-muted mb-0">Please consider purchasing a course.
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mt-30">
                                                {{ $PaymentList->links('pagination::bootstrap-5') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
