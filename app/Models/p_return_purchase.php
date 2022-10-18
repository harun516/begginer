<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_return_purchase extends Model
{
    use HasFactory;
    protected $fileable =[
    'return_purchase_id',
    'date',
    'user_id',
    'product_id',
    'supplier_id',
    'stock',
    'total'
    ];
}
