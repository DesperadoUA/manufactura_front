<?php
require_once(ROOT."/views/layouts/header.php");
?>
<main class="login_template">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Страница входа на сайт</h1>
                <form action="#" method="post">
                    <div class="container">
                       <div class="col-lg-12">
                            <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4">
                                                <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>">
                                                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>">
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-12 submite_register_block">
                                                <input type="submit" name="submit" value="Войти" class="button_register">
                                            </div>
                                            <div class="col-lg-12 errors_block">
                                                <?php  if($error): ?>
                                               <p class="error_view"><?php echo $error; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                            </form>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
require_once(ROOT."/views/layouts/footer.php");
?>