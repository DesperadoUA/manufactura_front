<?php
if (count($data_job) != 0) {
    echo "<section class='vacancy fade_out mm_animate' data-animate='fade_in'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'>
                <p class='title_vacancy'>" . translate(
                	"Вакансии",
					"Вакансії",
					"Jobs") . "</p>
            </div>
            <div class='col-lg-12 vacancy_container'>
                <div class='slider_vacancy_left'><img src='/template/images/Left_Hover.svg' class='vacancy_slider_arrow_left'></div>
                <div class='slider_vacancy_right'><img src='/template/images/Right_Hover.svg' class='vacancy_slider_arrow_right'></div>
                <div class='vacancy_wrapper'>
                    <div class='vacancy_box'>";

    for ($i = 0; $i < count($data_job['post_title']); $i++) {
        echo "<div class='vacancy_item'>
        <img src='" . $data_job['img'][$i] . "'>
        <p class='vacancy_item_title'>" . $data_job['post_title'][$i] . "</p>
        <p class='vacancy_item_desc'>" . $data_job['job_desc'][$i] . "</p>
        <ul class='vacancy_button'>
            <li  class='popup_activ_4'><span>" . translate("Отправить резюме", "Відправити резюме", "To send a resume") . "</span></li>
        </ul>
    </div>";
    }

    echo "</div></div></div></div></div></section>";
}
