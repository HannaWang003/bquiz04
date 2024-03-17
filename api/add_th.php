<?php
include_once "db.php";
if (isset($_POST['big'])) {
    $_POST['big_id'] = 0;
    $_POST['type'] = $_POST['big'];
    unset($_POST['big']);
    $Th->save($_POST);
}
if (isset($_POST['mid'])) {
    $_POST['type'] = $_POST['mid'];
    unset($_POST['mid']);
    $Th->save($_POST);
}
if (isset($_POST['id'])) {
    $Th->save($_POST);
}
