<?php
include_once "db.php";
if (!isset($_POST['id'])) {
    $_POST['regdate'] = date("Y-m-d");
}
$Mem->save($_POST);
if (isset($_POST['id'])) {
    header("location:../back.php?do=mem");
}
