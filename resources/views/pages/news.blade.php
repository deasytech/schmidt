@extends('layouts.default')
@section('title', 'News')
@section('description', 'Articles and updates from ' . setting('site.title') . '.')
@section('overlay', '1')
@section('content')
@include('includes.masthead', ['title' => 'News', 'eyebrow' => 'Insights', 'imagePath' => 'public:img/the-company.jpg', 'intro' => 'Articles and updates from the studio.', 'crumbs' => [['News', null]]])
<section class="section" style="padding-top:0">
    <div class="wrap">
        @if ($news->count())
            <div class="posts">@foreach ($news as $n) @include('includes.post', ['n' => $n]) @endforeach</div>
        @else
            <div class="empty"><p class="muted">No articles yet.</p></div>
        @endif
    </div>
</section>
@include('includes.cta')
@stop
