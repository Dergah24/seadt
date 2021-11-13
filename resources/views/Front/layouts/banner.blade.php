  <!-- BANNER BEGIN -->
  <section id="banner">
    <div class="banner-container" style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/4/41/Palace_of_Happines_%28Mukhtarov_street%29.jpg);
    ">
        <div class="header">
            <a class="header-link" href="{{ route('/') }}">
                <div class="header-left">
                    <img style="width:30%;" src="{{ asset('Front/assets/images/logos/RQS-White.png') }}" alt="">
                </div>
            </a>
            <div class="header-right">
                <div class="header-right-menu">
                    <input type="checkbox" id="burgercheck">
                    <label id="burger" for="burgercheck">
                        <div style="width:20px;"></div>
                        <div style="width:15px;"></div>
                        <div style="width:20px;"></div>
                    </label>
                    <nav id="menu">
                        <ul class="menu-ul">
                            <li><a href="{{ route('histroy') }}">History</a></li>
                            <li><a href="{{ route('event-view','all') }}">Events</a></li>
                            <li><a href="{{ route('hall-view','all') }}">Halls</a></li>
                            <li><a href=" {{ route('/') }}#reservation " class="btn">Reservation</a></li>
                            <li><a href="{{ route('frontcontact') }}">Contact</a></li>

                        </ul>
                        <ul class="menu-socialicons">
                            <li><a href="{{ $settings->facebook }}"><img src="{{ asset('Front/assets/images/icons/facebookb.png') }}" alt=""></a></li>
                            <li><a href="{{ $settings->twitter }}"><img src="{{ asset('Front/assets/images/icons/twitterb.png') }}" alt=""></a></li>
                            <li><a href="{{ $settings->youtube }}"><img src="{{ asset('Front/assets/images/icons/youtubeb.png') }}" alt=""></a></li>
                            <li><a href="{{ $settings->instagram }}"><img src="{{ asset('Front/assets/images/icons/instagramb.png') }}" alt=""></a></li>


                        </ul>

                    </nav>
                </div>
            </div>



        </div>

    </div>


</section>
<!-- BANNER END -->


