<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    public function run(): void
    {
        Produto::create([
            'nome' => 'copo',
            'valor' => '20.80',
        ]);

        Produto::create([
            'nome' => 'caneca',
            'valor' => '20.80',
        ]);

        Produto::create([
            'nome' => 'pote',
            'valor' => '20.80',
        ]);
    }
}
