<form name="vacancy_form">
    <div class="direction_form">
        <div class="container">
            <div class="row job_wrapper_form">
                <div class="col-lg-12 text-center  mm_form_title"><?php echo translate("Отправить резюме", "Відправити резюме", "To send a resume"); ?></div>
                <div class="col-lg-6 col-md-6 mm_form_input">
                    <input type="text" name="job_form_name" placeholder="<?php echo translate("Имя", "Iм'я", "Name"); ?>" required>
                </div>
                <div class="col-lg-6 col-md-6 mm_form_input">
                    <input type="email" name="job_form_email" placeholder="Email" required>
                </div>
                <div class="col-lg-6 col-md-6 mm_form_input">
                    <input type="text" name="job_form_tel" placeholder="<?php echo translate("Телефон", "Телефон", "Phone"); ?>" required>
                </div>
                <div class="col-lg-6 col-md-6 mm_form_input">
                    <input type="text" name="job_form_vacancy" placeholder="<?php echo translate("Название вакансии", "Вакансія", "Job title"); ?>" required>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-md-6 mm_form_input">
                    <input type="file" name="job_form_file" placeholder="<?php echo translate("Файл", "Файл", "File"); ?>" required>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-12 mm_form_textarea">
                    <textarea name="job_form_comment" placeholder="<?php echo translate("Комментарий", "Коментар", "Comment"); ?>"></textarea>
                </div>
                <div class="col-lg-12 text-center mm_form_submite"><button id="job_form_submite"><?php echo translate("Отправить", "Надіслати", "Submit"); ?></button></div>
                <div class="block_error_job"></div>
            </div>
        </div>
    </div>
</form>