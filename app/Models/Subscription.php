<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'order_id',
      'price',
      'type',
      'expire_date',
      'is_active',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo( Order::class,'order_id','id');
    }
}
