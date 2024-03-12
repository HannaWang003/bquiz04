<?php
include_once "db.php";
$res = $Admin->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);
if ($res == 1) {
    if ($_POST['ans'] == $_SESSION['ans']) {
        $_SESSION['mag'] = $_POST['acc'];
    } else {
        $res = 2;
    }
}
echo $res;
