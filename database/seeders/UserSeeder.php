<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        
        User::create([

            'nome' => 'Adriano',
            'email' => 'Adriano@gmail.com ',
            'password' => Hash::make('senha123'),
        ]);
        User::create([

            'nome' => 'Adriano',
            'email' => 'Adriano2@gmail.com ',
            'password' => Hash::make('senha123'),
        ]);
        User::create([

            'nome' => 'Adriano',
            'email' => 'Adriano3@gmail.com ',
            'password' => Hash::make('senha123'),
        ]);
        User::create([

            'nome' => 'Adriano',
            'email' => 'Adriano4@gmail.com ',
            'password' => Hash::make('senha123'),
        ]);
    }
}
