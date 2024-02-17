<?php
include_once "db.php";
$table = $_POST['table'];
unset($_POST['table']);
$db = new DB($table);
$chk = $db->count($_POST);
if ($chk) {
    echo $chk;
    $_SESSION[$table] = $_POST['acc'];
} else {
    echo $chk;
}