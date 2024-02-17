<?php
include_once "db.php";
$DB=${ucfirst($_POST['table'])};
$all=$DB->all(['big_id' => $_POST['big_id']]);
if($_POST['big_id']==0){
    $qty = $Goods->count();
    }
    else{
    $qty = $Goods->count(['big'=>$_POST['big_id']]);
    }
$res=[
    'qty'=>$qty,
    'all'=>$all
];
echo json_encode($res);