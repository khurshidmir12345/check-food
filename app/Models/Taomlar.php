<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taomlar extends Model
{
    use HasFactory;

    protected $fillable = ['name_uz','name_ru','instructions'];


    public function sabzavotlar()
    {
        return $this->belongsToMany(Sabzavotlar::class,'sabzavotlar_taomlar');
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'taomlar_user');
    }
}
