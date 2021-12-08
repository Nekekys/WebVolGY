$('#button').click(function(e){
    e.preventDefault();
    let name = $('input[name = "name"]').val()
    const regex = new RegExp("^(?=\\s*\\S).*$");
    if(regex.test(name)){
        $.ajax({
            url: './logicAdd.php',
            type: 'POST',
            dateType: 'json',
            data: {
                name
            },
            success (data) {
                
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/subject.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }else{
        $('#errorR').css({display: "block"}).text("Название должно быть не пустым"); 
    }
})

$('#errorR').click(()=>{
    $('#errorR').css({display: "none"})
})

const editFunction = (id) =>{
    let name = $('input[name = "name"]').val()
    console.log(id, name)
    const regex = new RegExp("^(?=\\s*\\S).*$");
    if(regex.test(name)){
        $.ajax({
            url: './logicEdit.php',
            type: 'POST',
            dateType: 'json',
            data: {
                id,name
            },
            success (data) {
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/subject.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }else{
        $('#errorR').css({display: "block"}).text("Название должно быть не пустым"); 
    }
}
