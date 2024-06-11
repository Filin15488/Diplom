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


                <div class="accordion__container">
                    <div class="accordion">
                        <dl>
                            <dt>
                                <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">О проекте</a>
                            </dt>
                            <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                                <p>
                                    "Stego_as" - web-сервис для поиска следов присутствия стеганографического программного обеспечения на компьютерах и носителях информации. Наша цель - повысить эффективность проведения компьютерно-технических экспертиз и исследований в рамках получения ориентирующей информации за счёт автоматизации.
                                    <br>
                                    Stego_as - это развивающийся продукт, присоединяйтесь к нам, чтобы сделать мир цифровой информации более прозрачным и защищённым!
                                </p>
                            </dd>
                            <dt>
                                <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">
                                    Принцип работы
                                </a>
                            </dt>
                            <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
                                <p>
                                    Stego_as ведет учет хэш-значений файлов, записей в реестр и журналы операционных систем данных известных стеганографических программ для дальнейшего их сравнения их с объектами исследования
                                </p>
                            </dd>
                            <dt>
                                <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">
                                    Преимущества Stego_as
                                </a>
                            </dt>
                            <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">

                                <ol>
                                    <li>
                                        Автоматизация процесса анализа: исключает необходимость ручного анализа, экономя время и ресурсы экспертов.
                                    </li>
                                    <li>
                                        Высокая точность: использование проверенных алгоритмов обеспечивает надёжность результатов.
                                    </li>
                                    <li>
                                        Удобство использования: простой и понятный интерфейс делает работу с приложением доступной даже для пользователей без специальной технической подготовки.
                                    </li>
                                    <li>
                                        Своевременные обновления: постоянное обновление базы данных на основе мониторинга ресурсов Интернет
                                    </li>
                                </ol>

                            </dd>
                            <dt>
                                <a href="#accordion4" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">
                                    Кто может воспользоваться Stego_as?
                                </a>
                            </dt>
                            <dd class="accordion-content accordionItem is-collapsed" id="accordion4" aria-hidden="true">

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
                            </dd>
                        </dl>
                    </div>
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