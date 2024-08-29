<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sabzavotlar extends Model
{
    use HasFactory;

    protected $fillable = ['name_uz','name_ru'];




    public function taomlar()
    {
        return $this->belongsToMany(Taomlar::class,'sabzavotlar_taomlar');
    }
}
