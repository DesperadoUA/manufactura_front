<div class="footer_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 footer_menu_wrapper">
                    <?php 
                        function createItemMenu($item) {
                            $srtCod = "<div class='footer_menu_item'>
                                <a href='{$item['text_1']}'>{$item['text_2']}</a></div>";
                                return $srtCod;
                        }
                        echo  implode("", array_map('createItemMenu', $data_menu['footer_main_menu']['menu']));
                    ?>
                </div>
            </div>
        </div>
    </div>