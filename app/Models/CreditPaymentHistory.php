<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreditPaymentHistory extends Model
{
    use HasFactory;

     public function customer(){
    	return $this->belongsTo(Customer::class);
    }

    public static function getCreditCustomerPayment() {
        $records = DB::table('credit_payment_histories')
            ->join('customers', 'customers.id', '=', 'credit_payment_histories.customer_id')
            ->select('invoice_no', 'customers.name', 'todays_payment', 'payment_date')
            ->get()->toArray();
        return $records;
    }

}
