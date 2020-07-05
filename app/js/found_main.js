jQuery(".tab_block").click(function(){
    jQuery(".tab_block").removeClass("activ_tab");
    jQuery(this).addClass("activ_tab");
});

jQuery('.main_find_input').keydown(function(e) {
   if(e.keyCode === 13) {
    const findWorld = $(this).val();
    if(findWorld.length!=0)
    {
        const typeFound = jQuery(".activ_tab").data('type');
        jQuery(".found_result").html('');
            jQuery.ajax(
                '/ajax/main_found.php',
                {
                    type:"POST",
                    data: ({lang:LANG, findWorld:findWorld, typeFound:typeFound}),
                    dataType: "html",
                    success: function(data) {
                        const data_response = JSON.parse(data);
                        if(typeof data_response['permalink'] == "undefined"){
                            jQuery(".found_result").html("<p class='not_found'>"+obj_translate['not_found'][LANG]+"</p>").fadeIn();
                        }
                        else{
                            let strCod='';
                            data_response['permalink'].forEach((element, index) => {
                                strCod=strCod+`<div class="row found_result_row"><div class="col-lg-3"><img src="${data_response['img'][index]}"></div><div class="col-lg-9"><p class="title_found"><a href="${data_response['permalink'][index]}">${data_response['post_title'][index]}</a></p><p class="short_desc_found">${data_response['short_desc'][index]}</p></div></div>`;
                            });
                            jQuery(".found_result").html(strCod).fadeIn();
    
                        }
                    },
                    error: function() {
                      alert('There was some error performing the AJAX call!');
                    }
                 }
              );
    }
    }
});

/* Фильтрация страниц категорий */
jQuery(".item_select_found").click( function(){

    const arrUrlTypeFound = [DOMAIN+'/programs-children/', 
    DOMAIN+'/programs-adults/', 
    DOMAIN+'/programs/', 
    DOMAIN+'/ru/programs-children/', 
    DOMAIN+'/ru/programs-adults/', 
    DOMAIN+'/ru/programs/',
    DOMAIN+'/en/programs-children/', 
    DOMAIN+'/en/programs-adults/', 
    DOMAIN+'/en/programs/'];
    if(arrUrlTypeFound.includes(URL)){
        globalFound(jQuery(this).data("type"), jQuery(this).data("id"), jQuery(this).data("programs_type"));
    } else {
        globalFound(jQuery(this).data("type"), jQuery(this).data("id"));
    }
    jQuery(".pagination_container").fadeOut();
});

function globalFound(typeFound, findId, typePost)
{
    let functionCreateCod = '';
    let findParams = {};
    switch(typeFound){
        case ("staff-direction"): {
            functionCreateCod = createStaffCod;
            break;
        }
        case ("shares-direction"): {
            functionCreateCod = createSharesCod;
            break;
        }
        case ("qa-direction"): {
            functionCreateCod = createQaCod;
            break;
        }
        case ("blog-direction"): {
            functionCreateCod = createBlogCod;
            break;
        }
        case ("news-direction"): {
            functionCreateCod = createBlogCod;
            break;
        }
        case ("programs-direction"): {
            functionCreateCod=createProgramsCod;
            break;
        }
        case ("reviews-direction"): {
            functionCreateCod = createReviewsCod;
            break;
        }
        case ("reviews-staff"): {
            functionCreateCod = createReviewsCod;
            break;
        }
    }

    if(typePost) {
        findParams = {
            lang:LANG, 
            findId:findId, 
            typeFound:typeFound,
            typePost:typePost, 
        }
    }
    else {
       findParams = {
        lang:LANG, 
        findId:findId, 
        typeFound:typeFound,
    }
    }
      jQuery.ajax(
            '/ajax/main_found.php',
            {
                type:"POST",
                data: (findParams),
                dataType: "html",
                success:  functionCreateCod,
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
            }
          );
}

