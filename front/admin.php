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
            <input type="hidden" name="ans2" id="ans2" value="<?=$a+$b?>">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login()">確定</button>
</div>
<script>
function login() {
    let ans = $('#ans').val();
    let ans2=$('#ans2').val();
    if(ans!=ans2){
        alert("對不起，您輸入的驗證碼有誤請您重新登入");
        location.reload();
    }
    else{
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    $.post('./api/chk_admin.php', {
        acc,
        pw,
    }, function(res) {
        switch (res) {
            case "0":
                alert("帳號或密碼錯誤");
                location.reload();
                break;
            case "1":
                location.href = './back.php';
                break;
        }
    })
    }   
}
</script>