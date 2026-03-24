<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // user create Admin
        User::create(
            [
                'name' => 'Admin',
                'email' => "mail@rupaksapkota.com.np",
                'email_verified_at' => now(),
                'password' => Hash::make('password@123'),
                'role' => 'admin',
            ]
        );
    }
}
