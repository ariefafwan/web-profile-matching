<?php

namespace App\Imports;

use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\ToModel;

class KriteriaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kriteria([
            'aspek_id' => $row[0],
            'name' => $row[1],
            'jenis' => $row[2],
            'nilai' => $row[3]
        ]);
    }
}
