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

    <section class="blog-pg single section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="post">
                        <div class="title-head">
                            <h2>{{ $post->title }}</h2>
                            <div class="info">
                                <p><a href="#0">Schmidt Admin</a>/<a
                                        href="#0">{{ $post->created_at->format('D, d M Y') }}</a></p>
                            </div>
                        </div>
                        <div class="img main-img">
                            <img src="{{ Voyager::image($post->image) }}" alt="" class="thumparallax">
                        </div>
                        <div class="content pt-20">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="cont">
                                        <div class="spacial">
                                            <p>{{ $post->excerpt }}</p>
                                        </div>
                                        {!! $post->body !!}

                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="pagination">
                            <span><a href="#0">Prev Post</a></span>
                            <span class="icon"><a href="#0"><i class="fas fa-th-large"></i></a></span>
                            <span class="text-right"><a href="#0">Next Post</a></span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
