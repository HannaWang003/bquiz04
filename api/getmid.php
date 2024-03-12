<?php
include_once "db.php";
$rows = $Type->all(['big_id' => $_POST['id']]);
echo "<option value=''>請選擇一項</optoin>";
foreach ($rows as $row) {
    if(isset($_GET['mid']) && $row['id']==$_GET['mid']){
        echo "<option value='{$row['id']}' selected >{$row['name']}</optoin>";  
    }
    else{
    echo "<option value='{$row['id']}'>{$row['name']}</optoin>";
    }
}
