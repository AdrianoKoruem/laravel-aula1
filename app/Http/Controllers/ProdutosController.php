<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller

{
    public function __construct(Produto $produto)
    {
        $this->produtos = $produto;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findProduto = $this->produtos->getProdutosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request)
    {
        return response()->json(['success' => true]);
    }
}
