<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="contact_page_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?= $data['post_title']; ?></h1>
                </div>
                <div class="col-lg-12 mobile_found">
                    <input type="text" class="find_input_header"
                           placeholder="<?=
						   translate(
							   "Поиск",
							   "Пошук",
							   "Search"); ?>">
                </div>
            </div>
            <div class="search_template found_result">

            </div>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>