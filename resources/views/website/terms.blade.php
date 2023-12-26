@include('website.common.header')
<!-- main-area -->
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                    <h3 class="title">Terms & Conditions</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.php">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Terms and Conditions</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
            <img src="{{ asset('storage/website') }}/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- Terms and Conditions -->
    <section class="instructor__details-area section-pt-120 section-pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instructor__details-wrap">
                        <div class="instructor__details-biography">
                            <h4 class="title">Terms and Conditions for SkillGro Online Courses</h4>
                            <p>Welcome to SkillGro. By accessing and using our online courses, you agree to comply with and be bound by the following terms and conditions:</p>

                            <h5>1. Registration and Account</h5>
                            <p>a. To access certain features of the online courses, you may be required to register for an account.
                                b. You are responsible for maintaining the confidentiality of your account information and password.</p>

                            <h5>2. Course Content</h5>
                            <p>a. The content of the courses, including text, videos, and materials, is for educational purposes only.
                                b. You may not reproduce, distribute, or modify the course content without explicit permission.</p>

                            <h5>3. Payment and Refunds</h5>
                            <p>a. Payment is required to access certain premium courses.
                                b. Refund policies are outlined on the payment and checkout pages.</p>

                            <h5>4. Code of Conduct</h5>
                            <p>a. You agree to abide by a code of conduct that promotes a positive and respectful learning environment.
                                b. Inappropriate behavior, including harassment, will not be tolerated.</p>

                            <h5>5. Intellectual Property</h5>
                            <p>a. All intellectual property rights in the courses and platform belong to SkillGro.
                                b. You may not use, reproduce, or distribute any content without permission.</p>

                            <h5>6. Termination</h5>
                            <p>a. SkillGro reserves the right to terminate your access to the courses for violations of these terms.
                                b. Termination may result in the loss of access to course materials and account information.</p>

                            <h5>7. Changes to Terms and Conditions</h5>
                            <p>a. SkillGro may update these terms and conditions from time to time.
                                b. Continued use of the platform after changes constitutes acceptance of the modified terms.</p>

                            <h5>8. Contact Us</h5>
                            <p>If you have any questions or concerns about these terms and conditions, please contact us at SkillGro@gmail.com.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Terms and Conditions-end -->

</main>
<!-- main-area-end -->
@include('website.common.footer')