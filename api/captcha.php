<?php include_once "db.php";
$_SESSION['ans'] = code(5);
echo $img = captcha($_SESSION['ans']);
