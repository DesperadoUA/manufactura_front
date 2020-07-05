jQuery(".find_input_header").keydown(function(e) {
    if(e.keyCode === 13) {
        const findWorld = $(this).val();
        if(findWorld.length!=0) {
          const findObj = { findWorld, LANG };
          localStorage.setItem('findObject', JSON.stringify(findObj));
          if( LANG == 'ru' ) document.location.href = "/ru/search/";
          else if ( LANG == 'ua' ) document.location.href = "/search/";
          else if ( LANG == 'en' ) document.location.href = "/en/search/";
        }
     }
 });

 if(jQuery(".search_template").length!=0)
 {
    if (localStorage.getItem("findObject") !== null) {
        const findObject = JSON.parse(localStorage.getItem('findObject'));
        globalFind(findObject.findWorld);
        localStorage.clear();
    } else {
        const strCod = `<div class="col-lg-12"><p class='not_found'>${obj_translate['not_params_found'][LANG]}</p></div>`;
        jQuery('.found_result').html(strCod).fadeIn();
    }
 }

 function globalFind(findWorld){
    const typeFound = "globalFound";
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
                        createGlobalFind(data_response);
                    }
                },
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
             }
          );
 }
 function createGlobalFind(data_response)
 {
    let strCod='';
        data_response['permalink'].forEach((element, index) => {
            strCod=strCod+`<div class="col-lg-3 result_img"><img src="${data_response['img'][index]}"></div>
              <div class="col-lg-9 result_desc">
                <p class="title_found"><a href="${data_response['permalink'][index]}">${data_response['post_title'][index]}</a></p>
                <p class="short_desc_found">${data_response['short_desc'][index]}</p>
              </div>`;
        });
        strCod='<div class="row category_doc_wrapper">'+strCod+'</div>';
        jQuery(".found_result").html(strCod).fadeIn();

 }