<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="job_page_template">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $data['post_title']; ?></h1>
                </div>
                <div class="col-lg-12 container_job">
                    <?php
                    if (count($data_job) != 0) {
                        for ($i = 0; $i < count($data_job['permalink']); $i++) {
                            echo "<div class='job_item'>
                                <div class='job_section_1'>
                                    <div class='job_section_name'>
                                        <p class='job_date'>" . $data_job['data_field'][$i] . "</p>
                                        <p class='job_name'>" . $data_job['post_title'][$i] . "</p>
                                    </div>
                                </div>
                                <div class='job_section_2'>
                                    <p>" . $data_job['short_desc'][$i] . "</p>
                                    <p class='job_link'><span class='popup_activ_4' >
                                    " . translate("Откликнуться на вакансию", "Відправити резюме", "To send a resume") . "</span></p>
                                </div>
                            </div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <?php if ($total_number_page > 3) require_once(ROOT . "/views/global_block/pagination.php"); ?>
        </div>
    </section>
    <?php require_once(ROOT . "/views/global_block/main_form_with_login.php"); ?>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>