<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumniTemplateExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        // Ini adalah header kolom untuk file template Excel
        return [
            'name',
            'graduation_year',
            'occupation',
        ];
    }
}
