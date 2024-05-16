{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuário</h1>
    </div>

    <div>
        <form action="{{ route('user.index') }}" method="get">

            <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button>Pesquisar</button>
            <a type="button" href="{{ route('cadastrar.user') }}" class="btn btn-success float-end">
                Incluir usuário
            </a>

        </form>
        <br>
        <div class="table-responsive small">
            @if ($findUser->isEmpty())
                <p> Não existe dados </p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findUser->sortBy('nome') as $user)
                            <tr>
                                <td>{{ ucwords($user->nome) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>

                                    <a href="{{ route('atualizar.user', $user->id) }}" class="btn btn-light btn-sm">
                                        Editar
                                    </a>

                                    <meta name='csrf-token' content=" {{ csrf_token() }}" />
                                    <a onclick="deleteRegistroPaginacao( '{{ route('user.delete') }} ', {{ $user->id }}  )"
                                        class="btn btn-danger btn-sm">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection
