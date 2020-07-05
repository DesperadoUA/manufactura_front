<div class="direction_form">
    <div class="container">
        <div class="row reviews_wrapper_form">
            <div class="col-lg-12 text-center  mm_form_title"><?php echo translate("Оставить отзыв", "Залишити відгук", "Leave a review"); ?></div>
            <div class="col-lg-6 col-md-6 mm_form_input"><input type="text" name="reviews_form_name" placeholder="<?php echo translate("Имя", "Iм'я", "Name"); ?>" required></div>
            <div class="col-lg-6 col-md-6 mm_form_input"><input type="email" name="reviews_form_email" placeholder="Email" required></div>
            <div class="col-lg-12 mm_form_textarea">
                <textarea name="reviews_form_comment" placeholder="<?php echo translate("Отзыв", "Відгук", "Review"); ?>"></textarea>
            </div>
            <div class="col-lg-12 text-center mm_form_submite"><button id="review_form_submite"><?php echo translate("Отправить", "Надіслати", "Submit"); ?></button></div>
            <div class="block_error_queshen"></div>
        </div>
    </div>
</div>