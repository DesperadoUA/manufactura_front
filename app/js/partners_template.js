if(jQuery('.button_show_more_partners') !== 0) {

    let number_partners = '';
    let counter = 1;
    jQuery.ajax(
        '/ajax/show_partners.php',
        {
            type:"POST",
            data: ({lang:LANG, type:'totalNumber'}),
            dataType: "html",
            success: function(data) {
               number_partners = Math.ceil(parseInt(JSON.parse(data))/5);
               if( number_partners>1 ) {
                   initialShowButton();
                   jQuery('.section_5').fadeIn();
               }
            },
            error: function() {
              alert('There was some error performing the AJAX call!');
            }
         }
      );

      function initialShowButton() {
        jQuery('.button_show_more_partners').click(function(){
            if(number_partners != counter) {
                getPartnersPost (LANG, number_partners);
                counter++;
            } else {
                jQuery('.section_5').fadeOut();
            }
        });   
      }
      function getPartnersPost (LANG, number_partners) {
        jQuery.ajax(
            '/ajax/show_partners.php',
            {
                type:"POST",
                data: ({lang:LANG, type:'getPosts', counter:number_partners}),
                dataType: "html",
                success: function(data) {
                    if(counter === number_partners) jQuery('.section_5').fadeOut();
                    const data_partners = JSON.parse(data);
                    let strCod = '';
                    for(let i=0; i<data_partners['post_title'].length; i++) {
                        strCod = strCod + `<div class='partners_row'>
                        <div class='partners_part_left'><img src='${data_partners['img'][i]}'></div>
                        <div class='partners_part_right'>
                            <p class='partners_title'>${data_partners['post_title'][i]}</p>
                            <div class='partners_city'>${data_partners['short_desc'][i]}</div>
                            <p>${data_partners['json_content'][i]['main_content']}</p>
                        </div>
                    </div>`;
                    }
                    jQuery('.section_3').append(strCod);
                },
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
             }
          );
      }
}
