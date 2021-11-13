@extends('Front.layouts.master')

@section('content')




</div>

</div>
<div class="container-fluid banner-bottom">
    <div class="row banner-bottom-inside">
        <div class="col-lg-4 col-sm-12 col-xs-12 banner-bottom-top"
            style="background:rgba(0,0,0,0.5);text-align:center;">
            <div><img class="banner-bottom-image" style="opacity:1;position:relative;top:40px;"
                    src="{{ asset('Front/assets/images/Header/Ellipseilk.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-8 col-sm-12 col-xs-12 banner-bottom-bottom" style="background:#EC794A;">
            <h3 class="banner-bottom-h3">Malesueda</h3>
            <p class="banner-bottom-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eveniet sequi
                asperiores eum. Tempora accusamus id dolorem! Perspiciatis excepturi quis eius facilis culpa deleniti
                ducimus?</p>
        </div>

    </div>
</div>


</section>
<!-- BANNER END -->



<!-- Statistikalar -->
<section id="statistics">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-10 col-xs-12 statistic">
                <div class="statistic_inner">
                    <h3>25</h3>
                    <h4>Dignis suspendie</h4>
                </div>
                <div id="diamond1" class="diamond-narrow"></div>

            </div>
            <div class="col-lg-4 col-sm-10 col-xs-12 statistic">
                <div class="statistic_inner">
                    <h3>10</h3>
                    <h4>Viverra aliquet eget</h4>
                </div>
                <div id="diamond2" class="diamond-narrow"></div>
            </div>
            <div style="border-right:none;" class="col-lg-4 col-sm-10 col-xs-12 statistic">
                <div class="statistic_inner">
                    <h3>12</h3>
                    <h4>Lacus Vestibulum</h4>
                </div>
            </div>
        </div>

    </div>

</section>
<!-- Statistikalar Bitti -->

<!-- HİSTORY -->

<section>
    <div class="container">
        <div class="row icons-all">
            <div class="icon"> <img style="width:120px;" id="history_png"
                    src="{{ asset('Front/assets/images/Header/History.png') }}" alt="">
            </div>
            <h2 class="headings">History</h2>
        </div>

        <div class="row">
            <div class="col-12 history"
                style="background:url({{ asset('Front//assets/images/Header/hist_back.png') }});background-position:75% 70%;">
                <div class="history_text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id aut quia earum eius voluptatem
                        accusamus.</p>
                </div>
                <div>
                    <div id="diamond3" class="diamond-narrow"></div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- HİSTORY  BİTTİ-->




<!-- EVENTS -->
<style>

</style>


<section>
    <div class="container">
        <div class="row icons-all">

            <div class="icon">
                <div class="icon_items"><img class="signs"
                        src="{{ asset('Front/assets/images/Events/sign1.png') }}" alt="">
                    <img class="signs_back"
                        src="{{ asset('Front/assets/images/Events/Ellipse4.png') }}" alt="">
                </div>
            </div>
            <h2 class="headings">Events</h2>
        </div>

        <div class="row">
            @foreach ($events as $item)


            <div class="col-lg-6 col-sm-6 col-xs-12 events">
                <div class="description-div">
                    <a href="{{ route('event-view') }}">   <p class="img__description">{{ $item->title }}
                        <br><img class="photos-logo"
                            src="{{ asset('Front/assets/images/copy.png') }}" alt=""> {{ $item->inner_even_count }}</p> </a>
                </div>
                <a href="{{ route('event-view',$item->slug) }}"><img id="event1" src="{{ $item->image }}" alt=""></a>
            </div>
         </a>
            @endforeach




        </div>
    </div>
</section>

<!-- EVENTS BITTI-->





<!-- HALLS -->


<section>
    <div class="container">
        <div class="row icons-all">
            <div class="icon">
                <div class="icon_items"><img class="signs"
                        src="{{ asset('Front/assets/images/Halls/sign2.png') }}" alt="">
                    <img class="signs_back"
                        src="{{ asset('Front/assets/images/Halls/Ellipse3.png') }}" alt="">
                </div>
            </div>
            <h2 class="headings">Halls</h2>
        </div>

        <div class="row">
            @foreach ($halls as $item)


            <div class="col-lg-3 col-sm-6 col-xs-12 halls">
                <div class="desc-halls">
                    <p class="img__description2">{{ $item->title }}</p>
                </div>
                <a href="{{ route('hall-view',$item->slug) }}">  <img class="halls-imgs halls-imgs1"
                    src="{{ asset($item->image) }}" alt=""> </a>
                <div class="diamond-narrow diamond4"></div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- HALLS BITTI-->



<!-- HALLS -->

@include('Front.layouts.reservation')

<!-- HALLS BITTI-->


@endsection
