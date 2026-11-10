@extends('layouts.default')
@section('css')
@endsection
@section('content')

    <header class="pages-header bg-img valign parallaxie" data-background="{{ asset('/img/what-we-do.jpg') }}"
        data-overlay-dark="7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1>News</h1>
                        <div class="path">
                            <a href="{{ route('home') }}">Home</a><span>/</span><a href="{{ route('latest-news') }}"
                                class="active">News</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="blog-grid section-padding mb-50">
        <div class="container">
            <div class="section-head text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <h6 class="custom-font wow fadeInDown" data-wow-delay=".3s">Schmidt Group</h6>
                        <h4 class="playfont wow flipInX" data-wow-delay=".5s">Articles / Latest News</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($news as $new)
                    <div class="col-lg-4">
                        <div class="item wow fadeInUp md-mb50" data-wow-delay=".3s">
                            <div class="post-img">
                                <div class="img">
                                    <img src="{{ Voyager::image($new->image) }}" alt="{{ $new->title }}">
                                </div>
                            </div>
                            <div class="cont">
                                <div class="info">
                                    <a href="{{ route('latest-post', $new->slug) }}">Schmidt Post</a>
                                    <a
                                        href="{{ route('latest-post', $new->slug) }}">{{ $new->created_at->format('D, d M Y') }}</a>
                                </div>

                                <h5 class="playfont"><a
                                        href="{{ route('latest-post', $new->slug) }}">{{ $new->title }}</a>
                                </h5>

                                <a href="{{ route('latest-post', $new->slug) }}" class="more">
                                    <span class="custom-font">Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
