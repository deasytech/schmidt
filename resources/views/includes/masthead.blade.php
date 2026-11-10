{{-- params: title, eyebrow?, intro?, image?, crumbs? [[label,url|null],...] --}}
@php $img = $image ?? null; @endphp
<section class="masthead {{ $img ? 'masthead--img' : '' }}">
    @if ($img)<div class="masthead__bg"><img src="{{ $img }}" alt="" fetchpriority="high"></div>@endif
    <div class="wrap">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            @foreach (($crumbs ?? []) as [$cl, $cu])<span>/</span>@if ($cu)<a href="{{ $cu }}">{{ $cl }}</a>@else{{ $cl }}@endif @endforeach
        </nav>
        @if (!empty($eyebrow))<span class="eyebrow">{{ $eyebrow }}</span>@endif
        <h1 class="h-xl">{{ $title }}</h1>
        @if (!empty($intro))<p class="lead">{{ $intro }}</p>@endif
    </div>
</section>
