@extends('website.layout.layouts')
@section('content')
    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Cart</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Cart</span>
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
    <!-- all-item -->
    <section class="all-courses-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-rg-0">
                    <aside class="courses__sidebar">
                        <div class="courses-widget">
                            <h4 class="widget-title">Cart Summary</h4>
                            <div class="courses-cat-list">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Amount">Amount</label>
                                            <span id="totalItemPrice"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label" for="GST">GST</label>
                                            <span id="gstAmount"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Discount">Discount</label>
                                            <span id="discountAmount"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Round Off">Round Off</label>
                                            <span id="roundOff"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Total Amount">Total Amount</label>
                                            <span id="totalAmount"></span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="courses__item-bottom">
                                    <div class="button">
                                        <a href="{{ url('cart') }}">
                                            <span class="text">Checkout All</span>
                                            <i class="flaticon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="courses-top-wrap courses-top-wrap">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="courses-top-left">
                                    <p>Showing 250 total items</p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div
                                    class="d-flex justify-content-center justify-content-md-end align-items-center flex-wrap">
                                    <ul class="nav nav-tabs courses__nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="list-tab" data-bs-toggle="tab"
                                                data-bs-target="#list" type="button" role="tab" aria-controls="list"
                                                aria-selected="true">
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
                        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                            <div class="row courses__list-wrap row-cols-1">
                                <div class="col">
                                    <div class="courses__item courses__item-three shine__animate-item">
                                        <div class="courses__item-thumb">
                                            <a href="{{ url('courseDetail') }}" class="shine__animate-link">
                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb01.jpg"
                                                    alt="img">
                                            </a>
                                        </div>
                                        <div class="courses__item-content">
                                            <ul class="courses__item-meta list-wrap">
                                                <li class="courses__item-tag">
                                                    <a href="{{ url('courses') }}">Development</a>
                                                    <div class="avg-rating">
                                                        <i class="fas fa-star"></i> (4.8 Reviews)
                                                    </div>
                                                </li>
                                                <li class="price"><del>$29.00</del>$15.00</li>
                                            </ul>
                                            <h5 class="title"><a href="{{ url('courseDetail') }}">Resolving Conflicts
                                                    Between Designers And Engineers</a></h5>
                                            <p class="author">By <a href="#">David Millar</a></p>
                                            <p class="info">when an unknown printer took a galley of type and scrambled
                                                type specimen book It has survived not only.</p>
                                            <div class="courses__item-bottom">
                                                <div class="button">
                                                    <a href="{{ url('cart') }}">
                                                        <span class="text">Checkout</span>
                                                        <i class="flaticon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="courses__item courses__item-three shine__animate-item">
                                        <div class="courses__item-thumb">
                                            <a href="{{ url('courseDetail') }}" class="shine__animate-link">
                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb02.jpg"
                                                    alt="img">
                                            </a>
                                        </div>
                                        <div class="courses__item-content">
                                            <ul class="courses__item-meta list-wrap">
                                                <li class="courses__item-tag">
                                                    <a href="{{ url('courses') }}">Design</a>
                                                    <div class="avg-rating">
                                                        <i class="fas fa-star"></i> (4.5 Reviews)
                                                    </div>
                                                </li>
                                                <li class="price">$41.00</li>
                                            </ul>
                                            <h5 class="title"><a href="{{ url('courseDetail') }}">Powerful Image
                                                    Optimization Tools for this year</a></h5>
                                            <p class="author">By <a href="#">Jenny Wilson</a></p>
                                            <p class="info">when an unknown printer took a galley of type and scrambled
                                                type specimen book It has survived not only.</p>
                                            <div class="courses__item-bottom">
                                                <div class="button">
                                                    <a href="{{ url('cart') }}">
                                                        <span class="text">Checkout</span>
                                                        <i class="flaticon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="courses__item courses__item-three shine__animate-item">
                                        <div class="courses__item-thumb">
                                            <a href="{{ url('courseDetail') }}" class="shine__animate-link">
                                                <img src="{{ asset('storage/website') }}/img/courses/course_thumb03.jpg"
                                                    alt="img">
                                            </a>
                                        </div>
                                        <div class="courses__item-content">
                                            <ul class="courses__item-meta list-wrap">
                                                <li class="courses__item-tag">
                                                    <a href="{{ url('courses') }}">Marketing</a>
                                                    <div class="avg-rating">
                                                        <i class="fas fa-star"></i> (4.6 Reviews)
                                                    </div>
                                                </li>
                                                <li class="price"><del>$24.00</del>$19.00</li>
                                            </ul>
                                            <h5 class="title"><a href="{{ url('courseDetail') }}">Learning JavaScript
                                                    With Imagination</a></h5>
                                            <p class="author">By <a href="#">Wade Warren</a></p>
                                            <p class="info">when an unknown printer took a galley of type and scrambled
                                                type specimen book It has survived not only.</p>
                                            <div class="courses__item-bottom">
                                                <div class="button">
                                                    <a href="{{ url('cart') }}">
                                                        <span class="text">Checkout</span>
                                                        <i class="flaticon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav class="pagination__wrap mt-30">
                                <ul class="list-wrap">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="{{ url('courses') }}">2</a></li>
                                    <li><a href="{{ url('courses') }}">3</a></li>
                                    <li><a href="{{ url('courses') }}">4</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- all-item-end -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var totalPrice = 0;

            // Loop through each item
            $('.price').each(function() {
                var priceText = $(this).text().trim();
                var itemPrice = parseFloat(priceText.split('$').pop());

                if (!isNaN(itemPrice)) {
                    totalPrice += itemPrice;
                }
            });

            // Assuming you have totalQuantity and totalItemPrice values available
            var totalQuantity = 1; // Replace with the actual value
            var totalItemPrice = totalPrice; // Use the total price calculated above

            var gst = 9;
            var discount = 2;
            var totalAmount = 0;

            // Calculate total amount
            var gstAmount = (totalItemPrice * (gst / 100)).toFixed(2);
            var discountAmount = (totalItemPrice * (discount / 100)).toFixed(2);
            totalAmount = (totalItemPrice + parseFloat(gstAmount) - parseFloat(discountAmount)).toFixed(2);
            var roundedTotalAmount = Math.floor(totalAmount);

            // Update summary
            $('#totalItemPrice').text('$' + totalItemPrice.toFixed(2));
            $('#gstAmount').text('$' + gstAmount);
            $('#discountAmount').text('$' + discountAmount);
            $('#roundOff').text('$' + (totalAmount - roundedTotalAmount).toFixed(2));
            $('#totalAmount').text('$' + roundedTotalAmount.toFixed(2));
        });
    </script>
@endsection
