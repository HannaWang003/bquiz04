<style>
th {
    width: 40%;
}
</style>
<?php
$row = $Good->find($_GET['id']);
?>
<h2 class="ct">修改商品</h2>
<form action="./api/edit_good.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class="tt">所屬大分類</th>
            <td class="pp">
                <select name="big" id="big">
                </select>
            </td>
        </tr>
        <tr>
            <th class="tt">所屬中分類</th>
            <td class="pp">
                <select name="mid" id="mid">
                </select>
            </td>
        </tr>
        <tr>
            <th class="tt">商品編號</th>
            <td class="pp">
                <?= $row['no'] ?>
            </td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?= $row['name'] ?>">
            </td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" id="price" value="<?= $row['price'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" id="spec" value="<?= $row['spec'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">庫存量</th>
            <td class="pp"><input type="text" name="stock" id="stock" value="<?= $row['stock'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">商品圖片</th>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <th class="tt">商品介紹</th>
            <td class="pp"><textarea name="intro" id="intro"
                    style="width:100%;height:200px"><?= $row['intro'] ?></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="submit" value="修改">
        <input type="submit" value="重置">
    </div>
</form>
<script>
getbig(<?= $_GET['id'] ?>);

function getbig(goodid) {
    $.post('./api/getgood.php', {
        goodid
    }, function(res) {
        $('#big').html(res)
        let id = $('#big').val();
        getmid(id, goodid);
    })
}

function getmid(id, goodid) {
    $.post('./api/getgood.php', {
        id,
        goodid
    }, function(res) {
        $('#mid').html(res);
        // console.log(res)
    })
}
$('#big').on('change', function() {
    let id = $('#big').val();
    getmid(id);
})
</script>