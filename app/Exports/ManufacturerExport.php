<?php

namespace App\Exports;

use App\Models\Manufacturer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ManufacturerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'name',
            'phone_no',
            'email',
            'address'
        ];
    }
    public function collection()
    {
        return collect(Manufacturer::getManufaturer());
        //return Manufacturer::all();
    }
}
