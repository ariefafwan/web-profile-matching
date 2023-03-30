<?php

namespace Database\Seeders;

use App\Models\Bobot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bobot::Create([
            'selisih' => '0',
            'bobot' => '5',
            'ket' => 'Tidak Ada Selisih',
        ]);
        Bobot::Create([
            'selisih' => '1',
            'bobot' => '4.5',
            'ket' => 'Kompetensi individu kelebihan 1 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '-1',
            'bobot' => '4',
            'ket' => 'Kompetensi individu kekurangan 1 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '2',
            'bobot' => '3.5',
            'ket' => 'Kompetensi individu kelebihan 2 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '-2',
            'bobot' => '3',
            'ket' => 'Kompetensi individu kekurangan 2 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '3',
            'bobot' => '2.5',
            'ket' => 'Kompetensi individu kelebihan 3 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '-3',
            'bobot' => '2',
            'ket' => 'Kompetensi individu kekurangan 3 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '4',
            'bobot' => '1.5',
            'ket' => 'Kompetensi individu kelebihan 4 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '-4',
            'bobot' => '1',
            'ket' => 'Kompetensi individu kekurangan 4 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '5',
            'bobot' => '0.5',
            'ket' => 'Kompetensi individu kelebihan 5 tingkat/level',
        ]);
        Bobot::Create([
            'selisih' => '-5',
            'bobot' => '0',
            'ket' => 'Kompetensi individu kekurangan 5 tingkat/level',
        ]);

    }
}
