<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_return_purchase extends Model
{
    use HasFactory;
    protected $fileable =[
    'return_puchase_id',
    'date',
    'user_id',
    'area_id',
    'product_id',
    'stock',
    'total'
    ];
}
