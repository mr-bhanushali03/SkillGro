@include('website.common.header')
<!-- main-area -->
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <div class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('storage/website') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                    <h3 class="title">Privacy Policy</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ url('/') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Privacy</span>
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

    <!-- Privacy Policy -->
    <section class="instructor__details-area section-pt-120 section-pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="instructor__details-wrap">
                        <div class="instructor__details-biography">
                            <h4 class="title">Privacy Policy for SkillGro</h4>
                            <p>Welcome to SkillGro. We are committed to protecting your privacy and providing a safe online learning environment. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our online courses.</p>

                            <h5>Information We Collect</h5>
                            <p>We may collect various types of information, including but not limited to:
                                - Personal information such as your name, email address, and other details provided during account registration.
                                - Payment information when you make a purchase.
                                - Usage data, including your interactions with the course content and platform.
                                - Communication data, including messages and communications with instructors or other users.</p>

                            <h5>How We Use Your Information</h5>
                            <p>We use the collected information for purposes such as:
                                - Providing and improving our online courses.
                                - Personalizing your learning experience.
                                - Processing transactions and payments.
                                - Communicating with you about course updates, promotions, and important announcements.
                                - Responding to your inquiries and providing customer support.</p>

                            <h5>Protection of Your Information</h5>
                            <p>We implement security measures to protect your personal information from unauthorized access, disclosure, alteration, and destruction. However, please be aware that no method of transmission over the internet or electronic storage is 100% secure.</p>

                            <h5>Third-Party Services</h5>
                            <p>We may use third-party services (e.g., payment processors) to facilitate our services. These services have their own privacy policies, and we encourage you to review them.</p>

                            <h5>Your Choices</h5>
                            <p>You can manage your account settings and communication preferences. You may also choose to delete your account, but please note that certain information may be retained for legal or business purposes.</p>

                            <h5>Changes to This Privacy Policy</h5>
                            <p>We may update this Privacy Policy periodically. We will notify you of any significant changes by posting the updated policy on our website.</p>

                            <p>If you have any questions or concerns about our Privacy Policy, please contact us at SkillGro@gmail.com.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Privacy Policy-end -->

</main>
<!-- main-area-end -->
@include('website.common.footer')