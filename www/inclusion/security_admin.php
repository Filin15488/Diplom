<?php
require_once("security.php");
if (trim($_SESSION['role']) != 'administrator') 
{
    header("Location: ./index.php");
    die();
}
