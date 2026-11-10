<nav class="navbar change navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="schmidt group logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}" role="button" aria-haspopup="true"
                        aria-expanded="false">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Who We Are</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('the-company') }}">The Company</a>
                        <a class="dropdown-item" href="{{ route('our-team') }}">Our Team</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('what-we-do') }}">What We Do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('our-works') }}">Our Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('latest-news') }}">Latest News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact-us') }}">Contact</a>
                </li>
            </ul>
            <div class="social-icon">
                <a href="{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="{{ setting('site.twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>

        </div>
    </div>
</nav>
