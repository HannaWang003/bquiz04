<?php
include_once "db.php";
$res = $Admin->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);
if($res>=1){
$_SESSION['mag']=$_POST['acc'];
}
echo $res;
