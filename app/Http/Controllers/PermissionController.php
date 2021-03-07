<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function store()
    {
        \request()->validate([
            'name' => ['required'],
        ]);

        Permission::create([
            'name' => Str::ucfirst(\request('name')),
            'slug' => Str::of(Str::lower(\request('name')))->slug('-')
        ]);

        session()->flash('create-message', 'New Permission has been CREATED Successfully!');
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', [
           'permission' => $permission
        ]);
    }

    public function update(Permission $permission)
    {
        \request()->validate([
            'name' => ['required'],
        ]);

        $permission->name = Str::ucfirst(\request('name'));
        $permission->slug = Str::of(Str::lower(\request('name')))->slug('-');

        if($permission->isDirty('name')) {
            session()->flash('update-message', \request('name') . ' : Permission has been UPDATED Successfully!');
            $permission->save();
        } else {
            session()->flash('update-message', 'Nothing has been UPDATED!');
            return back();
        }

        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('delete-message', $permission->name . ' : Permission has been DELETED Successfully!');
        return back();
    }
}
