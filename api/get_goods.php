<?php
include_once "db.php";
$bigs = $Type->find($_GET);
// header("ContentType:application/json");
echo json_encode($bigs);
