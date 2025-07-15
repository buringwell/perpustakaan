<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    protected $table = 'raks';
    protected $primaryKey = 'rak_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'rak_id',
        'rak_nama',
        'rak_lokasi',
        'rak_kapasitas',
    ];

    protected static function createrak ($data)
        {
            return self::create($data);
        }
        protected static function readrak ()
        {
            $data = self::paginate(10);

            return $data;
        }
        protected static function updaterak ($id, $data)
        {
            $rak = self::find($id);

            if ($rak) {
                $rak->update($data);
                return $rak;
            }

            return null;
        }
        protected static function readrakById ($id)
            {
                $rak = self::find($id);

                return $rak;
            }
            protected static function deleterak ($id)
            {
                return self::destroy($id);
            }

}
