<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'user_nama',
        'user_alamat',
        'user_username',
        'user_email',
        'user_notlp',
        'user_password',
        'user_level',
        'user_gmbr',
    ];



    protected static function register($data)
    {
        return self::create($data);
    }

    protected static function upload_profile($id, $data)
    {
        $user = self::find($id);
        if ($user->user_pict_url) {
            Storage::delete($user->user_pict_url);
        }
        if ($data) {
            $path = $data->store('public/profile_pictures');
            $user->user_pict_url = $path;
        }
        $user->save();
    }
    




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
