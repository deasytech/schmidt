<section class="team section-padding bg-img bg-repeat" data-background="{{ asset('img/dots.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="tit">
                    <h6 class="custom-font mb-10 wow fadeInDown" data-wow-delay=".3s">Schmidt Architects</h6>
                    <h3 class="wow flipInX" data-wow-delay=".3s">Our Clients</h3>
                    <div class="navs mt-30 wow fadeInUp" data-wow-delay=".3s">
                        <span class="prev">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </span>
                        <span class="next">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="team-container">
                    @foreach ($clients as $client)
                        <div class="item wow fadeInUp" data-wow-delay=".3s">
                            <div class="img wow imago">
                                <img src="{{ Voyager::image($client->logo) }}" alt="{{ $client->name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <<div class="dotsbg-img bg-repeat" data-background="{{ asset('img/dots.png') }}">
        </div>
</section>
