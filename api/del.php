<?php
include_once "db.php";
$DB = ${$_POST['table']};
$DB->del($_POST['id']);
