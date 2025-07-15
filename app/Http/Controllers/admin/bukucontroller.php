<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BukuRequest;
use App\Models\Admin\Buku;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class bukucontroller extends Controller
{
    public function create (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'buku_id' => $id,
        'buku_penulis_id' => $request->input('penulis_buku'),
        'buku_penerbit_id' => $request->input('penerbit_buku'),
        'buku_kategori_id' => $request->input('kategori_buku'),
        'buku_rak_id' => $request->input('rak_buku'),
        'buku_judul' => $request->input('judul_buku'),
        'buku_isbn' => $request->input('isbn'),
        'buku_thnpenerbit' => $request->input('tahun_terbit'),

    ]; 

    if($request->hasFile('buku_gmbr')){
        $path = $request->file('buku_gmbr')->store('images/buku','public');
        $path = Storage::url($path);
        $data['buku_gmbr']=$path;
    }  
  
    buku::createBuku($data);

    return redirect()->route('buku')->with('success', 'Data buku berhasil ditambahkan!');
}

    public function index() 
    {
        $bukus = Buku::all();

        return view('admin.admin_data_buku', [
            'level' => 'admin',
            'bukus' => $buku
        ]);
    }
    public function update (Request $request, $id)
    {
        $data = [
            'buku_id' => $id,
            'buku_penulis_id' => $request->input('penulis_buku'),
            'buku_penerbit_id' => $request->input('penerbit_buku'),
            'buku_kategori_id' => $request->input('kategori_buku'),
            'buku_rak_id' => $request->input('rak_buku'),
            'buku_judul' => $request->input('judul_buku'),
            'buku_isbn' => $request->input('isbn'),
            'buku_tnpenerbit' => $request->input('tahun_terbit'),
        ];

        if($request->hasFile('buku_gmbr')){
            $path = $request->file('buku_gmbr')->store('images/buku','public');
            $path = storage::url($path);
            $data['buku_gmbr']=$path;
        }

        buku::updateBuku($id, $data);

        return redirect()->route('buku')->with('success', 'Data buku berhasil diupdate!');

    }
    public function delete ($id)
        {
            buku::deleteBuku($id);

            return redirect()->route('buku')->with('success', 'Data buku berhasil dihapus!');
        }

        public function showBukuSiswa()
        {
            $bukus = Buku::with('penulis')->get(); // Mengambil buku beserta relasi penulis
            return view('siswa.siswa_buku', compact('bukus'));
        }



}
