function createStaffCod(data){
    jQuery(".category_doc_wrapper").remove();
    const data_response = JSON.parse(data);
    jQuery('.button_news').removeClass('active_search');

    if(typeof data_response['permalink'] == "undefined"){
        jQuery(".found_result").html("<p class='not_found'>"+obj_translate['not_found'][LANG]+"</p>").fadeIn();
    }
    else{
        let strCod='';
        data_response['permalink'].forEach((element, index) => {
            strCod=strCod+`<div class='col-lg-3 col-md-6'>
            <div class='slider_doc_item'>
                <div class='slider_doc_item_img'>
                    <a href="${data_response['permalink'][index]}"><img src="${data_response['img'][index]}"></a>
                    <img src='/template/images/bottom2.png' class='slider_doc_bottom'>
                </div>
                <div class='slider_doc_info_wrapper'>
                    <div class='slider_doc_item_name'>
                        <p><a href="${data_response['permalink'][index]}">${data_response['post_title'][index]}</a></p>
                    </div>
                    <div class='slider_doc_item_proff'>
                        ${data_response['short_desc'][index]}
                    </div>
                    <div class='slider_doc_item_experience'>
                         <span>${data_response['expirience'][index]}</span>
                    </div>
                    <a href='${data_response['permalink'][index]}'><button class='button_style_program_blue'>${obj_translate['more'][LANG]}</button></a>
                </div>
            </div>
        </div>`;
        });
        strCod='<div class="row category_doc_wrapper">'+strCod+'</div>';
        jQuery(".found_result").html(strCod).fadeIn();

    }

}
function createSharesCod(data) {
    jQuery(".category_news_wrapper").remove();
    const data_response = JSON.parse(data);
	jQuery('.button_news').removeClass('active_search');

    if(typeof data_response['permalink'] == "undefined"){
        jQuery(".found_result").html("<p class='not_found'>"+obj_translate['not_found'][LANG]+"</p>").fadeIn();
    }
    else{
        let strCod='';
        data_response['permalink'].forEach((element, index) => {
            strCod=strCod+`<div class='col-lg-6'>
            <div class='litle_card_wrapper'>
                <div class='litle_card'>
                    <div class='litle_card_left'>
                    <img src='${data_response['img'][index]}'>
                    <img src="/template/images/edge.png" class="card_edge">
                    </div>
                    <div class='litle_card_right'>
                        <div class='litle_card_right_wrapper'>
                        <p class='litle_card_text_first color_red'>${data_response['data_field'][index]}</p>
                        <p class='litle_card_text_second color_blue'>${data_response['post_title'][index]}</p>
                        <p>${data_response['short_desc'][index]}</p>
                        <p class='litle_card_read_more'><a href='${data_response['permalink'][index]}'>${obj_translate['more'][LANG]}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        });
        strCod='<div class="row category_news_wrapper">'+strCod+'</div>';
        jQuery(".found_result").html(strCod).fadeIn();

    }
}
function createQaCod(data){
    jQuery(".category_qa_wrapper").remove();
    const data_response = JSON.parse(data);
	jQuery('.button_news').removeClass('active_search');

        let strCod='';
        data_response['post_title'].forEach((element, index) => {
            strCod=strCod+`<div class='col-lg-12 container_qa'>
            <div class='asc'>
                <div class='asc_wrapper'>
                    <img src='/template/images/queshen.jpg'>
                    <p class='name'>${data_response['post_title'][index]}</p>
                </div>
                <div class='text_asc'>${data_response['json_content'][index]['text_1']}</div>
            </div>
            <div class='ansver'>
                <div class='ansver_wrapper'>
                    <div class='ansver_logo'><img src='/template/images/log-circle.jpg'></div>
                    <div class='ansver_text'>${data_response['json_content'][index]['text_2']}</div>
                </div>
            </div>
        </div>`;
        });
        strCod='<div class="row category_qa_wrapper">'+strCod+'</div>';
        jQuery(".found_result").html(strCod).fadeIn();

}
function createBlogCod(data){

    jQuery(".category_news_wrapper").remove();
    const data_response = JSON.parse(data);
	jQuery('.button_news').removeClass('active_search');

        let strCod='';
        data_response['post_title'].forEach((element, index) => {
            strCod=strCod+`<div class='col-lg-6'>
            <div class='litle_card_wrapper'>
                <div class='litle_card'>
                    <div class='litle_card_left'>
                    <img src='${data_response['img'][index]}'>
                    <img src="/template/images/edge.png" class="card_edge">
                    </div>
                    <div class='litle_card_right'>
                        <div class='litle_card_right_wrapper'>
                        <p class='litle_card_text_first color_red'>${data_response['data_field'][index]}</p>
                        <p class='litle_card_text_second color_blue'>${data_response['post_title'][index]}</p>
                        <p>${data_response['short_desc'][index]}</p>
                        <p class='litle_card_read_more'><a href='${data_response['permalink'][index]}'>${obj_translate['more'][LANG]}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        });
        strCod='<div class="row category_news_wrapper">'+strCod+'</div>';
        jQuery(".found_result").html(strCod).fadeIn();
}
function createProgramsCod(data){
    jQuery(".category_program_wrapper").remove();
    const data_response = JSON.parse(data);
	jQuery('.button_news').removeClass('active_search');

        let strCod='';
        data_response['post_title'].forEach((element, index) => {
            strCod=strCod+`<div class='card_wrapper'>
            <div class='big_card'>
                <div class='big_card_left'>
                    <img src='${data_response['img'][index]}'>
                    <img src='/template/images/edge.png' class='card_edge'>
                </div>
                <div class='big_card_right'>
                    <div class='big_card_right_wrapper'>
                        <p class='program_text_first color_red'>${data_response['data_field'][index]}</p>
                        <p class='program_text_second color_blue'>${data_response['post_title'][index]}</p>
                        <p class='program_text_third'>${data_response['short_desc'][index]}</p>
                        <a href='${data_response['permalink'][index]}'><button class='button_style_program_blue'>${obj_translate['more'][LANG]}</button></a>
                    </div>
                </div>
            </div>
        </div>`;
        });
        strCod='<div class="row category_program_wrapper">'+strCod+'</div>';
        jQuery(".found_result").html(strCod).fadeIn();
}
function createReviewsCod(data){
    jQuery(".category_review_wrapper").remove();
    const data_response = JSON.parse(data);
	jQuery('.button_news').removeClass('active_search');

      let strCod='';
        data_response['post_title'].forEach((element, index) => {
            strCod=strCod+`<div class='reviews_item'>
            <div class='review_section_1'>
                <img src='/template/images/blockquote.jpg'>
                <div class='review_section_name'>
                    <div class='review_date'>${data_response['short_desc'][index]}</div>
                    <p class='review_name'>${data_response['post_title'][index]}</p>
                </div>
            </div>
            <div class='review_section_2'>
            ${data_response['json_content'][index]['main_content']}
            </div>
        </div>`;
        });
        strCod='<div class="row category_review_wrapper">'+strCod+'</div>';
        jQuery(".found_result").html(strCod).fadeIn();
}
jQuery('.staff_find_input').keydown(function(e) {
        if(e.keyCode === 13) {
     const findWorld = $(this).val();
     if(findWorld.length!=0)
     {
         const typeFound = jQuery(this).data('type');
         jQuery(".found_result").html('');
             jQuery.ajax(
                 '/ajax/main_found.php',
                 {
                     type:"POST",
                     data: ({lang:LANG, findWorld:findWorld, typeFound:typeFound}),
                     dataType: "html",
                     success: function(data) {
                         const data_response = JSON.parse(data);
                         if(typeof data_response['permalink'] == "undefined"){
                             jQuery(".found_result").html("<p class='not_found'>"+obj_translate['not_found'][LANG]+"</p>").fadeIn();
                         }
                         else{
                            createStaffCod(data);
                         }
                     },
                     error: function() {
                       alert('There was some error performing the AJAX call!');
                     }
                  }
               );
        
        jQuery(".pagination_container").fadeOut();
     }
     }
 });

jQuery('.button_news').mouseover(function () {
    $(this).addClass('active_search')
})
jQuery('.button_news').mouseout(function () {
	$(this).removeClass('active_search')
})