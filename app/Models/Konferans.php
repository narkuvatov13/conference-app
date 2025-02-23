<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konferans extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function users(){
        return $this->belongsTo(User::class);
    }
                        //user tablosuna bire bir iliski
    public function user(){
        return $this->hasOne(User::class,'konferans_id','id')->withDefault(
            ['name'=>'Misafir Kullanici']
        );
    }

    public function hakemYoneticUsers(){
        return $this->belongsToMany(User::class,'hakem_yonetici_ata','konferans_id','user_id');
    }

    public function getPostImageAttribute($value)
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    public function getAy($value){
             $tarihAy = explode(' ',$value);
             return $tarihAy[1];
    }
    public function getGun($value){
        $tarihGun = explode(' ',$value);
        return $tarihGun[0];
    }

}
