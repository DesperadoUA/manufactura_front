<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="<?php current_lang('/', '/en', '/ua'); ?>">
                    <img src="<?php current_lang('/RU.svg', '/EN.svg', '/UA.svg'); ?>" class="logo_img">
                </a>
            </div>

            <div class="col-lg-4">
                <div class="header_button_wrapper">
                    <button class="header_buttom <?php current_lang("popmake-4009", "popmake-4025", "popmake-4016"); ?>"><?php current_lang('Вызов врача', 'Calling a doctor', 'Виклик лікаря'); ?></button>
                    <button class="header_buttom <?php current_lang("popmake-999", "popmake-1341", "popmake-1339"); ?>"><?php current_lang('Визит к врачу', 'Visit to doctor', 'Візит до лікаря'); ?></button>
                    <button class="header_buttom <?php current_lang("popmake-934", "popmake-1345", "popmake-1343"); ?>"><?php current_lang('Задать вопрос', 'Ask a question', 'Задати питання'); ?></button>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="phone_wrapper">
                    <div class="header_phone_col_1">
                        <span>24/7</span>
                        <a href="tel:+380672426240">+38 (067) 242-62-40</a>
                        <a href="tel:+380445995405">+38 (044) 599-54-05</a>
                        <span>We speak English!</span>
                    </div>
                    <div class="header_phone_col_2">
                        <a href="https://www.youtube.com/channel/UCoDj8bSGsMTiay_7O5ZgHpQ" target="_blank"><img src="/wp-content/uploads/2018/08/youtube-header.png"></a>
                        <a href="https://www.facebook.com/universumclinickiev/" target="_blank"><img src="/wp-content/uploads/2018/08/fb-header.png"></a>
                        <a href="https://www.instagram.com/universumclinic/" target="_blank"><img src="/wp-content/uploads/2018/08/insta-header.png"></a>
                    </div>
                    <div class="header_phone_col_3">
                        <ul class="lang">
                            <?php pll_the_languages(array("dropdown" => 0, "display_names_as" => "slug", "hide_if_no_translation" => 1)); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile_burger"><img src="<?php current_lang('/menu.svg', '/Menu_EN.svg', '/menu.svg'); ?>" class="mobile_button"></div>
    <div class="menu_wrapper">
        <nav class="nav_wrapper">
            <div class="nav_item dropdown_item_first">
                <span><?php current_lang('О нас', 'About us', 'Про нас'); ?></span>
                <div class="dropdown_block_menu">
                    <ul class="dropdown_list">
                        <li class="dropdown_list_link"><a href="<?php current_lang('/o-nas/', '/en/about-us/', '/ua/pro-nas/'); ?>">
                                <?php current_lang('О клинике', 'About the clinic', 'Про клініку'); ?></a>
                        </li>
                        <li class="dropdown_list_link dropdown_item"><?php current_lang('Информация', 'Information', 'Інформація'); ?>
                            <div class="dropdown_block_menu_2">
                                <ul class="dropdown_list">
                                    <li class="dropdown_list_link">
                                        <a href="<?php current_lang('/podgotovka-k-analizam/', '/en/prepairing-for-your-tests/', '/ua/pidgotovka-do-analiziv/'); ?>">
                                            <?php current_lang('Подготовка к анализам', 'Preparing for your tests', 'Як підготуватися до здачі аналізів'); ?>
                                        </a>
                                    </li>
                                    <li class="dropdown_list_link">
                                        <a href="<?php current_lang('/podgotovka-k-uzi/', '/en/preparation-for-ultrasound/', '/ua/pidgotovka-do-uzd/'); ?>">
                                            <?php current_lang('Подготовка к УЗИ', 'Preparing for your ultrasound', 'Підготовка до УЗД'); ?></a>
                                    </li>
                                    <li class="dropdown_list_link">
                                        <a href="<?php current_lang('/information/pervoe-poseshhenie-kliniki/', '/en/information/first-visit-to-the-clinic/', '/ua/information/pershe-vidviduvannya-kliniki/'); ?>">
                                            <?php current_lang('Первое посещение клиники', 'First visit to the Clinic', 'Перше відвідування клініки'); ?>
                                        </a>
                                    </li>
                                    <li class="dropdown_list_link">
                                        <a href="<?php current_lang('/information/v-kakih-sluchayah-mozhno-vyzvat-nashego-vracha-na-dom-i-v-kakih-vyzyvat-skoruyu/', '/en/information/requesting-a-home-visit-versus-an-ambulance/', '/ua/information/u-yakih-vipadkah-mozhna-viklikati-nashogo-likarya-dodomu-ta-v-yakih-viklikati-shvidku/'); ?>">
                                            <?php current_lang('В каких случаях можно вызвать нашего врача на дом и в каких вызывать скорую', 'Requesting a home visit versus an ambulance', 'У яких випадках викликати нашого лікаря додому, а в яких швидку'); ?></a></li>
                                    <li class="dropdown_list_link">
                                        <a href="<?php current_lang('/information/informatsiya-dlya-korporativnyh-zakazchikov/', '/en/information/self-insured-group-health-plans/', '/ua/information/informatsiya-dlya-korporativnih-zamovnikiv/'); ?>">
                                            <?php current_lang('Информация для корпоративных заказчиков', 'Self-insured group health plans', 'Інформація для корпоративних замовників'); ?></a>

                                    </li>
                                    <li class="dropdown_list_link">
                                        <a href="<?php current_lang('/information/informatsiya-dlya-studentov/', '/en/information/for-job-seekers-and-students/', "/ua/information/informatsiya-dlya-studentiv/"); ?>">
                                            <?php current_lang('Для соискателей работы и студентов', 'For job seekers and students', 'Вакансії та стажування'); ?></a></li>
                                    <li class="dropdown_list_link"><a href="<?php current_lang('/information/sposoby-oplaty-meditsinskih-uslug/', '/en/information/billing-and-insurance/', '/ua/information/sposobi-oplati-medichnih-poslug/'); ?>"><?php current_lang('Способы оплаты', 'Billing and insurance', 'Способи оплати'); ?></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown_list_link">
                            <a href="<?php current_lang('/direction/', "/en/specialties/", "/ua/napryamki/"); ?>">
                                <?php current_lang('Направления', "Specialties", "Напрямки"); ?>
                            </a>
                        </li>
                        <li class="dropdown_list_link">
                            <a href="<?php current_lang('/articles/', '/en/our-media/', "/ua/article/"); ?>">
                                <?php current_lang('Статьи', 'Our Media', 'Статті'); ?>
                            </a>
                        </li>
                        <li class="dropdown_list_link">
                            <a href="<?php current_lang('/partners/', '/en/partner/', "/ua/partneru/"); ?>">
                                <?php current_lang('Наши партнеры', 'Our Partners', 'Наші партнери'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav_item"><a href="<?php current_lang('/staff/', '/en/doctors/', '/ua/likari/'); ?>"><?php current_lang('Врачи', 'Physicians', 'Лікарі'); ?></a></div>
            <div class="nav_item dropdown_item"><span>Цены</span>
                <div class="dropdown_block_menu">
                    <ul class="dropdown_list">
                        <li class="dropdown_list_link">
                            <a href="<?php current_lang('/tseny/', '/en/price/', '/ua/tsiny/'); ?>">
                                <?php current_lang('Стоимость услуг', 'Cost of services', 'Вартість послуг'); ?>
                            </a>
                        </li>
                        <li class="dropdown_list_link"><a href="<?php current_lang('/akcii/', '/en/stock/', '/ua/aktsiyi/'); ?>"><?php current_lang('Акции', 'Specials', 'Акції'); ?></a></li>
                        <li class="dropdown_list_link"><a href="<?php current_lang('/programs/', "/en/packages/", "/ua/program/"); ?>">
                                <?php current_lang('Комплексные программы', "Packages", "Комплексні програми"); ?></a></li>
                        <li class="dropdown_list_link"><a href="/programs/"><?php current_lang('Вакцинация', "Vaccination", "Вакцинація"); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="nav_item dropdown_item"><span><?php current_lang('Услуги и<br>направления работы', "Services and<br> work directions", "Послуги і<br>напрямки роботи"); ?></span>
                <div class="dropdown_block_menu">
                    <ul class="dropdown_list">
                        <li class="dropdown_list_link"><a href="<?php current_lang('/uslugi/', "/en/services/", "/ua/usluga/"); ?>">
                                <?php current_lang('Услуги', "Services", "Послуги"); ?>
                            </a>
                        </li>
                        <li class="dropdown_list_link">
                            <a href="<?php current_lang('/direction/', "/en/specialties/", "/ua/napryamki/"); ?>">
                                <?php current_lang('Направления', "Directions", "Напрямки"); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav_item"><a href="<?php current_lang('/kontakty/', '/en/contacts/', "/ua/kontaktu/"); ?>"><?php current_lang('Контакты', 'Contacts', 'Контакти'); ?></a></div>
        </nav>
    </div>
</section>

href="https://uniclinic.com.ua/wp-content/themes/bb-theme-child/style.css?ver=180bf249fba4c1cdf787a34943d8c70c"
href="https://uniclinic.com.ua/wp-content/themes/bb-theme-child/style.css?ver=180bf249fba4c1cdf787a34943d8c70c"