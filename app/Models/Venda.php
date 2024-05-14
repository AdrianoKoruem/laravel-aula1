<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_produto',
        'id_cliente',

    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }

    public function getVendasPesquisarIndex(string $search = '')
    {
        $vendas = $this->with(['produto', 'cliente'])->where(function ($query) use ($search) {
            if ($search) {
                $query->where('id', $search)
                    ->orWhereHas('cliente', function ($query) use ($search) {
                        $query->where('nome', 'LIKE', "{$search}%");
                    })
                    ->orWhereHas('produto', function ($query) use ($search) {
                        $query->where('nome', 'LIKE', "{$search}%");
                    });
            }
        })->get();

        return $vendas;
    }
    // {
    //     $produto = $this->where(function ($query) use ($search) {
    //         if ($search) {
    //             $query->where('id_venda', $search);
    //             $query->orWhere('id_venda', 'LIKE', "%{$search}%");
    //         }
    //     })->get();

    //     return $produto;
    // }
}
