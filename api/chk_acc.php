<?php
include_once "db.php";
if ($_POST['acc'] == "admin") {
    $res = 1;
} else {
    $res = $Mem->find(['acc' => $_POST['acc']]);
}
echo $res;
