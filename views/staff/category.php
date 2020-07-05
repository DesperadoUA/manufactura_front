<?php require_once(ROOT . "/views/layouts/header.php"); ?>
<main class="staff_category_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo translate("Врачи", "Лікарі", "Doctors") ?></h1>
                </div>
                <div class="col-lg-12">
                    <div class="wraper_button_news">
                        <div class="button_news"><?php echo translate("Направление", "Напрямок", "Direction"); ?>
                            <div class="dropdown_search">
                                <ul>
                                    <?php
                                    if (count($data_direction_id) != 0) {
                                        for ($i = 0; $i < count($data_direction['post_title']); $i++) {
                                            echo '<li class="item_select_found" data-type="staff-direction" data-id="' . $data_direction["id"][$i] . '">' . $data_direction["post_title"][$i] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <input type="text" class="staff_find_input"
                               data-type="post_title_doc"
                               placeholder="<?= translate(
                                       "поиск врача",
                                       "пошук лікаря",
                                       "doctor search") ?>">
                    </div>
                </div>
                <div class="found_result"></div>
                <div class="row category_doc_wrapper">
                    <?php
                    if (count($data_staff) !== 0) {
                        for ($i = 0; $i < count($data_staff['permalink']); $i++) {
                             $button_text = translate(
                                       "Подробнее",
                                       "Детальніше",
                                       "Read more");
                            echo " <div class='col-lg-3 col-md-6'>
                            <div class='slider_doc_item'>
                                <div class='slider_doc_item_img'>
                                    <a href='{$data_staff['permalink'][$i]}'>
                                    <img src='{$data_staff['img'][$i]}'></a>
                                    <img src='/template/images/bottom2.png' class='slider_doc_bottom'>
                                </div>
                                <div class='slider_doc_info_wrapper'>
                                    <div class='slider_doc_item_name'>
                                        <p><a href='{$data_staff['permalink'][$i]}'>
                                           {$data_staff['post_title'][$i]}
                                           </a>
                                        </p>
                                    </div>
                                    <div class='slider_doc_item_proff'>
                                        {$data_staff['desc_doc'][$i]}
                                    </div>
                                    <div class='slider_doc_item_experience'>
                                         <span>{$data_staff['expirience'][$i]}</span>
                                    </div>
                                    <a href='{$data_staff['permalink'][$i]}'>
                                       <button class='button_style_program_blue'>{$button_text}</button>
                                    </a>
                                </div>
                            </div>
                        </div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <?php if ($total_number_page > 8) require_once(ROOT . "/views/global_block/pagination.php"); ?>
        </div>
    </section>
    <?php // require_once(ROOT . "/views/global_block/block_article.php");  
    ?>
</main>
<?php require_once(ROOT . "/views/layouts/footer.php"); ?>