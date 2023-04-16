<?php

namespace Database\Seeders;

use App\Models\Aspek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aspek::Create([
            'name' => 'Sikap',
            'cf' => '60',
            'sf' => '40',
        ]);
        
        Aspek::Create([
            'name' => 'Kerapian',
            'cf' => '55',
            'sf' => '45',
        ]);
    }
}