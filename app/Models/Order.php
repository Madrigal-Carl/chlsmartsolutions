<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'type',
    ];

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
