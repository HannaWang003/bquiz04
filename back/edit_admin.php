<?php
$admin = $Admin->find($_GET['id']);
$admin['pr'] = unserialize($admin['pr']);
?>
<div>
    <h1 class="ct">修改管理員權限</h1>
    <form action="./api/edit_admin.php" method="post">
        <table class="all">
            <tr>
                <td class="tt">帳號</td>
                <td class="pp"><input type="text" name="acc" value="<?= $admin['acc'] ?>"></td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp"><input type="password" name="pw" value="<?= $admin['pw'] ?>"></td>
            </tr>
            <tr>
                <td class="tt">權限</td>
                <td class="pp" style="display:flex;flex-direction:column">
                    <div><input type="checkbox" name="pr[th]" value="商品分類與管理" <?= (in_array("商品分類與管理", $admin['pr'])) ? "checked" : "" ?>>商品分類與管理</div>
                    <div><input type="checkbox" name="pr[order]" value="訂單管理" <?= (in_array("訂單管理", $admin['pr'])) ? "checked" : "" ?>>訂單管理</div>
                    <div><input type="checkbox" name="pr[mem]" value="會員管理" <?= (in_array("會員管理", $admin['pr'])) ? "checked" : "" ?>>會員管理</div>
                    <div><input type="checkbox" name="pr[bot]" value="頁尾版權管理" <?= (in_array("頁尾版權管理", $admin['pr'])) ? "checked" : "" ?>>頁尾版權管理</div>
                    <div><input type="checkbox" name="pr[news]" value="最新消息管理" <?= (in_array("最新消息管理", $admin['pr'])) ? "checked" : "" ?>>最新消息管理</div>
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="hidden" name="id" value="<?= $admin['id'] ?>">
            <input type="submit" value="修改"><input type="reset" value="重置">
        </div>
    </form>
</div>