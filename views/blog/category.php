<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="news_page_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo translate("Статьи", "Статті", "Articles"); ?></h1>
                </div>
                <div class="col-lg-12">
                    <div class="wraper_button_news">
                        <div class="button_news"><?php echo translate("Направления", "Напрямки", "Directions"); ?>
                            <div class="dropdown_search">
                                <ul>
                                    <?php
                                    if (count($data_direction) != 0) {
                                        for ($i = 0; $i < count($data_direction['post_title']); $i++) {
                                            echo '<li class="item_select_found" data-type="blog-direction" data-id="' . $data_direction["id"][$i] . '">' . $data_direction["post_title"][$i] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="found_result"></div>
            <div class="row category_news_wrapper">
                <?php
				$button_text = translate(
					"Подробнее",
					"Детальніше",
					"Read more");
                for ($i = 0; $i < count($data_blog['permalink']); $i++) {
                    echo "<div class='col-lg-6'>
                        <div class='litle_card_wrapper'>
                            <div class='litle_card'>
                                <div class='litle_card_left'>
                                  <img src='{$data_blog['img'][$i]}'>
                                  <img src='/template/images/edge.png' class='card_edge'>
                                </div>
                                <div class='litle_card_right'>
                                    <div class='litle_card_right_wrapper'>
                                    <p class='litle_card_text_first color_red'>
                                       {$data_blog['data_field'][$i]}
                                    </p>
                                    <p class='litle_card_text_second color_blue'>
                                       {$data_blog['post_title'][$i]}
                                    </p>
                                    <p>{$data_blog['short_desc'][$i]}</p>
                                    <p class='litle_card_read_more'>
                                       <a href='{$data_blog['permalink'][$i]}'>{$button_text}</a>
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
            <?php if ($total_number_page > 6) require_once(ROOT . "/views/global_block/pagination.php"); ?>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>