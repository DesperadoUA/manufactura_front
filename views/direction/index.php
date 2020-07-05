<?php require_once(ROOT . "/views/layouts/header.php"); ?>
<main class="direction_page_template">
    <section class="section_1 padding_first_section"
             style="background:url(<?= $data['json_content']['img']; ?>) top center no-repeat;">
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
			<?php
			if(array_key_exists('breadcrumbs', $data['json_content'])) {
				if(count($data['json_content']['breadcrumbs']) !== 0)
					require_once(ROOT . "/views/global_block/breadcrumbs.php");
			}
			?>
        </div>
    </div>
    <?php
    if ($data['json_content']['video_link'] != '') {
        echo "<section class='section_2'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-6 left_part'>" . $data['json_content']['main_content'] .
            "</div>
                    <div class='col-lg-6 right_part'>"
            . $data['json_content']['video_link'] .
            "</div>
                </div>
            </div>
        </section>";
    }
    else {
        echo "<section class='section_2'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12 left_part'>" . $data['json_content']['main_content'] . "</div>
                </div>
            </div>
        </section>";
    }
    ?>
    <?php
    if (count($data_relativ_services) != 0) {
        echo "<section class='section_3'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'>
                    <p class='service_title'>";
        if (array_key_exists('title_services', $data['json_content'])) {
            echo $data['json_content']['title_services'];
        } else {
            echo translate("Что мы лечим / Наши услуги", "Що ми лікуємо / Наші послуги", "What we treat / Our services");
        }
        echo  "</p>
                </div>
                <div class='col-lg-12 service_link'>";
        for ($i = 0; $i < count($data_relativ_services['permalink']); $i++) {
            echo "<div class='service_item'>
                    <div class='service_item_img'><img src='/template/images/triangle-red.png'></div>
                    <div class='service_item_link js-servic-hover'><a href='" . $data_relativ_services['permalink'][$i] . "'>" . $data_relativ_services['post_title'][$i] . "</a></div>
                    </div>";
        }

        echo "</div>
            </div>
        </div>
    </section>";
    }
    ?>
    <?php require_once(ROOT . "/views/global_block/block_found.php"); ?>
    <?php require_once(ROOT . "/views/global_block/shares_slider.php"); ?>
    <?php
       if(array_key_exists('simptomi', $data['json_content'])) {
		   if ($data['json_content']['simptomi'] !== '') {
		    echo "<section class='section_4'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                {$data['json_content']['simptomi']}
                            </div>
                        </div>
                    </div>
                </section>";
           }
       }
     ?>
    <?php
    if (array_key_exists('service_list', $data['json_content'])) {
        if ($data['json_content']['service_list'] !== '') {
            $data_list = [];
            $data_list = explode('|', $data['json_content']['service_list']);
            include ROOT . "/views/global_block/list_services.php";
        }
    }
    ?>
    <?php
    if (array_key_exists('simptomi_2', $data['json_content'])) {
        if ($data['json_content']['simptomi_2'] !== '') {
            echo '<section class="section_4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">' . $data['json_content']['simptomi_2'] . '</div>
                </div>
            </div>
        </section>';
        }
    }
    if (array_key_exists('service_list_2', $data['json_content'])) {
        if ($data['json_content']['service_list_2'] !== '') {
            $data_list = [];
            $data_list = explode('|', $data['json_content']['service_list_2']);
            include ROOT . "/views/global_block/list_services.php";
        }
    }
    ?>
    <?php if (count($data_price) !== 0) require_once(ROOT . "/views/global_block/price_direction.php"); ?>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
    <?php require_once(ROOT . "/views/global_block/slider_doc_with_title.php"); ?>
    <?php require_once(ROOT . "/views/global_block/three_article.php"); ?>
    <?php require_once(ROOT . "/views/global_block/reviews.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>