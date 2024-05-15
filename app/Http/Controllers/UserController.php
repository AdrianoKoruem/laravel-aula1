<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUser;
use App\Models\componentes;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findUser = $this->user->getUsersPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.user.paginacao', compact('findUser'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = User::find($id);
        $buscarRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarUser(FormRequestUser $request)
    {
        if ($request->method() == 'POST') {

            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
                        
            User::create($data);

            Toastr::success('gravado com sucesso');

            return redirect()->route('user.index');
        }

        return view('pages.user.create');
    }

    public function atualizarUser(FormRequestUser $request, $id)
    {
        if ($request->method() == 'PUT') {

            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $buscarRegistro = User::find($id);
            $buscarRegistro->update($data);

            Toastr::success('gravado com sucesso');

            return redirect()->route('user.index');
        }

        $findUser = User::where('id', '=', $id)->first();

        return view('pages.user.atualiza', compact('findUser'));
    }
}
