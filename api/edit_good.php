<?php
include_once "db.php";
if (!empty($_FILES['img']['tmp_name'])) {
    $_POST['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/{$_FILES['img']['name']}");
}
$Good->save($_POST);
// dd($_FILES['img']['tmp_name']);
to("../back.php?do=th");
