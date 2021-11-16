<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', ['title' => 'Trang quản trị hệ thống']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(
            [
                'email' => $email,
                'password' => $password,
                'active' => 1
            ],
            $remember
        )) {
            $admins = Auth::user();
            Session::put('admin_firstname', $admins->firstname);
            Session::put('admin_lastname', $admins->lastname);
            Session::put('admin_phone', $admins->phone);
            Session::put('admin_birthday', $admins->birthday);
            Session::put('admin_email', $admins->email);
            Session::put('admin_address', $admins->address);
            Session::put('admin_avatar', $admins->avatar);
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc mật khẩu không đúng');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/user/login');
    }
}
