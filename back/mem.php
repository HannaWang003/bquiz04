<h1 class="ct">會員管理</h1>
<table class="all">
    <tr>
        <th class="tt">姓名</th>
        <th class="tt">會員帳號</th>
        <th class="tt">註冊日期</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $rows = $Mem->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp"><?= $row['name'] ?></td>
            <td class="pp"><?= $row['acc'] ?></td>
            <td class="pp"><?= $row['regdate'] ?></td>
            <td class="pp">
                <input type="button" onclick="location.href='?do=edit_mem&id=<?= $row['id'] ?>'" value="修改">
                <input type="button" onclick="del(<?= $row['id'] ?>)" value="刪除">
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(id) {
        $.post('./api/del.php', {
            table: "Mem",
            id
        }, function(res) {
            location.reload();
        })
    }
</script>