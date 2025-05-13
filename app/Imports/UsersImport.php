<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    protected $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    public function model(array $row)
    {
        // Cek jika username sudah ada, skip
        if (User::where('username', $row['username'])->exists()) {
            return null;
        }

        return new User([
            'name'     => $row['nama'],
            'username' => $row['username'],
            'password' => Hash::make($row['password']),
            'role'     => $this->role,
        ]);
    }
}
