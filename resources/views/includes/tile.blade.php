<a class="tile rv" href="{{ route('our-work', $work->id) }}" data-cat="{{ $work->sub_title }}">
    <div class="ph"><img src="{{ Voyager::image($work->image) }}" alt="{{ $work->title }}" loading="lazy" decoding="async"></div>
    <div class="tile__meta"><span class="tile__title">{{ $work->title }}</span>@if ($work->sub_title)<span class="tile__cat">{{ $work->sub_title }}</span>@endif</div>
</a>
