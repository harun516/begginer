<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model

{
    protected $primaryKey = 'area_id';
    public $incrementing = false;
    use HasFactory;
    protected $fillable = [
        'area_id',
        'name',
        'address',
        'link_address'
    ];
}
