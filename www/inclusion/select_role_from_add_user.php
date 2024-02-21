<?php
require_once("./inclusion/db.php");

$sql = "SELECT name_role FROM stego_as.dbo.role";
$result = sqlsrv_query($conn,$sql);
if ($result !== false) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
    {
        echo "<option value=\"" . $row['name_role'] . "\">" . $row['name_role'] . "</option>";
    }
}