<h1 class="ct">商品分類</h1>
<div class="ct">新增大分類<input type="text" name="big" id="big"><button class='addBig'>新增</button></div>
<div class="ct">新增中分類
    <select name="bigs" id="bigs">

    </select>
    <input type="text" name="mid" id="mid"><button class='addSub'>新增</button>
</div>
<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <th class="tt" style="width:70%;text-align:start"><?= $big['name'] ?></th>
            <th class="tt"><button onclick="modify(this,<?=$big['id']?>)">修改</button><button onclick="del(this,'type'<?=$big['id']?>)">刪除</button></th>
        </tr>
        <?
        $subs = $Type->all(['big_id' => $big['id']]);
        foreach ($subs as $sub) {
        ?>
            <tr>
                <td class="pp" style="text-align:center"><?= $sub['name'] ?></td>
                <td class="pp" style="text-align:center"><button onclick="modify(this,<?=$sub['id']?>)">修改</button><button onclick="del(this,'type',<?=$sub['id']?>)">刪除</button></td>
            </tr>
    <?php
        };
    }
    ?>
</table>
<div class="ct">商品管理</div>
<div class="ct"><button onclick="location.href='?do=add_good'">新增商品</button></div>
<?php
$goods = $Good->all();
?>
<table class="all">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">庫存量</th>
        <th class="tt">狀態</th>
        <th class="tt">操作</th>
    </tr>
    <?php
foreach($goods as $good){
    ?>
    <tr>
        <td class="pp"><?=$good['no']?></td>
        <td class="pp"><?=$good['name']?></td>
        <td class="pp"><?=$good['stock']?></td>
        <td class="pp"><?=($good['sh']==1)?"販售中":"已下架"?></td>
        <td class="pp">
            <button onclick="location.href='?do=edit_good&id=<?=$good['id']?>'">修改</button>
            <button onclick="del(this,'good',<?=$good['id']?>)">刪除</button>
            <button onclick="chg(<?=$good['id']?>,1)">上架</button>
            <button onclick="chg(<?=$good['id']?>,0)">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
    getbig();

    function getbig() {
        $.post('./api/getbig.php', function(res) {
            $('#bigs').html(res);
        })
    }
    $('.addBig').on('click', function() {
        let name = $('#big').val();
        $.post('./api/add_type.php', {
            name
        }, function(res) {
            location.reload();
            getbig();
        })
    })
    $('.addSub').on('click', function() {
        let name = $(this).siblings('input').val();
        let big_id = $('#bigs').val();
        $.post('./api/add_type.php', {
            big_id,
            name
        }, function(res) {
            location.reload();
        })
    })
    function modify(dom,id){
let name = prompt("請輸入您要修改的分類名稱:",`${$(dom).parent().prev().text()}`);
if(name!=null){
    $.post('./api/edit.php?do=type',{name,id},function(){
        $(dom).parent().prev().text(name)
    })
}
    }
    function del(dom,table,id){
        let elm = $(dom).closest('tr');
        // console.log(elm);
        $.get('./api/del.php',{table,id},function(res){
            elm.remove();
        })
    }
    function chg(id,sh){
        $.post('./api/chg.php',{id,sh},function(res){
location.reload();
        })
    }
</script>