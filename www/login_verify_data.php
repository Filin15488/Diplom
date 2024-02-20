<?php
session_start();



// echo "<pre>";
// print_r($_POST);
// // print_r($_SESSION);
// echo "</pre>";

// require_once("./inclusion/db.php");
// $sql = "SELECT * FROM users WHERE name_user = \"" . $_POST["user_name"] . "\";";
// $stmt = sqlsrv_query ($conn, $sql);

// echo "<pre>";
// print_r($stmt);
// echo "</pre>";

require_once("./inclusion/db.php");

$user_name = trim($_POST['user_name']);
$user_pass = $_POST['user_pass'];
$sql = "SELECT [stego_as].[dbo].[role].[name_role] 
FROM [stego_as].[dbo].[users] INNER JOIN 
[stego_as].[dbo].[role] ON 
([stego_as].[dbo].[users].[id_role]=[stego_as].[dbo].[role].[id_role]) 
WHERE [stego_as].[dbo].[users].[name_users] = '$user_name' AND stego_as.dbo.users.[password] = '$user_pass'";


$stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса

// print_r($stmt);

if ($stmt)
{
    if (sqlsrv_has_rows($stmt)){
        // header("Location: ./index.php");
        // $_SESSION ['verify'] = true;
        // exit();
        while($res=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
            {
                $role=$res[0];
                $_SESSION['role'] = $role;
                $_SESSION ['verify'] = true;
                header("Location: ./index.php");
                
            }

    }
    else {
        header("Location: ./login.php?verify=data_error");
        exit();
    }
}