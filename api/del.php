<?php
include_once "db.php";
$DB=${ucfirst($_POST['table'])};
$DB->del($_POST['id']);

?>