<?php
include_once "db.php";
if (!isset($_POST['id'])) {
    $rows = $Th->all(['big_id' => 0]);
    foreach ($rows as $row) {
?>
<option value="<?= $row['id'] ?>"><?= $row['type'] ?></option>
<?php
    }
}
if (isset($_POST['id'])) {
    $rows = $Th->all(['big_id' => $_POST['id']]);
    foreach ($rows as $row) {
    ?>
<option value="<?= $row['id'] ?>"><?= $row['type'] ?></option>
<?php
    }
}

if (isset($_POST['nowid'])) {
    $rows = $Th->all(['big_id' => 0]);
    foreach ($rows as $row) {
        $s = ($_POST['nowid'] == $row['id']) ? "selected" : "";
    ?>
<option value="<?= $row['id'] ?>" <?= $s ?>><?= $row['type'] ?></option>
<?php
    }
}
?>