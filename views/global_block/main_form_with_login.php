<section class="section_main_form fade_out mm_animate" data-animate="fade_in">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="main_form_title">
                    <?=
                    translate(
                            "Запишитесь на прием",
                            "Запишіться на прийом",
                            "Make an appointment"); ?>
                </p>
            </div>
            <div class="col-lg-6 col-md-6">
                <p class="main_form_label">
                    <?= translate(
                            "Ваше имя",
                            "Ваше ім'я",
                            "Your name"); ?>
                </p>
                <input type="text" name="main_form_name">
                <p class="main_form_label">
                    <?= translate(
                            "Номер телефона",
                            "Номер телефону",
                            "Phone number"); ?>
                </p>
                <input type="text" name="main_form_tel">
                <p class="main_form_label">
                    <?= translate(
                            "E-mail",
                            "E-mail",
                            "E-mail"); ?>
                </p>
                <input type="text" name="main_form_email">
            </div>
            <div class="col-lg-6 col-md-6">
                <p class="main_form_label">
                    <?= translate(
                            "Направление",
                            "Напрямок",
                            "Direction"); ?>
                </p>
                <select name="main_form_direction">
                    <?php
                    if (array_key_exists('list_direction', $data_form)) {
                        foreach ($data_form['list_direction'] as $key) echo "<option>{$key}</option>";
                    }
                    ?>
                </select>
                <p class="main_form_label">
                    <?= translate(
                            "Желаемая дата",
                            "Бажана дата",
                            "Desired date"); ?>
                </p>
                <input type="date" name="main_form_data">
                <p class="main_form_label">
                    <?= translate(
                            "Комментарий",
                            "Коментар",
                            "Comment"); ?>
                </p>
                <textarea name="main_form_comment"></textarea>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" required name="main_form_policy">
                   <label for="policy">
                       <?= translate(
                               "Я даю согласие на хранение и обработку моих персональных данных",
                               "Я даю згоду на зберігання і обробку моїх персональних даних",
                               "I consent to the storage and processing of my personal data"); ?>
                   </label>
                <br>
                <button class="button_style background_blue" id="main_form_submite">
                    <?= translate(
                            "Отправить",
                            "Надіслати",
                            "Submit"); ?>
                </button>
                <div class="block_error_main"></div>
            </div>
        </div>
    </div>
    <?php require_once("login_block.php"); ?>
</section>