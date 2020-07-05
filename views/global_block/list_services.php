<section class="section_3 list_services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 service_link">
                <?php
                for ($i = 0; $i < count($data_list); $i++) {
                    echo '<div class="service_item">
                        <div class="service_item_img"><img src="/template/images/check.png"></div>
                        <div class="service_item_link">' . $data_list[$i] . '</div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>