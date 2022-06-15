<?php

namespace App\Exports;

use App\Models\SalesReturn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesReturnListExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            "medicine_name",
            "category_id",
            "return_date",
            "amount",
            "quantity",
            "total_amount",
        ];
    }
    public function collection()
    {
        return collect(SalesReturn::getSaleReturn());
    }
}
