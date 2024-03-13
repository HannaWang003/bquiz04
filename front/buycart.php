<?php
if (isset($_GET['id'])) {
    if (isset($_SESSION['cart'][$_GET['id']]) && isset($_GET['qt'])) {
        $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
    } else {
        $_SESSION['cart'][$_GET['id']] = 1;
    }
}
?>
<h2><?= $_SESSION['user'] ?>的購物車</h2>
<table width="100%">
    <tr>
        <th class=" tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">數量</th>
        <th class="tt">庫存量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
        <th class="tt">刪除</th>
    </tr>
    <?php
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $qt) {
            $good = $Good->find($id);
            $qt = $_SESSION['cart'][$id];
    ?>
            <tr>
                <td class="pp"><?= $good['no'] ?></td>
                <td class="pp"><?= $good['name'] ?></td>
                <td class="pp"><?= $qt ?></td>
                <td class="pp"><?= $good['stock'] ?></td>
                <td class="pp"><?= $good['price'] ?></td>
                <td class="pp"><?= $good['price'] * $qt ?></td>
                <td class="pp"><button onclick="del(<?=$id?>)">刪除</button></td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<div class="ct">
    <button onclick="location.href='?do=main'"><img src="./img/0411.jpg"></button>
    <button onclick="location.href='?do=checkout'"><img src="./img/0412.jpg"></button>
</div>
<script>
    function del(id) {
        $.get('./api/del_cart.php', {
            id
        }, function() {
            location.reload();
        })
    }
</script>