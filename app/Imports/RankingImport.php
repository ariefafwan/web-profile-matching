<?php

namespace App\Imports;

use App\Models\Ranking;
use Maatwebsite\Excel\Concerns\ToModel;

class RankingImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Ranking([
            'user_id' => $row[0],
            'aspek_id' => $row[1],
            'nt' => $row[2],
            'b_aspek' => $row[3]
        ]);
    }
}
