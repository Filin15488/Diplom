<?php
session_start();
$_SESSION['veryfi'] = NULL;
unset($_SESSION);
// echo "<pre>";
// print_r($_SESSION);
session_destroy();
header("Location: ./login.php");