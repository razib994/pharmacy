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
        $records = Purchase::with('manufacturer','category')->get();
        $mappedcollection = $records->map(function($record, $key) {
            return [
                'invoice_no' => $record->invoice_no,
                'manufacturers_name' => $record->manufacturer->name,
                'medicine_name' => $record->medicine_name,
                'category_id' => $record->category->name,
                'purchase_date' => $record->purchase_date,
                'total_quantity' => $record->total_quantity,
                'total_price' => $record->total_price,
            ];
        });
        return $mappedcollection;

    }

}
