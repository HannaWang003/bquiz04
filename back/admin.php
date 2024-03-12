<?php
$rows = $Admin->all();
?>
<button onclick="location.href='?do=add_admin'">新增管理員</button>
<table class="all">
    <tr>
        <th class='tt'>帳號</th>
        <th class='tt'>密碼</th>
        <th class='tt'>管理</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class='pp'><?= $row['acc'] ?></td>
        <td class='pp'><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        <td class='pp'>
            <?php
                if ($row['acc'] == 'admin') {
                    echo "此帳號為最高權限";
                } else {
                ?>
            <button onclick="location.href='?do=edit_admin&id=<?= $row['id'] ?>'">修改</button>
            <button onclick="del(<?= $row['id'] ?>)">刪除</button>
            <?php
                }
                ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回首頁</button></div>
<script>

</script>