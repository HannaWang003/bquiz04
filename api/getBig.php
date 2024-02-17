<?php
include_once "db.php";
$DB=${ucfirst($_GET['table'])};
unset($_GET['type']);
echo json_encode($DB->all(["big_id"=>$_GET['big_id']]));
?>