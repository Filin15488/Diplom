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
            <form action="#" method="post">
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
                        <select name="stego_type" id="">
                            <?php require_once("./type_OS_from_db.php"); ?>
                        </select>
                    </div>
                </div>
                <div class="add_stego_form_row">
                    <div class="add_stego_form_column-text">
                        Вид программы:
                    </div>
                    <div class="add_stego_form_column">
                        <select name="stego_type" id="">
                            <option value="1">Устанавливаемая</option>
                            <option value="2">Портативная</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn" style="margin: 24px;">
                    Добавить пользователя
                </button>
                



            </form>

        </div>



    </main>




    <?php require_once("../inclusion/footer.php"); ?>
</body>

</html>