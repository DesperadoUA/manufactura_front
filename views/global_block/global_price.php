<section class="price_direction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                for ($i = 0; $i < count($data['json_content']); $i++) {
                    echo "<div class='price_accordeon'>
                                <div class='price_cross'>+</div>
                                <div class='accordeon_title'>{$data['json_content'][$i]['menuAnchor']}</div>
                              </div>";
                    if (count($data['json_content'][$i]['menuChildren']) !== 0) {
                        echo "<div class='price_wrapper'>
                                    <div class='price_box'>
                                        <div class='price_row'>
                                            <div class='price_row_title'>" . translate("Услуга", "Послуга", "Service") . "</div>
                                            <div class='price_number'>" . translate("Цена", "Ціна", "Price") . "</div>
                                        </div>";
                        for ($j = 0; $j < count($data['json_content'][$i]['menuChildren']); $j++) {
                            echo "<div class='price_row'>
                                <div class='price_row_title'>{$data['json_content'][$i]['menuChildren'][$j]['menuAnchor']}</div>
                                <div class='price_number'>{$data['json_content'][$i]['menuChildren'][$j]['menuLink']}</div>
                            </div>";
                        }
                        echo "</div></div>";
                    }
                }
                ?>
            </div>
            <div class="buy_online">
                <a href="#">
                    <button>
                        <?= translate(
                                "Оплатить онлайн",
                                "Оплатити онлайн",
                                "Pay online");
                            ?>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>