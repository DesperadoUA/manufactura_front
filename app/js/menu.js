
$(".burger").click(function(){
    if($(".mobile_left_menu").hasClass("show_mobile_menu"))
    {
        $(".mobile_left_menu").removeClass("show_mobile_menu")
        $("header").removeClass("move_main_block")
        $("main").removeClass("move_main_block")
        $("footer").removeClass("move_main_block")
        $(".burger").attr('src', '/template/images/burger.png')
    }
    else
    {
        $(".mobile_left_menu").addClass("show_mobile_menu")
        $("header").addClass("move_main_block")
        $("main").addClass("move_main_block")
        $("footer").addClass("move_main_block")
		$(".burger").attr('src', '/template/images/close.png')
    } 
});