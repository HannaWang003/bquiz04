<?php
include_once "db.php";
$_POST['acc']=$_SESSION['user'];
$_POST['cart']=serialize($_SESSION['cart']);
unset($_SESSION['cart']);
$_POST['no']=date("Ymd").rand(100000,999999);
$_POST['total']=$_SESSION['total'];
unset($_SESSION['total']);
$Order->save($_POST);
to("../index.php");

?>