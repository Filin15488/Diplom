<?php
require_once("../inclusion/security_admin.php");
require_once("../inclusion/db.php");

$sql = "SELECT type_stego FROM stego_as.dbo.types_2";
$result = sqlsrv_query($conn,$sql);
if ($result !== false) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
    {
        echo "<option value=\"" . $row['type_stego'] . "\">" . $row['type_stego'] . "</option>";
    }
}