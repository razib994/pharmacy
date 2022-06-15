<?php

namespace App\Exports;

use App\Models\PaymentHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ManufacturerPaymentHistoryExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'invoice_no',
            'manufacturer Name',
            'Todays Payment',
            'payment Date',

        ];
    }

    public function collection()
    {
       return collect(PaymentHistory::getManufacturerHistroy());
    }
}
