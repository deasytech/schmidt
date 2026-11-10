@php
    $nav = [
        ['the-company', 'The Company'],
        ['our-team', 'Our Team'],
        ['what-we-do', 'What We Do'],
        ['our-works', 'Our Work'],
        ['latest-news', 'News'],
    ];
    $over = trim($__env->yieldContent('overlay')) !== '';
@endphp
<header class="hdr {{ $over ? 'hdr--over' : 'is-solid' }}">
    <div class="wrap hdr__in">
        <a class="hdr__logo" href="{{ route('home') }}" aria-label="{{ setting('site.title') }} — home">
            <img src="{{ Voyager::image(setting('site.logo')) }}" alt="{{ setting('site.title') }}" width="52" height="52">
        </a>
        <nav class="nav" aria-label="Primary">
            @foreach ($nav as [$r, $label])
                <a href="{{ route($r) }}" @if(request()->routeIs($r) || ($r === 'our-works' && request()->routeIs('our-work')) || ($r === 'latest-news' && request()->routeIs('latest-post'))) aria-current="page" @endif>{{ $label }}</a>
            @endforeach
            <a class="nav__cta" href="{{ route('contact-us') }}" @if(request()->routeIs('contact-us')) aria-current="page" @endif>Contact</a>
        </nav>
        <button class="menu-btn" type="button" aria-expanded="false" aria-controls="drawer" aria-label="Open menu"><span></span><span></span></button>
    </div>
</header>
<div class="drawer" id="drawer">
    <nav aria-label="Mobile">
        <a href="{{ route('home') }}">Home</a>
        @foreach ($nav as [$r, $label])
            <a href="{{ route($r) }}">{{ $label }}</a>
        @endforeach
        <a href="{{ route('contact-us') }}">Contact</a>
    </nav>
    <div class="drawer__foot">
        @foreach ($site['phones'] as $ph)<a href="tel:{{ preg_replace('/[^\d+]/', '', $ph) }}">{{ $ph }}</a><br>@endforeach
        @if ($site['email'])<a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>@endif
    </div>
</div>
