<?php
include_once "db.php";
if(!isset($_POST['id'])){
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
    $_POST['regdate']=date('Y-m-d');
    $Mem->save($_POST);
}
}else{
    $Mem->save($_POST);

}

?>