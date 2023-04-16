<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '1',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Kepemimpinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '1',
            'nilai' => '4',
            'ket' => 'Baik Dalam Kepemimpinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '1',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Kepemimpinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '2',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Kerja Sama',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '2',
            'nilai' => '4',
            'ket' => 'Baik Dalam Kerja Sama',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '2',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Kerja Sama',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '3',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Rapi',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '3',
            'nilai' => '4',
            'ket' => 'Baik Dalam Rapi',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '3',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Rapi',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '4',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Penataan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '4',
            'nilai' => '4',
            'ket' => 'Baik Dalam Penataan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '4',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Rapi',
        ]);
    }
}
