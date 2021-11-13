
    <!-- FOOTER -->


    <section id="footer">
        <div class="container-fluid d-flex flex-column">
            <div class="row footer-all">
                <div class="col-lg-3 col-sm-6 footer-logo">
                    <div class="footer-logo-inside">
                        <img src="{{ asset('Front/assets/images/logos/RQS-Symbol-White.png')}}" alt="">
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-text">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia expedita quae laudantium
                            delectus velit, quasi quam?</p>
                    </div>
                    <div class="social-media">
                        <a href="{{ $settings->facebook }}"><img src="{{ asset('Front/assets/images/icons/facebookb.png')}}" alt=""></a>
                        <a href="{{ $settings->twitter }}"><img src="{{ asset('Front/assets/images/icons/twitterb.png')}}" alt=""></a>
                        <a href="{{ $settings->youtube }}"><img src="{{ asset('Front/assets/images/icons/youtubeb.png')}}" alt=""></a>
                        <a href="{{ $settings->instagram }}"><img src="{{ asset('Front/assets/images/icons/instagramb.png')}}" alt=""></a>


                    </div>
                </div>

                <div class="col-lg-5 col-sm-12 row d-flex flex-column footer-col-3">

                    <form id="subscribes">
                        <input type="text" id="subscribe" name="firstname" placeholder="Email Address" required>
                        {{-- <input  type="submit" value="Subscribe"> --}}
                        <button class="subscribe-btn" id="submit-subscribe" type="button"  >Submit</button>


                    </form>
                    <div class="text-center contact-index row">
                        <div class="col-lg-4 col-sm-6 col-xs-12">Phone:<br> <a
                                href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></div>
                        <div class="col-lg-4 col-sm-6 col-xs-12">Email:<br><a
                                href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                        </div>


                    </div>


                </div>

            </div>
            <div style="background: url({{ asset('Front/assets/images/Reservation/footer_pattern.png')}});" class="pattern row">

            </div>

        </div>



    </section>

    <!-- FOOTER  BITTI-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>


<script>


  var box  = $("#burgercheck");
  if (box.checked) {
      alert("asdas");
    $('#burger').prop('dis[lay', 'fixed');
  } else {
   // $('#burger').prop('disabled', true);
  }


    $('.subscribe-btn').click(e=>{
        e.preventDefault();
       var email = $('#subscribe').val();



    $.ajax({
        type:'POST',
        url: "{{ url('addnewsletter')}}",
        data: {
            'email':email,
            "_token": "{{ csrf_token() }}",
        },
        success: function(data){
            //console.log(data.error);
           if(typeof  data.success != "undefined" ){
            toastr.success(data.success);
           }else{
            toastr.error(data.error);
           }

        },

        });

    });
</script>







    <script src="{{ asset('Front/assets/js/bootstrap/bootstrap.bundle.min.js.map')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script> -->
    <script src="{{ asset('Front/assets/flickity-docs/flickity.pkgd.min.js')}}"></script>
    <script src="{{ asset('Front/assets/js/main.js')}}"></script>
</body>
@jquery
@toastr_js
@toastr_render
</html>
