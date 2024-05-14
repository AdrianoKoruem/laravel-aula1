<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findVendas = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');

        // dd($findVendas);
        return view('pages.vendas.paginacao', compact('findVendas'));
    }

    public function cadastrarVendas(FormRequestVenda $request)
    {
        if ($request->method() == 'POST') {

            $data = $request->all();

            Venda::create($data);
            
            Toastr::success('gravado com sucesso');

            return redirect()->route('cadastrar.venda');
        }

        return view('pages.vendas.create');
    }
}
