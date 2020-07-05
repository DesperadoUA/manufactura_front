<div class="direction_form">
    <div class="container">
        <div class="row  appointment_wrapper_form">
            <div class="col-lg-12 text-center  mm_form_title"><?php echo translate("Запишитесь на прием", "Запишіться на прийом", "Make an appointment"); ?></div>
            <div class="col-lg-6 col-md-6 mm_form_input"><input type="text" name="appointment_form_name" placeholder="<?php echo translate("Имя", "Iм'я", "Name"); ?>" required></div>
            <div class="col-lg-6 col-md-6 mm_form_input"><input type="text" name="appointment_form_tel" placeholder="<?php echo translate("Телефон", "Телефон", "Phone"); ?>" required></div>
            <div class="col-lg-6 col-md-6 mm_form_input"><input type="email" name="appointment_form_email" placeholder="Email" required></div>
            <div class="col-lg-6 col-md-6 mm_form_input"><input type="date" name="appointment_form_data" placeholder="<?php echo translate("Дата", "Дата", "Date"); ?>" required></div>
            <div class="col-lg-3"></div>
            <div class="col-lg-6 col-md-6 mm_form_select">
                <select name="appointment_form_direction">
                    <?php
                    if (array_key_exists('list_direction', $data_form)) {
                        foreach ($data_form['list_direction'] as $key) echo "<option>{$key}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-12 mm_form_textarea">
                <textarea name="appointment_form_comment" placeholder="<?php echo translate("Комментарий", "Коментар", "Comment"); ?>"></textarea>
            </div>
            <div class="col-lg-12 text-center mm_form_submite">
                <button id="appointment_form_submite"><?php echo translate("Записаться", "Записатися", "Sign up"); ?></button></div>
            <div class="block_error_appointment"></div>
        </div>
    </div>
</div>