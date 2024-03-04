<?php
session_start();
require_once("../inclusion/security.php");
require_once("../inclusion/db.php");
require_once("../inclusion/roles.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../inclusion/head.php"); ?>
</head>
<body>
    <?php require_once("../inclusion/header_login.php"); ?>
    <main>
        <div id="title_on_page">
        СПИСОК УЧТЕННЫХ СТЕГАНОГРАФИЧЕСКИХ ПРОГРАММ
        </div>
        <div class="separator"></div>
        <div class="list_prog_container">
            <table>
                <?php 
                    $sql="SELECT st_prog_name, 'is_portable'=CASE WHEN is_portable='1' THEN 'с установкой' WHEN is_portable='0' THEN 'портабельная' ELSE CAST(is_portable as varchar) END, extention, algoritm, author, year_create, encryption, os  FROM [stego_as].[dbo].[st_prog] order by st_prog_name desc"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                    $stmt = sqlsrv_query($conn, $sql);
                    $row_num=0;
                    echo '<tr style="font-weight:bold;">' . '<td>'.'Номер'."</td>".'<td>'.'Программа'."</td>".'<td>'.'Портабельность'."</td>"."<td>".'Расширения'."</td>"."<td>".'Алгоритм'."</td>"."<td>".'Автор'."</td>"."<td>".'Год'."</td>"."<td>".'Шифрование'."</td>"."<td>".'Система'."</td>";
                    if ($stmt===false)
                    {
                        die(print_r(sqlsrv_errors(), true));
                    }
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
                        $row_num ++;
                        $row_table = "<tr>" . "<td>" . $row_num . "</td>";
                        foreach ($row as $key => $value){
                            $row_table.= "<td>" . $value . "</td>";
                        }
                        $row_table.= "</tr>";
                        echo $row_table;
                    }
                ?>
            

            </table>
        </div>
    </main>

    <?php require_once("../inclusion/footer.php"); ?>
</body>
</html>