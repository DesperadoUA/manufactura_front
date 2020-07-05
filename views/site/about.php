<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="about_page_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="mm_animate" data-animate="letter_spacing"><?= $data['post_title']; ?></h1>
                </div>
                <div class="col-lg-6">
                    <p class="fade_out mm_animate" data-animate="fade_in"><?= $data['json_content']['h1_desc']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-lg-12 breadcrump_wrapper">
            <div class="breadcrumbs">
                <span><a href="<?= translate("/ru/", "/", "/en/"); ?>"><?= translate("Главная", "Головна", "Main"); ?></a></span>
                <span><?= $data['post_title']; ?></span>
            </div>
        </div>
    </div>
    <section class="section_2 fade_out mm_animate" data-animate="fade_in">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><?= $data['json_content']['main_content']; ?></div>
            </div>
        </div>
    </section>
    <section class="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?= $data['json_content']['title_service_global']; ?></h2>
                </div>
            </div>
        </div>
        <div class="service_row position_left mm_animate" data-animate="animate_move">
            <div class="left_block stacionar_for_adults"></div>
            <div class="right_block">
                <p class="service_title color_red"><?= $data['json_content']['title_service_1']; ?></p>
                <p class="service_desc"><?= $data['json_content']['desc_service_1']; ?></p>
                <a href="<?= $data['json_content']['link_button_1']; ?>">
                    <button class="service_button_red"><?= $data['json_content']['title_button_1']; ?></button>
                </a>
            </div>
        </div>
        <div class="service_row position_right mm_animate" data-animate="animate_move">
            <div class="left_block background_gray">
                <p class="service_title color_blue"><?= $data['json_content']['title_service_2']; ?></p>
                <p class="service_desc"><?= $data['json_content']['desc_service_2']; ?></p>
                <a href="<?= $data['json_content']['link_button_2']; ?>">
                    <button class="service_button_blue">
                        <?= $data['json_content']['title_button_2']; ?>
                    </button>
                </a>
            </div>
            <div class="right_block rehabilitation"></div>
        </div>
        <div class="service_row position_left mm_animate" data-animate="animate_move">
            <div class="left_block surgery"></div>
            <div class="right_block">
                <p class="service_title color_red"><?= $data['json_content']['title_service_3']; ?></p>
                <p class="service_desc"><?= $data['json_content']['desc_service_3']; ?></p>
                <a href="<?= $data['json_content']['link_button_3']; ?>">
                    <button class="service_button_red">
                        <?= $data['json_content']['title_button_3']; ?>
                    </button>
                </a>
            </div>
        </div>
        <div class="service_row position_right mm_animate" data-animate="animate_move">
            <div class="left_block background_gray">
                <p class="service_title color_blue"><?= $data['json_content']['title_service_4']; ?></p>
                <p class="service_desc"><?= $data['json_content']['desc_service_4']; ?></p>
                <a href="<?= $data['json_content']['link_button_4']; ?>">
                    <button class="service_button_blue">
                        <?= $data['json_content']['title_button_4']; ?>
                    </button>
                </a>
            </div>
            <div class="right_block diagnostics"></div>
        </div>
    </section>
    <section class="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="tur_title"><?= translate("Смотрите 3D тур нашего центра", "Дивіться 3D тур нашого центру", "See the 3D tour of our center"); ?></p>
                </div>
                <div class="col-lg-12">
                    <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!4v1513605484460!6m8!1m7!1sCAoSLEFGMVFpcE5jSlJlWEc4QkpqUmlmS0FlTEtkanU2Y0ZyYTlINDNZRmVkN21V!2m2!1d50.268192958299!2d30.53303446042!3f214!4f0!5f0.7820865974627469" width="100%" height="600" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                </div>
                <div class="col-lg-12 container_galery">
                    <div class="galery_column">
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_1_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_1.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_5_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_5.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                    </div>
                    <div class="galery_column">
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_2_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_2.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_6_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_6.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                    </div>
                    <div class="galery_column">
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_3_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_3.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_7_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_7.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_9_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_9.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                    </div>
                    <div class="galery_column">
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_4_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_4.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                        <div class="galery_wrapper_item">
                            <img src="/template/images/new_galery_8_pop.jpg">
                            <div class="galery_hover_item" data-fancybox="gallery" href="/template/images/new_galery_8.jpg">
                                <img src="/template/images/camera.svg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/slider_doc_with_title.php"); ?>
    <?php require_once(ROOT . "/views/global_block/reviews.php"); ?>
    <?php require_once(ROOT . "/views/global_block/vacancy.php"); ?>
    <?php // require_once(ROOT . "/views/global_block/company_slider.php"); ?>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>