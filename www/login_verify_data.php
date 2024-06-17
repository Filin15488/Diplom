<?php
session_start();
require_once("./inclusion/db.php");
require_once("./inclusion/url_redirect_err.php");

$data = [
    "user_name" => trim($_POST['user_name']),
    "user_pass" => $_POST['user_pass']
];

$err = array();

$sql = "SELECT stego_as.dbo.users.[id_users], stego_as.[dbo].users.activate, [stego_as].[dbo].[role].[name_role], stego_as.dbo.users.[password]
FROM [stego_as].[dbo].[users] INNER JOIN 
[stego_as].[dbo].[role] ON 
([stego_as].[dbo].[users].[id_role]=[stego_as].[dbo].[role].[id_role]) 
WHERE [stego_as].[dbo].[users].[name_users] = '" . $data['user_name'] . "'";

$result = sqlsrv_query($conn, $sql);
if ($result) {
    // если запрос прошёл
    if (sqlsrv_has_rows($result)) {
        while ($res = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            // нашёл строку с ролью и паролем
            $_SESSION['role'] = trim($res['name_role']);
            $pass_hash = $res['password'];
            if (password_verify($data['user_pass'], $pass_hash)) {
                // пароли совпадают
                if ($res['activate'] == 1) 
                {
                    // активирован
                    $_SESSION['verify'] = true;
                    $_SESSION['id_users'] = $res['id_users'];
                    header("Location: ./index.php");
                }
                else
                {
                    // не активирован
                    $err[] = 'activate_error';
                    $url = url_redirect($err, 'login.php');
                    header($url);
                }
            } else {
                // пароли не совпадают
                $err[] = 'pass_error';
                $url = url_redirect($err, 'login.php');
                header($url);
            }
        }
    } else {
        // пользователя нет
        // echo "пользователя нет";
        $err[] = "user_error";
        $url = url_redirect($err, 'login.php');
        header($url);
    }
}
if ($result == false) {
    $err[] = "query_err";
    $url = url_redirect($err, 'login.php');
    header($url);
}
