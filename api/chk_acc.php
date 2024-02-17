<?php
include_once "db.php";
if(isset($_POST['ans'])){

    $_SESSION['ans'] = $_POST['ans'];
}
$chkans = $_POST['chkans'];
unset($_POST['chkans']);
$s = $_POST['table'];
$DB = ${ucfirst($_POST['table'])};
unset($_POST['table']);
if($DB->count($_POST)==0){
echo "0";
}elseif($chkans!=$_SESSION['ans']){
    echo "1";
}
else{
    echo "2";
    $_SESSION[$s]=$_POST['acc'];
}


?>