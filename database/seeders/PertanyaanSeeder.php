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
        //aspek 1, kriteria kepemimpinan
        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '1',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Kepemimpinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '1',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Kepemimpinan',
        ]);

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

        //aspek 1, kriteria kerja sama
        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '2',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Kerja Sama',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '2',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Kerja Sama',
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

        //aspek 1, kriteria Kerapian
        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '3',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Kerapian',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '3',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Kerapian',
        ]);
        
        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '3',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Kerapian',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '3',
            'nilai' => '4',
            'ket' => 'Baik Dalam Kerapian',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '3',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Kerapian',
        ]);

        //aspek 1, kriteria kepribadian
        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '4',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Kepribadian',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '4',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Kepribadian',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '4',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Kepribadian',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '4',
            'nilai' => '4',
            'ket' => 'Baik Dalam Kepribadian',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '1',
            'kriteria_id' => '4',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Kepribadian',
        ]);

        //aspek = 2 , kriteria disiplin
        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '5',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Disiplin',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '5',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Disiplin',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '5',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Disiplin',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '5',
            'nilai' => '4',
            'ket' => 'Baik Dalam Disiplin',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '5',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Disiplin',
        ]);

        //aspek = 2 , kriteria Kerajinan
        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '6',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Kerajinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '6',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Kerajinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '6',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Kerajinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '6',
            'nilai' => '4',
            'ket' => 'Baik Dalam Kerajinan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '6',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Kerajinan',
        ]);

        //aspek = 2 , kriteria Penataan
        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '7',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Penataan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '7',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Penataan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '7',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Penataan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '7',
            'nilai' => '4',
            'ket' => 'Baik Dalam Penataan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '7',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Penataan',
        ]);

        //aspek = 2 , kriteria Keuletan
        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '8',
            'nilai' => '1',
            'ket' => 'Sangat Buruk Dalam Keuletan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '8',
            'nilai' => '2',
            'ket' => 'Buruk Dalam Keuletan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '8',
            'nilai' => '3',
            'ket' => 'Cukup Dalam Keuletan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '8',
            'nilai' => '4',
            'ket' => 'Baik Dalam Keuletan',
        ]);

        Pertanyaan::Create([
            'aspek_id' => '2',
            'kriteria_id' => '8',
            'nilai' => '5',
            'ket' => 'Sangat Baik Dalam Keuletan',
        ]);
    }
}
