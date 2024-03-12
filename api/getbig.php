<?php
include_once "db.php";
$rows = $Type->all(['big_id' => 0]);
foreach ($rows as $row) {
    echo "<option value='{$row['id']}'>{$row['name']}</optoin>";
}
