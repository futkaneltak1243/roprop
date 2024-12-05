<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showAdminForm()

    {
        $message = session('message');
        return view('control.add_admin', compact('message'));
    }

    public function newAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->route('admins')->with('message', 'User saved successfully!');
        }

        return redirect()->route('admins')->with('message', 'Failed to save user!');
    }

    public function showAdminsPage()
    {
        $admins = User::all();
        return view('control.admins', compact('admins'));
    }

    public function deleteAdmin(Request $request)
    {
        $admin = User::find($request->id);
        $admin->delete();
        return redirect()->route('admins');
    }
}
