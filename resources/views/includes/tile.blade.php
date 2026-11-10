<a class="tile rv" href="{{ route('our-work', $work->id) }}" data-cat="{{ $work->sub_title }}">
    <div class="ph"><img src="{{ Img::src($work->image, 800) }}" @if ($ss = Img::srcset($work->image)) srcset="{{ $ss }}" sizes="{{ !empty($wide) ? '(min-width:700px) 100vw, 100vw' : '(min-width:700px) 50vw, 100vw' }}" @endif alt="{{ $work->title }}" loading="lazy" decoding="async"></div>
    <div class="tile__meta"><span class="tile__title">{{ $work->title }}</span>@if ($work->sub_title)<span class="tile__cat">{{ $work->sub_title }}</span>@endif</div>
</a>
