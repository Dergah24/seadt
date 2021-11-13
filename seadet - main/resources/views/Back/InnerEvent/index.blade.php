@extends("Back.layout.master")
@section('breadcrumb',__('Event slider')  )
@section('title',__('Seadet sarayı Admin panel'))

@section('content')
   <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-6 col-md-6">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <form action="{{ route('get_event') }}" method="POST" id="event_change">
                                @csrf
                                <select class="form-control" name="event_id" id="events">
                                    <option value="">{{ __('Choose') }}</option>
                                    @foreach ($events as $item)
                                        <option @if (session('event_id') == $item->id) {{ 'selected' }} @endif value="{{ $item->id }}">
                                            {{ $item->{'title_' . app()->getLocale()} }} </option>

                                    @endforeach
                                </select>
                                <input type="submit" name="submit" id="submit" style="display: none" value="Submit">
                            </form>
                        </div>
                         @can('editor_access')
                            <div class="col-lg-4 col-md-4 text-center">
                                <div class="button-items add_file ">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light add-file-2"
                                        data-toggle="modal" data-target="#exampleModal">{{ __('Add') }}</button>
                                </div>
                            </div>
                         @endcan
                    </div>
                </div>
            </div>

            <span class="text-danger">{{ $errors->first('event_id') }}</span>
            <span class="text-danger">{{ $errors->first('fileToUpload') }}</span>


        </div>
    </div>
    <!-- hall content -->
    <div class="row" id="hall_content">
        <div class="col-md-12 text-center alert alert-danger" role="alert">
            {{ __('Kateqoriya secin') }}
        </div>
    </div>
    <script>
        $(document).ready(function() {
            call();
        });
        $('#events').on('change', function(e) {
            e.preventDefault();
            call();
            return false;
        });

        function call() {
            var url = "{{ route('get_event') }}";
            $.ajax({
                type: "post",
                url: url,
                data: $("#event_change").serialize(),
                cache: false,
                beforeSend: function() {
                    $("#hall_content").html(
                        '<div class="col-md-12 text-center"><div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
                    );
                },
                success: function(data) {
                    let html = '';
                    let str = '';
                    data.forEach(elem => {
                        color = elem['status'] == 0 ? 'red' : 'green';
                        status = elem['status'] == 0 ? '1' : '0';
                        var img =
                            '<img alt="Photos for halls " class="card-img-top photo_events" src="{{ asset('') }}'
                             + elem['photo'] + '">';
                        str = '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="tr-' + elem['id'] +
                            '">' +
                            '<div class="card events_basic">' +
                            '<div class="card-body">' +
                            '<div class="events_icon">';

                            str+='<i class="far fa-circle rounded-circle fa-2x " style="background:' + color +
                                                        ';" onclick="set_status_hall(' + elem['id'] + ',this)" status="' + status +
                                                        '"></i>' +
                            '<i class="fas fa-edit fa-2x" style="left:50%;position: absolute;" onclick="edit_hall(' + elem['id'] +
                                                        ')" data-toggle="modal" data-target="#exampleModalCenter"></i>' +
                            '<i class="fas fa-times-circle fa-2x float-right red" onclick="delete_hall(' + elem['id'] +
                                                        ')"></i>';

                        str += '</div>' +
                            img +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        html = html + str;
                        console.log(elem['id'])
                    });
                    if (data == '') {
                        html = '<div class="col-md-12 text-center alert alert-danger" role="alert">' +
                            'Heç bir məlumat tapılmadı!' +
                            '</div>';
                    }
                    $("#hall_content").hide();
                    $('#hall_content').html(html);
                    $("#hall_content").show('slow');
                }
            });
        }

        function set_status_hall(id, e) {
            let url = "{{ route('set_status_hall') }}";
            let status = $(e).attr('status');
            $.ajax({
                type: "post",
                url: url,
                data: {
                    'id': id,
                    "_token": "{{ csrf_token() }}",
                    'status': status
                },
                cache: false,
                success: function(data) {
                    // $('#tr-'+id).hide();
                    if (data == 1) {
                        $(e).attr('style', 'background:green');
                        $(e).attr('status', '0');
                    } else {
                        $(e).attr('status', '1');
                        $(e).attr('style', 'background:red');

                    }
                }
            })
        }

        function edit_evvent(id) {
            let url = "{{ route('edit_event') }}";
            $.ajax({
                type: "post",
                url: url,
                data: {
                    'id': id,
                    "_token": "{{ csrf_token() }}",
                },
                cache: false,
                success: function(data) {
                    console.log(data);
                    var img = '{{ asset("") }}' +  data['0']['photo'];
                    $('#id').val(data['0']['id']);
                    $('#img').attr('src', img);
                    $('#title_az').val(data['0']['title_az']);
                    $('#content_az').val(data['0']['content_az']);
                    $('#title_en').val(data['0']['title_en']);
                    $('#content_en').val(data['0']['content_en']);
                    $('#title_ru').val(data['0']['title_ru']);
                    $('#content_ru').val(data['0']['content_ru']);
                    $("#hall_id option[value='" + data['0']['event_id'] + "']").attr("selected", "selected");
                }
            })
        }

        function delete_hall(id) {
            let url = "{{ route('delete_hall') }}";
            $.ajax({
                type: "post",
                url: url,
                data: {
                    'id': id,
                    "_token": "{{ csrf_token() }}",
                },
                cache: false,
                success: function() {
                    $('#tr-' + id).hide(400);
                }
            })
        }
        $( ).mouseover(function () {

        });
    </script>
    @include('Back.InnerEvent.edit')
    @include('Back.InnerEvent.add')
@endsection
