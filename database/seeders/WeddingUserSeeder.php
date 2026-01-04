<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WeddingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'wedding@gmail.com',
            ],
            [
                'name' => 'Admin',
                'email' => 'wedding@gmail.com',
                'password' => Hash::make('wedding@123')
            ]
        );
    }
}
