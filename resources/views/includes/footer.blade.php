<footer class="ftr">
    <div class="wrap">
        <div class="ftr__grid">
            <div class="ftr__about">
                <p class="ftr__h">{{ setting('site.title') }}</p>
                @if (setting('site.footer_about'))<p>{{ setting('site.footer_about') }}</p>@endif
                @foreach ($site['social'] as $net => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener">{{ ucfirst($net) }}</a>&nbsp;
                @endforeach
            </div>
            <div>
                <p class="ftr__h">Explore</p>
                <ul>
                    <li><a href="{{ route('the-company') }}">The Company</a></li>
                    <li><a href="{{ route('our-team') }}">Our Team</a></li>
                    <li><a href="{{ route('what-we-do') }}">What We Do</a></li>
                    <li><a href="{{ route('our-works') }}">Our Work</a></li>
                    <li><a href="{{ route('latest-news') }}">News</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact</a></li>
                </ul>
            </div>
            <div>
                <p class="ftr__h">Contact</p>
                @foreach ($site['phones'] as $ph)<p><a href="tel:{{ preg_replace('/[^\d+]/', '', $ph) }}">{{ $ph }}</a></p>@endforeach
                @if ($site['email'])<p><a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></p>@endif
            </div>
            @if ($site['address'])
            <div>
                <p class="ftr__h">Studio</p>
                <p>{{ $site['address'] }}</p>
            </div>
            @endif
        </div>
        <div class="ftr__legal">
            <span>© {{ date('Y') }} {{ setting('site.title') }}. All rights reserved.</span>
            <a href="https://qtribe.com.ng" target="_blank" rel="noopener">Site credit</a>
        </div>
    </div>
</footer>
