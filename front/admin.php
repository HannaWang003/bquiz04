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
        <td class="tt">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $ans = $a + $b;
            echo $ans;
            ?>
            <span><?= $a ?>+<?= $b ?> = </span><input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="確定" id="login">
</div>
<script>
$('#login').on('click', function() {
    let ans = $('#chk').val();
    if (ans != <?= $ans ?>) {
        alert("對不起，您輸入的驗證碼輸有誤，請重新輸入")
    } else {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post('./api/login.php', {
            acc,
            pw
        }, function(res) {
            console.log(res);
            switch (res) {
                case "0":
                    alert("帳號或密碼錯誤");
                    break;
                case "1":
                    location.href = "./back.php"
                    break;
            }
        })
    }
})
</script>