<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yazilarim extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function getPostImageAttribute($value)
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
    public function getPostFileAttribute($value)
    {
        return asset('storage/' . $value);
    }

}
