@extends('Back.layout.master')
@section('title', 'Admin Panel-Logs')
@section('breadcrumb', __('Logs') )
@section('content')
    <div class="card ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <table class="table table-bordered ">
                            <tr>
                                <td>{{ __('No') }}</td>
                                <td>{{ __('Content') }}</td>
                                <td>{{ __('User') }}</td>
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
                                    <td>{{ $row->content }} {{ $row->types->{'title_' . app()->getLocale()} }}</a>
                                    </td>
                                    <td>{{ $row->user->name }}</a>
                                    </td>
                                    <td>{{ $row->created_at }}</a>
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
