<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenAuthController extends Controller
{
    //

    public function index()
    {
        //
        return view('dosen.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 2) {
                return redirect()->to(route('dosen.dashboard.index'))->with('success', 'login berhasil !, Selamat datang ' . Auth::user()->name);
            } else if (Auth::user()->role == 'staff') {
                return redirect()->to(route('dosen.dashboard.index'))->with('success', 'login berhasil !, Selamat datang ' . Auth::user()->name);
            }
        } else {
            return redirect('login')->with('error', 'email atau password yang anda masukan salah')->withInput();
        }
        // $request->validate(
        //     [
        //         'username' => 'required',
        //         'password' => 'required',
        //     ],
        //     [
        //         'username.required' => 'username tidak boleh kosong !',
        //         'password.required' => 'password tidak boleh kosong !',
        //     ]
        // );

        // $infoLogin = [
        //     'username' => $request->username,
        //     'password' => $request->password
        // ];

        // if (Auth::attempt($request->only('username', 'password'))) {
        //     $request->session()->regenerate();
        //     $user = Auth::user();
        //     if ($user) {

        //         $user = User::find($user->id);
        //         $hasDosen = $user->groups->first()->name;
        //         if ($hasDosen == 'Dosen') {
        //             return redirect()->intended('dashboard');
        //         }
        //     }
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('dosen.login'));
    }
}
