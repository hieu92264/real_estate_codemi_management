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
        $this->middleware('permission:them tai khoan', ['only' => ['create', 'store']]);
        $this->middleware('permission:sua tai khoan', ['only' => ['update', 'show']]);
        $this->middleware('permission:xoa tai khoan', ['only' => ['destroy']]);
    }
    public function index()
    {
        $dataUser = User::paginate(5);

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
        return redirect()->route('users.index');
    }

}
