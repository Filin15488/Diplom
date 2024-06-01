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
        "stego_date" => substr($_POST['stego_date'],0,4),
        "stego_author" => htmlspecialchars(ucfirst($_POST['stego_author'])),
        "stego_algoritm_encryption" => htmlspecialchars($_POST['stego_algoritm_encryption']),
        "stego_OS" => htmlspecialchars($_POST['stego_OS']),
        "stego_portable" => (int)($_POST['stego_portable'])
    ];
    // echo "<pre>";
    // var_dump($data);


    $sql = "SELECT st_prog_name FROM stego_as.dbo.st_prog";
    $result = sqlsrv_query($conn, $sql);
    if ($result){
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
            if ($data['stego_name'] == trim($row['st_prog_name'])){
                $errors[] = 'err_stego_name_exist';
                redirect($errors);
            }
        }
    }

    $sql = "INSERT INTO st_prog (st_prog_name, is_portable, vid, extention, algoritm, author, year_create, [encryption], OS)
    VALUES ('" . $data['stego_name'] . "'," . $data['stego_portable'] . ",'" . $data['stego_type'] . "','" . $data['stego_container_type'] . "','" . $data['stego_algoritm_stego'] . "','" . $data['stego_author'] . "','" . $data['stego_date'] . "', '" . $data['stego_algoritm_encryption'] . "','" . $data['stego_OS'] . "')";

    $result = sqlsrv_query($conn,$sql);
    if ($result) {
        // вставка данных успешна
        redirect(['insert_done']);
    }
    else{
        $errors[] = 'err_insert';
        redirect($errors);
        // print_r(sqlsrv_errors());
    }




}

function redirect (array $errors) {
    $url = url_redirect($errors,"./");
    header($url, true, 303);
    exit();
}