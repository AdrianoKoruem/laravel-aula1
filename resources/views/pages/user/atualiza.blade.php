@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('atualizar.user', $findUser->id) }}">

        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Usuário</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome Usuário</label>
            <input type="text" value="{{ old('nome') }}" class="form-control " name="nome" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" value="{{ old('email') }}" class="form-control " name="email" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" value="{{ old('password') }}" class="form-control " name="password" required>
        </div>
        

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>
@endsection
