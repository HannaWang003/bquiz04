<?php
include_once "db.php";
$types = $Type->all($_GET);
foreach ($types as $type) {
    echo "<option value='{$type['id']}'>{$type['name']}</optoin>";
}
