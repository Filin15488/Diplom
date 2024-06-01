<?php
if (!array_key_exists("role",$_SESSION) && !array_key_exists("veryfi",$_SESSION))
{
    header("Location: /login.php");
    die();
}