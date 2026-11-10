<meta charset="utf-8">
<title>{{ setting('site.title') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="{{ setting('site.description') }}">
<meta name="{{ setting('site.title') }}" content="Blade">
<!-- Favicon -->
<link rel="shortcut icon" href="{{ Voyager::image(setting('site.mobile_logo')) }}" />

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet">

<!-- Plugins -->
<link rel="stylesheet" href="{{ asset('css/plugins.css') }}" />

<!-- Core Style Css -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@yield('css')
