<?php
$order=$Order->find(['no'=>$_GET['no']]);
?>
<h2 class="ct">訂單編號<span style="color:red"><?=$_GET['no']?></span>的詳細資料</h2>
<table class="all">
    <tr>
        <td class="tt">會員帳號</td>
        <td class="pp"><?= $order['acc'] ?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><?= $order['name'] ?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><?= $order['email'] ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><?= $order['addr'] ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡電話</td>
        <td class="pp"><?= $order['tel'] ?></td>
    </tr>
</table>
<table class="all">
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    $carts = unserialize($order['cart']);
        foreach ($carts as $id => $qt) {
            $good = $Good->find($id);
            $total=($good['price'] * $qt);
    ?>
            <tr>
                <td class="pp"><?= $good['name'] ?></td>
                <td class="pp"><?= $good['no'] ?></td>
                <td class="pp"><?= $qt ?></td>
                <td class="pp"><?= $good['price'] ?></td>
                <td class="pp"><?= $total ?></td>
            </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="5" class="tt ct">總價:<?=$order['total']?></td>
    </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button></div>