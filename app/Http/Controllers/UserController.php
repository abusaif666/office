<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('user.user_list',compact('users'));
    }


    public function create()
    {
        return view('user.add_user');
    }


    public function store(Request $request)
    {
        $userValidity = $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'role'     => 'required',
        ]);

        try {
            User::create([
                'name'     => ucwords($request->name),
                'email'    => strtolower($request->email),
                'password' => Hash::make($request->password),
                'role'     => $request->role,
            ]);

            return redirect()->route('user.list')->with('success','User added successfully');

        } catch (\Exception $e) {
            return redirect()->route('user.list')->with('error','User added failed');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $decId = Crypt::decrypt($id);
        $user = User::findorFail( $decId);
        return view('user.edit_user',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $userValidity = $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'role'     => 'required',
        ]);

        try {
            $decId = Crypt::decrypt($id);
            $user = User::findOrFail($decId);

            $updateData = [
                'name'     => ucwords($request->name),
                'email'    => strtolower($request->email),
                'role'     => $request->role,
            ];

            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            return redirect()->route('user.list')->with('success', 'User updated successfully');

        } catch (\Exception $e) {
            return redirect()->route('user.list')->with('error', 'User update failed');
        }
    }





    public function destroy($id)
    {
        try {
            $decId = Crypt::decrypt($id);
            $user = User::findorFail( $decId);
            $user->delete();
            return redirect()->route('user.list')->with('success','User delete successfully');
        } catch (\Exception $e) {
            return redirect()->route('user.list')->with('error','User delete failed');
        }
    }
}
