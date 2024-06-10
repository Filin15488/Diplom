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
                    Поиск следов присутствия
                </div>
                <div class="separator"></div>
                <div class="inside__containers business__container">
                    <div class="business__title">Поиск следов присутствия</div>
                    <div class="business__actions">
                        <div class="button">Создание поискового дела</div>
                        <div class="button">Поисковое дело (добавление объектов поиска)</div>
                        <div class="button">Поиск объектов (в рамках конкретного дела)</div>
                    </div>
                </div>

            </div>
        </main>

        <!-- подвал -->
        <?php require_once("../inclusion/footer.php") ?>
    </div>





    <script src="./js/main.js"></script>
</body>

</html>