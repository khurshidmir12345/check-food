<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taomlar_user extends Model
{
    use HasFactory;

    protected $table = 'taomlar_user';

    protected $fillable = ['user_id', 'taomlar_id'];
}
