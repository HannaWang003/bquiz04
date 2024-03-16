<?php
$row = $Order->find($_GET['id']);
?>
<div>
    <h1 class="ct">訂單編號<?= $row['no'] ?>的詳細資料</h1>
    <table class="all">
        <tr>
            <th class="tt">會員帳號</th>
            <td class="pp"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt">姓名</th>
            <td class="pp">
                <?= $row['acc'] ?>
            </td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp">
                <?= $row['email'] ?>
            </td>
        </tr>
        <tr>
            <th class="tt">聯絡地址</th>
            <td class="pp">
                <?= $row['addr'] ?>
            </td>
        </tr>
        <tr>
            <th class="tt">聯絡電話</th>
            <td class="pp">
                <?= $row['tel'] ?>
            </td>
        </tr>
    </table>
    <style>
    .detail td {
        text-align: center;
    }
    </style>
    <table class="all detail">
        <tr>
            <th class="tt">商品名稱</th>
            <th class="tt">編號</th>
            <th class="tt">數量</th>
            <th class="tt">單價</th>
            <th class="tt">小計</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="tt" colspan="5">總價: <?= $row['total'] ?></td>
        </tr>
    </table>
    <div class="ct">
        <button onclick="history.go(-1)">返回</button>
    </div>
</div>