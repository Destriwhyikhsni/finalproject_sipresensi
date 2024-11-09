<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginBackend()
    {
       return view('auth.login', [
          'judul' => 'Login',
       ]);
    }
 
    public function authenticateBackend(Request $request)
    {
       $credentials = $request->validate([
             'email' => 'required|email',
             'password' => 'required'
          ]);
       if (Auth::attempt($credentials)) {
          if (Auth::user()->status == 0) {
             Auth::logout();
             return back()->with('error', 'User belum aktif');
          }
          $request->session()->regenerate();
          return redirect()->intended(route('beranda'))->with('success', 'Login ke sistem berhasil');;
       }
 
       return back()->with('error', 'Login Gagal');
    }
 
 
    public function registerUser(Request $request)
    {
       $validasi = $request->validate([
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'password' => 'required|min:6',
       ]);
 
       $user = User::create([
          'name' => $validasi['name'],
          'email' => $validasi['email'],
          'password' => bcrypt($validasi['password']),
          'role' => '1',
          'status' => 1,
          'created_at' => now()
       ]);
 
       return redirect()->route('auth.login')->with('success', 'Registrasi berhasil, Silahkan Login');
    }
 
    public function logoutBackend()
    {
       Auth::logout();
       request()->session()->invalidate();
       request()->session()->regenerateToken();
       return redirect(route('auth.login'));
    }
 }
