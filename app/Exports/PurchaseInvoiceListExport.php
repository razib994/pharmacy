<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurchaseInvoiceListExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'invoice_no',
            'manufacturer Name',
            'purchase_date',
            'subtotal',

        ];
    }

    public function collection()
    {
       return collect(Invoice::getPurchaseList());
    }
}
