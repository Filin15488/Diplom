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

    </main>

    <?php require_once("./inclusion/footer.php"); ?>
    
</body>
</html>