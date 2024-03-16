<?php
include_once "db.php";
$DB = ${$_POST['table']};
$res = $DB->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);
if ($_POST['table'] == "Admin") {
    if ($res >= 1) {
        $_SESSION['mag'] = $_POST['acc'];
    }
} else {
    if ($res >= 1) {
        $_SESSION['mem'] = $_POST['acc'];
    }
}

echo $res;
