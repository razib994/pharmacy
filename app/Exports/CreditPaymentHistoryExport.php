<?php

namespace App\Exports;

use App\Models\CreditPaymentHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CreditPaymentHistoryExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'invoice_no',
            'Customer Name',
            'todays_payment',
            'payment_date'
        ];
    }

    public function collection()
    {
        return collect(CreditPaymentHistory::getCreditCustomerPayment());
        //return CreditPaymentHistory::all();
    }
}
