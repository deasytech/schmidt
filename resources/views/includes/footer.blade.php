<footer class="main-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="item abot">
                    <div class="logo-footer mb-20">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="schmidt group footer logo">
                        </a>
                    </div>
                    <p>{{ setting('site.footer_about') }}</p>
                    <div class="social-icon">
                        <a href="{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="{{ setting('site.twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="item usful-links">
                    <div class="fothead">
                        <h6>Useful Links</h6>
                    </div>
                    <ul>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ route('the-company') }}">The Company</a>
                        </li>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ route('our-team') }}">Our Team</a></li>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ route('what-we-do') }}">What We Do</a></li>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ route('our-works') }}">Our Work</a></li>
                        <li><i class="fas fa-chevron-right"></i> <a href="{{ route('contact-us') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Call</h6>
                    </div>
                    {!! setting('site.phone') !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Write</h6>
                    </div>
                    <p>{{ setting('site.email') }}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Visit</h6>
                    </div>
                    <p>{{ setting('site.footer_contact') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-left">
                        <p>© <?php echo date('Y'); ?> <a href="https://schmidtarchitects.co">Schmidt Group</a>. All Rights
                            Reserved</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-right">
                        <p><a href="https://qtribe.com.ng" target="_blank">Site Credit</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>

<!-- plugins -->
<script src="{{ asset('js/plugins.js') }}"></script>

<!-- custom scripts -->
<script src="{{ asset('js/scripts.js') }}"></script>

<!-- Map -->
<script src="{{ asset('js/map.js') }}"></script>

<!-- google map api -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUU5FZiF5WLFFfgIC1n64Zr0zfpQZjBBg&amp;callback=initMap">
</script>
