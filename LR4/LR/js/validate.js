$('#button').click(function(e){
    e.preventDefault();
    let email = $('input[name = "email"]').val()
    let name = $('input[name = "name"]').val()
    let last_name =  $('input[name = "last_name"]').val()
    let otchestvo = $('input[name = "otchestvo"]').val()
    let sex = $('input[name = "sex"]').val()
    let rhesus_factor = $('input[name = "rhesus_factor"]').val()
    let blood_type = $('#select').val()
    let date = $('input[name = "date"]').val()
    let adress = $('input[name = "adress"]').val()
    let interests = $('input[name = "interests"]').val()
    let src_vk = $('input[name = "src_vk"]').val()
    let password = $('input[name = "password"]').val()
    let password2 = $('input[name = "password2"]').val()


    

    $.ajax({
        url: 'logics/signup.php',
        type: 'POST',
        dateType: 'json',
        data: {
            email,name,last_name,otchestvo,sex,rhesus_factor,blood_type,
            date,adress, interests, src_vk, password, password2
        },
        success (data) {

            data = $.parseJSON(data)
            if(data.check){
                document.location.href = "index.php"
            }else{
                $('#errorR').css({display: "block"}).text(data.error);
            }
        }
    })
})

$('#errorR').click(function(){
    $('#errorR').css({display: "none"}).text(null);
})

$('#buttonL').click(function(e){
    e.preventDefault();
    let email = $('input[name = "email"]').val()
    let password = $('input[name = "password"]').val()

    $.ajax({
        url: 'logics/signin.php',
        type: 'POST',
        dateType: 'json',
        data: {
            email, password
        },
        success (data) {
            data = $.parseJSON(data)
            if(data.check){
                document.location.href = "index.php"
            }else{
                $('#errorL').css({display: "block"}).text(data.error);
            }
        }
    })
})

$('#errorL').click(function(){
    $('#errorL').css({display: "none"}).text(null);
})