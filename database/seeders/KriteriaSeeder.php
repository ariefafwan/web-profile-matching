<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kriteria::Create([
            'aspek_id' => '1',
            'name' => 'Kepemimpinan',
            'jenis' => 'cf',
            'nilai' => '5',
        ]);

        Kriteria::Create([
            'aspek_id' => '1',
            'name' => 'Kerja Sama',
            'jenis' => 'cf',
            'nilai' => '4',
        ]);

        Kriteria::Create([
            'aspek_id' => '1',
            'name' => 'Kerapian',
            'jenis' => 'sf',
            'nilai' => '4',
        ]);

        Kriteria::Create([
            'aspek_id' => '1',
            'name' => 'Kepribadian',
            'jenis' => 'sf',
            'nilai' => '3',
        ]);

        Kriteria::Create([
            'aspek_id' => '2',
            'name' => 'Disiplin',
            'jenis' => 'cf',
            'nilai' => '4',
        ]);

        Kriteria::Create([
            'aspek_id' => '2',
            'name' => 'Rajin',
            'jenis' => 'cf',
            'nilai' => '4',
        ]);

        Kriteria::Create([
            'aspek_id' => '2',
            'name' => 'Penataan',
            'jenis' => 'sf',
            'nilai' => '3',
        ]);

        Kriteria::Create([
            'aspek_id' => '2',
            'name' => 'Ulet',
            'jenis' => 'sf',
            'nilai' => '3',
        ]);
    }
}
