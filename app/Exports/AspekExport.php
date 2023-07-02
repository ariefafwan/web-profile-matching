<?php

namespace App\Exports;

use App\Models\Aspek;
use Maatwebsite\Excel\Concerns\FromCollection;

class AspekExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aspek::all();
    }
}
