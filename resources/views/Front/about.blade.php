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

    <section>
        <div class="container">
            <div class="row">
                <div class="icon"> <img  id="history_png" src="{{ asset('Front/assets/images/Header/History.png') }}"
                        alt=""></div>
                <h2 class="headings">History</h2>
            </div>
         <div class="row">
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <p class="about-text-page">
                     {{ $about->content }}
                 </p>
             </div>
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <img class="about-img" src="{{ asset('abouts/'.$about->image) }}" alt="">
             </div>

         </div>

        </div>

    </section>
    <!-- contact bitti -->

@endsection
