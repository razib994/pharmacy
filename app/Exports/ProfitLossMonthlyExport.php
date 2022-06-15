<?php

namespace App\Exports;

use App\Models\SaleInvoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProfitLossMonthlyExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'invoice_no',
            'Customer Name',
            'Sale Date',
            'Total Amount',
        ];
    }

    public function collection()
    {
        return collect(SaleInvoice::getProfitLossMonthly());
    }
}
