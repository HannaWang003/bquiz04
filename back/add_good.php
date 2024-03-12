<h1 class="ct">新增商品</h1>
<form action="./api/add_good.php" method="post" enctype="multipart/form-data">
<table class="all">
    <tr>
        <td class="tt">所屬大分類</td>
        <td class="pp"><select name="big" id="big">
            <option value="">請選擇一項</option>
        </select></td>
    </tr>
    <tr>
        <td class="tt">所屬中分類</td>
        <td class="pp"><select name="mid" id="mid">
        <option value="">請選擇一項</option>
        </select></td>
    </tr>
    <tr>
        <td class="tt">商品編號</td>
        <td class="pp">完成分類後自動分配</td>
    </tr>
    <tr>
        <td class="tt">商品名稱</td>
        <td class="pp"><input type="text" name="name" id=""></td>
    </tr>
    <tr>
        <td class="tt">商品價格</td>
        <td class="pp"><input type="text" name="price" id=""></td>
    </tr>
    <tr>
        <td class="tt">規格</td>
        <td class="pp"><input type="text" name="spec" id=""></td>
    </tr>
    <tr>
        <td class="tt">庫存量</td>
        <td class="pp"><input type="text" name="stock" id=""></td>
    </tr>
    <tr>
        <td class="tt">商品圖片</td>
        <td class="pp"><input type="file" name="img" id=""></td>
    </tr>
    <tr>
        <td class="tt">商品介紹</td>
        <td class="pp"><textarea name="intro" style="width:80%;height:150px;"></textarea></td>
    </tr>
</table>
<div class="ct">
    <input type="submit" value="新增"><input type="reset" value="重置"><input type="button" value="返回" onclick="history.go(-1)">
</div>
</form>
<script>
     getbig();
     $('#big').on('change',function(){
        let id = $(this).val();
        getmid(id);
     })

function getbig() {
    $.post('./api/getbig.php', function(res) {
        $('#big').append(res);
    })}
function getmid(id) {
    $.post('./api/getmid.php',{id}, function(res) {
        $('#mid').html(res);
    })}

</script>
