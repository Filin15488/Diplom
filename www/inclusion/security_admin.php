<?php
require_once("./inclusion/security.php");
require_once("./inclusion/roles.php");
if (trim($_SESSION['role']) != $roles['admin']) 
{
    header("Location: ./login.php");
    die();
}
