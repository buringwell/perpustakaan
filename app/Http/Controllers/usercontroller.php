<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;

class usercontroller extends Controller
{
    public function register (Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);
        $data = [
        'user_id' => $id,
        'user_nama' => $request->input('nama'),
        'user_alamat' => $request->input('alamat'),
        'user_username' => $request->input('username'),
        'user_email' => $request->input('email'),
        'user_notlp' => $request->input('no_telp'),
        'user_password' => bcrypt($request->input('password')),
        'user_level' => 'anggota'
        ];
        $user = User::register($data);
        if ($user) {
            return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil!');
        } else {
            return back()->withInput();
        }
    }
    public function login (Request $request)
    {
        $credentials = [
        'user_username' => $request->input('user_username'),
        'user_password' => $request->input('user_password')
        ];
        $user = User::where('user_username', $credentials['user_username'])->first();
        if ($user && Hash::check ($credentials['user_password'], $user->user_password))
        {
            Auth::login($user);
            if ($user->user_level == 'anggota'){
                return redirect()->route('siswaa');
            } else {return redirect()->route('adminn');};
        } else {
            return back()->withErrors([
            'message' => 'Username atau password Anda salah.',]);
        }
    }

    public function upload_profile(Request $request, $id)
    {
        if ($request->hasFile('storage/public/profile_pictures')) {
            $data = $request->file('storage/public/profile_pictures');
            User::upload_profile($id, $data);
            return redirect()->route('pengaturan_siswa')->with('success', 'Foto profil berhasil diperbarui!');
        }
        return back()->with('failed', 'Foto profil gagal diperbarui!');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/loginb');
    }
    
}
