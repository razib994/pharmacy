<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReturnPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
    	'medicine_name','category_id','return_date','amount','quantity','total_amount'
    ];

    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public static function getReturnpurches() {
        $records = DB::table('return_purchases')
            ->join('categories', 'categories.id', '=', 'return_purchases.category_id')
            ->select('medicine_name','categories.name','return_date','amount','quantity','total_amount')
            ->get()->toArray();
        return $records;
    }

}
