<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_vendas',
        'id_produto',
        'id_cliente',

    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class,'id_produto');
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class,'id_cliente');
    }

    public function getVendasPesquisarIndex(string $search = '')
    {
        $Vendas = $this->with('produto','cliente')->where(function ($query) use ($search) {
            if ($search) {
                $query->where('id_venda', $search);
                $query->orwhere('id_venda', 'LIKE', "{$search}%");
            }
        })->get();

        return $Vendas;
    }
}
