<?php
require("../class/class.programs.php");
require("../inclusion/url_redirect_err.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['rdProgName'])) {
        $programs = new Programs;
        $programs->delete_prog($_POST['rdProgName']);
        $url = url_redirect(['DeleteDone'], './');
        header($url, true, 303);
    }
}
