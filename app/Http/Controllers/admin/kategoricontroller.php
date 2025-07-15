<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Kategori;
use App\Http\Controllers\Controller;


class kategoriController extends Controller
{
    public function create (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'kategori_id' => $id,
        'kategori_nama' => $request->input('kategori_nama'),
    ];
  
    kategori::createKategori($data);

    return redirect()->route('kategori')->with('success', 'Data kategori berhasil ditambahkan!');
}

    public function index() 
    {
        $kategoris = kategori::all();

        return view('admin.admin_kategori', [
            'level' => 'admin',
            'kategoris' => $kategoris
        ]);
    }
    public function update (Request $request, $id)
    {
        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request->input('kategori_nama'),
        ];

        kategori::updatekategori($id, $data);

        return redirect()->route('kategori')->with('updated', 'Data kategori berhasil diupdate!');
    }
    public function delete ($id)
        {
            kategori::deletekategori($id);

            return redirect()->route('kategori')->with('deleted', 'Data kategori berhasil dihapus!');
        }
}

