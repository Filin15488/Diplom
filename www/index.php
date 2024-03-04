<?php
session_start();
require_once("./inclusion/security.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("./inclusion/head.php")?>
</head>
<body>
    <?php require_once("./inclusion/header_login.php") ?>

    <main>
        <div id="title_on_page">
            ПОИСК СЛЕДОВ ПРИСУТСТВИЯ СТЕГАНОГРАФИЧЕСКОГО ПО
        </div>
        <div class="separator"></div>
        <div class="content-container">
            <div class="content-row">
                <div class="content-column">
                    Работа со стеганопрограммами:
                    <div class="content-img">
                        <img src="./images/steganoprograms_work.png" alt="">
                    </div>
                    <div class="main-button">
                        <div>
                            <a href="#" class="btn">
                                ДОБАВИТЬ 
                                <br>
                                СТЕГАНОПРОГРАММУ
                            </a>
                        </div>

                    </div>
                </div>
                <div class="content-column">Стеганографические программы:
                    <div class="content-img">
                        <img src="./images/steganoprograms.png" alt="">
                    </div>
                    <div class="main-button">
                        <div>
                            <a href="./list_prog/list_prog.php" class="btn">
                                СПИСОК УЧТЕННЫХ 
                                <br>
                                СТЕГАНОГРАФИЧЕСКИХ ПРОГРАММ
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="content-row">
                <div class="content-column">
                    Идентификация стеганопрограмм:
                    <div class="content-img">
                        <img src="./images/steganoprograms_identification.png" alt="">
                    </div>
                    <div class="main-button">
                        <div>
                            <a href="#" class="btn">
                                ИДЕНТИФИКАЦИЯ 
                                <br>
                                СТЕГАНОПРОГРАММ

                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="content-column">
                    Поиск следов присутствия:
                    <div class="content-img">
                        <img src="./images/steganoprograms_search.png" alt="">
                    </div>

                    <div class="main-button">
                        <div>
                        <a href="#" class="btn">
                            СОЗДАНИЕ  
                            <br>
                            ПОИСКОВОГО ДЕЛА
                        </a>
                        </div>
                        <div>
                        <a href="#" class="btn">
                            ПОИСКОВОЕ ДЕЛО   
                            <br>
                            (добавление объектов поиска) 
                        </a>
                        </div>
                        <div>
                        <a href="#" class="btn">
                            ПОИСК ОБЪЕКТОВ    
                            <br>
                            (в рамках конкретного дела) 
                        </a>
                        </div>

                    </div>
                </div>
            </div>
            <?php
            require_once("./inclusion/roles.php");

            if (trim($_SESSION['role']) == $roles['admin']) {
                echo <<<ADMIN_PANEL
                <div class="content-row">
                <div class="admin_panel">
                    <div id="title_on_page">Администрирование</div>
                    <div class="separator"></div>
                        <div class="admin_panel_content">
                            <div class="admin_panel-logo">
                                <img src="./images/admin_img.png" alt="">
                            </div>
                            <div class="admin_panel_content-actions">
                                <div>
                                <a href="./add_user.php" class="btn">Добавить нового пользователя</a> 
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                ADMIN_PANEL;
            }

            ?>

                


       
        
        
        </div>
            

                

    </main>

    <?php require_once("./inclusion/footer.php") ?>
    
</body>
</html>