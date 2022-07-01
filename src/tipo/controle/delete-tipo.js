$(document).ready(function(){
    $('#table-tipo').on('click', 'button.btn-delete', function(e) {
        e.preventDefault()

        let ID = `ID=${$(this).attr('id')}`

        Swal.fire({
            title: 'SysRifa',
            text: 'Deseja realmente excluir essas informação amigo?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: ID,
                    url: 'src/tipo/modelo/delete-tipo.php',
                    success: function(dados) {
                          Swal.fire({
                              title: 'SysRifa',
                              text: dados.mensagem,
                              icon: dados.tipo,
                              confirmButtonText: 'OK'
                          })
                          $('#table-tipo').DataTable().ajax.reload()    
                         }
                   })
            }
        })
    })
})