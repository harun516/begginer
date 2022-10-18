<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_purchase extends Model
{
    use HasFactory;
    protected $fileable =[
    'purchase_id',
    'date',
    'user_id',
    'product_id',
    'supplier_id',
    'stock',
    'total'
    ];
}
