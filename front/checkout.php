<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h1 class="ct">填寫資料</h1>
<form action="./api/cartdone.php" method="post">
    <table style="width:100%;">
        <tr>
            <td class="tt">登入帳號</td>
            <td class="pp"><?= $_SESSION['mem'] ?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?= $mem['name'] ?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?= $mem['email'] ?>"></td>
        </tr>
        <tr>
            <td class="tt">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" value="<?= $mem['addr'] ?>"></td>
        </tr>
        <tr>
            <td class="tt">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" value="<?= $mem['tel'] ?>"></td>
        </tr>
    </table>
    <table class="detail" style="width:100%">
        <tr>
            <th class="tt">商品名稱</th>
            <th class="tt">編號</th>
            <th class="tt">數量</th>
            <th class="tt">單價</th>
            <th class="tt">小計</th>
        </tr>
        <?php
        if (!empty($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $qt) {
                $buy = $Good->find($id);
        ?>
        <tr>
            <td class="pp"><?= $buy['name'] ?></td>
            <td class="pp"><?= $buy['no'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $buy['price'] ?></td>
            <td class="pp"><?= $buy['price'] * $qt ?></td>
        </tr>
        <?php
                $total += ($buy['price'] * $qt);
            }
        }
        ?>
        <tr>
            <td colspan="5" class="tt ct">總價: <?= $total ?></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="確定送出">
        <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
    </div>
</form>
<script>
$('input[type=submit]').on('click', () => {
    alert("訂購成功，感謝訂購");
})
</script>