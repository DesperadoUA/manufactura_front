<section class="section_main_1 mm_animate" data-animate="animate_plus">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wrap_plus">
                <?php
                function create_plus($item)
                {
                    $str_cod = "<div class='plus_item'>
                                        <div class='plus_box'>
                                            <img src='{$item['src']}'>
                                            <p class='plus_title'>{$item['text_1']}</p>
                                            <p class='plus_box_time_work'>{$item['text_2']}</p>
                                        </div>
                                    </div>";
                    return $str_cod;
                }
                echo implode('', array_map('create_plus', $data['json_content']['pluses']));
                ?>
            </div>
        </div>
    </div>
</section>