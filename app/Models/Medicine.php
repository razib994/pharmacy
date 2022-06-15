<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Medicine extends Model
{
    use HasFactory;

    public function manufacturer(){
    	return $this->belongsTo(Manufacturer::class,'manufacturer_id','id');
    }
    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function unit(){
    	return $this->belongsTo(Unit::class);
    }

    public static function getmedicines () {
        $records = DB::table('medicines')
            ->join('manufacturers','manufacturers.id','=','medicines.manufacturer_id')
//            ->join('categories','categories.id','=','medicines.category_id')
//            ->join('units','units.id','=','medicines.unit_id')
            ->select('manufacturers.name','category_id','unit_id','medicine_name','generic_name','purchase_unit_price',
            'sale_unit_price')
            ->get()->toArray();
//        dd($records);
        return $records;
    }


}
