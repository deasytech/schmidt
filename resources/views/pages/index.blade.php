@extends('layouts.default')
@section('css')
@endsection
@section('content')

    <header class="slider">
        <div class="swiper-container parallax-slider">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <div class="bg-img valign" data-background="{{ Voyager::image($slide->image) }}" data-overlay-dark="6">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="caption hmone">
                                            <h5 class="thin custom-font">{{ $slide->title }}</h5>
                                            <h1 data-splitting><a href="#">{{ $slide->sub_title }}</a>
                                            </h1>
                                            <p class="mt-10">{{ $slide->description }}</p>
                                            <a href="{{ route('the-company') }}" class="btn-curve btn-bord btn-lit mt-30">
                                                <span>Learn More</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- slider setting -->
            <div class="setone">
                <div class="swiper-button-next swiper-nav-ctrl next-ctrl">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <div class="swiper-pagination top custom-font"></div>
        </div>
    </header>

    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="exp-img wow fadeInUp" data-wow-delay=".3s">
                        <div class="img bg-img wow imago" data-background="{{ Voyager::image($page->image) }}">
                            <div class="since custom-font">
                                {!! setting('site.since_year') !!}
                            </div>
                            <div class="years custom-font">
                                {!! setting('site.experience') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 valign">
                    <div class="exp-content wow fadeInUp" data-wow-delay=".3s">
                        <h6 class="sub-title">{{ $page->excerpt }}</h6>
                        <h2 class="mb-20 playfont">{{ $page->title }}</h2>
                        {!! $page->body !!}
                        <div class="numbers mt-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <h3><span class="nbr custom-font">{{ setting('site.projects_completed') }}</span>
                                        </h3>
                                        <h6>Projects Completed</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <h3><span class="nbr custom-font">{{ setting('site.satisfied_clients') }}</span>
                                        </h3>
                                        <h6>Satisfied Clients</h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <h3><span class="nbr custom-font">{{ setting('site.awards_won') }}</span></h3>
                                        <h6>Awards Won</h6>
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
            <div class="section-head text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <h6 class="custom-font wow fadeInDown" data-wow-delay=".3s">{!! $what_we_do->body !!}</h6>
                        <h4 class="playfont wow flipInX" data-wow-delay=".5s">{{ $what_we_do->title }}</h4>
                    </div>
                </div>
            </div>
            <div class="row bord-box bg-img wow fadeInUp" data-wow-delay=".3s"
                data-background="{{ Voyager::image($what_we_do->image) }}">
                @foreach ($what_we_do_modules as $item)
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

    <section class="portfolio full-bg">
        <div class="container-fluid">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-3 col-md-6 cluom {{ $loop->index == 0 ? 'current' : '' }}"
                        data-tab="tab-{{ $loop->index + 1 }}">
                        <div class="info">
                            <h6 class="custom-font">{{ $project->sub_title }}</h6>
                            <h5>{{ $project->title }}</h5>
                        </div>
                        <div class="more">
                            <a href="#">View Project <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="glry-img">
            @foreach ($projects as $project)
                <div id="tab-{{ $loop->index + 1 }}" class="bg-img tab-img {{ $loop->index == 0 ? 'current' : '' }}"
                    data-background="{{ Voyager::image($project->image_full) }}" data-overlay-dark="2"></div>
            @endforeach
        </div>
    </section>

    <section class="process section-padding bg-img bg-repeat" data-background="img/dots.png">
        <div class="container">
            <div class="section-head text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <h6 class="custom-font wow fadeInDown" data-wow-delay=".3s">{{ $how_we_do_it->title }}</h6>
                        <h4 class="playfont wow flipInX" data-wow-delay=".5s">{{ $how_we_do_it->excerpt }}</h4>
                    </div>
                </div>
            </div>
            <div class=" row">
                @foreach ($how_we_do_it_modules as $item)
                    <div class="col-lg-3 col-md-6 coulmn wow fadeInUp" data-wow-delay=".3s">
                        <div class="item">
                            <div class="bg-img" data-background="{{ Voyager::image($item->image) }}">
                                <h3 class="numb custom-font">{{ $item->title }}</h3>
                            </div>
                            <div class="cont">
                                <h6 class="mb-10">{{ $item->sub_title }}</h6>
                                {!! $item->body !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
                @foreach ($latest_news as $news)
                    <div class="col-lg-4">
                        <div class="item wow fadeInUp md-mb50" data-wow-delay=".3s">
                            <div class="post-img">
                                <div class="img">
                                    <img src="{{ Voyager::image($news->image) }}" alt="{{ $news->title }}">
                                </div>
                            </div>
                            <div class="cont">
                                <div class="info">
                                    <a href="{{ route('latest-post', $news->slug) }}">Schmidt Post</a>
                                    <a
                                        href="{{ route('latest-post', $news->slug) }}">{{ $news->created_at->format('D, d M Y') }}</a>
                                </div>

                                <h5 class="playfont"><a
                                        href="{{ route('latest-post', $news->slug) }}">{{ $news->title }}</a>
                                </h5>

                                <a href="{{ route('latest-post', $news->slug) }}" class="more">
                                    <span class="custom-font">Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="contact cont-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 contact-form wow fadeInDown" data-wow-delay=".3s">
                    <form method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="section-head">
                            <h6 class="custom-font">Contact Us</h6>
                            <h4 class="playfont">Get In Touch</h4>
                        </div>
                        @if (session('success'))
                            <div class="messages alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="controls">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" required="required"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                                    required="required">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="Message" rows="4" required="required">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-curve btn-color"><span>Send Message</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contact-map">
            <!--<div class="map" id="ieatmaps"></div>-->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7154510372893!2d3.478094510513766!3d6.430588524209319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5c82db7d0d9%3A0x3cd655b055d89bf9!2s10%20Dele%20Ogunbowale%20Cres%2C%20Lekki%20Phase%20I%20106104%2C%20Lekki%2C%20Lagos!5e0!3m2!1sen!2sng!4v1695376326239!5m2!1sen!2sng"
                width="1064" height="684" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="bg-img" data-background="{{ asset('img/2.jpg') }}"></div>
    </section>

@stop
