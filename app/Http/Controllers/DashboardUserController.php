<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    public function index(){
        return view('dashboard.users.index',[
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.users.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' =>'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'is_admin' => 'required|max:255'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/dashboard/users')->with('success', 'New User Has Been Added!');
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            // 'username' =>'required|min:3|max:255|unique:users',
            // 'email' => 'required|email:dns|unique:users',
            // 'password' => 'required|min:5|max:255',
            'is_admin' => 'required|max:255'
        ];

        if ($request->username != $user->username){
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }
        if ($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }

        // $validatedData['id'] = auth()->user()->id;
        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
        ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'User Has Been Updated!');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User Has Been Deleted!');
    }
}
