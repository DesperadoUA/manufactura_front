<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="feedback_page_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?= translate(
                            "Отзывы",
                            "Відгуки",
                            "Reviews"); ?></h1>
                    <div class="wraper_button_review">
                        <div class="button_news">
                            <?= translate(
                                    "НАПРАВЛЕНИЕ",
                                    "НАПРЯМОК",
                                    "DIRECTION"); ?>
                            <div class="dropdown_search">
                                <ul>
                                    <?php
                                    if (count($data_direction) != 0) {
                                        for ($i = 0; $i < count($data_direction['post_title']); $i++) {
                                            echo '<li class="item_select_found" data-type="reviews-direction" data-id="' . $data_direction["id"][$i] . '">' . $data_direction["post_title"][$i] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="button_news">
                            <?= translate(
                                    "Лечащий врач",
                                    "Лікуючий лікар",
                                    "Therapist"); ?>
                            <div class="dropdown_search">
                                <ul>
                                    <?php
                                    if (count($data_staff) != 0) {
                                        for ($i = 0; $i < count($data_staff['post_title']); $i++) {
                                            echo '<li class="item_select_found" data-type="reviews-staff" data-id="' . $data_staff["id"][$i] . '">' . $data_staff["post_title"][$i] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="button_review popup_activ_3"><?php echo translate("оставить отзыв", "залишити відгук", "leave feedback"); ?></div>
                    </div>
                </div>
                <div class="col-lg-12 container_reviews category_review_wrapper">
                    <?php
                    if ($data_feedback != '') {
                        for ($i = 0; $i < count($data_feedback['post_title']); $i++) {
                            echo "<div class='reviews_item'>
                            <div class='review_section_1'>
                                <img src='/template/images/blockquote.jpg'>
                                <div class='review_section_name'>
                                    <div class='review_date'>" . $data_feedback['short_desc'][$i] . "</div>
                                    <p class='review_name'>" . $data_feedback['post_title'][$i] . "</p>
                                </div>
                            </div>
                            <div class='review_section_2'>
                                <p>" . $data_feedback['json_content'][$i]->main_content . "</p>
                            </div>
                        </div>";
                        }
                    }
                    ?>
                </div>
                <div class="found_result"></div>
            </div>
            <?php if ($total_number_page > 3) require_once(ROOT . "/views/global_block/pagination.php"); ?>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>