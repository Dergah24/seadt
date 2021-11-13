@extends('Back.layout.master')
@section('title', 'Admin Panel-Tarixlərimiz')
@section('breadcrumb', 'İstifadəçi Tənzimləmələri / '. $user->name)
@section('content')
   
    <div>
        <div class="block mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-success w-100">Back to list</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("ID")}}

                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                    {{ $user->id }}
                                </td>
                            </tr>
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Name")}}
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                    {{ $user->name }}
                                </td>
                            </tr>
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Email")}}
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                    {{ $user->email }}
                                </td>
                            </tr>
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Email Verified At")}}
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                    {{ $user->email_verified_at }}
                                </td>
                            </tr>
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__("Roles")}}
                                </th>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                    @foreach ($user->roles as $role)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $role->title }}
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
