<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $checkUser = User::where('email', $request->email)
            ->get()->first();
        if (!empty($checkUser)) {
            if (Hash::check($request->password, $checkUser->password)) {
                $request->session()->put('auth_user', $checkUser->toArray());
                return redirect('/');
            }
            else{
                return redirect()->back()->with('error', 'Password yang anda masukan salah.!');
            }
        }else{
            die("Username Tidak Terdaftar");
        }
        debugCode($checkUser);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('auth_user');
        return redirect('/');
    }
}
