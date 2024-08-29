<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Role extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class,'role_user');
    }

    public function permissions(): belongsToMany
    {
        return $this->belongsToMany(Permission::class,'permission_role');
    }

}