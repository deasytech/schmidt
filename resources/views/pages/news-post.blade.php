@extends('layouts.default')
@section('title', $post->seo_title ?: $post->title)
@section('description', $post->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($post->excerpt ?: $post->body), 160))
@section('og_image', Voyager::image($post->image))
@section('overlay', '1')
@section('content')
@include('includes.masthead', ['title' => $post->title, 'eyebrow' => $post->created_at->format('d F Y'), 'imagePath' => $post->image, 'crumbs' => [['News', route('latest-news')], [\Illuminate\Support\Str::limit($post->title, 40), null]]])
<section class="section" style="padding-top:0">
    <div class="wrap">
        <article class="article rv">
            @if ($post->excerpt)<p class="lead">{{ $post->excerpt }}</p>@endif
            <div class="prose">{!! $post->body !!}</div>
            <p style="margin-top:48px"><a class="link" href="{{ route('latest-news') }}">← Back to news</a></p>
        </article>
    </div>
</section>
@if ($more->count())
<section class="section section--stone"><div class="wrap">
    <div class="sec-head"><div><span class="eyebrow">Keep reading</span><h2 class="h-lg">More articles</h2></div></div>
    <div class="posts">@foreach ($more as $n) @include('includes.post', ['n' => $n]) @endforeach</div>
</div></section>
@endif
@stop
