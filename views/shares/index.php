<?php
    require_once(ROOT."/views/layouts/header.php");
?>
<main class="shares_page_template">
    <section class="section_1 padding_first_section"
             style="background:url(<?= $data['json_content']['img']; ?>) top center no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6"><h1><?php echo $data['post_title']; ?></h1></div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-12">
                      <a href="#">
                          <button class="buy_online">
							  <?= translate(
								  "Оплатить онлайн",
								  "Оплатити онлайн",
								  "Pay online");
							  ?>
                          </button>
                      </a>
                    </div>
                    <div class="col-lg-12">
                       <?php echo $data['json_content']['main_content']; ?>
                    </div>
                </div>
            </div>
    </section> 
</main>
<?php require_once(ROOT."/views/global_block/main_form_with_login.php"); ?>       
<?php require_once(ROOT."/views/layouts/footer.php"); ?>