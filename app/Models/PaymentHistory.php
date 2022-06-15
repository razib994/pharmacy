<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentHistory extends Model
{
    use HasFactory;
     public function manufacturer(){
    	return $this->belongsTo(Manufacturer::class);
    }
    public static function getManufacturerHistroy() {
        $records = DB::table('payment_histories')
            ->join('manufacturers','manufacturers.id','=','payment_histories.manufacturer_id')
            ->select('invoice_no', 'manufacturers.name', 'todays_payment', 'payment_date')
            ->get()->toArray();
        return $records;
    }
}
