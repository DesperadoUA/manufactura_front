<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="prof_index_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1><?= $data['post_title']; ?></h1>
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <p><?= $data['json_content']['h1_desc']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-lg-12">
            <div class="col-lg-12 breadcrump_wrapper">
                <div class="breadcrumbs">
                    <span><a href="<?= translate("/ru/", "/", "/en/"); ?>">
                            <?= translate("Главаня", "Головна", "Main"); ?></a></span>
                    <span><?= $data['post_title']; ?></span>
                </div>
            </div>
        </div>
    </div>
    <section class="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $data['json_content']['main_content']; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (count($data_examination) !== 0) {
        echo '<section class="section_3">
            <div class="container">
                <div class="row">';
        $limit = 0;
        count($data_examination['post_title']) <= 2 ? $limit = count($data_examination['post_title']) : $limit = 2;

        for ($i = 0; $i < $limit; $i++) {
            echo "<div class='col-lg-6'>
                            <img src='" . $data_examination['img'][$i] . "'>
                        </div>
                        <div class='col-lg-6 prof_block'>
                            <div class='prof_text'>";
            if ($i % 2 === 0) {
                echo "<p class='title color_blue'>";
            } else {
                echo "<p class='title color_red'>";
            }
            echo  $data_examination['post_title'][$i] . "</p>
                                " . $data_examination['json_content'][$i]['main_content'] . "
                            </div>
                        </div>";
        }

        echo '</div>
            </div>
        </section>';
    }
    ?>
    <?php require_once(ROOT . "/views/global_block/shares_slider.php");
    ?>
    <?php
    if (count($data_examination) !== 0) {
        if (count($data_examination) > 2) {
            echo '<section class="section_3">
                <div class="container">
                    <div class="row container_add">';
            $limit = count($data_examination['post_title']);
            for ($i = 2; $i < $limit; $i++) {
                echo "<div class='col-lg-6'>
                                <img src='" . $data_examination['img'][$i] . "'>
                            </div>
                            <div class='col-lg-6 prof_block'>
                                <div class='prof_text'>";
                if ($i % 2 === 0) {
                    echo "<p class='title color_blue'>";
                } else {
                    echo "<p class='title color_red'>";
                }
                echo  $data_examination['post_title'][$i] . "</p>
                                    " . $data_examination['json_content'][$i]['main_content'] . "
                                </div>
                            </div>";
            }

            echo '</div>
                </div>
            </section>';
        }
    }
    ?>
    <section class="wrapper_show_more">
        <button class="button_show_more_examination" data-type="<?php echo $template; ?>"><?php echo translate("показать еще", "показати ще", "show more"); ?></button>
    </section>
    <section class="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $data['json_content']['last_text']; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once(ROOT . "/views/layouts/footer.php"); ?>