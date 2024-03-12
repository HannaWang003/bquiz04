<?php
include_once "db.php";
$do = $_GET['do'];
$DB = ${ucfirst($do)};
$_POST['pr'] = serialize($_POST['pr']);
$DB->save($_POST);
to("../back.php?do=$do");
