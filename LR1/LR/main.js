
$('#open').hover(function(){
    $('#hidden').removeClass("d-none")
})

$('.hidden_con').mouseleave(function () {
    $(this).addClass("d-none")
})


$('.img_gallery').hover(function(){
    $('.img_gallery').removeClass("active")
    $(this).addClass("active")
    $('#main').attr("src",$(this).attr("src"));
})
$('.img_gallery').click(function(){
    $('.img_gallery').removeClass("active")
    $(this).addClass("active")
    $('#main').attr("src",$(this).attr("src"));
})
$('.prices_size-button').click(function(){
    $('.prices_size-button').removeClass("active")
    $(this).addClass("active")
})

let numberCount = 1
$('#number').text(numberCount)

$('#minus').click(function () {
    if(numberCount != 1){
        numberCount--
        $('#number').text(numberCount)
    }
})
$('#plus').click(function () {
    numberCount++
    $('#number').text(numberCount)
})

$('div#show').eq(1).hide()
$('div#show').eq(2).hide()
$('.mini_nav-elem').click(function(){
    $('.mini_nav-elem').removeClass("active")
    $(this).addClass("active")
    $('div#show').hide()
    let k = $(this).attr('var')
    $('div#show').eq(k-1).show()
})



/*
$('#show1').hide()
console.log($('div#show1'))


$('#var1').click(function () {
    $('#show2').hide()
    $('#show3').hide()
    $('#show1').show()
})
$('#var2').click(function () {
    console.log(213)
    $('#show2').show()
    $('#show3').hide()
    $('#show1').hide()
})
$('#var3').click(function () {
    console.log(213)
    $('#show2').hide()
    $('#show3').show()
    $('#show1').hide()
})
*/
