<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BukuRequest;
use App\Models\Admin\peminjaman;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;




class peminjamancontroller extends Controller
{
    public function index() 
    {
        
        $peminjamans = Peminjaman::all() -> with(['buku']);
    
        return view('admin.admin_data_peminjaman', [
            'level' => 'admin',
            'peminjamans' => $peminjamans
            
        ]);
    }

    public function siswa_pnjam_data()
    {
        // Ambil ID siswa yang sedang login
        
        $users = Auth::id();
        
    
        if (!$users) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }
    
        // Ambil data peminjaman berdasarkan siswa yang login
        $peminjamen = Peminjaman::with(['buku', 'user'])
            ->where('peminjaman_user_id', $users)  // Sesuaikan nama kolom
            ->get();
    
        // Debug the results
        Log::debug($peminjamen);
    
        // Check if data exists
        if ($peminjamen->isEmpty()) {
            return view('siswa.siswa_data_peminjaman', ['level' => 'siswa', 'peminjamen' => [], 'message' => 'No borrowing data found.']);
        }
    
        return view('siswa.siswa_data_peminjaman',['level'=>'siswa'], compact('peminjamen')); 
    }
    

    public function create (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'peminjaman_id' => $id,
        'peminjaman_user_id' => Auth::user()->user_id,
        'peminjaman_tglpinjam' => $request->input('tgl_pinjam'),
        'peminjaman_tglkembali' => $request->input('tgl_kembali'),
        
    ];
    $pebu = peminjaman ::create ($data);
    $pebu -> buku()->sync($request->input("buku")); 
    $users = Auth::user();
    // peminjaman::createpeminjaman($data);

    return redirect()->route('create_peminjaman')->with('success', 'Data buku berhasil ditambahkan!');
}

    public function update (Request $request, $id)
    {
        // dd( $request->input('peminjaman_note1'));
        $data = [
            'peminjaman_id' => $id,
            'peminjaman_denda' => $request->input('pemnjaman_denda'),
            'peminjaman_note' => $request->input('peminjaman_note1'),
            'peminjaman_statuskembali' => $request->input('status_kembali'),
        ];

        peminjaman::updatepeminjaman($id, $data);

        return redirect()->route('peminjaman')->with('success', 'Data peminjaman berhasil diupdate!');

    }
    public function delete ($id)
        {
            peminjaman::deletepeminjaman($id);

            return redirect()->route('peminjaman')->with('success', 'Data peminjaman berhasil dihapus!');
        }
}
















