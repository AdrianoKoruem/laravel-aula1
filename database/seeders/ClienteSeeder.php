<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {        
        Clientes::create([
            'nome'=>'Adriano',
            'email'=>'Adriano@gmail.com',
            'Endereco'=>'Rua A',
            'Logradouro'=>'Rua A',
            'Bairro'=>'st tereza',
            'cep'=>'12345678',        
        ]);
        
        Clientes::create([
            'nome'=>'test',
            'email'=>'test@gmail.com',
            'Endereco'=>'Rua A',
            'Logradouro'=>'Rua A',
            'Bairro'=>'st tereza',
            'cep'=>'12345678',        
        ]);
        
        Clientes::create([
            'nome'=>'test1',
            'email'=>'test1@gmail.com',
            'Endereco'=>'Rua A',
            'Logradouro'=>'Rua A',
            'Bairro'=>'st tereza',
            'cep'=>'12345678',        
        ]);
    }
}
