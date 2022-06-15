<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturnSubtotal extends Model
{
    use HasFactory;

    protected $fillable = ['return_date','subtotal'];
}
