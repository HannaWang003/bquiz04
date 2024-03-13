<?php
$rows = $Mem->all();
?>
<table class="all">
    <tr>
        <th class='tt'>姓名</th>
        <th class='tt'>會員帳號</th>
        <th class='tt'>註冊日期</th>
        <th class='tt'>操作</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class='pp'><?= $row['name'] ?></td>
        <td class='pp'><?= $row['acc'] ?></td>
        <td class='pp'><?= $row['regdate'] ?></td>
        <td class='pp'>
            <button onclick="location.href='?do=edit_mem&id=<?= $row['id'] ?>'">修改</button>
            <button onclick="location.href='./api/del.php?do=mem&id=<?= $row['id'] ?>'">刪除</button>
        </td>
    </tr>
    <?php
                }
                ?>
</table>
<script>

</script>