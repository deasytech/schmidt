@php
    $siteTitle = setting('site.title');
    $pageTitle = trim($__env->yieldContent('title'));
    $fullTitle = $pageTitle ? $pageTitle . ' — ' . $siteTitle : $siteTitle;
    $desc = trim($__env->yieldContent('description')) ?: setting('site.description');
    $og = trim($__env->yieldContent('og_image'));
@endphp
<meta charset="utf-8">
<title>{{ $fullTitle }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($desc), 160) }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ $siteTitle }}">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($desc), 200) }}">
<meta property="og:url" content="{{ url()->current() }}">
@if ($og)<meta property="og:image" content="{{ $og }}">@endif
<meta name="twitter:card" content="summary_large_image">
<link rel="shortcut icon" href="{{ Voyager::image(setting('site.mobile_logo')) }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Inter:wght@400;500&display=swap" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Inter:wght@400;500&display=swap"></noscript>
<link rel="stylesheet" href="{{ asset('css/schmidt.css') }}?v=1">
@yield('preload')
@yield('css')
