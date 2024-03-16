<?php
include_once "db.php";
echo $Mem->count(['acc' => $_POST['acc']]);
