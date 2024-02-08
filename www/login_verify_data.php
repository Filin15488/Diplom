<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

require_once("./inclusion/db.php");
$sql = "SELECT * FROM users WHERE name_user = \"" . $_POST["user_name"] . "\";";
$stmt = sqlsrv_query ($conn, $sql);

echo "<pre>";
print_r($stmt);
echo "</pre>";