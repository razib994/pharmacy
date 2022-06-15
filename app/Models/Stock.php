<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'manufacturer_id',
        'category_id',
        'invoice_id',
        'medicine_name',
        'in_quantity',
        'box_quantity'
    ];

    public function manufacturer(){
    	return $this->belongsTo(Manufacturer::class);
    }
    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function unit(){
    	return $this->belongsTo(Unit::class);
    }
    public function type(){
    	return $this->belongsTo(Type::class);
    }

    public static function getStocks() {
        $records = DB::table('stocks')
            ->join('manufacturers','manufacturers.id','=','stocks.manufacturer_id')
            ->select('manufacturers.name','category_id','medicine_name','in_quantity','box_quantity')
            ->get()->toArray();
        return $records;
    }
}
