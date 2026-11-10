@extends('layouts.default')
@section('title', $page->title)
@section('description', strip_tags($page->excerpt ?: setting('site.description')))
@section('og_image', Voyager::image($page->image))
@section('overlay', '1')
@section('content')
@include('includes.masthead', ['title' => $page->title, 'eyebrow' => $page->excerpt, 'imagePath' => $page->image, 'crumbs' => [['The Company', null]]])

<section class="section">
    <div class="wrap split">
        <div class="rv"><span class="eyebrow">Our story</span><h2 class="h-lg">{{ $page->title }}</h2></div>
        <div class="prose rv lead">{!! $page->body !!}</div>
    </div>
</section>

@foreach ($modules as $item)
<section class="section {{ $loop->odd ? 'section--stone' : '' }}">
    <div class="wrap split {{ $loop->odd ? '' : 'split--rev' }}">
        @if ($loop->odd)
            @if ($item->image)<div class="ph r-32 rv"><img src="{{ Img::src($item->image, 800) }}" @if ($ss = Img::srcset($item->image)) srcset="{{ $ss }}" sizes="(min-width:900px) 50vw, 100vw" @endif alt="{{ $item->title }}" loading="lazy" decoding="async"></div>@endif
            <div class="rv"><span class="eyebrow">0{{ $loop->iteration }}</span><h2 class="h-lg" style="margin-bottom:24px">{{ $item->title }}</h2><div class="prose">{!! $item->body !!}</div></div>
        @else
            <div class="rv"><span class="eyebrow">0{{ $loop->iteration }}</span><h2 class="h-lg" style="margin-bottom:24px">{{ $item->title }}</h2><div class="prose">{!! $item->body !!}</div></div>
            @if ($item->image)<div class="ph r-32 rv"><img src="{{ Img::src($item->image, 800) }}" @if ($ss = Img::srcset($item->image)) srcset="{{ $ss }}" sizes="(min-width:900px) 50vw, 100vw" @endif alt="{{ $item->title }}" loading="lazy" decoding="async"></div>@endif
        @endif
    </div>
</section>
@endforeach

@if ($site['years'])
<section class="section section--ink"><div class="wrap"><div class="metrics">
    <div class="metric rv"><b>{{ $site['years'] }}</b><span>Years of experience</span></div>
    @if (setting('site.projects_completed'))<div class="metric rv"><b>{{ setting('site.projects_completed') }}</b><span>Projects completed</span></div>@endif
    @if (setting('site.satisfied_clients'))<div class="metric rv"><b>{{ setting('site.satisfied_clients') }}</b><span>Satisfied clients</span></div>@endif
    @if (setting('site.awards_won'))<div class="metric rv"><b>{{ setting('site.awards_won') }}</b><span>Awards won</span></div>@endif
</div></div></section>
@endif

@if ($testimonials->count())
<section class="section">
    <div class="wrap">
        <div class="sec-head"><div><span class="eyebrow">{{ $testimonial->title }}</span><h2 class="h-lg">{{ $testimonial->excerpt }}</h2></div></div>
        <div class="posts">
            @foreach ($testimonials as $t)
                <figure class="rv" style="margin:0;border-top:1px solid var(--line);padding-top:24px">
                    <blockquote style="margin:0" class="prose">{!! $t->body !!}</blockquote>
                    <figcaption class="meta" style="margin-top:16px">{{ $t->title }}@if ($t->sub_title) — {{ $t->sub_title }}@endif</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
@endif
@include('includes.cta')
@stop
