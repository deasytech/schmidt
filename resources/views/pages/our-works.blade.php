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
                                class="active">Our Works</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="portfolio section-padding">
        <div class="container">
            <div class="row">
                <!-- gallery -->
                <div class="gallery twsty inf-lit full-width">
                    @foreach ($works as $work)
                        <!-- gallery item -->
                        <div class="items {{ $work->group }} three-column mt-50">
                            <div class="item-img bg-img" data-background="{{ Voyager::image($work->image) }}">
                                <a href="{{ route('our-work', $work->id) }}">
                                    <div class="item-img-overlay"></div>
                                </a>
                            </div>
                            <div class="info mt-10">
                                <h5>{{ $work->title }}</h5>
                                {{-- <span>{{ $work->sub_title }}</span> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('includes.clients')

@stop
