<?php
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_detail extends Model
{
    protected $table = 'peminjaman_detalis';
    protected $fillable = [
       'peminjaman_detail_peminjaman_id',
       'peminajaman_detail_buku_id',

    ];
}