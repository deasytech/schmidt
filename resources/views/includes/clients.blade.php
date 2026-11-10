@if ($clients->count())
<section class="section">
    <div class="wrap">
        <div class="sec-head"><div><span class="eyebrow">Trusted by</span><h2 class="h-lg">Our clients</h2></div></div>
        <div class="clients">
            @foreach ($clients as $client)
                <div>@if ($client->logo)<img src="{{ Voyager::image($client->logo) }}" alt="{{ $client->name }}" loading="lazy">@else<span class="meta">{{ $client->name }}</span>@endif</div>
            @endforeach
        </div>
    </div>
</section>
@endif
