<?php
require("../class/class.programs.php");
require("../inclusion/url_redirect_err.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);
    if (!empty($_POST['rdProgName'])) {
        $programs = new Programs;
        $program = $programs->get_prog_info($_POST['rdProgName']);
        $program_files = $programs->get_prog_files($_POST['rdProgName']);

        $data = [
            "progInfo" => $program,
            "progFiles" => $program_files
        ];

        // Преобразование данных в JSON-формат
        $json = json_encode($data, JSON_PRETTY_PRINT);

        // Установка заголовков для загрузки файла
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="data.json"');
        header('Content-Length: ' . strlen($json));

        // Отправка JSON-данных
        echo $json;
    }
    else {
        $url = url_redirect(['nameError'], './');
        header($url, true, 303);
    }
}
