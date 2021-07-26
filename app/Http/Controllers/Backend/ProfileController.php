<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::find(Auth::id());
        return view('backend.users.show_profile', compact('user'));
    }

    public function edit()
    {
        $user = User::find(Auth::id());
        return view('backend.users.edit_profile', compact('user'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|email',
            'image' => 'mimes:jpeg,png|max:1024',
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;


        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                if (!empty($user->image)) {

                    unlink(public_path('upload/avatar/' . $user->image));
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('upload/avatar'), $imageName);
                $user->image = $imageName;
            }
        }
        $user->save();
        $notify = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('profile.show')->with($notify);
    }

    public function password()
    {

        $user = User::find(Auth::id());

        return view('backend.users.edit_password');
    }

    public function updatePassword(Request $request)
    {

        $validated =  $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $current_password = Auth::user()->password;

        if (Hash::check($request->oldpassword, $current_password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            // Auth::logout();
            $notify = [
                'message' => 'Password changed successfully. Kindly Login with the new Password!',
                'alert-type' => 'success'
            ];
            return redirect()->route('login')->with($notify);
        } else {
            $notify = [
                'message' => 'You have entered wrong Current Password. Try Again!',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notify);
        }
    }
}
