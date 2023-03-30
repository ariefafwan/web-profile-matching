<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::Create([
            'name' => 'Afwan',
            'user_id' => '2',
            'nmrhp' => '082221312332315',
            'gender' => 'Lakik',
            'alamat' => 'Langsa'
        ]);
    }
}
