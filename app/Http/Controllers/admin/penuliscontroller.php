<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Penulis;
use App\Http\Controllers\Controller;


class PenulisController extends Controller
{
    public function create (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'penulis_id' => $id,
        'penulis_nama' => $request->input('penulis_nama'),
        'penulis_tmplahir' => $request->input('penulis_tmplahir'),
        'penulis_tgllahir' => $request->input('penulis_tgllahir'),
    ];
  
    penulis::createPenulis($data);

    return redirect()->route('penulis')->with('success', 'Data penulis berhasil ditambahkan!');
}

    public function index() 
    {
        $penuliss = penulis::all();

        return view('admin.admin_penulis', [
            'level' => 'admin',
            'penulis' => $penuliss
        ]);
    }
    public function update (Request $request, $id)
    {
        $data = [
            'penulis_id' => $id,
            'penulis_nama' => $request->input('penulis_nama'),
            'penulis_tmplahir' => $request->input('penulis_tmplahir'),
            'penulis_tgllahir' => $request->input('penulis_tgllahir'),
        ];

        penulis::updatePenulis($id, $data);

        return redirect()->route('penulis')->with('updated', 'Data penulis berhasil diupdate!');
    }
    public function delete ($id)
        {
            penulis::deletePenulis($id);

            return redirect()->route('penulis')->with('deleted', 'Data penulis berhasil dihapus!');
        }
}

