<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_stockout extends Model
{
    use HasFactory;
    protected $fileable =[
    'stock_id',
    'date',
    'user_id',
    'area_id',
    'product_id',
    'status',
    'stock',
    'total'
    ];
}
