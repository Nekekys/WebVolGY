$('#button').click(function(e){
    e.preventDefault();
    let name = $('input[name = "name"]').val()
    const regex = new RegExp("^(?=\\s*\\S).*$");
    if(regex.test(name)){
        $.ajax({
            url: './mainlogic.php',
            type: 'POST',
            dateType: 'json',
            data: {
                name,
                method: 'add'
            },
            success (data) {
                console.log(data)
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/brands.php"
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
    const regex = new RegExp("^(?=\\s*\\S).*$");
    if(regex.test(name)){
        $.ajax({
            url: './mainlogic.php',
            type: 'PUT',
            dateType: 'json',
            data: {
                id,name
            },
            success (data) {
                console.log(data)
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/brands.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }else{
        $('#errorR').css({display: "block"}).text("Название должно быть не пустым"); 
    }
}

const delFunction = (id) =>{
    $.ajax({
        url: './mainlogic.php',
        type: 'DELETE',
        dateType: 'json',
        data: {
            id
        },
        success (data) {
            data = $.parseJSON(data)
            console.log(data)
            if(data.check){
                document.location.href = "/lr/brands.php"
            }
        }
    })
}

const handOverFunction = (del_id) =>{
    let selected_id = $('select[name = "brand"]').val()
        $.ajax({
            url: './mainlogic.php',
            type: 'POST',
            dateType: 'json',
            data: {
                selected_id,del_id,
                method: 'handOver'
            },
            success (data) {
                console.log(data)
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/brands.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
}