@extends('layouts.default')
@section('title', 'Contact')
@section('description', 'Contact ' . setting('site.title') . ' to discuss your architecture, interior design or construction project.')
@section('overlay', '1')
@section('content')
@include('includes.masthead', ['title' => 'Let’s talk', 'eyebrow' => 'Contact', 'image' => asset('img/2.jpg'), 'intro' => 'Tell us about your project and we will be in touch.', 'crumbs' => [['Contact', null]]])
<section class="section" style="padding-top:0">
    <div class="wrap">
        <div class="contact-grid">
            <ul class="clist rv">
                @if (count($site['phones']))<li><b>Call</b>@foreach ($site['phones'] as $ph)<a href="tel:{{ preg_replace('/[^\d+]/', '', $ph) }}">{{ $ph }}</a><br>@endforeach</li>@endif
                @if ($site['email'])<li><b>Email</b><a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></li>@endif
                @if ($site['address'])<li><b>Visit</b>{{ $site['address'] }}</li>@endif
                @foreach ($site['social'] as $net => $url)<li><b>{{ ucfirst($net) }}</b><a href="{{ $url }}" target="_blank" rel="noopener">{{ $url }}</a></li>@endforeach
            </ul>
            <form method="post" action="{{ route('contact.store') }}" data-once novalidate class="rv" id="enquiry">
                @csrf
                @if (session('success'))<div class="notice" role="status">{{ session('success') }}</div>@endif
                @if ($errors->any())<div class="notice" role="alert">Please correct the highlighted fields.</div>@endif
                <div class="field"><label for="name">Name</label><input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name">@error('name')<span class="err">{{ $message }}</span>@enderror</div>
                <div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" inputmode="email">@error('email')<span class="err">{{ $message }}</span>@enderror</div>
                <div class="field"><label for="message">Message</label><textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>@error('message')<span class="err">{{ $message }}</span>@enderror</div>
                <button class="btn btn--solid" type="submit">Send message</button>
            </form>
        </div>
        <div class="map">
            <iframe title="Map showing the Schmidt Group office" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7154510372893!2d3.478094510513766!3d6.430588524209319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5c82db7d0d9%3A0x3cd655b055d89bf9!2s10%20Dele%20Ogunbowale%20Cres%2C%20Lekki%20Phase%20I%20106104%2C%20Lekki%2C%20Lagos!5e0!3m2!1sen!2sng!4v1695376326239!5m2!1sen!2sng"></iframe>
        </div>
    </div>
</section>
@stop
