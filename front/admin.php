<h1 class="ct">管理登入</h1>
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
        <?php
        $a = rand(10, 99);
        $b = rand(10, 99);
        $_SESSION['ans'] = $a + $b;
        echo $_SESSION['ans'];
        ?>
        <td class="pp">
            <?= "$a + $b =" ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login()">確定</button>
</div>
<script>
function login() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let ans = $('#ans').val();
    $.post('./api/chk.php', {
        table: 'admin',
        acc,
        pw,
        ans
    }, function(res) {
        console.log(res);
        switch (res) {
            case "0":
                alert("帳號或密碼錯誤");
                location.reload();
                break;
            case "1":
                location.href = './back.php';
                break;
            case "2":
                alert("驗證碼輸入錯誤");
                location.reload();
                break;
        }
    })
}
</script>