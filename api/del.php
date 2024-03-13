<?php
include_once "db.php";
$do = $_GET['do'];
$DB = ${ucfirst($do)};
$DB->del($_GET['id']);
to("../back.php?do=$do");
