<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function store()
    {
        \request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => Str::ucfirst(\request('name')),
            'slug' => Str::of(Str::lower(\request('name')))->slug('-')
        ]);

        session()->flash('create-message', 'New Role has been CREATED Successfully!');
        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role)
    {
        \request()->validate([
            'name' => ['required'],
        ]);

        $role->name = Str::ucfirst(\request('name'));
        $role->slug = Str::of(Str::lower(\request('name')))->slug('-');

        if($role->isDirty('name')) {
            session()->flash('update-message', \request('name') . ' : Role has been UPDATED Successfully!');
            $role->save();
        } else {
            session()->flash('update-message', 'Nothing has been UPDATED!');
            return back();
        }

        return redirect()->route('roles.index');
    }

    public function permissionAttach(Role $role)
    {
        $role->permissions()->attach(\request('role'));
        session()->flash('permission-attach', 'Permission has been ATTACHED Successfully!');
        return back();
    }

    public function permissionDetach(Role $role)
    {
        $role->permissions()->detach(\request('role'));
        session()->flash('permission-detach', 'Permission has been DETACHED Successfully!');
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('delete-message', $role->name . ' : Role has been DELETED Successfully!');
        return back();
    }
}
