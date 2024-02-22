<?php
session_start();
require_once("./inclusion/security_admin.php");
require_once("./inclusion/db.php");
require_once("./inclusion/url_redirect_err.php");

$error_add = array ();

$error_add = [];

$data = [
    "user_name" => trim($_POST['add_user_name']),
    "user_pass" => $_POST['add_user_pass'],
    "user_pass2" => $_POST['add_user_pass2'],
    "role" => $_POST['role']
];

// проверяем имя пользователя на существование
$sql = "SELECT name_users FROM stego_as.dbo.users WHERE name_users ='" . $data['user_name'] . "';";
$result = sqlsrv_query($conn, $sql);
if ($result)
{
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
        if (trim($row['name_users']) == trim($_POST['add_user_name'])){
            $error_add[] = 'error_name';
        }
    }
}
// проверка совпадение паролей
if ($data['user_pass'] != $data['user_pass2']){
    $error_add[] = "error_equals_pass";
}
// проверка на ошибки
if (count($error_add) !=0)
{
    $url = url_redirect($error_add, "add_user.php");
    // рабочая переадресация
    header($url);
}
else {
    // получение id роли
    $sql = "SELECT id_role FROM stego_as.dbo.role WHERE name_role = '" . $data['role'] . "';";
    $result = sqlsrv_query($conn, $sql);
    if ($result)
        {
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
            {
                // $id_role = $row['id_role'];
                $data['id_role'] =  $row['id_role'];
            }
        }
    // подготовка данных для загрузки в бд
    $data_from_db = [
        "user_name" => trim($data['user_name']),
        "user_pass" => password_hash($data['user_pass'],PASSWORD_DEFAULT),
        "id_role" => $data['id_role']
    ];
    unset($data);
    $sql = "INSERT INTO stego_as.dbo.users (id_role, name_users, [password]) VALUES (? , ?, ?)";
    $params = array ($data_from_db['id_role'], $data_from_db['user_name'], $data_from_db['user_pass']);
    $result = sqlsrv_query($conn, $sql, $params);
    if ($result) {
        // вставка данных успешна
        $url = url_redirect(['insert_done'],'add_user.php');
        header($url);
    }


}







// echo "<pre>";
// print_r($data);
// print_r($error_add);
// echo password_verify()
// print_r($data_from_db);
// var_dump($data_from_db);