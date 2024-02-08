<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("./inclusion/head.php")?>
</head>
<body>
    <?php require_once("./inclusion/header.php") ?>

    <main>
        <h3 id="login">Авторизация</h3>
        <br>
        <div class="separator"></div>

        <div class="authentication">
            <form action="./login_verify_data.php" method="post">
                <div class="authentication login-row-1">
                    <div class="authentication_text">Введите логин</div>
                    <div class="authentication_input-text">
                        <input type="text" name="user_name" id="">
                    </div>
                </div>
                <div class="authentication login-row-2">
                    <div class="authentication_text">Введите пароль</div>
                    <div class="authentication_input-pass">
                    <input type="password" name="user_pass" id="">
                    </div>
                </div>
                <div class="authentication-button">
                    <input type="submit" value="Авторизоваться" class="btn">
                </div>
            </form>
        </div>
    </main>

    <?php require_once("./inclusion/footer_unlogin.php")?>
</body>
</html>

