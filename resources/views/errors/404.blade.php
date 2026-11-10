@extends('layouts.default')
@section('title', 'Page not found')
@section('overlay', '1')
@section('content')
@include('includes.masthead', ['title' => 'Page not found', 'eyebrow' => '404', 'image' => asset('img/2.jpg'), 'intro' => 'The page you are looking for may have moved or no longer exists.'])
<section class="section" style="padding-top:0"><div class="wrap actions">
    <a class="btn btn--solid" href="{{ route('home') }}">Back to home</a>
    <a class="btn btn--ghost" href="{{ route('our-works') }}">Explore our work</a>
</div></section>
@stop
