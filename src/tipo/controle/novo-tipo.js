$(document).ready(function() {

    $('.btn-novo').click(function(e) {
        e.preventDefault()

        //Limpar todas as informações já existentes em nossa modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        //Incluir novos textos no cabeçalho na minha janela modal
        $('.modal-title').append('Adicionar novo registro')

        //Incluir o nosso forulário dentro do corpo da nossa janela modal
        $('.modal-body').load('src/tipo/visao/lista-tipo.html')

        //Iremos incluir uma função no botão salvar para demonstrar que é um registro
        $('.btn-salvar').attr('data-operation', 'insert')

        //Abrir a nossa janela modal
        $('#modal-tipo').modal('show')
    })
})