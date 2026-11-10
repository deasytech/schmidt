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
                        <h1>{{ $page->title }}</h1>
                        <div class="path">
                            <a href="{{ route('home') }}">Home</a><span>/</span><a href="{{ route($page->slug) }}"
                                class="active">{{ $page->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="services section-padding bg-gray">
        <div class="container">
            <div class="section-head text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <h6 class="custom-font wow fadeInDown" data-wow-delay=".3s">{!! $page->body !!}</h6>
                        <h4 class="playfont wow flipInX" data-wow-delay=".5s">{{ $page->title }}</h4>
                    </div>
                </div>
            </div>
            <div class="row bord-box bg-img wow fadeInUp" data-wow-delay=".3s"
                data-background=".{{ Voyager::image($page->image) }}">
                @foreach ($modules as $item)
                    <div class="col-lg-3 col-md-6 item-bx">
                        <h2 class="custom-font numb">{{ $item->sub_title }}</h2>
                        <h6 class="mb-20 h6-sm">{{ $item->title }}</h6>
                        <p class="text-p-sm">{{ $item->excerpt }}</p>
                        <a href="#" class="more custom-font mt-30">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
