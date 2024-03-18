<?php
include_once "db.php";
$_POST['no'] = date("Y-m-d") . rand(100000, 999999);
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['date'] = date("Y-m-d");
unset($_SESSION['cart']);
$_POST['acc'] = $_SESSION['mem'];
$Order->save($_POST);
to("../index.php");
