@extends('Back.layout.master')
@section('title', 'Admin Menta-Tags')
@section('breadcrumb', __('Tags') . ' | ' . __('Title') . ' | ' . __('Description'))
@section('content')


    <div class="card " style="overflow-x: auto">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <table class="table table-bordered ">
                            <tr>
                                <td>{{ __('Pages') }}</td>
                                <td>{{ __('Keywords') }}</td>
                                <td>{{ __('Title') }}</td>
                                <td>{{ __('Description') }}</td>
                            </tr>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($data as $row)
                                @php
                                    $i++;
                                @endphp
                                <tr id="tr-{{ $row->id }}">
                                    <td>
                                        <p>{{ $row->{'page_' . app()->getLocale()} }}</p>
                                    </td>
                                    <td><a class="update cursor-pointer" style="font-size:25px;" data-name="title"
                                            data-type="text" data-pk="{{ $row->id }}">{{ $row->title }}</a>
                                    </td>
                                    <td><a class="update cursor-pointer" style="font-size:25px;" data-name="description"
                                            data-type="text" data-pk="{{ $row->id }}">{{ $row->description }}</a>
                                    </td>
                                    <td><a class="update cursor-pointer" style="font-size:25px;" data-name="meta_tag"
                                            data-type="text" data-pk="{{ $row->id }}">{{ $row->meta_tag }}</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> --}}

    @can('editor_access')
       <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $('.update').editable({
                url: "{{ route('meta_update') }}",

            });

            // function delete_category(id) {
            //    $.ajax({
            //        type: "POST",
            //        url: "",
            //        data: {
            //            "id":id,
            //            "_token": "{{ csrf_token() }}",
            //        },
            //        success: function (response) {
            //            $("#tr-"+id).hide(200);
            //        }
            //    });
            // }
        </script>
    @endcan
    <style>
        .glyphicon-ok::before {
            content: "\f00c";
        }

        .glyphicon-remove::before {
            content: "\f00d";
        }

        .glyphicon {
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-style: normal;
        }

    </style>
@endsection
