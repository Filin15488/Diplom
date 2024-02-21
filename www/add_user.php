<?php
require_once("./inclusion/security.php");
if (trim($_SESSION['role']) != 'administrator') 
{
    header("Location: ./login.php");
    die();
}

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

        <div class="add_user">

        </div>

    </main>

    <?php require_once("./inclusion/footer.php"); ?>
    
</body>
</html>