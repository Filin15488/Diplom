<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./inclusion/head.php") ?>
</head>

<body>

    <div class="login-content">
        <?php require_once("./inclusion/header.php") ?>


        <div class="login">

            <h2>Авторизация</h2>
            <form action="./login_verify_data.php" method="post">
                <div class="inputBx">
                    <input type="text" name="user_name" placeholder="Логин">
                </div>
                <div class="inputBx">
                    <input type="password" name="user_pass" placeholder="Пароль">
                </div>
                <button type="submit" class="button button-login">
                    Авторизация
                </button>
            </form>
            <div class="href">
                Нет аккаунта? Отправьте заявку для <a href="./registration.php">Демо-доступа</a>
            </div>
        </div>


        <?php require_once("./inclusion/footer.php") ?>

    </div>





</body>

</html>