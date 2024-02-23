<h2>第一次購買</h2>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">

<h2>會員登入</h2>
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
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
            // $a = rand(10, 99);
            // $b = rand(10, 99);
            // $_SESSION['ans'] = $a + $b;
            // echo $a . "+" . $b . "=";
            // $_SESSION['ans'] = code(5);
            // $img = captcha($_SESSION['ans']);
            ?>
            <input type="text" name="ans" id="ans">
            <img src=" " id='captcha'>
            <button onclick="captcha()">重新產生</button>
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('mem')">確認</button>
</div>
<script>
    captcha();

    function captcha() {
        $.get("./api/captcha.php", (img) => {
            console.log(img)
            $('#captcha').attr('src', img);
        })
    }
</script>