<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurchaseExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'invoice_no',
            'manufacturer_id',
            'medicine_name',
            'category_id',
            'purchase_date',
            'total_quantity',
            'total_price'
        ];
    }
    public function collection()
    {
        return collect(Purchase::getPurchesData());
    }
}
