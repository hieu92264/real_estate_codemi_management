<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('permission:Xem thông tin tài khoản', ['only' => ['index']]);
        $this->middleware('permission:Thêm tài khoản', ['only' => ['create', 'store']]);
        $this->middleware('permission:Sửa tài khoản', ['only' => ['update', 'show']]);
        $this->middleware('permission:Xóa tài khoản', ['only' => ['destroy']]);
    }
    public function index()
    {
        $dataUser = User::paginate(10);

        return view("user.index", compact('dataUser'));
    }
    public function create()
    {
        $role = Role::all();
        return view("user.create", compact('role'));
    }
    public function store(Request $request)
    {
        $vadidate = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $vadidate['name'],
            'email' => $vadidate['email'],
            'password' => Hash::make($vadidate['password'])
        ]);
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index')->with('success', 'Bạn đã thêm mới 1 tài khoản thành công');
    }
    public function destroy(User $user)
    {
        if (auth()->id() !== $user->id) {
            $user->delete();
        }
        return redirect()->route('users.index')->with('success', 'Bạn đã xóa thành công 1 tài khoản');
    }
    public function edit(User $user, Request $request)
    {
        $role = Role::all();
        $user_roles = $user->roles()->pluck('id')->toArray();
        return view('user.update', compact('user', 'role', 'user_roles'));
    }


    public function update(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',

        ]);


        if (auth()->id() !== $user->id && $request->has('roles')) {
            $user->roles()->sync($request->roles);
        } elseif (auth()->id() !== $user->id && !$request->has('roles')) {
            $user->roles()->detach();
        }

        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'Bạn đã sửa thành công 1 tài khoản');
    }
    public function search(Request $request)
    {
        $dataUser = User::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->paginate(5);
        return view('user.index', compact('dataUser'));
    }
}
