<?php
include_once "db.php";
if (!isset($_POST['big_id'])) {
    $_POST['big_id'] = 0;
}
$Type->save($_POST);
