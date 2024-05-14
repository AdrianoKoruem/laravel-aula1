@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.venda') }}">

        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar nova venda</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Produto</label>
            <select class="form-select" name="id_produto">
                <option disabled selected>CLIQUE AQUI PARA SELECIONAR</option>
                @foreach ($findProduto->unique('nome') as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->id }} - {{ ucwords($produto->nome) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-select" name="id_cliente"">
                <option disabled selected>CLIQUE AQUI PARA SELECIONAR</option>
                @foreach ($findCliente->unique('nome') as $cliente)
                    <option value="{{ $cliente->id }}">{{ ucwords($cliente->nome) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>
@endsection
