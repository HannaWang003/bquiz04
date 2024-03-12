<h1 class="ct">新增管理帳號</h1>
<form action="./api/add_admin.php?do=admin" method="post">
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw"></td>
        </tr>
        <tr>
            <td class="tt">權限</td>
            <td class="pp">
                <input type="checkbox" name="pr[]" value="1">商品分類與管理<br>
                <input type="checkbox" name="pr[]" value="2">訂單管理<br>
                <input type="checkbox" name="pr[]" value="3">會員管理<br>
                <input type="checkbox" name="pr[]" value="4">頁尾版權區管理<br>
                <input type="checkbox" name="pr[]" value="5">最新消息管理<br>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="修改">
    </div>
</form>