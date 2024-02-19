<?php
include_once "db.php";
$order = $Orders->all();
echo json_encode($order);
