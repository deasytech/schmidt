@php $cat = $work->sub_title && $work->sub_title !== $work->title ? $work->sub_title : ''; @endphp
<a class="tile rv" href="{{ route('our-work', $work->id) }}" data-cat="{{ $cat }}">
    @if (Img::exists($work->image))
    <div class="ph"><img src="{{ Img::src($work->image, 800) }}" @if ($ss = Img::srcset($work->image)) srcset="{{ $ss }}" sizes="{{ !empty($wide) ? '(min-width:700px) 100vw, 100vw' : '(min-width:700px) 50vw, 100vw' }}" @endif alt="{{ $work->title }}" loading="lazy" decoding="async"></div>
    @else
    <div class="ph ph--noimg" aria-hidden="true">{{ mb_substr((string) $work->title, 0, 1) }}</div>
    @endif
    <div class="tile__meta"><span class="tile__title">{{ $work->title }}</span>@if ($cat)<span class="tile__cat">{{ $cat }}</span>@endif</div>
</a>
