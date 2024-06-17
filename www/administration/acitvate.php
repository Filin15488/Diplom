<?php
require_once('../class/class.users.php');
require_once("../inclusion/url_redirect_err.php");
require("../inclusion/db.php");
$list = new Users;
$ids = $list->get_all_users_id();

// активированные пользователи из формы
$activate_users = [];

// разница с бд
$diff = [];

// запишем все checker в массив
foreach ($_POST as $key => $value) {
    if ($value == "on") {
        $activate_users[] += $key;
    }
}

// пробегаемся по массиву активированных пользотелей и сверям их состояние с бд
for ($i = 0; $i < count($activate_users); $i++) {
    if ($activate_users[$i] == $list->get_users_info($activate_users[$i])['id_users']) {
        if ($list->get_users_info($activate_users[$i])['activate'] == 0) {
            $diff[$activate_users[$i]] = 1;
        }
    }
}

// пробежим по массиву пользователей и найдём тех, кого деактивировали
for ($i = 0; $i < count($ids); $i++) {
    if (!in_array($ids[$i], $activate_users)) {
        $diff[$ids[$i]] = 0;
    }
}


$sql = "UPDATE stego_as.dbo.users SET activate = CASE ";
$params = [];
foreach ($diff as $key => $value) {
    $params[] = $key;
    $params[] = $value;
    if ($key != array_key_last($diff)) {
        $sql .= " WHEN id_users = " . $key . " THEN " . $value;
    } else {
        $sql .= " WHEN id_users = " . $key . " THEN " . $value . " END";
    }
}

$sql .= " WHERE id_users IN (" . implode(",", array_keys($diff)) . ")";


$result = sqlsrv_query($conn, $sql);
if ($result) {
    
    // обновление данных успешно
    $url = url_redirect(['activate_done'],'./');
    header($url,true, 303);
}
else {
    
    // обновление данных не удалось
    $url = url_redirect(['activate_error'],'./');
    header($url,true, 303);
}