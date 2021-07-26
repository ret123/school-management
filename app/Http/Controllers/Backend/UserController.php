<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required'


        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
        $notify = [
            'message' => 'User Created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('users.all')->with($notify);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
        $notify = [
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('users.all')->with($notify);
    }

    public function delete($id)
    {

        $user = User::find($id);
        $user->delete();

        $notify = [
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notify);
    }
}
