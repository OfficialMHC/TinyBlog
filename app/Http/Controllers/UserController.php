<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(User $user)
    {
        $inputs = \request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed'],
        ]);

        if (\request('avatar', )) {
            $inputs['avatar'] = \request('avatar')->store('images/user');
        }

        $user->update($inputs);

        session()->flash('update-message', 'User : ' . $user->username . ' has been UPDATED Successfully!');
        return back();

    }

    public function roleAttach(User $user)
    {
        $user->roles()->attach(\request('role'));
        session()->flash('role-attach', 'Role has been ATTACHED Successfully!');
        return back();
    }

    public function roleDetach(User $user)
    {
        $user->roles()->detach(\request('role'));
        session()->flash('role-detach', 'Role has been DETACHED Successfully!');
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('delete-message', 'User has been DELETED Successfully! Username Was : ' . $user->username);
        return back();
    }
}
