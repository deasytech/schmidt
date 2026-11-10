<div class="team-card rv">
    <div class="ph r-34 {{ $m->image ? '' : 'ph--noimg' }}">
        @if ($m->image)<img src="{{ Voyager::image($m->image) }}" alt="{{ $m->name }}" loading="lazy" decoding="async">@else{{ mb_substr($m->name, 0, 1) }}@endif
    </div>
    <h3>{{ $m->name }}</h3>
    @if ($m->designation)<p>{{ $m->designation }}</p>@endif
</div>
