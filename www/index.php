<?php
session_start();
require_once("./inclusion/security.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./inclusion/head.php") ?>
</head>

<body>
    
        <!-- левая панель навигации -->
        <?php require_once("./inclusion/nav-panel.php") ?>
        <!-- класс с контентом -->
        <div class="content-container">
            <?php require_once("./inclusion/header.php") ?>
            <!-- всё интересное в main -->
            <main>
                <div class="main__container">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab ad eaque labore harum, alias commodi
                    odit nihil? Beatae aut debitis ad pariatur, ratione deleniti maiores labore consectetur earum, quia
                    rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi asperiores laborum ducimus voluptatibus pariatur suscipit facere atque error in officiis, neque quos aliquam veritatis ab omnis. Rerum explicabo tempore fugiat?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam repudiandae tenetur eius porro, cumque doloremque odio incidunt excepturi, possimus deleniti nobis dicta ab ad nisi fuga, impedit neque ut molestias!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi unde officiis omnis sapiente beatae quos sed pariatur maiores ipsam animi dolore ducimus ad quas error est recusandae, laborum autem quia.
                </div>
            </main>

            <!-- <button></button> -->

            <!-- подвал -->
            <?php require_once("./inclusion/footer.php") ?>
        </div>

    



    <script src="./js/main.js"></script>
</body>

</html>