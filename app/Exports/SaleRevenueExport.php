<?php

namespace App\Exports;

use App\Models\SaleRevenue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SaleRevenueExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            "id",
            "invoice_no",
            "sale_date",
            "total_purchase_price",
            "total_sale_price",
            "discount",
        ];
    }
    public function collection()
    {
        return collect(SaleRevenue::getData());
        //return SaleRevenue::all();
    }
}
