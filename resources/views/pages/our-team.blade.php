@extends('layouts.default')
@section('title', 'Our Team')
@section('description', 'Meet the architects, engineers and professionals behind ' . setting('site.title') . '.')
@section('overlay', '1')
@section('content')
@include('includes.masthead', ['title' => 'Our team', 'eyebrow' => 'People', 'image' => asset('img/our-team.jpg'), 'intro' => 'The architects, engineers and project professionals behind the work.', 'crumbs' => [['Our Team', null]]])
<section class="section" style="padding-top:0">
    <div class="wrap">
        @if ($team->count())
            <div class="team-grid">@foreach ($team as $m) @include('includes.member', ['m' => $m]) @endforeach</div>
        @else
            <div class="empty"><p class="muted">Team profiles are coming soon.</p></div>
        @endif
    </div>
</section>
@include('includes.cta')
@stop
