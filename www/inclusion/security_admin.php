<?php
require_once("./inclusion/security.php");
if (trim($_SESSION['role']) != 'administrator') 
{
    header("Location: ./login.php");
    die();
}
