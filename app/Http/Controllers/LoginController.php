<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login()
    {
        //beda redirect dan view adalah, bahwa redirect mengarahkan user ke url lain (dinamis), dalam artian 
        //ketika user beralih ke url lain, maka secara otomatis controller dan route juga beralih dan fungsinya
        //juga beralih dan berjalan.
        //Sedangkan view adalah hanya mengarahkan ke blade templating dari sebuah halaman (statis).

        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        //sintaks dibawah menjelaskan, bahwa string kueri yang dikirim dari form login di login.blade.php
        //ditampung kedalam sebuah variabel $request, lalu dengan fungsi->input, maka laravel akan mencari
        //dan mengambil kueri tersebut sesuai key nya lalu di tampung kedalam variabel $data, fungsi->input
        //juga mempunyai kelebihan dalam menangani "nested data" atau data array array dan a

        $data = $request->validate([
            'email' => 'email:dns',
            'password' => 'required|min:5|max:12'
        ]);

        // $data = ['email' => $request->input('email'), 'password' => $request->input('password')];

        if (Auth::Attempt($data)) {

            // $request->session()->regenerate();
            // return redirect()->intended('home');
            return redirect('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }

        // return back()->with('LoginError');
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
