<?php
// require_once("../inclusion/security.php");
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
                <div class="title_on_page">
                    Работа со стеганопрограммами
                </div>
                <div class="separator"></div>
                <div class="inside__containers stego_work__container">
                    CRUD фукнции
                    <div class="stego_actions">
                        <div class="button" id="addProg"> Добавить стеганопрограмму</div>
                        <div class="button" id="editProg"> Редактировать стеганопрограмму</div>
                        <div class="button" id="rdProg"> Просмотр и удаление</div>
                    </div>
                </div>

            </div>
        </main>

        <div class="modal-parent" id="modal">
            <div class="modal-wrapper">
                <div class="modal">
                    <?php require("./modal.Addprog.php"); ?>
                    <?php require("./modal.Edditprog.php") ?>
                    <?php require("./modal.rdProg.php") ?>
                </div>
            </div>
        </div>


        <!-- подвал -->
        <?php require_once("../inclusion/footer.php") ?>
    </div>





    <script src="../js/stegoWork.js"></script>
</body>

</html>