<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:them chuc vu', ['only' => ['create', 'store']]);
        $this->middleware('permission:sua chuc vu', ['only' => ['update', 'show']]);
        $this->middleware('permission:xoa chuc vu', ['only' => ['destroy']]);
    }
    //
    public function index()
    {
        $dataRole = Cache::remember('datarole', 60, function () {
            return Role::all();
        });

        $dataPermission = Permission::all();
        return view('roles.index', compact('dataRole', 'dataPermission'));
    }
    public function destroy($id, Request $request)
    {
        Role::find($id)->delete();
        Cache::forget('datarole');
        return redirect()->route('roles.index');
    }
    public function store(Request $request)
    {
        $vadidate = $request->validate([
            'name' => 'required|unique:roles,name'
        ]);
        $role = Role::create($vadidate);
        $role->permission()->sync($request->permissions);
        Cache::forget('datarole');
        return redirect()->route('roles.index');
    }
    public function show(Role $role, Request $request)
    {
        $dataPermission = Permission::all();
        $role_permission = $role->permission()->pluck('id')->toArray();
        return view('roles.edit', compact('role', 'dataPermission', 'role_permission'));
    }
    public function update(Request $request, Role $role)
    {
        $vadidate = $request->validate([
            'name' => 'required'
        ]);
        $role->update($vadidate);
        $role->permission()->sync($request->permissions);
        Cache::forget('datarole');
        return redirect()->route('roles.index');
    }
}
