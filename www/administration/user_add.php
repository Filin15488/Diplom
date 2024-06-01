<?php
session_start();
require_once("../inclusion/security_admin.php");
require_once("../inclusion/db.php");
require_once("../inclusion/url_redirect_err.php");

function set_max ($data, string $key)
{
    if (empty($data))
    {
        $data = filter_var(ini_get($key));
    }
    return $data;
}

$error_add = [];


$data = [
    "user_name" => trim($_POST['add_user_name']),
    "user_pass" => $_POST['add_user_pass'],
    "user_pass2" => $_POST['add_user_pass2'],
    "role" => $_POST['role'],
    "max_size" => set_max($_POST['max_size'],'upload_max_filesize'),
    "max_files" => $_POST['max_files']
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
    $url = url_redirect($error_add, "./");
    // рабочая переадресация
    header($url,true, 303);
}
else {
    // получение id роли
    $sql = "SELECT id_role FROM stego_as.dbo.role WHERE name_role = '" . $data['role'] . "';";
    $result = sqlsrv_query($conn, $sql);
    if ($result)
        {
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
            {
                $data['id_role'] =  $row['id_role'];
            }
        }
    // подготовка данных для загрузки в бд
    $data_from_db = [
        "user_name" => trim($data['user_name']),
        "user_pass" => password_hash($data['user_pass'],PASSWORD_DEFAULT),
        "id_role" => $data['id_role'],
        "max_size" => $data['max_size'],
        "max_files" => $data['max_files']
    ];
    unset($data);
    // print_r($data_from_db);
    $sql = "INSERT INTO stego_as.dbo.users (id_role, name_users, [password],[max_file_size],[max_files_count]) VALUES (? , ?, ?, ?, ?)";
    $params = array ($data_from_db['id_role'], $data_from_db['user_name'], $data_from_db['user_pass'], $data_from_db["max_size"], $data_from_db['max_files']);
    $result = sqlsrv_query($conn, $sql, $params);
    if ($result) {
        // вставка данных успешна
        $url = url_redirect(['insert_done'],'./');
        header($url,true, 303);
    }


}
