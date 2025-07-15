<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $primaryKey = 'peminjaman_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
       'peminjaman_id',
       'peminjaman_user_id',
       'peminjaman_tglpinjam',
       'peminjaman_tglkembali',
       'peminjaman_statuskembali',
       'peminjaman_note',
       'pemnjaman_denda',

    ];

    public function buku ()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_details','peminjaman_detail_peminjaman_id','peminjaman_detail_buku_id');
    }
    public function user() 
    {
        return $this->belongsTo(user::class,'peminjaman_user_id','user_id');    
    }
    
    protected static function createpeminjaman($data)
    {
        return self::create($data);
    }
    protected static function readpeminjaman()
    {
        $data = self::paginate(10);

        return $data;
    }
    protected static function updatepeminjaman($id, $data)
    {
        $peminjaman= self::find($id);

        if ($peminjaman) {
            $peminjaman->update($data);
            return $peminjaman;
        }

        return null;
    }
    protected static function readpeminjamanById ($id)
        {
            $peminjaman= self::find($id);

            return $peminjaman;
        }
        protected static function deletepeminjaman($id)
        {
            return self::destroy($id);
        }
}

