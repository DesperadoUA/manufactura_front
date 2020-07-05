if(jQuery('.button_show_more_examination') !== 0) {

    let number_examination = '';
    let counter = 1;
    const type = jQuery(".button_show_more_examination").data("type");
    jQuery.ajax(
        '/ajax/show_examination.php',
        {
            type:"POST",
            data: ({lang:LANG, action:'totalNumber', type: type}),
            dataType: "html",
            success: function(data) {
               number_examination = Math.ceil(parseInt(JSON.parse(data))/3);
               if(number_examination > 1) {
                   initialShowButton();
                   jQuery('.wrapper_show_more').fadeIn();
               }
            },
            error: function() {
              alert('There was some error performing the AJAX call!');
            }
         }
      );

      function initialShowButton() {
        jQuery('.button_show_more_examination').click(function(){
            if(number_examination != counter) {
                getPost (LANG, number_examination, type);
                counter++;
            } else {
                jQuery('.wrapper_show more').fadeOut();
            }
        });   
      }
      function getPost (LANG, number_examination, type) {
        jQuery.ajax(
            '/ajax/show_examination.php',
            {
                type:"POST",
                data: ({lang:LANG, action:'getPosts', counter:number_examination, type: type}),
                dataType: "html",
                success: function(data) {
                    if(counter === number_examination) jQuery('.wrapper_show_more').fadeOut();
                    const data_examination = JSON.parse(data);
                    let strCod = '';
                    for(let i=0; i<data_examination['post_title'].length; i++) {
                        strCod = strCod + `<div class="col-lg-6">
                        <img src="${data_examination['img'][i]}">
                    </div><div class="col-lg-6 prof_block">
                    <div class="prof_text"><p class="title color_blue">${data_examination['post_title'][i]}</p>
                        ${data_examination['json_content'][i]['main_content']}
                    </div>
                </div>`;
                    }
                     jQuery('.container_add').append(strCod);
                },
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
             }
          );
      }
}
