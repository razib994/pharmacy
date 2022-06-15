<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'manufacturer Name',
            'category Name',
            'medicine_name',
            'in_quantity',
            'box_quantity'
        ];
    }

    public function collection()
    {
        return collect(Stock::getStocks());
    }
}
