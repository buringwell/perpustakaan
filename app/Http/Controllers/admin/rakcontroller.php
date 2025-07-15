<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\rak;
use App\Http\Controllers\Controller;


class rakcontroller extends Controller
{
    public function create (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'rak_id' => $id,
        'rak_nama' => $request->input('rak_nama'),
        'rak_lokasi' => $request->input('rak_lokasi'),
        'rak_kapasitas' => $request->input('rak_kapasitas'),
    ];
  
    rak::createrak($data);

    return redirect()->route('rak')->with('success', 'Data rak berhasil ditambahkan!');
}

    public function index() 
    {
        $raks = rak::all();

        return view('admin.admin_rak', [
            'level' => 'admin',
            'rak' => $raks
        ]);
    }
    public function update (Request $request, $id)
    {
        $data = [
            'rak_id' => $id,
            'rak_nama' => $request->input('rak_nama'),
            'rak_lokasi' => $request->input('rak_lokasi'),
            'rak_kapasitas' => $request->input('rak_kapasitas'),
        ];

        rak::updaterak($id, $data);

        return redirect()->route('rak')->with('updated', 'Data rak berhasil diupdate!');
    }
    public function delete ($id)
        {
            rak::deleterak($id);

            return redirect()->route('rak')->with('deleted', 'Data rak berhasil dihapus!');
        }

}

