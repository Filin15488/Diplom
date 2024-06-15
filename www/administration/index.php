<?php
session_start();
require_once("../inclusion/security_admin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("../inclusion/head.php") ?>
</head>

<body>

    <!-- левая панель навигации -->
    <?php require_once("../inclusion/nav-panel.php") ?>
    <!-- класс с контентом -->
    <div class="content-container">
        <?php require_once("../inclusion/header.php") ?>
        <!-- всё интересное в main -->
        <main>
            <div class="main__container">
                <div class="title_on_page">Настройки</div>
                <div class="separator"></div>
                <div class="inside__containers admin__container">
                    <div class="admin__content">Работа с пользователями</div>
                    <div class="admin__content admin__actions">
                        <div class="button admin_button" id="addNewUser">Добавить нового пользователя</div>
                        <div class="button admin_button" id="editUser">Редактирование информации о пользователях</div>
                        <div class="button admin_button" id="activateUsers">Активация/деактивация пользователя</div>
                    </div>

                </div>

            </div>
        </main>

        <!-- модальное окно для форм -->
        <div class="modal-parent" id="modal">
            <div class="modal-wrapper">
                <div class="modal">
                    <?php require_once("./modal.AddUser.php"); ?>
                    <?php require_once("./modal.EdditUser.php"); ?>
                    <?php require_once("./modal.activate.php"); ?>
                    <?php require_once("./modal.FormHandler.php"); ?>
                </div>
            </div>
        </div>
        


        <!-- подвал -->
        <?php require_once("../inclusion/footer.php") ?>
    </div>


    <script src="../js/administration.js"></script>
</body>

</html>