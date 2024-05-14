@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.cliente') }}">

        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar novo cliente</h1>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome cliente</label>
            <input type="text" value="{{ old('nome') }}" class="form-control " name="nome" required>
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input id="email" value="{{ old('email') }}" class="form-control " name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">CEP</label>
            <input id="cep" value="{{ old('cep') }}" class="form-control " name="cep">
        </div>
        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input id="endereco" value="{{ old('endereco') }}" class="form-control " name="endereco">
        </div>
        <div class="mb-3">
            <label class="form-label">Logradouro</label>
            <input id="logradouro" value="{{ old('logradouro') }}" class="form-control " name="logradouro">
        </div>
        <div class="mb-3">
            <label class="form-label">Bairro</label>
            <input id="bairro" value="{{ old('bairro') }}" class="form-control " name="bairro">
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>

    </form>

    <script>

$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#logradouro").val(" ");
            $("#bairro").val(" ");
            $("#endereco").val(" ");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#logradouro").val(dados.logradouro.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#endereco").val(dados.localidade.toUpperCase());
                }
                else {
                    alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});

    </script>
@endsection
