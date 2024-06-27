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

        $this->middleware('permission:Thêm chức vụ', ['only' => ['create', 'store']]);
        $this->middleware('permission:Xem thông tin chức vụ', ['only' => ['index']]);
        $this->middleware('permission:Sửa chức vụ', ['only' => ['update', 'show']]);
        $this->middleware('permission:Xóa chức vụ', ['only' => ['destroy']]);
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
    public function store(Request $request)
    {
        $vadidate = $request->validate([
            'name' => 'required|unique:roles,name'
        ], [
            'name.required' => 'tên chức vụ không được để trống',
            'name.unique' => 'tên chức vụ không được trùng'
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
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $userRoleIds = auth()->user()->roles->pluck('id')->toArray();
        if (!in_array($role->id, $userRoleIds)) {
            Role::find($id)->delete();
            Cache::forget('datarole');
        }
        return redirect()->route('roles.index');
    }
    public function update(Request $request, Role $role)
    {
        $vadidate = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'tên chức vụ không được trống'
        ]);

        $role->update($vadidate);
        $userRoleIds = auth()->user()->roles->pluck('id')->toArray();
        if (!in_array($role->id, $userRoleIds)) {
            $role->permission()->sync($request->permissions);
        }
        Cache::forget('datarole');
        return redirect()->route('roles.index');
    }

}
