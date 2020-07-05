setTimeout(()=>{
    $(".preloader").fadeOut(700);
}, 1000);

if(WIDTH_SCREEN>1000)
{
    let arr_img_desctop = $("[data-desctop-easy-load]"); 
    for(let i=0; i<$("[data-desctop-easy-load]").length; i++)
    {
      arr_img_desctop[i].src=$("[data-desctop-easy-load]").eq(i).data("desctop-easy-load"); 
    }
}
else
{
    let arr_img_mobile = $("[data-mobile-easy-load]"); 
    for(let i=0; i<$("[data-mobile-easy-load]").length; i++)
    {
        arr_img_mobile[i].src=$("[data-mobile-easy-load]").eq(i).data("mobile-easy-load");
    }
}