<?php
require_once(ROOT."/views/layouts/header.php");
?>
<main class="contact_page_template">
    <section class="section_1 padding_first_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><?php echo $data['post_title']; ?></h1>
                    </div>
                </div>
                <div class="row category_contact_wrapper">
                    <div class="col-lg-6 left_part">
                    <?php echo$data['json_content']['text_left']; ?>
                    </div>
                    <div class="col-lg-6 right_part">
                    <?php echo$data['json_content']['text_right']; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 map_part">
                        <img src="/template/images/Karta_08-3.jpg" data-desctop-easy-load="/template/images/Karta_08-3.jpg" data-mobile-easy-load="/template/images/Karta_mobile.jpg">
                    </div>
                    <div class="col-lg-6 col-md-6 map_part">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2550.2720152860434!2d30.5308763158911!3d50.26817940836225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4b8dac969e8f9%3A0xde2fefe95446c74!2sMedychnyy+Tsentr+%22Klinika+Manufaktura%22!5e0!3m2!1sru!2sua!4v1559565250405!5m2!1sru!2sua" width="100%" height="437" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-lg-12 text_trip">
                    <?php echo$data['json_content']['main_content']; ?>
                    </div>
                </div>
            </div>
    </section> 
    <?php require_once(ROOT."/views/global_block/main_form_with_login.php"); ?>       
</main>
<?php 
require_once(ROOT."/views/layouts/footer.php");
?>