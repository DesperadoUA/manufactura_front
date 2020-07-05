<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="price_page_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?= $data['post_title']; ?></h1>
                </div>
            </div>
        </div>
        <?php if (count($data['json_content']) !== 0) require_once(ROOT . "/views/global_block/global_price.php"); ?>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>