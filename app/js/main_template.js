jQuery(document).ready(function () {
    const WIDTH_SCREEN = screen.width;
    const URL = document.location.href;
    const DOMAIN = location.protocol + "//" + location.host;
    let LANG = '';

    if(URL.includes("/ru/")) {
      LANG = 'ru';
    } else if (URL.includes("/en/")){
      LANG = 'en';
    } else {
      LANG = 'ua';  
    }

    // Ховера слайдера
    jQuery(".main_slider_arrow_left").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Left_Hover.svg");
    });
    jQuery(".main_slider_arrow_left").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Left.svg");
    });
    jQuery(".main_slider_arrow_right").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Right_Hover.svg");
    });
    jQuery(".main_slider_arrow_right").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Right.svg");
    });
    jQuery(".doc_slider_arrow_left").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Left_Hover.svg");
    });
    jQuery(".doc_slider_arrow_left").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Left.svg");
    });
    jQuery(".doc_slider_arrow_right").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Right_Hover.svg");
    });
    jQuery(".doc_slider_arrow_right").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Right.svg");
    });
    jQuery(".vacancy_slider_arrow_right").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Right.svg");
    });
    jQuery(".vacancy_slider_arrow_right").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Right_Hover.svg");
    });
    jQuery(".vacancy_slider_arrow_left").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Left.svg");
    });
    jQuery(".vacancy_slider_arrow_left").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Left_Hover.svg");
    });
    jQuery(".shares_slider_arrow_left").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Left.svg");
    });
    jQuery(".shares_slider_arrow_left").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Left_Hover.svg");
    });
    jQuery(".shares_slider_arrow_right").mouseout(function () {
        jQuery(this).attr("src", "/template/images/Right.svg");
    });
    jQuery(".shares_slider_arrow_right").mouseover(function () {
        jQuery(this).attr("src", "/template/images/Right_Hover.svg");
    });

    if(jQuery('.shares_slider_wrapper').length !== 0) {
        if(jQuery('.shares_slider_item').length === 1) {
            jQuery('.slider_shares_left').fadeOut();
            jQuery('.slider_shares_right').fadeOut(); 
        }
    }
    if(jQuery('.reviews_slider').length !== 0) {
        if(jQuery('.item_review').length === 1) {
            jQuery('.slider_review_left').fadeOut();
            jQuery('.slider_review_right').fadeOut();
        }
    }
    // Конец Ховера слайдера 
