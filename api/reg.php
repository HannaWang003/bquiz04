<?php
include_once "db.php";
$Mem->save($_POST);
to('../index.php?do=login');
