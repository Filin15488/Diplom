<?php
session_start();
require_once("./inclusion/security_admin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("./inclusion/head.php") ?>
</head>
<body>
    <?php require_once("./inclusion/header_login.php"); ?>

    <main>
        <div id="title_on_page">Добавление нового пользователя</div>
        <div class="separator"></div>

        <div class="add_user_form">
            <form action="./add_user_insert_db.php" method="post">
                <div class="add_user_form_rows">
                    <div class="add_user_columns">
                        Введите имя пользователя
                    </div>
                    <div class="add_user_columns">
                        <input type="text" name="add_user_name" id="">
                    </div>
                </div>
                <div class="add_user_form_rows">
                    <div class="add_user_columns">
                        Введите пароль
                    </div>
                    <div class="add_user_columns">
                        <input type="password" name="add_user_pass" id="">
                    </div>
                </div>
                <div class="add_user_form_rows">
                    <div class="add_user_columns">
                        Повторите пароль
                    </div>
                    <div class="add_user_columns">
                        <input type="password" name="add_user_pass2" id="">
                    </div>
                </div>
                <div class="add_user_form_rows">
                    <div class="add_user_columns">
                        Выберите роль
                    </div>
                    <div class="add_user_columns">
                        <select name="role" id="">
                            <?php
                            require_once('./inclusion/select_role_from_add_user.php');
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn" style="margin: 24px;">
                    Добавить пользователя
                </button>
            </form>
        </div>

        <?php 
        $error_list = [
            'error_name' => 'Пользователь с данным логином уже существует',
            'error_equals_pass' => 'Пароли не совпадают'
        ];
        function error_div(string $type_error, string $message)
            {
                if(!empty($_GET[$type_error])){
                    if ($_GET[$type_error] == '1'){
                    $error_div = "<div class='login-errors'><h2>". $message ."</h2></div>";
                    echo $error_div;
                    }
                    
                };
            };
        if (!empty($_GET) && empty($_GET['insert_done']))
        {
            error_div(array_key_first($_GET), $error_list[array_key_first($_GET)]);
        }
        else {
            if (!empty($_GET) && $_GET['insert_done'] == 1){
                echo "<div class='DONE-div'><h2>". "Пользователь успешно добавлен" ."</h2></div>";
            }
        }

        ?>

    </main>

    <?php require_once("./inclusion/footer.php"); ?>
    
</body>
</html>