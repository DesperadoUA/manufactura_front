<section class="section_block_found">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab_title">
                    <div class="tab_item">
                        <div class="tab_block activ_tab" data-type="direction">
                            <?= translate(
                                    "По направлению",
                                    "За напрямком",
                                    "After direction"); ?>
                        </div>
                    </div>
                    <div class="tab_item">
                        <div class="tab_block" data-type="services">
                            <?= translate(
                                    "По услуге",
                                    "За послугою",
                                    "After service"); ?>
                        </div>
                    </div>
                    <div class="tab_item">
                        <div class="tab_block" data-type="special">
                            <?= translate(
                                    "По специализации врача",
                                    "За спеціалізацією",
                                    "After doctor specialization"); ?>
                        </div>
                    </div>
                    <div class="tab_item">
                        <div class="tab_block" data-type="post_title_doc">
                            <?= translate(
                                        "По ФИО врача",
                                        "За ПІБ лікаря",
                                        "After name of doctor"); ?>
                        </div>
                    </div>
                </div>
                <div class="serch_line">
                    <input type="text" placeholder="<?= translate(
                            "Поиск",
                            "Пошук",
                            "Search"); ?>" class="main_find_input">
                </div>
                <div class="section_block_desc">
                    <?= translate(
                            "* Ведите поиск на русском языке",
                            "* Ведіть пошук українською мовою",
                            "* Search in English"); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="found_result">

        </div>
    </div>
</section>