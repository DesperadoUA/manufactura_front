const AJAX_PATH = '/ajax/mailer.php';

jQuery("#appointment_form_submite").click(function(){
    check_error_form_appointment();
});

const error_desc = {
        short_name: {
            ru: 'Введите имя',
            ua: 'Введіть ім\'я',
            en: 'Enter your name'
        },
        short_comment: {
            ru: 'Заполните комментарий',
            ua: 'Заповніть коментар',
            en: 'Fill out a comment'
        },
        invalid_email:
        {
            ru: 'Ошибка в почте',
            ua: 'Помилка в пошті',
            en: 'Invalid mailbox'
        },
        short_phone:
        {
            ru: 'Введите номер телефона',
            ua: 'Введіть номер телефону',
            en: 'Enter phone number'
        },
        invalid_phone:
        {
            ru: 'Номер телефона содержит некорректные символы',
            ua: 'Номер телефону містить некоректні символи',
            en: 'Phone number contains invalid characters'
        },
        short_comment:
        {
            ru: 'Введите комментарий',
            ua: 'Введіть коментар',
            en: 'Enter a comment'
        },
        policy:
        {
            ru: 'Обработка данных не разрешена',
            ua: 'Обробка даних не дозволена',
            en: 'Data processing not allowed'
        },
        file_empty:
        {
            ru: 'Загрузите файл',
            ua: 'Завантажте файл',
            en: 'Upload file'
        },
        vacancy_empty: {
            ru: 'Укажите вакансию',
            ua: 'Вкажіть вакансію',
            en: 'Specify a vacancy'
        },
        format_files: {
            ru: 'Разрешенные форматы файлов txt, pdf',
            ua: 'Дозволені формати файлів txt, pdf',
            en: 'Permitted file formats txt, pdf'
        }
    }
