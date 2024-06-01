<?php
session_start();
require_once("../inclusion/security_admin.php");
require_once("../class/class.users.php");
require_once("../inclusion/db.php");
require_once("../inclusion/url_redirect_err.php");


function set_max($data, string $key)
{
    if (empty($data)) {
        $data = preg_replace('/[^0-9]/', '', filter_var(ini_get($key)));
    }
    return $data;
}
// определяю однозначно заполненные данные
$data = [
    'id_users' => (int) $_POST['id_users'],
    'id_role' => (int) $_POST['id_role'],
    'name_users' => $_POST['name_users'],
    "max_file_size" => (int) set_max($_POST['max_size'], 'upload_max_filesize')
];

$users = new Users;
$user = $users->get_users_info($data['id_users']);

$error_list = [];

// определяю пароли
if (!empty($_POST['user_pass']) && !empty($_POST['user_pass2'])) {
    if ($_POST['user_pass'] != $_POST['user_pass2']) {
        $error_list[] = "error_equals_pass";
    } else {
        $data['password'] = password_hash($_POST['user_pass'], PASSWORD_DEFAULT);
    }
}

// определяю максимальное количество файлов
if (!empty($_POST['max_files_count'])) {
    $data['max_files_count'] = (int) $_POST['max_files_count'];
} else {
    $data['max_files_count'] = (int) $user['max_files_count'];
}
// проверяю очистку загрузок
if (!empty($_POST['clear_downloads']) && $_POST['clear_downloads'] == 'on') {
    // if (empty($data['max_files_count'])) {
    //     $data['max_files_current_count'] = $user['max_files_count'];
    // } else {
    //     $data['max_files_current_count'] = $data['max_files_count'];
    // }
    $data['max_files_current_count'] = NULL;
}

function sql_query(array $diff)
{
    global $params;

    $sql = "UPDATE stego_as.dbo.users SET ";
    foreach ($diff as $key => $value) {
        if ($key != array_key_last($diff)) {
            $sql .= $key . "=(?), ";
        }
        else {
            $sql .= $key . "=(?) ";
        }
        $params[] = $value;
    }

    $sql .= "WHERE id_users=(?)";

    return $sql;
 
}

// найдём изменнения
$diff = [];

foreach ($data as $key => $value) {
    if ($key != 'id_users') {
        if ($user[$key] != $value) {
            $diff[$key] = $value;
        }
    }
}

if (count($error_list) == 0) {
    $params = [];
    $sql = sql_query($diff);
    $params[] = $data['id_users'];
    $result = sqlsrv_query($conn, $sql, $params);
    if ($result) {
        // обновление данных успешно
        $url = url_redirect(['update_done'],'./');
        header($url,true, 303);
    } 
    else {
        // обновление данных не удалось
        $url = url_redirect(['update_error'],'./');
        header($url,true, 303); 
    }
   

   

}
