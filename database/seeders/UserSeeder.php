<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'Admin',
            'role_id' => '1',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        // User::Create([
        //     'name' => 'Pegawai',
        //     'role_id' => '2',
        //     'email' => 'pegawai@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        // User::Create([
        //     'name' => 'Pegawai 2',
        //     'role_id' => '2',
        //     'email' => 'afwan@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
