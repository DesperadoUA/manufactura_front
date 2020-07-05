<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="qa_category_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $data['post_title']; ?></h1>
                </div>
                <div class="col-lg-12">
                    <div class="wraper_button_news">
                        <div class="button_news direction_button">
                            <?php echo translate("Направления", "Напрямки", "Directions"); ?>
                            <div class="dropdown_search">
                                <ul>
                                    <?php
                                    if (count($data_direction) != 0) {
                                        for ($i = 0; $i < count($data_direction['post_title']); $i++) {
                                            echo '<li class="item_select_found" data-type="qa-direction" 
                                            data-id="' . $data_direction["id"][$i] . '">' . $data_direction["post_title"][$i] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="button_qa popup_activ_2">
                            <?= translate(
                                    "Задать вопрос",
                                    "Задати питання",
                                    "Ask a Question"); ?></div>
                    </div>
                </div>
            </div>
            <div class="found_result"></div>
            <div class="row category_qa_wrapper">
                <?php
                for ($i = 0; $i < count($data_qa); $i++) {
                    echo "<div class='col-lg-12 container_qa'>
                        <div class='asc'>
                            <div class='asc_wrapper'>
                                <img src='/template/images/queshen.jpg'>
                                <p class='name'>" . $data_qa[$i]['post_title'] . "</p>
                            </div>
                            <div class='text_asc'>" . $data_qa[$i]['json_content']['text_1'] . "</div>
                        </div>
                        <div class='ansver'>
                            <div class='ansver_wrapper'>
                                <div class='ansver_logo'><img src='/template/images/log-circle.jpg'></div>
                                <div class='ansver_text'>" . $data_qa[$i]['json_content']['text_2'] . "</div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
            <?php if ($total_number_page > 3) require_once(ROOT . "/views/global_block/pagination.php"); ?>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>