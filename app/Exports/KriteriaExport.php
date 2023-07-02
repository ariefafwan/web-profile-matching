<?php

namespace App\Exports;

use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\FromCollection;

class KriteriaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kriteria::all();
    }
}
