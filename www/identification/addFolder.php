<?php
require("../class/class.uploadfile.php");
require("../class/class.current_user.php");
require("../inclusion/url_redirect_err.php");
// текущий пользователь
$currentUser = new CurrentUser();
// массив загружаемых файлов
$uploaded_files = [];
// ошибки
$err = [];
// удачные загрузки
$success = [];

// Функция для реорганизации массива $_FILES['files'] в удобный формат
function reArrayFiles(&$file_post) {
    $file_array = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_array[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_array;
}

// Проверяем, были ли загружены файлы
if (isset($_FILES['files'])) {
    // Реорганизуем массив
    $files = reArrayFiles($_FILES['files']);
    
    // записываем реорганизованные файлы
    foreach ($files as $file) {
        $tmp ['file'] = $file;
        $upload = new UploadFile($tmp, $_POST['selectProg']);
        $uploaded_files [] = $upload;
    }

    foreach ($uploaded_files as $file) {
        // загрузка файлов 
        if ($_POST['saveFile'] == 'on')
        {
            // если файл прошёл проверки
            if ($file->checks($currentUser->get_data()['max_file_size']) === TRUE) {
                if ($file->uploadOnServer() === true) {
                    // Файл успешно прошёл проверки, запись внесена в базу данных, исходник загружен на сервер
                    $success [] = $file->get_filename();
                } else {
                    $err [] = $file->get_filename();
                }
            }
            else {
                $err [] = $file->get_filename();
            }
            
        }
        else
        {
            if ($file->checks($currentUser->get_data()['max_file_size']) === true) {
                if ($file->uploadOnDB() === true) {
                    // Файл успешно прошёл проверки, запись внесена в базу данных, исходник никуда НЕ загружен
                    $success [] = $file->get_filename();
                }
                else {
                    $err [] = $file->get_filename();
                }
            }
            else {
                $err [] = $file->get_filename();
            }
        }

    }
    $url = redirect();
    header($url, true, 303);



} else {
    $url = url_redirect(['no_files'], './');
    header($url, true, 303);
}

// особый редирект, т.к. множество файлов
function redirect() {
    global $err;
    global $success;
    $url = "Location: ./" . "?";
    if (!empty($err)) {
        $url .= url_stringify($err, '&err');
    }
    if (!empty($success)) {
        $url .= url_stringify($success, '&success');
    }
    return $url;
}


function url_stringify (array $arr, string $note) {
    $url = "$note=";
    foreach ($arr as $key=>$value) {
        if ($key != array_key_last($arr)) {
            $url .= $value . ",";
        }
        else {
            $url .= $value;
        }
    }
    return $url;

}
