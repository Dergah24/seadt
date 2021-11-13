@extends('Back.layout.master')
@section('title', 'Admin Panel-Kateqoriyalar')
@section('breadcrumb', __('Newsletter'))
@section('content')
    <div class="card ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <table class="table table-bordered ">
                            <tr>
                                <td>{{ __('No') }}</td>
                                <td>{{ __('Email') }}</td>
                                <td>{{ __('Created') }}</td>
                            </tr>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($response as $row)
                                @php
                                    $i++;
                                @endphp
                                <tr id="tr-{{ $row->id }}">
                                    <td>{{ $i }}</a>
                                    </td>
                                    <td>{{ $row->email }}
                                    </td>
                                    <td>{{ $row->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
