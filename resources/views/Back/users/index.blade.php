@extends("Back.layout.master")
@section('title', 'Admin Panel-Tarixlərimiz')
@section('content')
@section('breadcrumb', 'İstifadəçi Tənzimləmələri / İstifadəçilər')
@section('link',route("users.create"))

    
    <div class="card overflow-auto">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">
                                        {{__("ID")}}
                                    </th>
                                    <th scope="col">
                                        {{__("Name")}}
                                    </th>
                                    <th scope="col">
                                        {{__("Email")}}
                                    </th>
                                    <th scope="col">
                                        {{__("Roles")}}
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->id }}
                                        </td>

                                        <td>
                                            {{ $user->name }}
                                        </td>

                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ $role->title }}
                                                </span>
                                            @endforeach
                                        </td>

                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><i
                                                    class="far fa-eye"></i></a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success"><i
                                                    class="far fa-edit"></i></a>
                                            <form style="display: inline" action="{{ route('users.destroy', $user->id) }}"
                                                method="POST" onsubmit="return confirm('Əminsinizmi?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-danger" value="Sil">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
