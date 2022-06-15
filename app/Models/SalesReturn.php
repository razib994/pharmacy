<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesReturn extends Model
{
    use HasFactory;

     protected $fillable = [
    	'medicine_name','category_id','return_date','amount','quantity','total_amount'
    ];

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public static function getSaleReturn() {
        $records = DB::table('sales_returns')
            ->join('categories', 'categories.id', '=', 'sales_returns.category_id')
            ->select('medicine_name','categories.name','return_date','amount','quantity','total_amount')->get()->toArray();

        return $records;
    }

}
