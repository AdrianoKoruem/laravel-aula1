<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendasSeerder extends Seeder
{
    public function run(): void
    {
        Venda::create([

            'id_venda' => 2,
            'id_produto' => 3,
            'id_cliente' => 2,
        ]);

        Venda::create([

            'id_venda' => 1,
            'id_produto' => 5,
            'id_cliente' => 2,
        ]);

        Venda::create([

            'id_venda' => 6,
            'id_produto' => 6,
            'id_cliente' => 2,
        ]);
    }
}
