 @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div id="id200" class="id200 alert alert-danger">{{$error}}</div>
     @endforeach
 @endif

 <script> 
 
 setTimeout(function() {
    $('.id200').fadeOut('slow');
}, 5000); // <-- time in milliseconds
 
 </script>