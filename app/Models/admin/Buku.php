<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';
    protected $primaryKey = 'buku_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
       'buku_id',
       'buku_penulis_id',
       'buku_penerbit_id',
       'buku_kategori_id',
       'buku_rak_id',
       'buku_judul',
       'buku_isbn',
       'buku_thnpenerbit',
       'buku_gmbr', 

    ];

    public function peminjaman (): BelongsToMany{
        return $this-> belongsToMany(Peminjaman::class,'peminjaman_details','peminjaman_detail_buku_id','peminjaman_detail_peminjaman_id');
    }

    protected static function createbuku ($data)
    {
        return self::create($data);
    }
    protected static function readbuku()
    {
        $data = self::paginate(10);

        return $data;
    }
    protected static function updatebuku($id, $data)
    {
        $buku = self::find($id);

        if ($buku) {
            $buku->update($data);
            return $buku;
        }

        return null;
    }
    protected static function readbukuById ($id)
        {
            $buku = self::find($id);

            return $buku;

            return self::where('buku_id', $id)->first();
        }
        protected static function deletebuku ($id)
        {
            return self::destroy($id);
        }

        public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'buku_penulis_id', 'penulis_id');
    }

    public function kategori() 
    {
        return $this->belongsTo(Kategori::class,'buku_kategori_id', 'kategori_id');    
    }

    public function penerbit() 
    {
        return $this->belongsTo(Penerbit::class,'buku_penerbit_id','penerbit_id');    
    }

    public function rak() 
    {
        return $this->belongsTo(Rak::class,'buku_rak_id','rak_id');    
    }


}

