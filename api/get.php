<?php
include_once "db.php";
$DB = ${ucfirst($_POST['table'])};
if(isset($_POST['big_id'])){
$all = $DB->all(['big_id' => $_POST['big_id']]);
}else{
    $all=$DB->all();
}
echo json_encode($all);
