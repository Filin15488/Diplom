<?php
require("../class/class.uploadfile.php");
require("../class/class.current_user.php");
require("../inclusion/url_redirect_err.php");
$upload = new UploadFile($_FILES, $_POST['selectProg']);
$currentUser = new CurrentUser();
if ($_POST['saveFile'] == 'on') {
    if ($upload->checks($currentUser->get_data()['max_file_size']) === TRUE) {
        if ($upload->uploadOnServer() === true) {
            // Файл успешно прошёл проверки, запись внесена в базу данных, исходник загружен на сервер
            $url = url_redirect(['server_upload_success'], './');
            header($url, true, 303);
        } else {
            $url = url_redirect(['server_upload_fail'], './');
            header($url, true, 303);
        }
    } else {
        $url = url_redirect($upload->checks($currentUser->get_data()['max_file_size']), './');
        header($url, true, 303);
    }
} else {
    if ($upload->checks($currentUser->get_data()['max_file_size']) === true) {
        if ($upload->uploadOnDB() === true) {
            // Файл успешно прошёл проверки, запись внесена в базу данных, исходник никуда НЕ загружен
            $url = url_redirect(['upload_success'], './');
            header($url, true, 303);
        }
        else {
            $url = url_redirect(['upload_fail'], './');
            header($url, true, 303);
        }
    } else {
        $url = url_redirect($upload->checks($currentUser->get_data()['max_file_size']), './');
        header($url, true, 303);
    }
}
