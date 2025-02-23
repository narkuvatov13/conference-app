<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'konferans_id',
        'silindiMi',
        'atandiMi',
        'phone',
        'name',
        'user_img',
        'dogum_tarih',
        'unvan',
        'fakulte',
        'alani',
        'universitesi',
        'email',
        'password',
    ];
    protected $guarded=[];
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

    public function konferanslar(){
        return $this->hasMany(Konferans::class);
    }
    public function konferans(){
        return $this->belongsTo(Konferans::class);
    }
    public function hakemYoneticKonferans(){
        return $this->belongsToMany(Konferans::class,'hakem_yonetici_ata','user_id','konferans_id');
    }
    public function yazilarim(){
        return $this->hasMany(Yazilarim::class);
    }
    public function yonetici_yazar(){
        return $this->belongsToMany(Yazilarim::class,'yonetici__yazars','user_id','yazilarim_id');
    }

    public function hakem_yazar(){
        return $this->belongsToMany(Yazilarim::class,'hakem__yazars','user_id','yazilarim_id');
    }



    public function getPostImageAttribute($value)
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
