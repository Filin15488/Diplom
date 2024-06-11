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
            <div class="main__container index__container">
                <div class="titile_on_page">FAQ</div>
                <div class="separator"></div>
                <div class="faq">
                    <div class="faq-item">
                        <div class="faq-question">
                            О проекте
                        </div>
                        <div class="faq-answer">
                            "Stego_as" - web-сервис для поиска следов присутствия стеганографического программного обеспечения на компьютерах и носителях информации. Наша цель - повысить эффективность проведения компьютерно-технических экспертиз и исследований в рамках получения ориентирующей информации за счёт автоматизации.
                            <br>
                            Stego_as - это развивающийся продукт, присоединяйтесь к нам, чтобы сделать мир цифровой информации более прозрачным и защищённым!
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            Принцип работы
                        </div>
                        <div class="faq-answer">
                            Stego_as ведет учет хэш-значений файлов, записей в реестр и журналы операционных систем данных известных стеганографических программ для дальнейшего их сравнения их с объектами исследования
                        </div>

                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            Преимущества Stego_as
                        </div>
                        <div class="faq-answer">
                            <ol>
                                <li>
                                    Эксперты компьютерно-технического направления: для повышения эффективности проведения экспертиз.
                                </li>
                                <li>
                                    Органы правопорядка: для получения ориентирующей информации.
                                </li>
                                <li>
                                Корпоративные специалисты: при расследовании инцидентов ИБ.
                                </li>
                                <li>
                                    Исследователи и студенты: для обучения и проведения научных исследований в области стеганоанализа.
                                </li>

                            </ol>

                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            Кто может воспользоваться Stego_as?
                        </div>
                        <div class="faq-answer">
                            <ol>
                                <li>
                                    Компьютерные эксперты: для повышения эффективности проведения экспертиз.
                                </li>
                                <li>
                                    Органы правопорядка: для расследования преступлений, связанных со скрытием информации.
                                </li>
                                <li>
                                    Корпоративные пользователи: для защиты корпоративных данных от потенциальных угроз.
                                </li>
                                <li>
                                    Исследователи и студенты: для обучения и проведения научных исследований в области стеганоанализа.
                                </li>
                            </ol>

                        </div>
                    </div>



                    <!-- Add more FAQ items as needed -->
                </div>

            </div>
        </main>

        <!-- <button></button> -->

        <!-- подвал -->
        <?php require_once("./inclusion/footer.php") ?>
    </div>





    <script src="./js/main.js"></script>
    <script src="/js/index.js"></script>
</body>

</html>