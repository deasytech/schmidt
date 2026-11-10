@extends('layouts.default')
@section('title', $page->title)
@section('description', strip_tags(setting('site.home_service_excerpt') ?: setting('site.description')))
@section('og_image', Voyager::image($page->image))
@section('overlay', '1')
@section('content')
@include('includes.masthead', ['title' => $page->title, 'eyebrow' => 'Services', 'intro' => trim(strip_tags($page->body)) ?: null, 'imagePath' => 'public:img/what-we-do.jpg', 'crumbs' => [['What We Do', null]]])
<section class="section">
    <div class="wrap">
        <div class="svc">
            @foreach ($modules as $item)
                <div class="svc__row rv">
                    <span class="svc__n">{{ $item->sub_title }}</span>
                    <h2 class="svc__t">{{ $item->title }}</h2>
                    @if ($item->excerpt)<p class="svc__d">{{ $item->excerpt }}</p>@endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('includes.cta')
@stop
