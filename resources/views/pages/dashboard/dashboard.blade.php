@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produto Cadastrados</h5>
                    <p class="card-text">Total de Produtos Cadastrados = {{ $totalDeProdutoCadastrado }}</p>
                    <a href="{{ route('produto.index') }}" class="btn btn-primary"> Ir para Produtos </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vendas Cadastradas</h5>
                    <p class="card-text">Total de Vendas Cadastradas = {{ $totalVendasCadastrados }}</p>
                    <a href="{{ route('vendas.index') }}" class="btn btn-primary">Ir para Vendas</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clientes Cadastrados</h5>
                    <p class="card-text">Total de Clientes Cadastrados = {{ $totalClienteCadastrados }}</p>
                    <a href="{{ route('cliente.index') }}" class="btn btn-primary">Ir para Clientes</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuários Cadastrados</h5>
                    <p class="card-text">Total de Usuários Cadastrados = {{ $totalUserCadastrados }} </p>
                    <a href="{{route('user.index')}}" class="btn btn-primary" >Ir para Usuário</a>
                </div>
            </div>
        </div>
    </div>
@endsection
