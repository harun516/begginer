<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_product extends Model
{
    public $incrementing = false;
    use HasFactory;
    
    protected $fillable = [
        
        'product_id',
        'product_name',
        'purchase_price',
        'selling_price',
        'area_id',
        'stock'
    ];
}
