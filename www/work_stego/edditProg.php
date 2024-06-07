<?php
session_start();
require_once("../inclusion/db.php");
require_once("../inclusion/security_admin.php");
require_once("../inclusion/url_redirect_err.php");

$errors = [];

//определяем какие поля из нужных нам пустые
$emptys = [
    'stego_name' => empty($_POST['stego_name']),
    'stego_container_type' => empty($_POST['stego_container_type'])
];

// вносим такие поля в массив с ошибками
foreach ($emptys as $key=>$value)
{
    if ($value){
        $errors[] = "err_" . "$key" . "_empty";
    } 
}
//проверям массив на наличие ошибок
if (!empty($errors)){
    redirect($errors);
}
else{
    $data = [
        "stego_name" => htmlspecialchars(ucfirst($_POST['stego_name'])),
        "stego_type" => htmlspecialchars($_POST['stego_type']),
        "stego_container_type" => strtoupper(htmlspecialchars($_POST['stego_container_type'])),
        "stego_algoritm_stego" => htmlspecialchars($_POST['stego_algoritm_stego']),
        "stego_date" => (int) $_POST['stego_date'],
        "stego_author" => htmlspecialchars(ucfirst($_POST['stego_author'])),
        "stego_algoritm_encryption" => htmlspecialchars($_POST['stego_algoritm_encryption']),
        "stego_OS" => htmlspecialchars($_POST['stego_OS']),
        "stego_portable" => (int)($_POST['stego_portable']),
        "stego_old_name" => htmlspecialchars($_POST['stego_old_name'])
    ];



    $sql = "
    UPDATE stego_as.dbo.st_prog
    SET st_prog_name = '".$data['stego_name']."',
        is_portable = ".$data['stego_portable'].",
        vid = '".$data['stego_type']."',
        extention = '".$data['stego_container_type']."',
        algoritm = '".$data['stego_algoritm_stego']."',
        author = '".$data['stego_author']."',
        year_create = '".$data['stego_date']."',
        encryption = '".$data['stego_algoritm_encryption']."',
        OS = '".$data['stego_OS']."'

    WHERE st_prog_name = '".$data['stego_old_name']."'   
    ";

    $result = sqlsrv_query($conn,$sql);
    if ($result) {
        // вставка данных успешна
        redirect(['update_done']);
    }
    else{
        $errors[] = 'err_insert';
        redirect($errors);
    }

}

function redirect (array $errors) {
    $url = url_redirect($errors,"./");
    header($url, true, 303);
    exit();
}