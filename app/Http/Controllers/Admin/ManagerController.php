<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Session;

class ManagerController extends Controller
{
    public function loginView()
    {
        Auth::guard('admin')->logout();
        return view('admin.loginView');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.loginView');
    }

    public function userCreateView()
    {
        return view('admin.userCreateView');
    }

    public function userCreate(Request $request)
    {
        $data = new Admin;

        $email = $request->input('txtEmail', '');
        $password = $request->input('txtPassword', '');
        $name = $request->input('txtName', '');

        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Password must be at least 6 characters');
        }
        $findEmail = Admin::where('email', $email)->first();
        if ($findEmail) {
            return redirect()->back()->with('error', 'Email already exists');
        }

        $data->name = $name;
        $data->email = $email;
        $data->password = Hash::make($password);
        $data->photo = NULL;
        $data->phone = '123456789';
        $data->address = 'Dhaka';
        $data->dob = date('Y-m-d');
        $data->departmentId = 1;
        $data->status = 0;
        $data->role = 0;
        $data->save();
        return redirect()->back()->with('success', 'User created successfully');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'txtEmail' => 'required|email',
            'txtPassword' => 'required',
        ]);

        $creadential = [
            'email' => $request->input('txtEmail'),
            'password' => $request->input('txtPassword')
        ];
        if(Auth::guard('admin')->attempt($creadential)){
            $userId = Auth::guard('admin')->id();
            $username = Auth::guard('admin')->user()->name;
            return redirect()->route('dashboard-view');
        } else {
            Session::flash('error','Invalid user mail & password. Please try again!');
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
}
