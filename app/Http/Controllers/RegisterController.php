<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {

        return view('register');
    }

    public function actionregister(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}
