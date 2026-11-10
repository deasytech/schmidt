<a class="post-card rv" href="{{ route('latest-post', $n->slug) }}">
    <div class="ph r-32"><img src="{{ Voyager::image($n->image) }}" alt="{{ $n->title }}" loading="lazy" decoding="async"></div>
    <time datetime="{{ $n->created_at->toDateString() }}">{{ $n->created_at->format('d M Y') }}</time>
    <h3>{{ $n->title }}</h3>
</a>
