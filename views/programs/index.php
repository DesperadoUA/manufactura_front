<?php require_once(ROOT . "/views/layouts/header.php"); ?>
<main class="programs_page_template">
    <section class="section_1 padding_first_section" style="background:url(<?php echo $data['json_content']['img']; ?>) top center no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1><?= $data['post_title']; ?></h1>
                    <p><?= $data['json_content']['h1_desc']; ?></p>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-lg-12 breadcrump_wrapper">
            <div class="breadcrumbs">
                            <span><a href="<?= translate("/ru/programs/", "/programs/", "/en/programs/"); ?>">
                                    <?= translate("Программы", "Програми", "Programs"); ?></a></span>
                <span><?= $data['post_title']; ?></span>
            </div>
        </div>
    </div>
    <?php
    if ($data['json_content']['title_package_1'] != "" or $data['json_content']['title_package_2'] != "" or $data['json_content']['title_package_3'] != "") {
        require_once(ROOT . "/views/global_block/programs_block.php");
    }
    ?>

    <section class="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $data['json_content']['main_content']; ?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
    <?php
    if (count($data['last_posts']) != 0) require_once(ROOT . "/views/global_block/programs_last_articles.php");
    ?>
</main>
<?php require_once(ROOT . "/views/layouts/footer.php"); ?>