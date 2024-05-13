function deleteRegistroPaginacao(rotaUrl, idDoRegistro) {
    if (confirm('Deseja excluir?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: idDoRegistro,
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'carregando...',
                    Timeou: 1000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
            } else {
                alert('nao foi possivel deletar')
            }
        }).fail(function (data) {
            $.unblockUI();
            aler.t('Não foi possivel buscar dados');
        });
    };
};