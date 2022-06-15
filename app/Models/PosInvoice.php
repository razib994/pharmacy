<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosInvoice extends Model
{
    use HasFactory;

     protected $fillable = ['invoice_no','customer_id','sale_date','medicine_name','category_id','quantity','purchase_unit_price','sale_unit_price','total_price','subtotal','discount','total_amount','paid_amount','due_amount'];

      public function category(){
    	return $this->belongsTo(Category::class);
    }

      public function customer(){
    	return $this->belongsTo(Customer::class);
    }

}
