<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="sch">
    <a class="skip" href="#main">Skip to content</a>
    @include('includes.header')
    <main id="main">
        @yield('content')
    </main>
    @include('includes.footer')
    <script src="{{ asset('js/schmidt.js') }}?v=1" defer></script>
    @stack('scripts')
</body>
</html>
