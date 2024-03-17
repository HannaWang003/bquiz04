<?php
include_once "db.php";
if (!isset($_POST['id'])) {
    $big = $Good->find($_POST['goodid'])['big'];
    $rows = $Th->all(['big_id' => 0]);
    foreach ($rows as $row) {
        $s = ($big == $row['id']) ? "selected" : "";
?>
        <option value="<?= $row['id'] ?>" <?= $s ?>><?= $row['type'] ?></option>
    <?php
    }
}
if (isset($_POST['id'])) {
    $mid = $Good->find($_POST['goodid'])['mid'];
    $rows = $Th->all(['big_id' => $_POST['id']]);
    foreach ($rows as $row) {
        $s = ($mid == $row['id']) ? "selected" : "";

    ?>
        <option value="<?= $row['id'] ?>" <?= $s ?>><?= $row['type'] ?></option>
<?php
    }
}
?>