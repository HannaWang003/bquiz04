<h2 class="ct">填寫資料</h2>
<table class="all">
    <tr>
        <td class="tt">登入帳號</td>
        <td class="pp"><?= $_SESSION['user'] ?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
</table>
<table class="all">
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    if (isset($_SESSION['cart'])) {
        $_SESSION['total']=0;
        foreach ($_SESSION['cart'] as $id => $qt) {
            $good = $Good->find($id);
            $qt = $_SESSION['cart'][$id];
            $_SESSION['total']+=($good['price'] * $qt);
    ?>
            <tr>
                <td class="pp"><?= $good['no'] ?></td>
                <td class="pp"><?= $good['name'] ?></td>
                <td class="pp"><?= $qt ?></td>
                <td class="pp"><?= $good['price'] ?></td>
                <td class="pp"><?= $good['price'] * $qt ?></td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<div class="ct">
    <input type="button" value="確定送出" id="submitBtn"><input type="button" value="返回修改訂單" onclick="history.go(-1)">
</div>
<script>
    $('#submitBtn').on('click',function(){
        let name=$('#name').val();
        let email=$('#email').val();
        let addr=$('#addr').val();
        let tel=$('#tel').val();
        $.post('./api/order.php',{name,email,addr,tel},function(res){
            alert("訂購成功\n感謝您的訂購");
            location.href='./index.php';
        })
    })
</script>