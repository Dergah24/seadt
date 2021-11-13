@extends('Back.layout.master')
@section('title', 'Admin Panel-Kateqoriyalar')
@section('breadcrumb', __('Contacts'))
@section('content')
    <div class="card ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <table class="table table-bordered ">
                            <tr>
                                <td>{{ __('No') }}</td>
                                <td>{{ __('Fullname') }}</td>
                                <td>{{ __('Event') }}</td>
                                <td>{{ __('Date') }}</td>
                                <td>{{ __('Phone') }}</td>
                                <td>{{ __('Content') }}</td>
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
                                    <td>{{ $row->fullname }}
                                    </td>
                                    <td>{{ $row->event }}
                                    <td>{{ $row->reserved }}
                                    </td>
                                    <td>{{ $row->phone }}
                                    </td>
                                    <td>{{ $row->content }}
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
