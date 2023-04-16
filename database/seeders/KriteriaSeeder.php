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
            'jenis' => 'sf',
            'nilai' => '4',
        ]);

        Kriteria::Create([
            'aspek_id' => '2',
            'name' => 'Rapi',
            'jenis' => 'cf',
            'nilai' => '4',
        ]);

        Kriteria::Create([
            'aspek_id' => '2',
            'name' => 'Tertata',
            'jenis' => 'sf',
            'nilai' => '3',
        ]);
    }
}
