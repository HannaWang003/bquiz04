<?php
include_once "db.php";
if (isset($_POST['id'])) {
    $mid = $Good->find($_POST['id'])['mid'];
    $rows = $Th->all(['big_id' => $_POST['big_id']]);
    foreach ($rows as $row) {
        $s = ($row['id'] == $mid) ? "selected" : "";
?>
        <option value="<?= $row['id'] ?>" <?= $s ?>><?= $row['type'] ?></option>
    <?php
    }
} else {
    $rows = $Th->all(['big_id' => $_POST['big_id']]);
    foreach ($rows as $row) {
    ?>
        <option value="<?= $row['id'] ?>"><?= $row['type'] ?></option>
<?php
    }
}
?>