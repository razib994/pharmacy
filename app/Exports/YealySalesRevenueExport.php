<?php

namespace App\Exports;

use App\Models\SaleRevenue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class YealySalesRevenueExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Invoice No',
            'Sales Revenue',
            'Sale Date'
        ];
    }
    public function collection()
    {
        return collect(SaleRevenue::getYealySalesRevenue());
    }
}
