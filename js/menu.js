$(document).ready(function(){

    $('.nav-link').click(function(e){
        e.preventDefault()

        let url = $(this).attr('href')

        $('#content').empaty()

        $('#content').load(url)
    })
})