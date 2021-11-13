@extends("Back.layout.master")
@section('title', 'Admin Panel-Tarixlərimiz')
@section('breadcrumb', __('Users'))
@section('content')

    <div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', '') }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password" class="form-control" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="roles">{{ __('Roles') }}</label>
                            <select name="roles[]" id="roles" class="form-control">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-success mt-3 w-100">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
