

<section id="reservation">
    <div class="container">
        <div class="row icons-all">
            <div class="icon">
                <div class="icon_items"><img class="signs"
                        src="{{ asset('Front/assets/images/Reservation/sign3.png') }}" alt="">
                    <img class="signs_back"
                        src="{{ asset('Front/assets/images/Reservation/Ellipse3.png') }}"
                        alt=""></div>
            </div>
            <h2 class="headings">Reservation</h2>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 col-xs-12 form form_left">
                <input type="text" id="fullname" name="fullname" placeholder="Name and Surname">
                <input type="text" id="phone" name="phone" placeholder="Phone Number">
                <input type="text" onfocus="(this.type='date')" id="reserved" name="reserved" name="firstname" placeholder="Choose Date">


            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12 form">
                <input type="text" id="event" name="event" placeholder="Event">
                <textarea id="content" name="content" placeholder="Message" style="height:150px"></textarea>
                <button id="submit" class="reservation" type="submit"> Send Request</button>

            </div>
        </div>
    </div>




    <script>
        $('.reservation').click(e=>{
            e.preventDefault();
           var event = $('#event').val();
           var fullname = $('#fullname').val();
           var phone = $('#phone').val();
           var reserved = $('#reserved').val();
           var content = $('#content').val();

            console.log(event + " "+ fullname+" "+phone+" "+ " "+content);

            $.ajax({
                type:'POST',
                url: "{{ url('reserv')}}",
                data: {
                    'event':event,
                    'fullname':fullname,
                    'phone':phone,
                    'reserved':reserved,
                    'content':content,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    //console.log(data.error);
                if(typeof  data.success != "undefined" ){
                    toastr.success(data.success);
                    $('#event').val('');
                    $('#fullname').val('');
                    $('#phone').val('');
                    $('#reserved').val('');
                    $('#content').val(' ');
                }else{
                    toastr.error(data.error);
                }

                },

                });

        });
    </script>
</section>
