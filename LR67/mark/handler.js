$('#button').click(function(e){
    e.preventDefault();
    let student = $('select[name = "student"]').val()
    let subject = $('select[name = "subject"]').val()
    let mark = $('input[name = "mark"]').val()
    
        $.ajax({
            url: './logicAdd.php',
            type: 'POST',
            dateType: 'json',
            data: {
                student,subject,mark
            },
            success (data) {
                
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/mark.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })

})

$('#errorR').click(()=>{
    $('#errorR').css({display: "none"})
})

const editFunction = (id) =>{
    let student = $('select[name = "student"]').val()
    let subject = $('select[name = "subject"]').val()
    let mark = $('input[name = "mark"]').val()

        $.ajax({
            url: './logicEdit.php',
            type: 'POST',
            dateType: 'json',
            data: {
                id,student,subject,mark
            },
            success (data) {
                
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/mark.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })

}