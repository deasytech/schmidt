@extends('layouts.default')

@section('content')

    <header class="pages-header bg-img valign parallaxie" data-background="{{ asset('img/what-we-do.jpg') }}"
        data-overlay-dark="7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1>Contact</h1>
                        <div class="path">
                            <a href="{{ route('home') }}">Home</a><span>/</span><a href="{{ route('contact-us') }}"
                                class="active">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="contact">
        <div class="info bg-gray pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="item">
                            <span class="icon pe-7s-phone"></span>
                            <div class="cont">
                                <h6 class="custom-font">Call Us</h6>
                                {!! setting('site.phone') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="item">
                            <span class="icon pe-7s-mail-open"></span>
                            <div class="cont">
                                <h6 class="custom-font">Email Us</h6>
                                <p>{{ setting('site.email') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="item">
                            <span class="icon pe-7s-map"></span>
                            <div class="cont">
                                <h6 class="custom-font">Address</h6>
                                <p>{{ setting('site.footer_contact') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 map-box">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7154510372893!2d3.478094510513766!3d6.430588524209319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5c82db7d0d9%3A0x3cd655b055d89bf9!2s10%20Dele%20Ogunbowale%20Cres%2C%20Lekki%20Phase%20I%20106104%2C%20Lekki%2C%20Lagos!5e0!3m2!1sen!2sng!4v1695376326239!5m2!1sen!2sng"
                        width="702" height="615" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6 form">
                    <form method="post" action="{{ route('contact.store') }}">
                        @csrf
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
    </section>

@stop
