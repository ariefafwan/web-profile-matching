<?php

namespace App\Imports;

use App\Models\Pertanyaan;
use Maatwebsite\Excel\Concerns\ToModel;

class PertanyaanImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pertanyaan([
            'aspek_id' => $row[0],
            'kriteria_id' => $row[1],
            'nilai' => $row[2],
            'ket' => $row[3]
        ]);
    }
}
