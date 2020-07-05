<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="services_page_template">
    <section class="section_1 padding_first_section" style="background:url(<?php echo $data['json_content']['img']; ?>) top center no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1><?php echo $data['post_title']; ?></h1>
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <p><?php echo $data["json_content"]['h1_desc']; ?></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-lg-12">
			<?php
			if(array_key_exists('breadcrumbs', $data['json_content'])) {
				if(count($data['json_content']['breadcrumbs']) !== 0)
					require_once(ROOT . "/views/global_block/breadcrumbs.php");
			}
			?>
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
    <?php require_once(ROOT . "/views/global_block/shares_slider.php"); ?>
    <?php
    if ($data['json_content']['simptomi'] !== '') {
        echo "<section class='section_4'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                 {$data['json_content']['simptomi']}
                            </div>
                        </div>
                </section>";
    }
    ?>
    <?php if (count($data_price) !== 0) require_once(ROOT . "/views/global_block/price_direction.php"); ?>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
    <?php require_once(ROOT . "/views/global_block/slider_doc_with_title.php"); ?>
    <?php
    if ($data['json_content']['last_text'] !== '') {
        echo "<section class='section_4'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                {$data['json_content']['last_text']}
                            </div>
                        </div>
                    </div>
                </section>";
    }
    ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>