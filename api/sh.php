<?php
include_once "db.php";
$row = $Good->find($_POST['id']);
$row['sh'] = $_POST['sh'];
$Good->save($row);
