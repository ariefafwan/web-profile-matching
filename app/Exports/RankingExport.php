<?php

namespace App\Exports;

use App\Models\Ranking;
use Maatwebsite\Excel\Concerns\FromCollection;

class RankingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ranking::all();
    }
}
