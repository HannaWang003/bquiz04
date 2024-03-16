<div class="ct"><button id="add">新增管理者</button></div>
<table class="all">
    <tr>
        <th class="tt">帳號</th>
        <th class="tt">密碼</th>
        <th class="tt">管理</th>
    </tr>
    <?php
    $admins = $Admin->all();
    foreach ($admins as $admin) {
    ?>
    <tr>
        <td class="pp"><?= $admin['acc'] ?></td>
        <td class="pp"><?= str_repeat("*", mb_strlen($admin['pw'])) ?></td>
        <td class="pp">
            <?php
                if ($admin['acc'] == "admin") {
                    echo "此帳號為最高權限";
                } else {
                ?>
            <input type="button" onclick="location.href='?do=edit_admin&id=<?= $admin['id'] ?>'" value="修改">
            <input type="button" onclick="del(<?= $admin['id'] ?>)" value="刪除">
            <?php
                }

                ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='./index.php'">返回</button></div>
<div id="addform" style="display:none">
    <form action="./api/add_admin.php" method="post">
        <table class="all">
            <tr>
                <td class="tt">帳號</td>
                <td class="pp"><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp"><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td class="tt">帳號</td>
                <td class="pp" style="display:flex;flex-direction:column">
                    <div><input type="checkbox" name="pr[th]" value="商品分類與管理">商品分類與管理</div>
                    <div><input type="checkbox" name="pr[order]" value="訂單管理">訂單管理</div>
                    <div><input type="checkbox" name="pr[mem]" value="會員管理">會員管理</div>
                    <div><input type="checkbox" name="pr[bot]" value="頁尾版權管理">頁尾版權管理</div>
                    <div><input type="checkbox" name="pr[news]" value="最新消息管理">最新消息管理</div>
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增"><input type="reset" value="重置">
        </div>
    </form>
</div>
<script>
$('#add').on('click', function() {
    $('#addform').toggle();
})
</script>