<?php
include_once "db.php";
$rows = $Type->all(['big_id' => 0]);
foreach ($rows as $row) {
    if(isset($_GET['big']) && $row['id']==$_GET['big']){
        echo "<option value='{$row['id']}' selected >{$row['name']}</optoin>";  
    }
    else{
       echo "<option value='{$row['id']}'>{$row['name']}</optoin>";  
    }
   
}
