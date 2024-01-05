@extends('website.layout.layouts')

@section('content')
    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Support</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Support</span>
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

    <!-- Support -->
    <section class="instructor__details-area section-pt-120 section-pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instructor__details-wrap">
                        <div class="instructor__details-biography">
                            <h4 class="title">Support for SkillGro Online Courses</h4>
                            <p>Our team is dedicated to providing excellent support to ensure a smooth learning experience
                                for all users. If you encounter any issues or have questions, please refer to the
                                information below for assistance:</p>

                            <h5>Contacting Support</h5>
                            <p>If you need assistance, you can contact our support team by sending an email to
                                support@skillgro.com. Please provide detailed information about the issue you are facing,
                                including your account information and any relevant screenshots.</p>

                            <h5>FAQs (Frequently Asked Questions)</h5>
                            <p>Before reaching out to support, we recommend checking our Frequently Asked Questions (FAQs)
                                section. Many common queries are addressed there, and you might find a quick solution to
                                your issue.</p>

                            <h5>Community Forums</h5>
                            <p>Join our community forums to connect with other learners and instructors. You can share your
                                experiences, ask questions, and get advice from the community. Our team also monitors the
                                forums to provide assistance.</p>

                            <h5>Live Chat Support</h5>
                            <p>We offer live chat support during business hours. Look for the chat icon on the bottom right
                                corner of the screen to start a conversation with a support representative.</p>

                            <h5>Feedback and Suggestions</h5>
                            <p>We value your feedback and suggestions. If you have ideas for improving our platform or
                                courses, please send them to feedback@skillgro.com. Your input helps us enhance the learning
                                experience for everyone.</p>

                            <p>Our support team aims to respond to inquiries promptly, typically within 24-48 hours. Thank
                                you for choosing SkillGro for your online learning journey!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Support-end -->
@endsection
