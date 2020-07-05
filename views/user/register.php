<?php
require_once(ROOT."/views/layouts/header.php");
?>
<main class="register_template">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Страница регистрации пользователей</h1>
                <form action="#" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                            </div>
                            <div class="col-lg-4">
                                <input type="password" name="password" placeholder="Пароль"
                                    value="<?php echo $password; ?>">
                            </div>
                            <div class="col-lg-12 submite_register_block">
                                <input type="submit" name="submit" value="Регистрации" class="button_register">
                            </div>
                            <div class="col-lg-12 errors_block">
                                <?php if(isset($error) && is_array($error)): ?>
                                <ul>
                                    <?php foreach($error as $errorItem): ?>
                                    <li>- <?php echo $errorItem; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
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