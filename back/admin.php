<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<!-- table.all>tr>td.ct.tt*3+tr>td.ct.pp*3 -->
<?php
$rows = $Admin->all();
?>
<table class="all">
    <tr>
        <th class="ct tt">帳號</th>
        <th class="ct tt">密碼</th>
        <th class="ct tt">管理</th>
    </tr>
    <?php
    foreach ($rows as $row) {

    ?>
        <tr>
            <td class="ct pp"><?= $row['acc'] ?></td>
            <td class="ct pp"><?= str_repeat("*", strlen($row['pw'])) ?></td>
            <td class="ct pp">
                <?php
                if ($row['acc'] == "admin") {
                    echo "此帳號為最高權限";
                } else {
                ?>
                    <button onclick="location.href='?do=edit_admin&id=<?= $row['id'] ?>'">修改</button>
                    <button onclick="del('admin',<?= $row['id'] ?>)">刪除</button>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>