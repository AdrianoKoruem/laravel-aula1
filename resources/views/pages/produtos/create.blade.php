@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.produto') }}">

        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar novo produto</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome produto</label>
            <input type="text" value="{{ old('nome') }}" class="form-control " name="nome" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor do produto</label>
            <input id="money" value="{{ old('valor') }}" type="text" class="form-control " name="valor"
                required>
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>
@endsection
