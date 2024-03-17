<?php
require_once("security.php");
require_once("roles.php");
if (trim($_SESSION['role']) != $roles['admin']) 
{
    header("Location: ./index.php");
    die();
}
