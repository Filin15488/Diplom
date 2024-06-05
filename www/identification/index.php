<?php
session_start();
require_once("../inclusion/security_admin.php");
require("../class/class.programs.php");

$prog = new Programs();
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
                    Идентификация стеганопрограмм
                </div>
                <div class="separator"></div>
                <div class="inside__containers identification__containers">

                    <div class="identification__title">
                        Добавить стеганопрограмму
                    </div>
                    <div class="identification__actions">
                        <div class="button" id="addFile">Добавить файл</div>
                        <div class="button" id="addFolder">Добавить папку с файлами</div>
                        <div class="button" id="">Добавить ключи реестра</div>
                    </div>


                </div>



            </div>
        </main>

        <div class="modal-parent" id="modal">
            <div class="modal-wrapper">
                <div class="modal">
                    <?php require_once("./modal.AddFile.php"); ?>
                    <?php require_once("./modal.AddFolderFiles.php"); ?>
                    <?php require_once("./modal.FormHandler.php"); ?>
                </div>
            </div>
        </div>


        <!-- подвал -->
        <?php require_once("../inclusion/footer.php") ?>
    </div>





    <script src="../js/main.js"></script>
    <script src="../js/identification.js"></script>
</body>

</html>