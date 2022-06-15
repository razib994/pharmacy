<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;

class Manufacturer extends Model
{
    use HasFactory;
     protected $fillable = ['name','phone_no','email','address'];

      public function manufacturer(){
    	return $this->belongsTo(Manufacturer::class);
    }
    public static function getManufaturer() {
        $records = DB::table('manufacturers')->select( 'name',
            'phone_no',
            'email',
            'address')->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

}
