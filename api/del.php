<?php
include_once "db.php";
$do = $_GET['table'];
$DB = ${ucfirst($do)};
$DB->del($_GET['id']);
to("../back.php?do=th");
