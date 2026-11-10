@extends('layouts.default')
@section('css')
@endsection
@section('content')

    <header class="pages-header bg-img valign parallaxie" data-background="{{ asset('img/what-we-do.jpg') }}"
        data-overlay-dark="7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1>Our Work</h1>
                        <div class="path">
                            <a href="{{ route('home') }}">Home</a><span>/</span><a href="{{ route('our-works') }}"
                                class="active">Our Work</a><span>/</span><a href="#"
                                class="active">{{ $work->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="intro-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="htit">
                        <h4>{{ $work->title }}</h4>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1 col-md-8 mb-30">
                    <div class="text">
                        {!! $work->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="projdtal">
        <div class="justified-gallery">
            @php $images = json_decode($work->images); @endphp
            @foreach ($images as $image)
                <a href="{{ Voyager::image($image) }}">
                    <img alt="{{ $work->title }}" src="{{ Voyager::image($image) }}" />
                </a>
            @endforeach
        </div>
    </section>

@stop
