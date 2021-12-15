

const deleteMain = (id,page) =>{
    let result = confirm("Вы действительно хотите удалить запись?");
    if(result){
        $.ajax({
            url: './'+ page +'/mainlogic.php',
            type: 'DELETE',
            dateType: 'json',
            data: {
                id
            },
            success (data) {
                data = $.parseJSON(data)
                console.log(data)
                if(data.check){
                    document.location.href = "/lr/"+page+".php"
                }
            }
        })
    }
}

