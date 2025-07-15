<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'kd_buku' => 'required|max:4',
            'nama_buku' => 'required|min:10',
            'penerbit' => 'required|min:10',
            'penulis' => 'required|min:10',
            'thn_terbit' => 'nullable|max:4'
        ];
}
}