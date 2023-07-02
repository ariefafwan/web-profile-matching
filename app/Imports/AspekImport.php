<?php

namespace App\Imports;

use App\Models\Aspek;
use Maatwebsite\Excel\Concerns\ToModel;

class AspekImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Aspek([
            'name' => $row[0],
            'bobot' => $row[1],
            'cf' => $row[2],
            'sf' => $row[3]
        ]);
    }
}
