@extends('layouts.default')
@section('title', $work->title)
@section('description', \Illuminate\Support\Str::limit(strip_tags($work->body), 160))
@section('og_image', Voyager::image($work->image_full ?: $work->image))
@section('overlay', '1')
@section('content')
@php $images = array_values(array_filter((array) json_decode($work->images, true), fn ($i) => is_string($i) && $i !== '')); @endphp
@include('includes.masthead', ['title' => $work->title, 'eyebrow' => $work->sub_title, 'image' => Voyager::image($work->image_full ?: $work->image), 'crumbs' => [['Our Work', route('our-works')], [$work->title, null]]])

<section class="section">
    <div class="wrap split">
        <div class="rv">
            <dl class="facts" style="margin:0">
                @if ($work->sub_title)<div><dt>Category</dt><dd>{{ $work->sub_title }}</dd></div>@endif
                <div><dt>Project</dt><dd>{{ $work->title }}</dd></div>
            </dl>
        </div>
        <div class="prose rv">{!! $work->body !!}</div>
    </div>
</section>

@if (count($images))
<section class="section" style="padding-top:0">
    <div class="wrap">
        <div class="gallery" data-lightbox>
            @foreach ($images as $i => $image)
                <a class="rv" href="{{ Voyager::image($image) }}"><img src="{{ Voyager::image($image) }}" alt="{{ $work->title }} — image {{ $i + 1 }}" loading="{{ $i < 1 ? 'eager' : 'lazy' }}" decoding="async"></a>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($prev || $next)
<div class="wrap">
    <nav class="pager" aria-label="More projects">
        <div>@if ($prev)<a href="{{ route('our-work', $prev->id) }}"><span class="meta">← Previous</span><b>{{ $prev->title }}</b></a>@endif</div>
        <div>@if ($next)<a href="{{ route('our-work', $next->id) }}"><span class="meta">Next →</span><b>{{ $next->title }}</b></a>@endif</div>
    </nav>
</div>
@endif

@if ($related->count())
<section class="section section--stone">
    <div class="wrap">
        <div class="sec-head"><div><span class="eyebrow">Related</span><h2 class="h-lg">More projects</h2></div><a class="link" href="{{ route('our-works') }}">View all</a></div>
        <div class="tiles">@foreach ($related as $w) @include('includes.tile', ['work' => $w]) @endforeach</div>
    </div>
</section>
@endif
@include('includes.cta')
@stop
