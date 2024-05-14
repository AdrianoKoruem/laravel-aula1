{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>

    <div>
        <form action="{{ route('vendas.index') }}" method="get">

            <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button>Pesquisar</button>
            <a type="button" href="{{ route('cadastrar.venda') }}" class="btn btn-success float-end">
                Incluir Vendas
            </a>

        </form>
        <br>
        <div class="table-responsive small">
            @if ($findVendas->isEmpty())
                <p> Não existe dados </p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Numeração</th>
                            <th>Produto</th>
                            <th>Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findVendas as $venda)
                            <tr>
                                <td>{{ $venda->id_venda }}</td>
                                <td>{{ $venda->produto->nome}}</td>
                                <td>{{ $venda->cliente->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>


    <script>
        alert("Eu sou um alert!");
    </script>

    <script>
        alert("Segundo Alerta");
    </script>
@endsection
