<?php
include_once "db.php";
if (isset($_POST['id'])) {
    $big = $Good->find($_POST['id'])['big'];
    $rows = $Th->all(['big_id' => 0]);
    foreach ($rows as $row) {
        $s = ($big == $row['id']) ? "selected" : "";
?>
        <option value="<?= $row['id'] ?>" <?= $s ?>><?= $row['type'] ?></option>
    <?php
    }
} else {
    $rows = $Th->all(['big_id' => 0]);
    foreach ($rows as $row) {
    ?>
        <option value="<?= $row['id'] ?>"><?= $row['type'] ?></option>
<?php
    }
}
?>