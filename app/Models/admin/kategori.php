<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'katrgoris';
    protected $primaryKey = 'kategori_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'kategori_id',
        'kategori_nama',
    ];

    protected static function createkategori ($data)
        {
            return self::create($data);
        }
        protected static function readkategori ()
        {
            $data = self::all();

            return $data;
        }
        protected static function updatekategori ($id, $data)
        {
            $kategori = self::find($id);

            if ($kategori) {
                $kategori->update($data);
                return $kategori;
            }

            return null;
        }
        protected static function readkategoriById ($id)
            {
                $kategori = self::find($id);

                return $kategori;
            }
            protected static function deletekategori ($id)
            {
                return self::destroy($id);
            }

}
