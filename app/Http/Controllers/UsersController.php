<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function edit()
    {
        return view('users.editProfile')->with('user', auth()->user());
    }

    public function update(UpdateUserRequest $request){
        $user = auth()->user();

        if($request->password){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        session()->flash('success', 'User Updated Successfully.');
        return redirect(route('users.index'));

    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('success', 'admin privilege associated to this user successfully.');
        return redirect(route('users.index'));
    }
}
