<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Utils\FileProcess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // index
    public function login(Request $request)
    {
        if ($request->isMethod('GET')) {
            return Inertia::render('Auth/Login');
        } elseif ($request->isMethod('POST')) {

            $autentikasi = $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|min:6',
            ]);

            if (Auth::attempt($autentikasi)) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard')->with('message', 'Hallo Selamat Datang Kembali !');
            } else {
                return back()->with('message', 'Anda Harus Login !');
            }
        }
    }

    // loguut
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Kamu sekarang sudah logout !');
    }

    // edit profile
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|exists:users,email',
            'sandi' => 'nullable|confirmed|max:100',
            'sandi_confirmation' => 'nullable '
        ]);
        $user = User::find($id);
        $data = $request->all();
        // dd($data);

        $user->name = $data['name'];
        $user->email = $data['email'];
        if ($data['sandi'] != null) {
            $user->password = Hash::make($data['sandi']);
        }
        if ($request->file('profile')) {
            FileProcess::deleteFoto($user->profile, 'profile');
            $avatar = new FileProcess($request->file('profile'), Str::slug($data['name']), 'profile');
            $user->profile = $avatar->uploadFoto();
        }
        $user->update();
        return redirect()->back()->with('message', 'Berhasil Perbaharui Profile');
    }
}
