<?php

namespace App\Exports;

use App\Models\Hasil;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Hasil::all();
    }
}
