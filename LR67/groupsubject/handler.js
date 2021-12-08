$('#button').click(function(e){
    e.preventDefault();
    let group = $('select[name = "group"]').val()
    let subject = $('select[name = "subject"]').val()



        $.ajax({
            url: './logicAdd.php',
            type: 'POST',
            dateType: 'json',
            data: {
                group,subject
            },
            success (data) {
                
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/groupsubject.php"
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
    let group = $('select[name = "group"]').val()
    let subject = $('select[name = "subject"]').val()

        $.ajax({
            url: './logicEdit.php',
            type: 'POST',
            dateType: 'json',
            data: {
                id,group,subject
            },
            success (data) {
                
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/groupsubject.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })

}