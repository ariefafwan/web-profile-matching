<?php

namespace App\Imports;

use App\Models\Hasil;
use Maatwebsite\Excel\Concerns\ToModel;

class HasilImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Hasil([
            'user_id' => $row[0],
            'aspek_id' => $row[1],
            'kriteria_id' => $row[2],
            'nilai' => $row[3],
            'bobot_id' => $row[4],
            'n_bobot' => $row[5],
            'jenis' => $row[6]
        ]);
    }
}
