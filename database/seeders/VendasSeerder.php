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

            'id_produto' => 1,
            'id_cliente' => 1,
        ]);

        Venda::create([

            'id_produto' => 2,
            'id_cliente' => 2,
        ]);

        Venda::create([

            'id_produto' => 3,
            'id_cliente' => 3,
        ]);
        Venda::create([

            'id_produto' => 2,
            'id_cliente' => 1,
        ]);
        Venda::create([

            'id_produto' => 3,
            'id_cliente' => 2,
        ]);
        Venda::create([

            'id_produto' => 1,
            'id_cliente' => 2,
        ]);
    }
}
