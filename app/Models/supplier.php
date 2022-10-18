<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    private $fileable =[
    'supplier_id',
    'supplier_name',
    'supplier_phone',
    'supplier_email',
    'pic_name',
    'pic_phone',
    'email',
    'supplier_address'
    ];
}
