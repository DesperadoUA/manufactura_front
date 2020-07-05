<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="staff_page_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 doc_desc">
                    <h1><?= $data['post_title']; ?></h1>
                    <p><?= $data['desc_doc']; ?></p>
                    <p><?= $data['expirience']; ?></p>
                    <button class="doc_button popup_activ_2">
                        <?= translate(
                                "Задать вопрос врачу",
                                "Задати питання лікарю",
                                "Ask doctor a question"); ?>
                    </button>
                </div>
                <div class="col-lg-6 col-md-6 doc_prevyu">
                    <img src="<?= $data['json_content']['img']; ?>">
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-lg-12 breadcrump_wrapper">
            <div class="breadcrumbs">
                <span><a href="<?= translate("/ru/staff/", "/staff/", "/en/staff/"); ?>">
                        <?= translate("Врачи", "Лікарі", "Doctors"); ?></a></span>
                <span><?= $data['post_title']; ?></span>
            </div>
        </div>
    </div>
    <section class="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?= $data['json_content']['main_content']; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php
                    if ($data['json_content']['price_1'] !== '') {
                        echo '<p>' . translate("Стоимость консультации врача", "Вартість консультації лікаря", "Doctor's consultation fee") . ' <span>' . $data['json_content']['price_1'] . '</span></p>';
                    }
                    if ($data['json_content']['price_2'] !== '') {
                        echo '<p>' . translate("Стоимость вторичной консультации", "Вартість вторинної консультації", "Secondary consultation cost") . ' <span>' . $data['json_content']['price_2'] . '</span></p>';
                    }
                    ?>
                </div>
                <div class="col-lg-6">
                    <?php
                    if ($data['json_content']['price_1'] !== '' || $data['json_content']['price_2'] !== '') {
                        echo '<a href="#"><button class="doc_button">' . translate("Оплатить онлайн", "Сплатити онлайн", "Pay online") . '</button></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
    <?php
    if ($data['json_content']['slider_img'] != 0) {
        echo "<section class='section_certificates'>
			<div class='container'>
				<div class='row'>
					<div class='col-lg-12 title'>Сертификаты</div>
					<div class='col-lg-12 certificate_box'>
						<div class='slider_sertificat_left'><img src='/template/images/Left.svg' class='shares_slider_arrow_left'></div>
						<div class='slider_sertificat_right'><img src='/template/images/Right.svg' class='shares_slider_arrow_right'></div>
						<div class='сertificat_wrapper'>
							<div class='slider_box'>";
        for ($i = 0; $i < count($data['json_content']['slider_img']); $i++) {
            echo "<div class='item_slider'><img src='" . $data['json_content']['slider_img'][$i] . "'></div>";
        }
        echo "</div></div></div></div></div></section>";
    }
    ?>

    <?php // require_once(ROOT . "/views/global_block/three_article.php"); 
    ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>