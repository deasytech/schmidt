@extends('layouts.default')
@section('title', 'Our Work')
@section('description', 'Selected architecture, interior design and construction projects by ' . setting('site.title') . '.')
@section('overlay', '1')
@section('content')
@php $hf = $works->firstWhere('featured',1) ?: $works->first(); $cats = $works->pluck('sub_title')->filter()->unique()->values(); @endphp
@include('includes.masthead', ['title' => 'Our work', 'eyebrow' => 'Portfolio', 'imagePath' => $hf ? ($hf->image_full ?: $hf->image) : null, 'intro' => 'Architecture, interiors and construction — projects delivered by the studio.', 'crumbs' => [['Our Work', null]]])

<section class="section" style="padding-top:0">
    <div class="wrap">
        @if ($works->count())
            @if ($cats->count() > 1)
            <div class="filters" role="group" aria-label="Filter projects by category">
                <button class="chip" type="button" data-filter="*" aria-pressed="true">All <span class="chip__n">{{ $works->count() }}</span></button>
                @foreach ($cats as $c)<button class="chip" type="button" data-filter="{{ $c }}" aria-pressed="false">{{ $c }} <span class="chip__n">{{ $works->where('sub_title', $c)->count() }}</span></button>@endforeach
            </div>
            <p id="filter-status" class="muted" role="status" aria-live="polite" style="position:absolute;left:-9999px"></p>
            @endif
            <div class="tiles">@foreach ($works as $work) @include('includes.tile', ['work' => $work, 'wide' => $loop->index % 3 === 0]) @endforeach</div>
        @else
            <div class="empty"><h2 class="h-md">Projects are coming soon.</h2><p class="muted">Please check back shortly.</p></div>
        @endif
    </div>
</section>
@include('includes.clients')
@include('includes.cta')
@stop
