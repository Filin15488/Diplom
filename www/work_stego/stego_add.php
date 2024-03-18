<?php
session_start();
require_once("../inclusion/security_admin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("../inclusion/head.php"); ?>
</head>

<body>
    <?php require_once("../inclusion/header_login.php"); ?>


    <main>
        <div id="title_on_page">Добавить стенограмму</div>
        <div class="separator"></div>
        <div class="add_stego_form">
            <form action="./stego_add_insert_db.php" method="post">
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Название стенограммы:
                    </div>
                    <div class="add_stego_form_column">
                        <input type="text" name="stego_name" id="">
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Вид стенограммы:
                    </div>
                    <div class="add_stego_form_column">
                        <select name="stego_type" id="">
                            <?php require_once("./type_stego_from_db.php"); ?>
                        </select>
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Тип контейнера:
                    </div>
                    <div class="add_stego_form_column">
                        <input type="text" name="stego_container_type" id="">
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Алгоритм стегановложения:
                    </div>
                    <div class="add_stego_form_column">
                        <input type="text" name="stego_algoritm_stego" id="">
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Год создания программы:
                    </div>
                    <div class="add_stego_form_column">
                        <input type="date" name="stego_date" id="">
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Автор:
                    </div>
                    <div class="add_stego_form_column">
                        <input type="text" name="stego_author" id="">
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Алгоритм шифрования:
                    </div>
                    <div class="add_stego_form_column">
                        <input type="text" name="stego_algoritm_encryption" id="">
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Система:
                    </div>
                    <div class="add_stego_form_column">
                        <select name="stego_OS" id="">
                            <?php require_once("./type_OS_from_db.php"); ?>
                        </select>
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Вид программы:
                    </div>
                    <div class="add_stego_form_column">
                        <select name="stego_portable" id="">
                            <option value="0">Устанавливаемая</option>
                            <option value="1">Портативная</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn" style="margin: 24px;">
                    ДОБАВИТЬ СТЕНОГРАММУ
                </button>
                <?php
                $error_list = [
                    'err_stego_name_empty' => "Внимание! Поле с названием программы пустое",
                    'err_stego_container_type_empty' => "Внимание! Поле с типом контейнера пустое",
                    'err_stego_name_exist' => "Данная программа уже учтена",
                    'err_insert' => 'Ошибка транзакции. Пожалуйста, попробуйте ещё'
                ];
                function error_div(string $type_error, string $message)
                {
                    if (!empty($_GET[$type_error])) {
                        if ($_GET[$type_error] == '1') {
                            $error_div = "<div class='login-errors'><h2>" . $message . "</h2></div>";
                            echo $error_div;
                        }
                    };
                };
                if (!empty($_GET) && empty($_GET['insert_done'])) {
                    error_div(array_key_first($_GET), $error_list[array_key_first($_GET)]);
                } else {
                    if (!empty($_GET) && $_GET['insert_done'] == 1) {
                        echo "<div class='DONE-div'><h2>" . "Стенограмма была успешно добавлена" . "</h2></div>";
                    }
                }

                ?>



            </form>

        </div>



    </main>




    <?php require_once("../inclusion/footer.php"); ?>
</body>

</html>