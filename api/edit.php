<?php
include_once "db.php";
$do = $_GET['do'];
$DB = ${ucfirst($do)};
$DB->save($_POST);
to("../back.php?do=$do");