array_number=['(', ')', '-', ' ', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9']

jQuery("#queshen_form_submite").click(function(){
    check_error_form_queshen();
});
jQuery("#main_form_submite").click(function(){
    check_error_form_main();
});
jQuery("#job_form_submite").click(function(){
    event.preventDefault();
   check_error_form_job();
});
jQuery("#review_form_submite").click(function(){
    check_error_form_reviews();
});

function check_error_form_appointment(){
	const data={};
	data['name'] = jQuery("input[name='appointment_form_name']").val();
	data['phone'] = jQuery("input[name='appointment_form_tel']").val();
	data['email'] = jQuery("input[name='appointment_form_email']").val();
	data['data'] = jQuery("input[name='appointment_form_data']").val();
	data['direction'] = jQuery("select[name='appointment_form_direction']").val();
	data['comment'] = jQuery("textarea[name='appointment_form_comment']").val();
	const error=[];
	if(data['name'].length === 0){
		error.push(error_desc['short_name'][LANG]);
	}
	if(data['phone'].length === 0){
		error.push(error_desc['short_phone'][LANG]);
	}
	for(let i=0; i<data['phone'].length; i++){
		if(!array_number.includes(data['phone'][i])){
			error.push(error_desc['invalid_phone'][LANG]);
			break;
		}
	}
	if(!data['email'].includes('@')){
		error.push(error_desc['invalid_email'][LANG]);
	}
	if(error.length === 0){
		jQuery(".block_error_appointment").html('');
		jQuery.ajax(
			'/ajax/mailer.php',
			{
				type:"POST",
				data: ({name:data['name'],
					phone:data['phone'],
					email:data['email'],
					data:data['data'],
					direction:data['direction'],
					comment:data['comment'],
					form:'appointment'}),
				dataType: "html",
				success: function() {
					jQuery(".appointment_wrapper_form")
						.html(`<div class='col-lg-12 text-center  mm_form_title'>${obj_translate['form_success'][LANG]}</div>`);
				},
				error: function() {
					alert('There was some error performing the AJAX call!');
				}
			}
		);
	}
	else{
		let errorCod='';
		error.forEach(item => {
			errorCod=errorCod + "<p>" +item+ "</p>";
		});
		jQuery(".block_error_appointment").html(errorCod);
	}


}
function check_error_form_queshen(){
    const data={};
    data['name'] = jQuery("input[name='queshen_form_name']").val();
    data['email'] = jQuery("input[name='queshen_form_email']").val();
    data['comment'] = jQuery("textarea[name='queshen_form_comment']").val();
    const error=[];
    if(data['name'].length === 0) error.push(error_desc['short_name'][LANG]);
    if(data['comment'].length === 0) error.push(error_desc['short_comment'][LANG]);
    if(!data['email'].includes('@')) error.push(error_desc['invalid_email'][LANG]);
    if(error.length === 0){
        jQuery(".block_error_queshen").html('');
        jQuery.ajax(
            AJAX_PATH,
            {
                type:"POST",
                data: ({name:data['name'], email:data['email'], comment:data['comment'], form:'queshen'}),
                dataType: "html",
                success: function(data) {
					jQuery(".queshen_wrapper_form")
						.html(`<div class='col-lg-12 text-center  mm_form_title'>${obj_translate['form_success'][LANG]}</div>`);
                },
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
             }
          );
    }
    else{
        let errorCod='';
        error.forEach(item=>{
            errorCod=errorCod + "<p>" +item+ "</p>";
        });
        jQuery(".block_error_queshen").html(errorCod);
    } 
}
function check_error_form_main() {
    const data={};
    data['name'] = jQuery("input[name='main_form_name']").val();
    data['email'] = jQuery("input[name='main_form_email']").val();
    data['comment'] = jQuery("textarea[name='main_form_comment']").val();
    data['main_form_direction'] = jQuery("select[name='main_form_direction']").val();
    data['phone'] = jQuery("input[name='main_form_tel']").val();
    data['data'] = jQuery("input[name='main_form_data']").val();
    data['policy'] = jQuery("input[name='main_form_policy']").prop('checked');
    
    const error=[];
    if(data['name'].length === 0) error.push(error_desc['short_name'][LANG]);
    if(!data['email'].includes('@')) error.push(error_desc['invalid_email'][LANG]);
    if(!data['policy']) error.push(error_desc['policy'][LANG]);
    if(data['phone'].length === 0) error.push(error_desc['short_phone'][LANG]);
    for(let i=0; i<data['phone'].length; i++){
        if(!array_number.includes(data['phone'][i])){
            error.push(error_desc['invalid_phone'][LANG]);
            break;
        }
    }
    if(error.length === 0){
        jQuery(".block_error_main").html('');
        jQuery.ajax(
            AJAX_PATH,
            {
                type:"POST",
                data: ({name:data['name'], email:data['email'], comment:data['comment'], direction:data['main_form_direction'], tel:data['phone'], data:data['data'], form:'main'}),
                dataType: "html",
                success: function(data) {
					jQuery("input[name='main_form_name']").val('');
					jQuery("input[name='main_form_email']").val('');
					jQuery("textarea[name='main_form_comment']").val('');
					jQuery("input[name='main_form_tel']").val('');
                    jQuery(".block_error_main").html("<p>Данные отправлены</p>");
                },
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
             }
          );
    }
    else{
        let errorCod='';
        error.forEach(item=>{
            errorCod=errorCod + "<p>" +item+ "</p>";
        });
        jQuery(".block_error_main").html(errorCod);
    }
}
function check_error_form_job () {
    const data={};
    data['name'] = jQuery("input[name='job_form_name']").val();
    data['email'] = jQuery("input[name='job_form_email']").val();
    data['phone'] = jQuery("input[name='job_form_tel']").val();
    data['vacancy'] = jQuery("input[name='job_form_vacancy']").val();
    data['comment'] = jQuery("textarea[name='job_form_comment']").val();
    data['file'] = jQuery("input[name='job_form_file']").val();
    const error=[];
    if(data['file'].length === 0) error.push(error_desc['file_empty'][LANG]);
    if(!data['file'].endsWith('.txt') && !data['file'].endsWith('.pdf')) error.push(error_desc['format_files'][LANG]);
    if(data['vacancy'].length === 0) error.push(error_desc['vacancy_empty'][LANG]);
    if(data['name'].length === 0) error.push(error_desc['short_name'][LANG]);
    if(!data['email'].includes('@')) error.push(error_desc['invalid_email'][LANG]);
    if(data['phone'].length === 0) error.push(error_desc['short_phone'][LANG]);

    for(let i=0; i<data['phone'].length; i++){
        if(!array_number.includes(data['phone'][i])){
            error.push(error_desc['invalid_phone'][LANG]);
            break;
        }
    }
    if(error.length === 0){
        const form = document.forms['vacancy_form'];
        const formData = new FormData(form);
        formData.append('form', 'job');
        jQuery.ajax(
            AJAX_PATH,
            {
                type:"POST",
                enctype: 'multipart/form-data',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
					jQuery(".job_wrapper_form")
						.html(`<div class='col-lg-12 text-center  mm_form_title'>${obj_translate['form_success'][LANG]}</div>`);
                },
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
             }
          );
    } else {
        let errorCod='';
        error.forEach(item => {
            errorCod = errorCod + "<p>" +item+ "</p>";
        });
        jQuery(".block_error_job").html(errorCod);
    }    
}
function check_error_form_reviews(){
    const data={};
    data['name'] = jQuery("input[name='reviews_form_name']").val();
    data['email'] = jQuery("input[name='reviews_form_email']").val();
    data['comment'] = jQuery("textarea[name='reviews_form_comment']").val();
    const error=[];
    if(data['name'].length === 0) error.push(error_desc['short_name'][LANG]);
    if(data['comment'].length === 0) error.push(error_desc['short_comment'][LANG]);
    if(!data['email'].includes('@')) error.push(error_desc['invalid_email'][LANG]);

    if(error.length === 0){
        jQuery(".block_error_queshen").html('');
        jQuery.ajax(
            AJAX_PATH,
            {
                type:"POST",
                data: ({name:data['name'],
                    email:data['email'],
                    comment:data['comment'],
                    form:'reviews'}),
                dataType: "html",
                success: function(data) {
					jQuery(".reviews_wrapper_form")
						.html(`<div class='col-lg-12 text-center  mm_form_title'>${obj_translate['form_success'][LANG]}</div>`);
                },
                error: function() {
                  alert('There was some error performing the AJAX call!');
                }
             }
          );
    } else {
        let errorCod='';
        error.forEach(item=>{
            errorCod=errorCod + "<p>" +item+ "</p>";
        });
        jQuery(".block_error_queshen").html(errorCod);
    }    
}