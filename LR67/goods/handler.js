$('#button').click(function(e){
    e.preventDefault();
    let name = $('input[name = "name"]').val()
    let cost = $('input[name = "cost"]').val()
    let des = $('input[name = "des"]').val()
    let ava =  $('input[name = "ava"]').prop('files')[0]
    let brand = $('select[name = "brand"]').val()

    let error = false
    let textError = ''
    const regex = new RegExp("^(?=\\s*\\S).*$");
    const regexYear = new RegExp("^[1-9][0-9]*$");
    if(!regex.test(name) || !regex.test(des)){
        error = true
        textError = "Заполните все поля"
    }
    if(!regexYear.test(cost)){
        error = true
        textError = "Неккоректный ввод"
    }
    if(ava){
        if(!(ava.type == "image/jpeg" || ava.type == "image/png" || ava.type == "image/jpg" || ava.type == "image/gif")) {
            error = true
            textError = "Неправильный формат"
        }
    }else{
        error = true
        textError = "Загрузите файл"
    }
    if(error){
        $('#errorR').css({display: "block"}).text(textError);
    }else{

        let formData = new FormData();
        formData.append('method','POST')
        formData.append('name',name)
        formData.append('cost',cost)
        formData.append('des',des)
        formData.append('ava',ava)
        formData.append('brand',brand)

   
        $.ajax({
            url: './mainlogic.php',
            type: 'POST',
            contentType: false,
           // dateType: 'json',
            data: formData,
            processData: false,
            success (data) {
                console.log(data)
                data = $.parseJSON(data)
                if(data.check){
                    document.location.href = "/lr/goods.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }
        
})

$('#errorR').click(()=>{
    $('#errorR').css({display: "none"})
})

const editFunction = (id, pathLastFile) =>{

    let name = $('input[name = "name"]').val()
    let cost = $('input[name = "cost"]').val()
    let des = $('input[name = "des"]').val()
    let ava =  $('input[name = "ava"]').prop('files')[0]
    let brand = $('select[name = "brand"]').val()

    let error = false
    let textError = ''
    const regex = new RegExp("^(?=\\s*\\S).*$");
    const regexYear = new RegExp("^[1-9][0-9]*$");
    if(!regex.test(name) || !regex.test(des)){
        error = true
        textError = "Заполните все поля"
    }
    if(!regexYear.test(cost)){
        error = true
        textError = "Напишите год рождения правильно"
    }
    if(ava){
        if(!(ava.type == "image/jpeg" || ava.type == "image/png" || ava.type == "image/jpg" || ava.type == "image/gif")) {
            error = true
            textError = "Неправильный формат"
        }
    }
    if(error){
        $('#errorR').css({display: "block"}).text(textError);
    }else{
        let method = 'PUT';
        let formData = new FormData();
        formData.append('id',id)
        formData.append('method',method)
        formData.append('lastfileName',pathLastFile)
        formData.append('name',name)
        formData.append('cost',cost)
        formData.append('des',des)
        formData.append('ava',ava)
        formData.append('brand',brand)

   
        $.ajax({
            url: './mainlogic.php',
            type: 'POST',
            contentType: false,
           // dateType: 'json',
            data: formData,
            processData: false,
            success (data) {
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/goods.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }

}
