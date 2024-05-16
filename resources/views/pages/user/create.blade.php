@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.user') }}">

        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar usuário</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome usuário</label>
            <input type="text" value="{{ old('nome') }}" class="form-control " name="nome" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input value="{{ old('email') }}" type="text" class="form-control " name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input value="{{ old('password') }}" type="password" class="form-control " name="password" required>
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>
@endsection
