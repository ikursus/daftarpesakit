<?php

namespace App\Exports;

use App\Models\Pesakit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesakitExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pesakit::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'MRN',
            'NAMA PESAKIT',
            'JENIS PENGENALAN',
            'ID PENGENALAN',
            'KEWARGANEGARAAN',
            'JENIS APPOINTMENT',
        ];
    }
}
