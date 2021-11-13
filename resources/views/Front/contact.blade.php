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






    <!-- contact -->

    <section>
        <div class="container">
            <div class="row contact-row">
                <div class="icon">
                    <div class="icon_items"><img class="signs signcontact" src="{{ asset('Front/assets/images/Reservation/sign3.png') }}"
                            alt="">
                        <img class="signs_back signcontact" src="{{ asset('Front/assets/images/Reservation/Ellipse3.png') }}" alt=""></div>
                </div>
                <h2 class="headings">Contact</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form  class="contact-form">
                        <input id="fullname" name="fullname" type="text" placeholder="Name and Surname">
                        <input id="email" name="email" type="email" placeholder="Email">
                        <input id="phone" name="phone" type="text" placeholder="Phone">

                        <textarea name="content" id="content" cols="20" rows="4" placeholder="Message"></textarea>
                        <button id="contact_submit" type="button" > Send</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="text-center contact-address">
                        <h5>Ünvan:</h5>
                        <span>{{ $settings->adress }}</span>
                        <h5>Şəhər Nömrəsi:</h5>
                        <span>{{ $settings->telefon }}</span>
                        <h5>Mobil və Whatsapp üçün:</h5>
                        <span>{{ $settings->phone }}</span>
                        <h5>E-poçt:</h5>
                        <span>{{ $settings->email }}</span>
                    </div>
                </div>
                <div class="row location">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2262.8760555726963!2d49.83225360000002!3d40.36949330000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307db7ce326ad7%3A0x485821808feb2fe5!2sSaadet%20Sarayi!5e0!3m2!1str!2s!4v1635247314977!5m2!1str!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

            </div>

        </div>

    </section>
    <!-- contact bitti -->



    <script>
        $('#contact_submit').click(e=>{
            e.preventDefault();
           var email = $('#email').val();
           var fullname = $('#fullname').val();
           var phone = $('#phone').val();
           var content = $('#content').val();

            console.log(email + " "+ fullname+" "+phone+" "+ " "+content);

            $.ajax({
                type:'POST',
                url: "{{ url('addconnact')}}",
                data: {
                    'email':email,
                    'fullname':fullname,
                    'phone':phone,
                    'content':content,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    //console.log(data.error);
                if(typeof  data.success != "undefined" ){
                    toastr.success(data.success);
                    $('#email').val('');
                    $('#fullname').val('');
                    $('#phone').val('');
                    $('#content').val(' ');
                }else{
                    toastr.error(data.error);
                }

                },

                });

        });
    </script>

@endsection
