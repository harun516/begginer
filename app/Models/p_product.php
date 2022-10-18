<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_product extends Model
{
    use HasFactory;
    protected $fileable =[
    'product_id',
    'product_name',
    'price_purchase',
    'price_selling',
    'stock',
    'supplier_id'
    ];
}
