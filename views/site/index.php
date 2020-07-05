<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="main_page_template">
    <?php
    if (count($data_main_slider) !== 0)  require_once(ROOT . "/views/global_block/main_slider.php");
    else require_once(ROOT . "/views/global_block/default_banner.php");
    ?>
    <?php
    if (array_key_exists('pluses', $data['json_content']) and count($data['json_content']['pluses']) !== 0) {
        require_once(ROOT . "/views/global_block/pluses_main_page.php");
    }
    ?>
    <?php require_once(ROOT . "/views/global_block/block_found.php"); ?>
    <section class="section_main_3 fade_out mm_animate" data-animate="fade_in">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $data['json_content']['main_content']; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section_main_4 fade_out mm_animate" data-animate="fade_in">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 program_wrapper">


                    <div class="program_left">
                        <p class="program_title color_blue"><?php echo translate("Программы для взрослых", "Програми для дорослих", "Adult programs"); ?></p>
                        <p class="all_programs"><a href="<?php echo translate("/ru/programs-adults/", "/programs-adults/", "/en/programs-adults/"); ?>" class="background_blue"><?php echo translate("все программы", "всі програми", "all programs"); ?></a></p>
                        <div class="program_list_wrapper">
                            <?php
                            if (count($data_programs_adult) != 0) {
                                for ($i = 0; $i < count($data_programs_adult['post_title']); $i++) {
                                    echo "<div class='big_card position_bottom mm_animate' data-animate='fade_up'>
                                       <div class='big_card_left'>
                                           <img src='" . $data_programs_adult['img'][$i] . "'>
                                           <img src='/template/images/edge.png' class='card_edge'>
                                       </div>
                                       <div class='big_card_right'>
                                           <div class='big_card_right_wrapper'>
                                               <p class='program_text_first color_red'>" . $data_programs_adult['data_field'][$i] . "</p>
                                               <p class='program_text_second color_blue'>" . $data_programs_adult['post_title'][$i] . "</p>
                                               <p class='program_text_third'>" . $data_programs_adult['short_desc'][$i] . "</p>
                                               <a href='" . $data_programs_adult['permalink'][$i] . "'><button class='button_style_program_blue'>" . translate("Подробнее", "Детальніше", "More") . "</button></a>
                                           </div>
                                       </div>
                                   </div>";
                                }
                            }
                            ?>

                        </div>
                    </div>


                    <div class="program_right">
                        <p class="program_title color_red"><?php echo translate("Программы для детей", "Програми для дітей", "Programs for children"); ?></p>
                        <p class="all_programs"><a href="<?php echo translate("/ru/programs-children/", "/programs-children/", "/en/programs-children/"); ?>" class="background_red"><?php echo translate("все программы", "всі програми", "all programs"); ?></a></p>
                        <div class="program_list_wrapper">

                            <?php
                            if (count($data_programs_children) != 0) {
                                for ($i = 0; $i < count($data_programs_children['post_title']); $i++) {
                                    echo "<div class='big_card position_bottom mm_animate' data-animate='fade_up'>
                                    <div class='big_card_left'>
                                        <img src='" . $data_programs_children['img'][$i] . "'>
                                        <img src='/template/images/edge.png' class='card_edge'>
                                    </div>
                                    <div class='big_card_right'>
                                        <div class='big_card_right_wrapper'>
                                            <p class='program_text_first color_red'>" . $data_programs_children['data_field'][$i] . "</p>
                                            <p class='program_text_second color_brown'>" . $data_programs_children['post_title'][$i] . "</p>
                                            <p class='program_text_third'>" . $data_programs_children['short_desc'][$i] . "</p>
                                            <a href='" . $data_programs_children['permalink'][$i] . "'><button class='button_style_program_red'>" . translate("Подробнее", "Детальніше", "More") . "</button></a>
                                        </div>
                                    </div>
                                </div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/slider_doc.php"); ?>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
    <?php require_once(ROOT . "/views/global_block/prevyu_article.php"); ?>

</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>