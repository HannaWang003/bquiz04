<?php
$mem = $Mem->find($_GET['id']);
?>
<h2 class="ct">編輯會員資料</h2>
<form action="./api/edit.php?do=mem" method="post">
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><?=$mem['acc']?></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><?= str_repeat("*", mb_strlen($mem['pw'])) ?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="" value="<?=$mem['name']?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email']?>"></td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr']?>"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel']?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$mem['id']?>">
        <input type="submit" value="編輯"><input type="reset" value="重置"><button onclick="history.go(-1)">取消</button>
    </div>
</form>
<script>
    function chkacc() {
        let acc = $('#acc').val();
        console.log(acc);
        $.post('./api/chk_acc.php', {
            acc
        }, function(res) {
            if (res != 0) {
                alert("此帳號無法使用，請重新輸入");
                $('#acc').val("");
            } else {
                alert("此帳號可以使用");
            }
        })
    }
</script>