<style>
    th {
        width: 40%;
    }
</style>
<h2 class="ct">會員註冊</h2>
<form action="./api/reg.php" method="post">
    <table class="all">
        <tr>
            <th class="tt">姓名</th>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <th class="tt">帳號</th>
            <td class="pp"><input type="text" name="acc" id="acc"><input type="button" value="檢測帳號" onclick="chk()">
            </td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <th class="tt">住址</th>
            <td class="pp"><input type="text" name="addr" id="addr"></td>
        </tr>
        <tr>
            <th class="tt">信箱</th>
            <td class="pp"><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="註冊">
        <input type="submit" value="重置">
    </div>
</form>
<script>
    function chk() {
        let acc = $('#acc').val()
        $.post('./api/chk.php', {
            acc
        }, function(res) {
            if (res != 0 || acc == "admin") {
                alert("此帳號無法註冊，請重新輸入")
            } else {
                alert("此帳號可以使用")
            }
        })
    }
</script>