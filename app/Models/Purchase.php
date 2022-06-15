<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'category_id',
        'type_id',
        'purchase_date',
        'invoice_no',
        'medicine_name',
        'expire_date',
        'quantity',
        'total_quantity',
        'total_purchase_price',
        'total_price'
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

    //  public function all_invoice(){
    //     return $this->hasMany(Invoice::class);
    // }
    public static function getPurchesData() {
        $records = DB::table('purchases')
            ->join('manufacturers','manufacturers.id','=','purchases.manufacturer_id')
           ->join('categories','categories.id','=','purchases.category_id')
            ->select('invoice_no',
            'manufacturers.name',
            'medicine_name',
            'category_id',
            'purchase_date',
            'total_quantity',
            'total_price')->get()->toArray();
        return $records;
    }

}
