<?php
if (array_key_exists('slider_img', $data['json_content'])) {
    if (count($data['json_content']['slider_img']) != 0) {
        echo "<section class='shares_slider'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 shares_slider_container'>
                    <div class='slider_shares_left'><img src='/template/images/Left.svg' class='shares_slider_arrow_left'></div>
                    <div class='slider_shares_right'><img src='/template/images/Right.svg' class='shares_slider_arrow_right'></div>
                    <div class='shares_slider_box'>
                        <div class='shares_slider_wrapper'>";

        for ($i = 0; $i < count($data['json_content']['slider_img']); $i++) {
            echo "<div class='shares_slider_item'>";
            echo "<a href='" . $data['json_content']['slider_permalink'][$i] . "'>
                  <img src='" . $data['json_content']['slider_img'][$i] . "'></a>";
            echo "</div>";
        }

        echo "</div>
                    </div>
                </div>
            </div>
        </div>
    </section>";
    }
}
