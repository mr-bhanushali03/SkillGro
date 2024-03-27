<!-- footer-area -->
<footer class="footer__area">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer__widget">
                        <div class="logo mb-35">
                            <a href="{{ route('website.home') }}"><img
                                    src="{{ asset('storage/website') }}/img/logo/secondary_logo.svg" alt="img" /></a>
                        </div>
                        <div class="footer__content">
                            <p>
                                Discover and learn with our online courses. Knowledge at
                                your fingertips!
                            </p>
                            <ul class="list-wrap">
                                <li>
                                    <a href="https://www.google.com/maps/place/Command+Sector/@20.3661579,72.9170436,17z/data=!3m1!4b1!4m6!3m5!1s0x3be0cf71b5d10e4b:0xcd8c9e84a0c22bc!8m2!3d20.3661579!4d72.9196185!16s%2Fg%2F11m44ykcy7?entry=ttu"
                                        target="_blank" style="color: #949bb1">
                                        <i class="fa fa-map-marker"></i> Amit Sales Agency
                                        Near Command Sector,
                                        Behind Indian Bank,
                                        Char Rasta,
                                        Vapi,
                                        India.
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+9175667565368" style="color: #949bb1">
                                        <i class="fa fa-phone"></i> +91 75667565368
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:mrbhanushali03@email.com" style="color: #949bb1">
                                        <i class="fa fa-envelope"></i> mrbhanushali03@gmail.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Useful Links</h4>
                        <div class="footer__link">
                            <ul class="list-wrap">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>
                                    <a href="{{ url('about') }}">About Us</a>
                                </li>
                                <li><a href="{{ url('courses') }}">Courses</a></li>
                                <li><a href="{{ url('instructors') }}">Instructor</a></li>
                                <li>
                                    <a href="{{ url('contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Our Company</h4>
                        <div class="footer__link">
                            <ul class="list-wrap">
                                <li><a href="{{ url('blogs') }}">Blogs</a></li>
                                <li><a href="{{ url('events') }}">Events</a></li>
                                <li>
                                    <a href="{{ url('privacy') }}">Privacy</a>
                                </li>
                                <li>
                                    <a href="{{ url('terms') }}">Terms</a>
                                </li>
                                <li>
                                    <a href="{{ url('support') }}">Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Get In Touch</h4>
                        <div class="footer__contact-content">
                            <p>
                                Get in touch with us! Reach out through <br />
                                the details below and let's connect.
                            </p>
                            <ul class="list-wrap footer__social">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <img src="{{ asset('storage/website') }}/img/icons/facebook.svg" alt="img"
                                            class="injectable" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <img src="{{ asset('storage/website') }}/img/icons/twitter.svg" alt="img"
                                            class="injectable" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <img src="{{ asset('storage/website') }}/img/icons/whatsapp.svg" alt="img"
                                            class="injectable" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <img src="{{ asset('storage/website') }}/img/icons/instagram.svg"
                                            alt="img" class="injectable" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <img src="{{ asset('storage/website') }}/img/icons/youtube.svg" alt="img"
                                            class="injectable" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="app-download">
                            <a href="#"><img src="{{ asset('storage/website') }}/img/others/google-play.svg"
                                    alt="img" /></a>
                            <a href="#"><img src="{{ asset('storage/website') }}/img/others/apple-store.svg"
                                    alt="img" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="copy-right-text">
                        <p>© 2024 skillgro.com. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer__bottom-menu">
                        <ul class="list-wrap">
                            <li><a href="{{ url('contact') }}">Term of Use</a></li>
                            <li><a href="{{ url('contact') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->

<!-- JS here -->
<script src="{{ asset('assets/website') }}/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/website') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/website') }}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('assets/website') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('assets/website') }}/js/jquery.odometer.min.js"></script>
<script src="{{ asset('assets/website') }}/js/jquery.appear.js"></script>
<script src="{{ asset('assets/website') }}/js/tween-max.min.js"></script>
<script src="{{ asset('assets/website') }}/js/select2.min.js"></script>
<script src="{{ asset('assets/website') }}/js/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/website') }}/js/jquery.marquee.min.js"></script>
<script src="{{ asset('assets/website') }}/js/tg-cursor.min.js"></script>
<script src="{{ asset('assets/website') }}/js/vivus.min.js"></script>
<script src="{{ asset('assets/website') }}/js/ajax-form.js"></script>
<script src="{{ asset('assets/website') }}/js/svg-inject.min.js"></script>
<script src="{{ asset('assets/website') }}/js/jquery.circleType.js"></script>
<script src="{{ asset('assets/website') }}/js/jquery.lettering.min.js"></script>
<script src="{{ asset('assets/website') }}/js/wow.min.js"></script>
<script src="{{ asset('assets/website') }}/js/aos.js"></script>
<script src="{{ asset('assets/website') }}/js/main.js"></script>
<script>
    SVGInject(document.querySelectorAll("img.injectable"));
</script>
<!-- materialdesign icon js-->
<script src="{{ asset('assets/dashboard') }}/js/pages/remix-icons-listing.js"></script>
</body>

</html>
