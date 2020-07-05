<?php
require_once(ROOT . "/views/layouts/header.php");
?>
<main class="page_template_404">
    <section class="section_1 padding_first_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="desc_page"><?php echo translate("страница не найдена", "Сторінка не знайдена", "Page not found"); ?></p>
                    <h1>404</h1>
                    <a href="<?php echo translate("/ru/", "/", "/en/"); ?>" class="link_button"><?php echo translate("На главную", "На головну", "To the main"); ?></a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once(ROOT . "/views/layouts/footer.php");
?>