<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr as FacadesToastr;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

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
        $id = $request->id;
        $buscarRegistro = Produto::find($id);
        $buscarRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarProduto(FormRequestProduto $request)
    {
        if ($request->method() == 'POST') {

            $data = $request->all();

            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            Produto::create($data);
            
            FacadesToastr::success('gravado com sucesso');

            return redirect()->route('produto.index');
        }

        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == 'PUT') {

            $data = $request->all();

            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscarRegistro = Produto::find($id);
            $buscarRegistro ->update($data);

            FacadesToastr::success('gravado com sucesso');
            
            return redirect()->route('produto.index');

        }

        $findProduto = Produto::where('id', '=' , $id) ->first();
        
        return view('pages.produtos.atualiza', compact('findProduto'));
    }
}
