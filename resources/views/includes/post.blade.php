<a class="post-card rv" href="{{ route('latest-post', $n->slug) }}">
    <div class="ph r-32 {{ Img::exists($n->image) ? '' : 'ph--noimg' }}">@if (Img::exists($n->image))<img src="{{ Img::src($n->image, 800) }}" @if ($ss = Img::srcset($n->image)) srcset="{{ $ss }}" sizes="(min-width:1000px) 33vw, (min-width:700px) 50vw, 100vw" @endif alt="{{ $n->title }}" loading="lazy" decoding="async">@endif</div>
    @if ($n->created_at)<time datetime="{{ $n->created_at->toDateString() }}">{{ $n->created_at->format('d M Y') }}</time>@endif
    <h3>{{ $n->title }}</h3>
</a>
