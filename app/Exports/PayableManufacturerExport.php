<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\PayableManufacturer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PayableManufacturerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'manufacturer Name',
            'purchase_date',
            'invoice_no',
            'subtotal',
            'paid_amount',
            'due_amount'
        ];
    }

    public function collection()
    {
        return collect(Invoice::getManufaturerPayble());
       // return PayableManufacturer::all();
    }
}
