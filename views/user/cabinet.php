<?php
require_once(ROOT."/views/layouts/header.php");
?>
<main class="register_template">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Страница кабинет пользователя</h1>
                    <div class="container">
                       <div class="col-lg-12">
                           <h2>Имя пользователя: <?php echo $userData['name']; ?></h2>
                        <ul>
                            <li><a href="/cabinet/edit">Редактировать данные</a></li>
                            <li><a href="/cabinet/history">Список покупок</a></li>
                        </ul>
                       </div>
                    </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once(ROOT."/views/layouts/footer.php");
?>