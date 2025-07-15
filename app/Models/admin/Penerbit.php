<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbit extends Model
{
    protected $table = 'penerbits';
    protected $primaryKey = 'penerbit_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'penerbit_id',
        'penerbit_nama',
        'penerbit_alamat',
        'penerbit_notlp',
        'penerbit_email',
    ];

    protected static function createPenerbit ($data)
        {
            return self::create($data);
        }
        protected static function readPenerbit ()
        {
            $data = self::paginate(10);

            return $data;
        }
        protected static function updatePenerbit ($id, $data)
        {
            $penerbit = self::find($id);

            if ($penerbit) {
                $penerbit->update($data);
                return $penerbit;
            }

            return null;
        }
        protected static function readPenerbitById ($id)
            {
                $penerbit = self::find($id);

                return $penerbit;
            }
            protected static function deletePenerbit ($id)
            {
                return self::destroy($id);
            }

}
