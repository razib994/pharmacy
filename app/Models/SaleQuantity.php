<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleQuantity extends Model
{
    use HasFactory;

    protected $fillable = ['medicine_name','category_id','quantity'];
}
