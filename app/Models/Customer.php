<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

   protected $fillable = ['name','phone_no','address'];

    public static function getCustomer() {
        $records = DB::table('customers')->select("id", 'name','phone_no','address')->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

}
