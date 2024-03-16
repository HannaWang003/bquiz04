<h1 class="ct">訂單管理</h1>
<table width="100%">
    <tr>
        <th class="tt">訂單編號</th>
        <th class="tt">金額</th>
        <th class="tt">會員帳號</th>
        <th class="tt">姓名</th>
        <th class="tt">下單日期</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $rows = $Order->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp"><a onclick="location.href='?do=detail_order&id=<?= $row['id'] ?>'"><?= $row['no'] ?></a></td>
            <td class="pp"><?= $row['total'] ?></td>
            <td class="pp"><?= $row['acc'] ?></td>
            <td class="pp"><?= $row['name'] ?></td>
            <td class="pp"><?= $row['date'] ?></td>
            <td class="pp">
                <input type="button" onclick="del(<?= $row['id'] ?>)" value="刪除">
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div id="detail"></div>
<script>
    function del(id) {
        $.post('./api/del.php', {
            table: "Order",
            id
        }, function(res) {
            location.reload();
        })
    }

    function get(id) {
        $.post('./api/detail_order.php', {
            id
        }, function(res) {
            $('#detail').html(res)
        })
    }
</script>