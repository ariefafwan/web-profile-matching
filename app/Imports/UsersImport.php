<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'role_id' => $row[1],
            'email' => $row[2],
            'profile_img' => $row[3],
            'password' => Hash::make($row[4])
        ]);
    }
}
