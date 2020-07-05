<?php if (count($data_doc) != 0) {
    echo "<section class='slider_doc slider_dock_width_title background_gray'>
    <div class='slider_doc_title'><p>" . translate("Наши специалисты", "Наші фахівці", "Our specialists") . "</p></div>
    <div class='slider_doc_wrapper fade_out mm_animate' data-animate='fade_in'>
        <div class='slider_doc_left'><img src='/template/images/Left.svg' class='doc_slider_arrow_left'></div>
        <div class='slider_doc_right'><img src='/template/images/Right.svg' class='doc_slider_arrow_right'></div>
        <div class='slider_doc_center'>
            <div class='slider_doc_box'>";
    for ($i = 0; $i < count($data_doc['post_title']); $i++) {
        echo "<div class='slider_doc_item'>
                    <div class='slider_doc_item_img'>
                        <a href='" . $data_doc['permalink'][$i] . "'><img src='" . $data_doc['img'][$i] . "'></a>
                        <img src='/template/images/bottom2.png' class='slider_doc_bottom'>
                    </div>
                    <div class='slider_doc_item_name'>
                        <p><a href='" . $data_doc['permalink'][$i] . "'>" . $data_doc['post_title'][$i] . "</a></p>
                    </div>
                    <div class='slider_doc_item_proff'>
                    " . $data_doc['desc_doc'][$i] . "
                    </div>
                    <div class='slider_doc_item_experience'>
                        <span>" . $data_doc['expirience'][$i] . "</span>
                    </div>
                    <a href='" . $data_doc['permalink'][$i] . "'><button class='button_style_program_blue'>" . translate("Подробнее", "Детальніше", "More") . "</button></a>
                </div>";
    }
    echo "</div>
            </div>
        </div>
    </section>";
}
