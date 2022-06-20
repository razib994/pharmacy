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

//        $records = DB::table('stocks')
//            ->join('manufacturers','manufacturers.id','=','stocks.manufacturer_id')
//            ->join('categories','categories.id','=','stocks.category_id')
//            ->select('manufacturers.name','category_id','medicine_name','in_quantity','box_quantity')
//            ->get();
        $records = Stock::with('manufacturer','category')->get();
        $mappedcollection = $records->map(function($record, $key) {

            $out_stock = PosInvoice::where('category_id',$record->category_id)->where('medicine_name',$record->medicine_name)->sum('quantity');
            $in_stock = Stock::where('category_id',$record->category_id)->where('medicine_name',$record->medicine_name)->sum('in_quantity');
            $available = $in_stock - $out_stock;
            return [
                'manufacturers_name' => $record->manufacturer->name,
                'category_id' => $record->category->name,
                'medicine_name' => $record->medicine_name,
                'in_quantity' => $record->in_quantity,
                'box_quantity' => $record->box_quantity,
                'out_stock' =>$out_stock,
                'available' =>$available,
            ];
        });
        return $mappedcollection;
    }


}
