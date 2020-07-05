<section class="section_2">
    <div class="container">
        <div class="row">
            <?php
            if ($data['json_content']['title_package_1'] !== '') {
                echo "<div class='col-lg-4'>
                    <div class='program_item'>
                        <div class='program_item_title'>{$data["json_content"]["title_package_1"]}</div>
                        <div class='program_item_desc'>
                            {$data['json_content']['desc_package_1']}
                        </div>
                        <div class='program_item_price'>
                            {$data['json_content']['total_price_package_1']}
                        </div>
                        <div class='program_item_last'>
                            <p><strong>{$data['json_content']['first_price_package_1']}</strong></p>
                            <p><strong>{$data['json_content']['second_price_package_1']}</strong></p>
                                 {$data['json_content']['desc_price_package_1']}
                            <p class='program_item_buy'><a href='#'>" . translate("Оплатить онлайн", "Оплатити онлайн", "Pay online") . "</a></p>
                        </div>
                    </div>
                </div>";
            }
            ?>
            <?php
            if ($data['json_content']['title_package_2'] !== '') {
                echo "<div class='col-lg-4'>
                   <div class='program_item'>
                       <div class='program_item_title'>{$data['json_content']['title_package_2']}</div>
                       <div class='program_item_desc'>
                           {$data['json_content']['desc_package_2']}
                       </div>
                       <div class='program_item_price'>
                           {$data['json_content']['total_price_package_2']}
                       </div>
                       <div class='program_item_last'>
                           <p><strong>{$data['json_content']['first_price_package_2']}</strong></p>
                           <p><strong>{$data['json_content']['second_price_package_2']}</strong></p>
                           {$data['json_content']['desc_price_package_2']}
                           <p class='program_item_buy'><a href='#'>" . translate("Оплатить онлайн", "Оплатити онлайн", "Pay online") . "</a></p>
                       </div>
                   </div>
               </div>";
            }
            ?>
            <?php
            if ($data['json_content']['title_package_3'] !== '') {
                echo "<div class='col-lg-4'>
                    <div class='program_item'>
                        <div class='program_item_title'>{$data['json_content']['title_package_3']}</div>
                        <div class='program_item_desc'>
                            {$data['json_content']['desc_package_3']}
                        </div>
                        <div class='program_item_price'>
                            {$data['json_content']['total_price_package_3']}
                        </div>
                        <div class='program_item_last'>
                            <p><strong>{$data['json_content']['first_price_package_3']}</strong></p>
                            <p><strong>{$data['json_content']['second_price_package_3']}</strong></p>
                            {$data['json_content']['desc_price_package_2']}
                            <p class='program_item_buy'><a href='#'>" . translate("Оплатить онлайн", "Оплатити онлайн", "Pay online") . "</a></p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</section>