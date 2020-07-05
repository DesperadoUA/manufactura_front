<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<?php
if ($_SERVER['REQUEST_URI'] === "/programs-adults/") {
    $type_programs = "adult";
} elseif ($_SERVER['REQUEST_URI'] === "/programs-children/") {
    $type_programs = "children";
} else {
    $type_programs = "all";
}
?>
<main class="programs_category_template">
    <section class="section_1 padding_first_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo translate("Программы", "Програми", "Programs"); ?></h1>
                </div>
                <div class="col-lg-12">
                    <div class="wraper_button_news">
                        <div class="button_news"><?php echo translate("НАПРАВЛЕНИЕ", "НАПРЯМОК", "DIRECTION"); ?>
                            <div class="dropdown_search">
                                <ul>
                                    <?php
                                    if (count($data_direction) != 0) {
                                        for ($i = 0; $i < count($data_direction['post_title']); $i++) {
                                            echo '<li class="item_select_found" data-programs_type="' . $type_programs . '" data-type="programs-direction" data-id="' . $data_direction["id"][$i] . '">' . $data_direction["post_title"][$i] . '</li>';
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
            <div class="row category_program_wrapper">
                <div class="col-lg-12 program_wrapper">
                    <?php
                    if (count($data_programs) !== 0) {
                        for ($i = 0; $i < count($data_programs['permalink']); $i++) {
                            echo "<div class='card_wrapper'>
                            <div class='big_card'>
                                <div class='big_card_left'>
                                    <img src='" . $data_programs['img'][$i] . "'>
                                    <img src='/template/images/edge.png' class='card_edge'>
                                </div>
                                <div class='big_card_right'>
                                    <div class='big_card_right_wrapper'>
                                        <p class='program_text_first color_red'>" . $data_programs['data_field'][$i] . "</p>
                                        <p class='program_text_second color_blue'>" . $data_programs['post_title'][$i] . "</p>
                                        <p class='program_text_third'>" . $data_programs['short_desc'][$i] . "</p>
                                        <a href='" . $data_programs['permalink'][$i] . "'><button class='button_style_program_blue'>" . translate("Подробнее", "Детальніше", "More") . "</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <?php if ($total_number_page > 6) require_once(ROOT . "/views/global_block/pagination.php"); ?>
        </div>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>