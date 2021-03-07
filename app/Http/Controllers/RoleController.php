<?php

namespace App\Http\Controllers;

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
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Role $role)
    {
        $role->name = Str::ucfirst(\request('name'));
        $role->slug = Str::of(\request('name'))->slug('-');

        if($role->isDirty('name')) {
            session()->flash('update-message', \request('name') . ' : Role has been UPDATED Successfully!');
            $role->save();
        } else {
            session()->flash('update-message', 'Nothing has been UPDATED');
        }

        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('delete-message', $role->name . ' : Role has been DELETED Successfully!');
        return back();
    }
}
