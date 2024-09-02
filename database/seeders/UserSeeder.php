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
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Alice Johnson',
                'email' => 'alice@gmail.com',
                'password' => Hash::make('password123'),
                'posisi' => 'Manager',
                'status' => 'Aktif',
                'gender' => 'F',
            ],
            [
                'nama' => 'Bob Smith',
                'email' => 'bob@gmail.com',
                'password' => Hash::make('password123'),
                'posisi' => 'Staff',
                'status' => 'Aktif',
                'gender' => 'M',
            ],
            [
                'nama' => 'Carol White',
                'email' => 'carol@gmail.com',
                'password' => Hash::make('password123'),
                'posisi' => 'Administrator',
                'status' => 'Non-Aktif',
                'gender' => 'F',
            ],
            [
                'nama' => 'Dave Brown',
                'email' => 'dave@gmail.com',
                'password' => Hash::make('password123'),
                'posisi' => 'Staff',
                'status' => 'Aktif',
                'gender' => 'M',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
