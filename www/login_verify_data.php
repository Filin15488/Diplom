<?php
session_start();

// echo "<pre>";
// print_r($_POST);
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
$sql="SELECT [stego_as].[dbo].[role].[name_role] FROM [stego_as].[dbo].[users] INNER JOIN [stego_as].[dbo].[role] ON ([stego_as].[dbo].[users].[id_role]=[stego_as].[dbo].[role].[id_role]) WHERE [stego_as].[dbo].[users].[name_users] = '$user_pass'";
$stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
if ($stmt == false){
    header("Location: /login?act=login_err");
}