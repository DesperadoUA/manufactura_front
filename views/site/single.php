<?php
require_once(ROOT."/views/layouts/header.php");
?>
<main class="single_page_template">
    <section class="section_1 padding_first_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <img src="<?php echo $data['json_content']['img']; ?>">
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <h1><?php echo $data['post_title']; ?></h1>
                       <?php echo $data['json_content']['prevyu']; ?>
                    </div>
                    <div class="col-lg-12 single_main_text">
                    <?php echo $data['json_content']['main_content']; ?>
                    </div>
                    <div class="col-lg-12 single_shared">
                        <div id="fb-root"></div>
                        <div class="fb-share-button" 
                            data-href="https://manufacturaclinica.com<?= $_SERVER['REQUEST_URI']; ?>"
                            data-layout="button_count">
                        </div>
                    </div>
                </div>
            </div>
    </section> 
    <?php require_once(ROOT."/views/global_block/block_article.php"); ?>      
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

    <?php require_once(ROOT."/views/global_block/main_form_with_login.php"); ?>       
</main>
<?php 
require_once(ROOT."/views/layouts/footer.php");
?>