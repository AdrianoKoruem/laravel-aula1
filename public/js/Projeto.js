function deleteRegistroPaginacao(rotaUrl, idDoRegistro){
    if(confirm('Deseja excluir?')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                id:idDoRegistro,
            },
            beforeSend: function(){
                $.blockUI({
                    message: 'carregando...',
                    Timeou:2000,
                });
            },
        }).done(function(data){
            $.unblockUI();
            console.log(data);
        }).fail(function(data){
            $.unblockUI();
            alert('Não foi possivel deletar');
        });
    }
}