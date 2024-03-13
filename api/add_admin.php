<?php
include_once "db.php";
$_POST['pr'] = serialize($_POST['pr']);
$do = $_GET['do'];
$DB = ${ucfirst($do)};
$DB->save($_POST);
to("../back.php?do=$do");
