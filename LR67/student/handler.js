$('#button').click(function(e){
    e.preventDefault();
    let name = $('input[name = "name"]').val()
    let gr = $('input[name = "gr"]').val()
    let edu = $('input[name = "edu"]').val()
    let email = $('input[name = "email"]').val()
    let ava =  $('input[name = "ava"]').prop('files')[0]
    let group = $('select[name = "group"]').val()

    let error = false
    let textError = ''
    const regex = new RegExp("^(?=\\s*\\S).*$");
    const regexYear = new RegExp("^[1-9][0-9]{3}$");
    if(!regex.test(name) || !regex.test(edu) || !regex.test(email)){
        error = true
        textError = "Заполните все поля"
    }
    if(!regexYear.test(gr)){
        error = true
        textError = "Напишите год рождения правильно"
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
        formData.append('name',name)
        formData.append('year',gr)
        formData.append('edu',edu)
        formData.append('email',email)
        formData.append('ava',ava)
        formData.append('group',group)

   
        $.ajax({
            url: './logicAdd.php',
            type: 'POST',
            contentType: false,
           // dateType: 'json',
            data: formData,
            processData: false,
            success (data) {
                data = $.parseJSON(data)
                if(data.check){
                    document.location.href = "/lr/student.php"
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

const editFunction = (id) =>{

    let name = $('input[name = "name"]').val()
    let gr = $('input[name = "gr"]').val()
    let edu = $('input[name = "edu"]').val()
    let email = $('input[name = "email"]').val()
    let ava =  $('input[name = "ava"]').prop('files')[0]
    let group = $('select[name = "group"]').val()

    let error = false
    let textError = ''
    const regex = new RegExp("^(?=\\s*\\S).*$");
    const regexYear = new RegExp("^[1-9][0-9]{3}$");
    if(!regex.test(name) || !regex.test(edu) || !regex.test(email)){
        error = true
        textError = "Заполните все поля"
    }
    if(!regexYear.test(gr)){
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

        let formData = new FormData();
        formData.append('id',id)
        formData.append('name',name)
        formData.append('year',gr)
        formData.append('edu',edu)
        formData.append('email',email)
        formData.append('ava',ava)
        formData.append('group',group)

   
        $.ajax({
            url: './logicEdit.php',
            type: 'POST',
            contentType: false,
           // dateType: 'json',
            data: formData,
            processData: false,
            success (data) {
                data = $.parseJSON(data)
                if(data.check){
                    document.location.href = "/lr/student.php"
                }else{
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }

}
