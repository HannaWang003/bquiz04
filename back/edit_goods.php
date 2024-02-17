<?php
include_once "../api/db.php";
$good=$Goods->find($_GET['id']);
// dd($good);
?>
<style>
   select{
        border-radius:0;
        padding:5px;
    }
</style>
<h1 class="ct">修改商品</h1>
<form id="editGoods">
<table class='all'>
    <tr>
        <td class="ct tt">所屬大分類</td>
        <td class="pp"><select name="big" id="big">
        </select></td>
    </tr>
    <tr>
        <td class="ct tt">所屬中分類</td>
        <td class="pp"><select name="mid" id="mid">
        </select></td>
    </tr>
    <tr>
        <td class="ct tt">商品編號</td>
        <td class="pp"><?=$good['no']?></td>
    </tr>
    <tr>
        <td class="ct tt">商品名稱</td>
        <td class="pp"><input type="text" name="name" value='<?=$good['name']?>'></td>
    </tr>
    <tr>
        <td class="ct tt">商品價格</td>
        <td class="pp"><input type="text" name="price" value='<?=$good['price']?>'></td>
    </tr>
    <tr>
        <td class="ct tt">規格</td>
        <td class="pp"><input type="text" name="spec" value='<?=$good['spec']?>'></td>
    </tr>
    <tr>
        <td class="ct tt">庫存量</td>
        <td class="pp"><input type="number" name="stock" value='<?=$good['stock']?>'></td>
    </tr>
    <tr>
        <td class="ct tt">商品圖片</td>
        <td class="pp"><input type="file" name="img" id=""></td>
    </tr>
    <tr>
        <td class="ct tt">商品介紹</td>
        <td class="pp"><textarea name="intro" id="" cols="30" rows="10"><?=$good['intro']?></textarea></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name='id' value='<?=$good['id']?>'>
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick='goback()'>
</div>
</form>
<script>
    let Big = $('#big');
    let Mid = $('#mid');
    let bigID =<?=$good['big'];?>;
    let midID = <?=$good['mid'];?>;
    let editGoods = $('#editGoods');
    function goback(){
        $('body').load('?do=th');
    }
    function getBig(){
        $.ajax({
            type:'post',
            url:'./api/get.php',
            data:{
                'table':'Type',
                'big_id':0,
            },
            dataType:'json',
            success:function(res){
// console.log(res);
let html='';
$.each(res,(key,big)=>{
let selected = (big.id==bigID)?"selected":"";
html+=`
<option value="${big.id}" ${selected}>${big.name}</option>
`
})
Big.append(html);
            }

        })
    }
function getMid(){
    let big_id = (Big.val())??bigID;
    // console.log(big_id)
    $.ajax({
        type:'post',
        url:'./api/get.php',
        data:{
            'table':'Type',
            big_id
        },
        dataType:'json',
        success:function(res){
            // console.log(res);
            let html='';
$.each(res,(key,mid)=>{
    let selected = (big.id==bigID)?"selected":"";
html+=`
<option value="${mid.id}" ${selected}>${mid.name}</option>
`
})
Mid.html(html);
        }
    })
}
    getBig();
    getMid();
    Big.on('change',getMid);

editGoods.submit(function(event){
    event.preventDefault();
    let addData = new FormData(this);
    $.ajax({
        type:'post',
        url:'./api/save_goods.php',
        data:addData,
        processData:false,
        contentType:false,
        success:function(res){
            console.log(res)
            $('body').load('?do=th');
        }

    })
})
</script>