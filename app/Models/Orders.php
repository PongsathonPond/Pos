<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $fillable = [
        'user_id',
        'total_price',
        'type_sale	',
        'amount',
        'change',
    ];
    protected $casts = [
        'listall' => 'array',
        'listcount' => 'array',
        'listprice' => 'array',
    ];
    use HasFactory;
}
