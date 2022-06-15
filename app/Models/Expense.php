<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expense extends Model
{
    use HasFactory;

    public static function getExpenses() {
        $records = DB::table('expenses')->select(
            'name',
            'details',
            'amount',
            'date',
            'remarks')->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getExpensesMonthly() {
        $records = DB::table('expenses')->select(
            'name',
            'details',
            'amount',
            'date',
            'remarks')->whereMonth('date',date('m'))->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getExpensesYearly() {
        $records = DB::table('expenses')->select(
            'name',
            'details',
            'amount',
            'date',
            'remarks')->whereYear('date', '=', Carbon::now()->year)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getExpensesPrevious() {
        $records = DB::table('expenses')->select(
            'name',
            'details',
            'amount',
            'date',
            'remarks')->whereYear('date', '=', Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
}
