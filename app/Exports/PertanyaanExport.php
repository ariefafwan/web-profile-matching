<?php

namespace App\Exports;

use App\Models\Pertanyaan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PertanyaanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pertanyaan::all();
    }
}
