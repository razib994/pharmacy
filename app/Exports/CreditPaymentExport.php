<?php

namespace App\Exports;

use App\Models\Manufacturer;
use App\Models\SaleInvoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CreditPaymentExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'invoice_no',
            'sale_date',
            'Amount'
        ];
    }

    public function collection()
    {
        return collect(SaleInvoice::getDailySales());
    }
}
