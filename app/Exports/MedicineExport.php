<?php

namespace App\Exports;

use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MedicineExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'manufacturer_id ',
            'category_id ',
            'unit_id ',
            'medicine_name',
            'generic_name',
            'purchase_unit_price',
            'sale_unit_price'
        ];
    }

    public function collection()
    {
        return collect(Medicine::getmedicines());
       // return Medicine::all();
    }
}
