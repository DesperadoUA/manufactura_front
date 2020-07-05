<?php
if (count($data_reviews) != 0) {
    echo "<section class='reviews reviews_slider fade_out mm_animate' data-animate='fade_in'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'><p class='reviews_title'>" . translate("Отзывы о нас", "Відгуки про нас", "Feedback about us") . "</p></div>
            <div class='col-lg-12 wrapper_reviews'>
                <div class='slider_review_left'><img src='/template/images/Left.svg' class='doc_slider_arrow_left'></div>
                <div class='slider_review_right'><img src='/template/images/Right.svg' class='doc_slider_arrow_right'></div>
                <div class='box_reviews'>
                    <div class='container_review'>";
    for ($i = 0; $i < count($data_reviews['post_title']); $i++) {
        echo "<div class='item_review'>
                        <div class='item_review_text text-center'>" . $data_reviews['text'][$i] . "</div>
                        <p class='item_review_name'>" . $data_reviews['post_title'][$i] . "</p>
                    </div>";
    }
    echo "</div>
                </div>
            </div>
            <div class='col-lg-12'>
                <p class='all_link'><a href='" . translate("/ru/feedback/", "/feedback/", "/en/feedback/") . "' class='background_white'>" . translate("все отзывы", "всі відгуки", "all reviews") . "</a></p>
            </div>
        </div>
    </div>
</section>";
}
