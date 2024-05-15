<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $totalDeProdutoCadastrado = $this->buscarTotalProdutoCadastrados();
        $totalVendasCadastrados = $this->buscarTotalVendasCadastrados();
        $totalClienteCadastrados = $this->buscarTotalClienteCadastrados();
        // dd($buscarTotalClienteCadastrados, $buscarTotalProdutoCadastrados, $buscarTotalVendasCadastrados);
        return view('pages.dashboard.dashboard', compact('totalDeProdutoCadastrado','totalClienteCadastrados','totalVendasCadastrados' ));
    }

    public function buscarTotalProdutoCadastrados()
    {
        $findProduto = Produto::all()->count();
        return $findProduto;
    }
    public function buscarTotalClienteCadastrados()
    {
        $find = Clientes::all()->count();
        return $find;
    }
    public function buscarTotalVendasCadastrados()
    {
        $findVendas = Venda::all()->count();
        return $findVendas;
    }
}
