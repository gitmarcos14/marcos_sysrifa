$(document).ready(function(){
    $('#table-tipo').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "src/tipo/modelo/list-tipo.php",
            "type": "POST"
        },
        "columns": [{
            "data": 'ID',
            "className": 'text-center'
        },
        {
            "data": 'NOME',
            "className": 'text-center'
        },
        {
            "data": 'ID',
            "className": 'text-center',
            "orderable": false,
            "searchble": false,
            "render": function(data, type, row, meta){
                return `
                <button id="${data}" class="btn btn-info btn-view"><i class="fa-solid fa-eye"></i></button>
                <button id="${data}" class="btn btn-warning btn-edit"><i class="fa-solid fa-pen"></i></button>
                <button id="${data}" class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                `
            }
        }
    ]
    })
})