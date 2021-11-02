
$('#buttonL').click(function(e){
    
    e.preventDefault();
    let text = $('textarea[name = "text"]').val()
    
    $.ajax({
        url: 'logics/textLogics.php',
        type: 'POST',
        dateType: 'json',
        data: {text},
        success (data) {
            data = $.parseJSON(data)
            console.log(data)
            $('.text_content').html(data)
        }
    })
    
})
