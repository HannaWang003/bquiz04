<?php
include_once "db.php";
$chk =  $Mem->count(['acc'=>$_POST['acc']]);
if($_POST['acc']=="admin"){
    $chk = 2;
}
if(isset($_POST['type'])){
    echo $chk;
}elseif($chk!=0){
    echo $chk;
}
else{
    $Mem->save($_POST);
}

?>