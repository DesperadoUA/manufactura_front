<div class="direction_form">
    <div class="container">
        <div class="row queshen_wrapper_form">
            <div class="col-lg-12 text-center  mm_form_title">
                <?= translate("Задать вопрос", "Задати питання", "Ask a Question"); ?>
            </div>
            <div class="col-lg-6 col-md-6 mm_form_input">
                <input type="text" name="queshen_form_name"
                       placeholder="<?= translate("Имя", "Iм'я", "Name"); ?>" required>
            </div>
            <div class="col-lg-6 col-md-6 mm_form_input">
                <input type="email" name="queshen_form_email" placeholder="Email" required>
            </div>
            <div class="col-lg-12 mm_form_textarea">
                <textarea name="queshen_form_comment" placeholder="<?= translate("Комментарий", "Коментар", "Comment"); ?>"></textarea>
            </div>
            <?php
                $url = $_SERVER['REQUEST_URI'];
                if(strpos($url,'/post_staff/') !== false) {
                    $strText = translate("* Обязательно указывайте фамилию врача, кому обращаете свой вопрос",
						"* Обов'язково зазначайте прізвище лікаря, до якого звертаєте своє питання",
						"* Be sure to mention the doctor's name when you are asking your question");
                    $strBefore = '<div class="mm_form_desc">';
                    $strAfter = '</div>';
                    echo $strBefore.$strText.$strAfter;
                }
            ?>
            <div class="col-lg-12 text-center mm_form_submite">
                <button id="queshen_form_submite">
                    <?= translate("Отправить", "Надіслати", "Submit"); ?>
                </button>
            </div>
            <div class="block_error_queshen"></div>
        </div>
    </div>
</div>