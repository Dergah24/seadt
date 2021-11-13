@extends('Back.layout.master')
@section('title', 'Admin Panel-Tarixlərimiz')
@section('content')
@section('breadcrumb', 'İstifadəçi Tənzimləmələri / Düzəliş et')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="block font-medium text-sm text-gray-700">{{__("Name")}}</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $user->name) }}" />
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="block font-medium text-sm text-gray-700">{{__("Email")}}</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $user->email) }}" />
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="block font-medium text-sm text-gray-700">{{__("Password")}}</label>
                        <input type="password" name="password" id="password" class="form-control" />
                        @error('password')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="roles">{{__("Roles")}}</label>
                        <select name="roles[]" id="roles" class="form-control" multiple>
                            @foreach ($roles as $id => $role)
                                <option value="{{ $id }}"
                                    {{ in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? ' selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                        @error('roles')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 ">
                        <a href="{{ route('users.index') }}" class="btn btn-warning w-100 mt-3">{{__("Back to list")}}</a>
                    </div>
                    <div class="col-md-6 ">
                        <button class="w-100 btn btn-success mt-3">
                            {{__("Edit")}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
