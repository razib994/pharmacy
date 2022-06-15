<?php

namespace App\Exports;

use App\Models\SaleRevenue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonthlySalesRevenueExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'invoice_no',
            'Sales Revenue',
            'Sale Date'
        ];
    }
    public function collection()
    {
        return collect(SaleRevenue::getMonthlySalesRevenue());
    }
}
