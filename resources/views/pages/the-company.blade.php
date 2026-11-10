@extends('layouts.default')

@section('content')

    <header class="pages-header bg-img valign parallaxie" data-background="{{ Voyager::image($page->image) }}"
        data-overlay-dark="7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1>{{ $page->title }}</h1>
                        <div class="path">
                            <a href="{{ route('home') }}">Home</a><span>/</span><a href="#">Who We
                                Are</a><span>/</span><a href="{{ $page->slug }}" class="active">{{ $page->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 valign">
                    <div class="exp-content nopat wow fadeInUp" data-wow-delay=".3s">
                        <h6 class="sub-title">{{ $page->excerpt }}</h6>
                        <h2 class="mb-5 playfont">{{ $page->title }}</h2>
                        {!! $page->body !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ab-exp">
                        <div class="row">
                            <div class="col-md-4 mb-20">
                                <div class="pattern bg-img bg-repeat" data-background="{{ asset('img/line-pattern.png') }}">
                                </div>
                            </div>
                            <div class="col-md-8 wow fadeInUp" data-wow-delay=".3s">
                                <div class="img mb-20 wow imago">
                                    <img src="{{ asset('img/ab1.jpg') }}" alt="the company">
                                </div>
                            </div>
                            <div class="col-md-7 wow fadeInUp" data-wow-delay=".3s">
                                <div class="img wow imago">
                                    <img src="{{ asset('img/ab2.jpg') }}" alt="about us">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="years-exp">
                                    <div class="exp-text">
                                        <h2 class="custom-font">7</h2>
                                        <h6>Years Of Experience</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services section-padding bg-gray">
        <div class="container">
            <div class="row">
                @foreach ($modules as $item)
                    <div class="col-lg-6">
                        <div class="item-bx bg-img wow fadeInUp" data-wow-delay=".3s"
                            data-background="{{ Voyager::image($item->image) }}">
                            <h6 class="mb-20">{{ $item->title }}</h6>
                            {!! $item->body !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="testimonials grid section-padding">
        <div class="container">
            <div class="section-head text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <h6 class="custom-font wow fadeInDown" data-wow-delay=".3s">{{ $testimonial->title }}</h6>
                        <h4 class="playfont wow flipInX" data-wow-delay=".5s">{{ $testimonial->excerpt }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testim">
                        @foreach ($testimonials as $testimonial)
                            <div class="item wow fadeInUp" data-wow-delay=".3s">
                                <span class="quote-icon"><img src="{{ asset('img/clients/quote.svg') }}"
                                        alt="quote icon"></span>
                                <div class="cont">
                                    {!! $testimonial->body !!}
                                </div>
                                <div class="info">
                                    <div class="author">
                                        <img src="{{ Voyager::image($testimonial->image) }}"
                                            alt="{{ $testimonial->title }}">
                                    </div>
                                    <h6>{{ $testimonial->title }} <span>{{ $testimonial->sub_title }}</span> </h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="navs mt-30 wow fadeInUp" data-wow-delay=".3s">
                        <span class="prev">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <span class="next">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
