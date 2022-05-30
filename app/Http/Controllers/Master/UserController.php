<?php

namespace App\Http\Controllers\Master;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('master data');
        $users = User::all();

        return view('master.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('master.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active ? 1 : 0,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(User $brand)
    {
        return view('', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('master.users.create', compact('user', 'roles'));
    }

    public function password_reset($id)
    {
        $user = USer::find($id);
        return view('master.users.password_reset', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'role_id' => 'required',
        ]);

        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active ? 1 : 0,
        ]);

        return redirect()->route('users.index');
    }

    public function password_reset_update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find($id);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
