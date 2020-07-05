$('.js-servic-hover').mouseover(function(){
    $(this).prev().find('img').attr("src", "/template/images/triangle.png");
});
$('.js-servic-hover').mouseout(function(){
    $(this).prev().find('img').attr("src", "/template/images/triangle-red.png");
});  