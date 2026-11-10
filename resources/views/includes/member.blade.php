<div class="team-card rv">
    <div class="ph r-34 {{ $m->image ? '' : 'ph--noimg' }}">
        @if ($m->image)<img src="{{ Img::src($m->image, 480) }}" @if ($ss = Img::srcset($m->image, [480, 800])) srcset="{{ $ss }}" sizes="(min-width:1100px) 25vw, (min-width:800px) 33vw, 50vw" @endif alt="{{ $m->name }}" loading="lazy" decoding="async">@else{{ mb_substr((string) $m->name, 0, 1) }}@endif
    </div>
    <h3>{{ $m->name }}</h3>
    @if ($m->designation)<p>{{ $m->designation }}</p>@endif
</div>
