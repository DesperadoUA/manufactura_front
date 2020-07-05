<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="partners_page_template">
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
        <div class="col-lg-12 breadcrump_wrapper">
            <div class="breadcrumbs">
                <span><a href="<?= translate("/ru/", "/", "/en/"); ?>">
                        <?= translate("Главная", "Головна", "Main"); ?></a></span>
                <span><?= $data['post_title']; ?></span>
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
    <section class="section_3">
        <?php
        if (array_key_exists('partners', $data)) {
            for ($i = 0; $i < count($data['partners']['post_title']); $i++) {
                echo "<div class='partners_row'>
                   <div class='partners_part_left'><img src='" . $data['partners']['img'][$i] . "'></div>
                   <div class='partners_part_right'>
                       <p class='partners_title'>" . $data['partners']['post_title'][$i] . "</p>
                       <div class='partners_city'>" . $data['partners']['location'][$i] . "</div>
                       <p>" . $data['partners']['main_content'][$i] . "</p>
                   </div>
               </div>";
            }
        }
        ?>
    </section>
    <section class="section_5 wrapper_show more">
        <button class="button_show_more_partners"><?php echo translate("показать еще", "показати ще", "show more"); ?></button>
    </section>
    <section class="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 request">
                    <?php if (array_key_exists('last_text', $data['json_content'])) echo $data['json_content']['last_text']; ?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>