@extends('layouts.default')
@section('css')
@endsection
@section('content')

    <header class="pages-header bg-img valign parallaxie" data-background="{{ asset('img/our-team.jpg') }}"
        data-overlay-dark="7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1>Our Team</h1>
                        <div class="path">
                            <a href="{{ route('home') }}">Home</a><span>/</span><a href="#">Who We
                                Are</a><span>/</span><a href="#" class="active">Our Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="team tmgrid section-padding">
        <div class="container">
            <div class="section-head text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <h6 class="custom-font">Schmidt Group</h6>
                        <h4 class="playfont">Our Team</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($team as $member)
                    <div class="item col-lg-3 col-md-6">
                        <div class="img">
                            <img src="{{ Voyager::image($member->image) }}" alt="{{ $member->name }}">
                            <div class="social">
                                <a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="info">
                            <h5>{{ $member->name }}</h5>
                            <span>{{ $member->designation }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
