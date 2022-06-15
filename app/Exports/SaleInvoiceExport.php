<?php

namespace App\Exports;

use App\Models\SaleInvoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SaleInvoiceExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'invoice_no',
            'Customer Name',
            'sale_date',
            'subtotal',
            'discount',
            'total_amount',
            'paid_amount',
            'due_amount'
        ];
    }

    public function collection()
    {
        return collect(SaleInvoice::getSaleInvoices());
       // return SaleInvoice::all();
    }
}
