<?php
    $server = 'sqlserver'; //Создание соединения с СУБД
    $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"mssql_stego2021") ;
    $conn = sqlsrv_connect($server, $db);
    if ($conn===false) 
    { //Проверка соединения с БД
        die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
    };
  // echo "Db coonection is done"
?>
