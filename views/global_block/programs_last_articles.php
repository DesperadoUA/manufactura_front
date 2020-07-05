<section class="section_4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 program_title"><?php echo translate("Похожие программы", "Схожі програми", "Similar programs"); ?></div>
            <div class="col-lg-12 program_wrapper">
                <?php
                for ($i = 0; $i < count($data['last_posts']['post_title']); $i++) {
                    echo "<div class='card_wrapper'>
                        <div class='big_card'>
                            <div class='big_card_left'>
                                <img src='" . $data['last_posts']['img'][$i] . "'>
                                <img src='/template/images/edge.png' class='card_edge'>
                            </div>
                            <div class='big_card_right'>
                                <div class='big_card_right_wrapper'>
                                    <p class='program_text_first color_red'>" . $data['last_posts']['data_field'][$i] . "</p>
                                    <p class='program_text_second color_blue'>" . $data['last_posts']['post_title'][$i] . "</p>
                                    <p class='program_text_third'>" . $data['last_posts']['short_desc'][$i] . "</p>
                                    <a href='" . $data['last_posts']['permalink'][$i] . "'><button class='button_style_program_blue'>" . translate("Подробнее", "Докладніше", "More details") . "</button></a>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</section>