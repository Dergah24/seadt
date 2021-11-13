<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Middleware\AuthGates;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class UsersController extends Controller
{
   // use PasswordValidationRules;
    public function index()
    {
       // return Role::with('permissions')->get();
      
     abort_if(Gate::denies('viewer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with('roles')->get();

        return view('Back.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('Back.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('Back.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('Back.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->password = Hash::make($request['password']);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
      abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('users.index');
    }
}
