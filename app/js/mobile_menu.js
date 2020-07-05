$(".mobile_dropdown_li").click(function(){
    if($(this).hasClass('active_menu')) {
        $(this).removeClass('active_menu');
        $(this).find('.mobile_dropdown_menu').fadeOut(500);
    } else {
        $(this).find('.mobile_dropdown_menu').fadeIn(500);
        $(this).addClass('active_menu');
    }
}); 