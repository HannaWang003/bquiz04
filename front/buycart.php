<?php
if (!isset($_SESSION['mem'])) {
    to("./index.php");
}
?>
<h1 class="ct"><?= $_SESSION['mem'] ?>的購物車</h1>
<table class="detail" style="width:100%">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">數量</th>
        <th class="tt">庫存量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
        <th class="tt">刪除</th>
    </tr>
    <?php
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $qt) {
            $buy = $Good->find($id);
    ?>
            <tr>
                <td class="pp"><?= $buy['no'] ?></td>
                <td class="pp"><?= $buy['name'] ?></td>
                <td class="pp"><?= $qt ?></td>
                <td class="pp"><?= $buy['stock'] ?></td>
                <td class="pp"><?= $buy['price'] ?></td>
                <td class="pp"><?= $buy['price'] * $qt ?></td>
                <td class="pp"><button onclick="location.href='./api/del_buycart.php?id=<?= $buy['id'] ?>'">刪除</button></td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<div class="ct">
    <a href="?do=main"><img src="./img/0411.jpg" alt=""></a>
    <a href="?do=checkout"><img src="./img/0412.jpg" alt=""></a>
</div>