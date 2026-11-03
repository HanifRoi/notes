<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'email'=> $data['email'],
            'password'=>Hash::make($data['password']),
            'name'=>$data['name']
        ]);

        Auth::login($user);

        return redirect()->route('note.index')->with('sukses', 'Berhasil membuat akun');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('note.index')->with('sukses', 'Berhasil login');
        }

        return back()->withErrors([
            'email'=> 'Email atau password salah'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('sukses', 'Berhasil logout');
    }
}

