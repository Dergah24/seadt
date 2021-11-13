@extends('Front.layouts.master')
@section('content')
<style>
    .banner-container {
        background: none !important;
        height: 15vh !important;
    }

    @media screen and (max-width: 767px) {
        #banner,
        .banner-container {
            height: 15vh !important;
        }
    }
</style>

</div>

</div>


</section>
<!-- BANNER END -->
<style>


</style>

<section class="event-icon">
    <div class="container">
        <div class="row">
            <div class="icon">
                <div class="icon_items"><img class="signs signcontact" src="{{ asset('Front/assets/images/Reservation/sign3.png') }}" alt="">
                    <img class="signs_back signcontact" src="{{ asset('Front/assets/images/Reservation/Ellipse3.png') }}" alt=""></div>
            </div>
            <h2 class="headings">Events</h2>
        </div>
    </div>
</section>


<div class="slide">
    <div class="container gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
      @foreach ($events as $item)


        <div class="gallery-cell"
            style="background-image: url({{ asset($item->photo) }});">
            <div class="gallery-cell-inside">
                <div>
                    <div>
                        <h3 class="gallery-title">{{ $item->title }}</h3>
                        <p class="gallery-text"> {{ $item->content }} </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>


@endsection
