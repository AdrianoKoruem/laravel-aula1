<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Clientes;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

            Toastr::success('Gravado com sucesso');
            return redirect()->route('vendas.index');
        }

        $findProduto = Produto::all();
        $findCliente = Clientes::all();


        return view('pages.vendas.create', compact('findProduto', 'findCliente'));
    }

    public function enviaComprovantePorEmail($id){
        $buscarVenda = Venda::where('id', '=', $id)->first();
        $produtoNome = $buscarVenda->produto->nome;
        $clienteNome = $buscarVenda->cliente->nome;
        $clienteEmail = $buscarVenda->cliente->email;
        $SendMailData = [

            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome,

        ];

        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($SendMailData));

        Toastr::success('Enviado com sucesso');
        return redirect()->route('vendas.index');
    }

};
