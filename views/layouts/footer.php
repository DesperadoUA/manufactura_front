<footer>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2550.2720152860434!2d30.5308763158911!3d50.26817940836225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4b8dac969e8f9%3A0xde2fefe95446c74!2sMedychnyy+Tsentr+%22Klinika+Manufaktura%22!5e0!3m2!1sru!2sua!4v1559565250405!5m2!1sru!2sua" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
    <?php  
    if(array_key_exists('menu', $data_menu['footer_main_menu']) and count($data_menu['footer_main_menu']['menu']) !== 0 ) {
        include  $_SERVER['DOCUMENT_ROOT']."/views/global_block/footer_main_menu.php";
    }
    ?>
    <div class="footer_section_2">
        <?php if(count($data_footer_logos) !== 0) {
			include  $_SERVER['DOCUMENT_ROOT']."/views/global_block/footer_logos.php";
        } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 footer_last_section">
                    <div class="footer_section_item">
                        <img src="/template/images/Logo02.png">
                        <p>Лицензия ГКРРФУ серия АВ № 584270 от 18.05.11г.</p>
                    </div>
                    <div class="footer_section_item">
                        <img src="" data-desctop-easy-load="/template/images/247-00001.svg">
                        <div class="footer_tel"><a href="tel:+380442001199"><span>044</span> 200 11 99</a></div>
                        <div class="footer_tel"><a href="tel:+380442001199"><span>093</span> 200 11 90</a></div>
                        <div class="footer_tel"><a href="tel:+380442001199"><span>067</span> 200 11 97</a></div>
                    </div>
                    <div class="footer_section_item">
                        <ul>
							<?php
							for ($i = 0; $i < count($data_menu['menu_footer_1']['menu_anchor']); $i++) {
								echo '<li><a href="' . $data_menu['menu_footer_1']['menu_link'][$i] . '">' . $data_menu['menu_footer_1']['menu_anchor'][$i] . '</a></li>';
							}
							?>
                        </ul>
                    </div>
                    <div class="footer_section_item">
                        <ul>
							<?php
							for ($i = 0; $i < count($data_menu['menu_footer_2']['menu_anchor']); $i++) {
								echo '<li><a href="' . $data_menu['menu_footer_2']['menu_link'][$i] . '">' . $data_menu['menu_footer_2']['menu_anchor'][$i] . '</a></li>';
							}
							?>
                        </ul>
                    </div>
                    <div class="footer_section_item">
                        <button class="button_footer_style popup_activ_2"><?php echo translate("Задать вопрос", "Задати питання", "Ask a Question"); ?></button>
                        <button class="button_footer_style popup_activ_1"><?php echo translate("Записаться на прием", "Записатись на прийом", "Make an appointment"); ?></button>
                    </div>
                </div>
                <div class="col-lg-12 footer_dev">
                    <img src="/template/images/Gray.gif">
                    <p><a href="http://medmarketing.ua/" target="_blank">Development and support by МedМarketing</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
require_once(ROOT . "/views/global_block/form.php");
?>
<link href="/template/css/style.css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type='text/javascript' src='/template/js/script.js?version=2'></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=cyrillic" rel="stylesheet">

<script type="text/javascript">
	(function(d, w, s) {
		var widgetHash = 'tfsw3ku715pm5firkzgq', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
		gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
		var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
	})(document, window, 'script');
</script>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			xfbml            : true,
			version          : 'v7.0'
		});
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/ru_RU/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="126219234589670"
     theme_color="#3784CC"
     logged_in_greeting="Вітаємо! Задайте Ваше питання.."
     logged_out_greeting="Вітаємо! Задайте Ваше питання..">
</div>
</body>

</html>