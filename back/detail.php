<?php
$row = $Orders->find($_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color:red"><?= $row['no'] ?></span>的詳細資料</h2>
<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp">
            <?= $row['acc'] ?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" value="<?= $row['name'] ?>"
                style='border:0;background:transparent'></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" value="<?= $row['tel'] ?>" style='border:0;background:transparent'>
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡住址</td>
        <td class="pp"><input type="text" name="addr" value="<?= $row['addr'] ?>"
                style='border:0;background:transparent'></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" value="<?= $row['email'] ?>"
                style='border:0;background:transparent'></td>
    </tr>
</table>
<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $sum = 0;
    $carts = unserialize($row['cart']);
    foreach ($carts as $id => $qt) {
        $goods = $Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?= $goods['name'] ?></td>
        <td><?= $goods['no'] ?></td>
        <td><?= $qt ?></td>
        <td><?= $goods['price'] ?></td>
        <td><?= $goods['price'] * $qt ?></td>
    </tr>

    <?php
    }
    ?>
</table>
<div class="all ct tt">總價:<?= $row['total'] ?></div>
<div class="ct"><input type="button" value="返回" onclick="location.href='?do=order'"></div>