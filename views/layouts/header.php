<!DOCTYPE html>
<?php
/*echo "<pre>";
var_dump($data_menu['footer_main_menu']);
echo "</pre>";*/
?>
<html>

<head>
    <title><?= $data["title"]; ?></title>
    <meta charset="UTF-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <meta name="description" content="<?= $data["description"]; ?>" />
    <meta name="keywords" content="<?= $data["keywords"]; ?>">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-T8FP2ZM');</script>
    <!-- End Google Tag Manager -->
</head>
<style>
    .preloader {
        background: white;
        width: 100%;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #preloader {
        -webkit-animation: rotation 2s infinite linear;
        -moz-animation: rotation 2s infinite linear;
        -ms-animation: rotation 2s infinite linear;
        -o-animation: rotation 2s infinite linear;
        animation: rotation 2s infinite linear;
    }

    @-webkit-keyframes rotation {
        from {
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            transform: rotateY(0deg);
        }

        to {
            -webkit-transform: rotateY(359deg);
            -moz-transform: rotateY(359deg);
            -ms-transform: rotateY(359deg);
            -o-transform: rotateY(359deg);
            transform: rrotateY(359deg);
        }
    }

    header {
        display: none;
    }
</style>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T8FP2ZM"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div class="preloader">
        <img src="/template/images/preload.jpg" id="preloader">
    </div>
    <div class="mobile_left_menu">
        <div class="mobile_left_lang">
			<?php
			if ($data['permalink_ua']) {
				echo '<a href="' . $data['permalink_ua'] . '">
                             <img src="/template/images/ukraine.svg" class="lang_img"></a>';
			}
			if ($data['permalink_ru']) {
				echo '<a href="' . $data['permalink_ru'] . '">
                             <img src="/template/images/ru.svg" class="lang_img"></a>';
			}
			if ($data['permalink_en']) {
				echo '<a href="' . $data['permalink_en'] . '">
                              <img src="/template/images/en.svg" class="lang_img"></a>';
			}
			?>
        </div>
        <ul class="mobile_menu_login">
            <li><a href="#"><?= translate("Личный кабинет", "Особистий кабінет", "Personal Area"); ?></a></li>
            <li><a href="#"><?= translate("Регистрация", "Реєстрація", "check in"); ?></a></li>
        </ul>
        <div class="mobile_left_found">
            <input type="text" class="find_input_header" placeholder="<?= translate("Поиск", "Пошук", "Search"); ?>" />
        </div>
        <div class="mobile_menu_social">
            <ul class="header_social">
                <li>
                    <a href="https://www.facebook.com/manufacturaclinica/" target="_blank">
                        <img src="/template/images/fb.svg" class="social_img" alt="" >
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/manufacturaclinica/" target="_blank">
                        <img src="/template/images/inst.svg" class="social_img" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCPjVgs86oRAtcXI_uip703w" target="_blank">
                        <img src="/template/images/yt.svg" class="social_img">
                    </a>
                </li>
                <!-- <li><a href="#"><img src="" class="social_img" alt="" data-desctop-easy-load="/template/images/g+.svg"></a></li> -->
            </ul>
        </div>
        <div class="mobile_left_link">
            <ul>
                <?php
                for ($i = 0; $i < count($data_menu['menu_main']); $i++) {
                    if (count($data_menu['menu_main'][$i]['menuChildren']) !== 0) {
                        echo "<li class='mobile_dropdown_li' >
                                <span class='mobile_dropdown_menu_wrapper_link'>
                                    <a href='{$data_menu['menu_main'][$i]['menuLink']}' class='mobile_left_link_item'>
                                     {$data_menu['menu_main'][$i]['menuAnchor']}
                                    </a>
                                </span>
                                <ul class='mobile_dropdown_menu'>";
                        for ($j = 0; $j < count($data_menu['menu_main'][$i]['menuChildren']); $j++) {
                            echo "<li>
                                    <a href='{$data_menu['menu_main'][$i]['menuChildren'][$j]['menuLink']}'>
                                        {$data_menu['menu_main'][$i]['menuChildren'][$j]['menuAnchor']}
                                    </a>
                                </li>";
                        }
                        echo "</ul>
                            </li>";
                    } else {
                        echo "<li><a href='{$data_menu['menu_main'][$i]['menuLink']}' class='mobile_left_link_item'>
                        {$data_menu['menu_main'][$i]['menuAnchor']}
                        </a></li>";
                    }
                }
                ?>
            </ul>
        </div>
        <div class='mobile_left_link mobile_left_link_second'>
            <ul>
                <?php
                for ($i = 0; $i < count($data_menu['menu_header']['menu_link']); $i++) {
                    echo "<li><a href='{$data_menu['menu_header']['menu_link'][$i]}' class='mobile_left_link_item'>
                        {$data_menu['menu_header']['menu_anchor'][$i]}
                        </a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <header>
        <div class="container desctop">
            <div class="row">
                <div class="col-lg-12 header_section_1">
                    <div class="header_section_1_left">
                        <?php
                        for ($i = 0; $i < count($data_menu['menu_header']['menu_anchor']); $i++) {
                            echo '<div class="header_section_1_nav_item">
                            <a href="' . $data_menu['menu_header']['menu_link'][$i] . '">' . $data_menu['menu_header']['menu_anchor'][$i] . '</a></div>';
                        }
                        ?>
                    </div>
                    <div class="header_section_1_right">
                        <ul class="header_social">
                            <li><a href="https://www.facebook.com/manufacturaclinica/" target="_blank"><img src="" class="social_img" alt="" data-desctop-easy-load="/template/images/fb.svg"></a></li>
                            <li><a href="https://www.instagram.com/manufacturaclinica/" target="_blank"><img src="" class="social_img" alt="" data-desctop-easy-load="/template/images/inst.svg"></a></li>
                            <li><a href="https://www.youtube.com/channel/UCPjVgs86oRAtcXI_uip703w" target="_blank"><img src="" class="social_img" alt="" data-desctop-easy-load="/template/images/yt.svg"></a></li>
                            <!-- <li><a href="#"><img src="" class="social_img" alt="" data-desctop-easy-load="/template/images/g+.svg"></a></li> -->
                        </ul>
                        <?php
                        if ($data['permalink_ua']) {
                            echo '<a href="' . $data['permalink_ua'] . '">
                             <img src="/template/images/ukraine.svg" class="lang_img"></a>';
                        }
                        if ($data['permalink_ru']) {
                            echo '<a href="' . $data['permalink_ru'] . '">
                             <img src="/template/images/ru.svg" class="lang_img"></a>';
                        }
                        if ($data['permalink_en']) {
                            echo '<a href="' . $data['permalink_en'] . '">
                              <img src="/template/images/en.svg" class="lang_img"></a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-12 header_section_2">
                    <div class="header_section_2_item">
                        <a href="<?= translate("/ru/", "/", "/en/"); ?>"><img src="" data-desctop-easy-load="/template/images/Logo02.png"></a>
                    </div>
                    <div class="header_section_2_item">
                        <img src="" class="size_24" data-desctop-easy-load="/template/images/header_24.svg">
                        <div class="tel_block">
                            <div class="tel_header"><span>044</span> 200 11 99</div>
                            <div class="tel_header"><span>093</span> 200 11 90</div>
                            <div class="tel_header"><span>067</span> 200 11 97</div>
                        </div>
                        <div class="header_login">
                            <ul class="login_list">
                                <li><a href="#"><?= translate("Личный кабинет", "Особистий кабінет", "Personal Area"); ?></a></li>
                                <li><a href="#"><?= translate("Регистрация", "Реєстрація", "Check in"); ?></a></li>
                            </ul>
                            <input type="text" class="find_input_header"
                                   placeholder="<?=
                                   translate(
                                           "Поиск",
                                           "Пошук",
                                           "Search"); ?>" />
                        </div>
                    </div>
                    <div class="header_section_2_item">
                        <button class="button_style background_support popup_activ_2"><?= translate("Задать вопрос", "Задати питання", "Ask a Question"); ?></button>
                        <button class="button_style background_main popup_activ_1"><?= translate("Записаться на прием", "Записатись на прийом", "Make an appointment"); ?></button>
                    </div>
                </div>
                <div class="col-lg-12 header_section_3">
                    <?php
                    for ($i = 0; $i < count($data_menu['menu_main']); $i++) {
                        echo "<div class='menu_main_item";
                        if (count($data_menu['menu_main'][$i]['menuChildren']) !== 0) echo ' dropdown_item';
                        echo "'><a href='" . $data_menu['menu_main'][$i]['menuLink'] . "' >";
                        echo "{$data_menu['menu_main'][$i]['menuAnchor']}</a>";

                        if (count($data_menu['menu_main'][$i]['menuChildren']) !== 0) {
                            echo "<div class='dropdow_menu'>
                            <ul class='dropdow_menu_list'>";
                            for ($j = 0; $j < count($data_menu['menu_main'][$i]['menuChildren']); $j++) {
                                echo "<li><a href='{$data_menu['menu_main'][$i]['menuChildren'][$j]['menuLink']}' >
                                {$data_menu['menu_main'][$i]['menuChildren'][$j]['menuAnchor']}</a></li>";
                            }
                            echo '</ul>
                            </div>';
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container mobile">
            <div class="row">
                <div class="col-lg-12 mobile_phone_container">
                    <a href="tel:+380442001199" class="tel_header"><span>044</span> 200 11 99</a>
                    <a href="tel:+380442001199" class="tel_header"><span>044</span> 200 11 99</a>
                    <a href="tel:+380442001199" class="tel_header"><span>044</span> 200 11 99</a>
                </div>
                <div class="col-lg-12 mobile_logo_container">
                    <img src="" class="size_24_mobile" data-mobile-easy-load="/template/images/header_24.svg">
                    <a href="/">
                        <img src="" class="mobile_logo" data-mobile-easy-load="/template/images/Logo02.png">
                    </a>
                    <img src="" data-mobile-easy-load="/template/images/burger.png" class="burger">
                </div>
                <div class="col-lg-12 mobile_button_container">
                    <button class="button_style background_support popup_activ_2">
                        <?= translate("Задать вопрос", "Задати питання", "Ask a Question"); ?></button>
                    <button class="button_style background_main popup_activ_1">
                        <?= translate("Записаться на прием", "Записатись на прийом", "Make an appointment"); ?></button>
                </div>
            </div>
        </div>
    </header>