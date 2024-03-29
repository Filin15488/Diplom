<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("./inclusion/head.php")?>
</head>
<body>
    <?php require_once("./inclusion/header_unlogin.php") ?>

    <main>
        <h3 id="login">Авторизация</h3>
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

        
            <?php
            function error_div(string $type_error, string $message)
            {
                if(!empty($_GET[$type_error])){
                    if ($_GET[$type_error] == '1'){
                    $error_div = "<div class='login-errors'><h2>". $message ."</h2></div>";
                    echo $error_div;
                    }
                    
                };
                
                // Пользователя с таким логином не существует
            }
            $error_list = [
                'user_error' => 'Пользователя с таким логином не существует',
                'pass_error' => 'Неверный пароль. Пожалуйста, попробуйте снова'
            ];
            if (!empty($_GET))
            {
            error_div(array_key_first($_GET), $error_list[array_key_first($_GET)]);
            }
            
            
            ?>

    </main>

    <?php require_once("./inclusion/footer.php"); ?>
</body>
</html>

