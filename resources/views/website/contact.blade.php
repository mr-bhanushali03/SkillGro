@extends('website.layout.layouts')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg"
        data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Contact With Us</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Contact</span>
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

    <!-- contact-area -->
    <section class="contact-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info-wrap">
                        <ul class="list-wrap">
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('storage/website') }}/img/icons/map.svg" alt="img"
                                        class="injectable">
                                </div>
                                <div class="content">
                                    <h4 class="title">Address</h4>
                                    <p>Amit Sales Agency
                                        Near Command Sector,
                                        Behind Indian Bank,
                                        Char Rasta,
                                        Vapi,
                                        India.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('storage/website') }}/img/icons/contact_phone.svg" alt="img"
                                        class="injectable">
                                </div>
                                <div class="content">
                                    <h4 class="title">Phone</h4>
                                    <a href="tel:+9175667565368">+91 75667565368</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('storage/website') }}/img/icons/emial.svg" alt="img"
                                        class="injectable">
                                </div>
                                <div class="content">
                                    <h4 class="title">E-mail Address</h4>
                                    <a href="mailto:mrbhanushali03@gmail.com">mrbhanushali03@gmail.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form-wrap">
                        <h4 class="title">Send Us Message</h4>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form id="contact-form" action="javascript:void(0)" method="POST">
                            <div class="form-grp">
                                <textarea name="message" placeholder="Comment" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input name="name" type="text" placeholder="Name *" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input name="email" type="email" placeholder="E-mail *" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-grp">
                                        <input name="website" type="url" placeholder="Website *" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-two arrow-btn">Submit Now <img
                                    src="{{ asset('storage/website') }}/img/icons/right_arrow.svg" alt="img"
                                    class="injectable"></button>
                        </form>
                        <p class="ajax-response mb-0"></p>
                    </div>
                </div>
            </div>
            <!-- contact-map -->
            <div class="contact-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.405649605229!2d72.91704357434597!3d20.36615788112256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0cf71b5d10e4b%3A0xcd8c9e84a0c22bc!2sCommand%20Sector!5e0!3m2!1sen!2sin!4v1711536970864!5m2!1sen!2sin"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- contact-map-end -->
        </div>
    </section>
    <!-- contact-area-end -->
@endsection
