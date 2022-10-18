<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_selling extends Model
{
    use HasFactory;
    protected $fileable =[
    'selling_id',
    'date',
    'user_id',
    'area_id',
    'product_id',
    'stock',
    'total'
    ];
}
