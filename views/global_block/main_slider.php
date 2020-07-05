<div class="slider">
    <div class="slider_img"></div>
    <div class="slider_button_left"><img src="/template/images/Left.svg" class="main_slider_arrow_left"></div>
    <div class="slider_button_right"><img src="/template/images/Right.svg" class="main_slider_arrow_right"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="slider_title_1"></p>
                <p class="slider_title_2">Ведение <span>беременности</span></p>
                <button class="button_style background_main slider_button main_slider_link">
					<?= translate(
						"Подробнее",
						"Детальніше",
						"More"); ?>
                </button>
            </div>
        </div>
    </div>
    <div class="support">
        <?php
        if (count($data_main_slider) != 0) {
            for ($i = 0; $i < count($data_main_slider['banner_main']); $i++) {
                echo "<div class='main_slider_item' 
                data-desctopimg='" . $data_main_slider['banner_main'][$i] . "' 
                data-mobileimg='" . $data_main_slider['banner_main'][$i] . "' 
                data-text_1='" . $data_main_slider['banner_text_1'][$i] . "' 
                data-text_2='" . $data_main_slider['banner_text_2'][$i] . "' 
                data-text_3='" . $data_main_slider['banner_text_3'][$i] . "' 
                data-link='" . $data_main_slider['banner_link'][$i] . "'>
                        </div>";
            }
        }
        ?>
    </div>
</div>