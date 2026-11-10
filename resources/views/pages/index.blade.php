@extends('layouts.default')
@section('overlay', '1')
@section('description', strip_tags($page->excerpt ?: setting('site.description')))
@php
    $hero = $slides->first();
    $spot = $slides->skip(1)->filter(fn ($s) => $hero && $s->title !== $hero->title);
@endphp
@section('og_image', $hero ? Voyager::image($hero->image) : '')
@section('content')

@if ($hero)
<section class="hero">
    <div class="hero__img"><img src="{{ Voyager::image($hero->image) }}" alt="{{ $hero->sub_title }}" fetchpriority="high"></div>
    <div class="wrap hero__in">
        @if ($hero->title)<span class="eyebrow">{{ $hero->title }}</span>@endif
        <h1 class="h-xl">{{ $hero->sub_title }}</h1>
        @if ($hero->description)<p class="lead">{{ $hero->description }}</p>@endif
        <div class="actions">
            <a class="btn btn--light" href="{{ route('our-works') }}">Explore our work</a>
            <a class="btn btn--ghost" href="{{ route('contact-us') }}">Start a conversation</a>
        </div>
    </div>
</section>
@endif

@if ($projects->count())
<section class="section">
    <div class="wrap">
        <div class="sec-head rv">
            <div><span class="eyebrow">Featured projects</span><h2 class="h-lg">Selected work</h2></div>
            <a class="link" href="{{ route('our-works') }}">View all projects</a>
        </div>
        <div class="tiles">
            @foreach ($projects as $work) @include('includes.tile', ['work' => $work]) @endforeach
        </div>
    </div>
</section>
@endif

<section class="section section--stone">
    <div class="wrap split">
        <div class="ph r-45 rv"><img src="{{ Voyager::image($page->image) }}" alt="{{ setting('site.title') }}" loading="lazy"></div>
        <div class="rv">
            <span class="eyebrow">{{ $page->excerpt }}</span>
            <h2 class="h-lg" style="margin-bottom:32px">{{ $page->title }}</h2>
            <div class="prose">{!! $page->body !!}</div>
            <p style="margin-top:32px"><a class="link" href="{{ route('the-company') }}">The company</a></p>
        </div>
    </div>
</section>

<section class="section">
    <div class="wrap">
        <div class="sec-head rv">
            <div><span class="eyebrow">What we do</span><h2 class="h-lg">{{ $what_we_do->title }}</h2></div>
            <a class="link" href="{{ route('what-we-do') }}">All services</a>
        </div>
        <div class="svc">
            @foreach ($what_we_do_modules as $item)
                <div class="svc__row rv">
                    <span class="svc__n">{{ $item->sub_title }}</span>
                    <h3 class="svc__t">{{ $item->title }}</h3>
                    @if ($item->excerpt)<p class="svc__d">{{ $item->excerpt }}</p>@endif
                </div>
            @endforeach
        </div>
    </div>
</section>

@if ($more_projects->count())
<section class="section section--stone">
    <div class="wrap">
        <div class="sec-head rv">
            <div><span class="eyebrow">Portfolio</span><h2 class="h-lg">More from the studio</h2></div>
            <a class="link" href="{{ route('our-works') }}">View all projects</a>
        </div>
        <div class="tiles">
            @foreach ($more_projects as $work) @include('includes.tile', ['work' => $work]) @endforeach
        </div>
    </div>
</section>
@endif

<section class="section">
    <div class="wrap">
        <div class="sec-head rv"><div><span class="eyebrow">{{ $how_we_do_it->title }}</span><h2 class="h-lg">{{ $how_we_do_it->excerpt }}</h2></div></div>
        <div class="steps">
            @foreach ($how_we_do_it_modules as $item)
                <div class="step rv">
                    <span class="step__n">{{ $item->title }}</span>
                    <h3>{{ $item->sub_title }}</h3>
                    <div class="muted">{!! $item->body !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section section--ink">
    <div class="wrap">
        <div class="metrics">
            @if ($site['years'])<div class="metric rv"><b>{{ $site['years'] }}</b><span>Years of experience</span></div>@endif
            @if (setting('site.projects_completed'))<div class="metric rv"><b>{{ setting('site.projects_completed') }}</b><span>Projects completed</span></div>@endif
            @if (setting('site.satisfied_clients'))<div class="metric rv"><b>{{ setting('site.satisfied_clients') }}</b><span>Satisfied clients</span></div>@endif
            @if (setting('site.awards_won'))<div class="metric rv"><b>{{ setting('site.awards_won') }}</b><span>Awards won</span></div>@endif
        </div>
    </div>
</section>

@if ($spot->count())
<section class="section">
    <div class="wrap">
        <div class="sec-head rv"><div><span class="eyebrow">Spotlight</span><h2 class="h-lg">Now showing</h2></div></div>
        <div class="spot" style="--n:{{ min($spot->count(), 3) }}">
            @foreach ($spot as $s)
                <figure class="rv"><div class="ph r-45"><img src="{{ Voyager::image($s->image) }}" alt="{{ $s->title }}" loading="lazy"></div>
                    <figcaption><b>{{ $s->title }}</b><span>{{ $s->sub_title }}</span></figcaption></figure>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($team->count())
<section class="section section--stone">
    <div class="wrap">
        <div class="sec-head rv"><div><span class="eyebrow">People</span><h2 class="h-lg">The team behind the work</h2></div><a class="link" href="{{ route('our-team') }}">Meet the team</a></div>
        <div class="team-grid">
            @foreach ($team as $m) @include('includes.member', ['m' => $m]) @endforeach
        </div>
    </div>
</section>
@endif

@if ($latest_news->count())
<section class="section">
    <div class="wrap">
        <div class="sec-head rv"><div><span class="eyebrow">Insights</span><h2 class="h-lg">Latest news</h2></div><a class="link" href="{{ route('latest-news') }}">All articles</a></div>
        <div class="posts">
            @foreach ($latest_news as $n) @include('includes.post', ['n' => $n]) @endforeach
        </div>
    </div>
</section>
@endif

@include('includes.cta')
@stop
