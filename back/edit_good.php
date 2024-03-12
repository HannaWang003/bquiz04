<?php
$row = $Good->find($_GET['id']);
?>
<h1 class="ct">修改商品</h1>
<form action="./api/edit_good.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$row['id']?>" >
<table class="all">
    <tr>
        <td class="tt">所屬大分類</td>
        <td class="pp"><select name="big" id="big" value="<?=$row['big']?>">
            <option value="">請選擇一項</option>
        </select></td>
    </tr>
    <tr>
        <td class="tt">所屬中分類</td>
        <td class="pp"><select name="mid" id="mid" vlaue="<?=$row['mid']?>">
        <option value="">請選擇一項</option>
        </select></td>
    </tr>
    <tr>
        <td class="tt">商品編號</td>
        <td class="pp"><?=$row['no']?></td>
    </tr>
    <tr>
        <td class="tt">商品名稱</td>
        <td class="pp"><input type="text" name="name" id="" value="<?=$row['name']?>"></td>
    </tr>
    <tr>
        <td class="tt">商品價格</td>
        <td class="pp"><input type="text" name="price" value=<?=$row['price']?>></td>
    </tr>
    <tr>
        <td class="tt">規格</td>
        <td class="pp"><input type="text" name="spec" value=<?=$row['spec']?>></td>
    </tr>
    <tr>
        <td class="tt">庫存量</td>
        <td class="pp"><input type="text" name="stock" value=<?=$row['stock']?>></td>
    </tr>
    <tr>
        <td class="tt">商品圖片</td>
        <td class="pp"><input type="file" name="img" id=""></td>
    </tr>
    <tr>
        <td class="tt">商品介紹</td>
        <td class="pp"><textarea name="intro" style="width:80%;height:150px;"><?=$row['intro']?></textarea></td>
    </tr>
</table>
<div class="ct">
    <input type="submit" value="修改"><input type="reset" value="重置"><input type="button" value="返回" onclick="history.go(-1)">
</div>
</form>
<script>
     getbig();
     $('#big').on('change',function(){
        let id = $(this).val();
        getmid(id);
     })

function getbig() {
    $.post('./api/getbig.php?big=<?=$row['big']?>', function(res) {
        $('#big').append(res);
        getmid($('#big').val());
    })}
function getmid(id) {
    $.post('./api/getmid.php?mid=<?=$row['mid']?>',{id}, function(res) {
        $('#mid').html(res);
    })}

</script>
