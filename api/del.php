<?php
include_once "db.php";
// $db = ${ucfirst($_POST['table'])};
$db = new DB($_POST['table']);
$db->del($_POST['id']);
