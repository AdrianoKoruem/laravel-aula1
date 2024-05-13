<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\Clientes;
use App\Models\componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Clientes $clientes)
    {
        $this->clientes = $clientes;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findClientes = $this->clientes->getClientesPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.clientes.paginacao', compact('findClientes'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Clientes::find($id);
        $buscarRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(FormRequestClientes $request)
    {
        if ($request->method() == 'POST') {

            $data = $request->all();

            $componentes = new componentes();

            Clientes::create($data);

            Toastr::success('gravado com sucesso');

            return redirect()->route('cliente.index');
        }

        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestClientes $request, $id)
    {
        if ($request->method() == 'PUT') {

            $data = $request->all();

            $componentes = new Componentes();

            $buscarRegistro = Clientes::find($id);
            $buscarRegistro->update($data);

            Toastr::success('gravado com sucesso');

            return redirect()->route('cliente.index');
        }

        $findClientes = clientes::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findClientes'));
    }
}
