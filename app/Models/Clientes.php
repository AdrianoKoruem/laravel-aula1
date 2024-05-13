<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [

        'nome',
        'email',
        'endereco',
        'logradouro',
        'bairro',
        'cep',

    ];

    public function getClientesPesquisarIndex(string $search = '')
    {
        $clientes = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orwhere('nome', 'LIKE', "{$search}%");
            }
        })->get();

        return $clientes;
    }
}
