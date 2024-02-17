<?php
include_once "../api/db.php";
$mem=$Mem->find($_GET['id']);
// dd($mem);
?>
<h1 class="ct">編輯會員資料</h1>
<form id="editMem">
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp"><?=$mem['acc']?></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp"><?=str_repeat('*',strlen($mem['pw']))?></td>
    </tr>
    <tr>
        <td class="ct tt">姓名</td>
        <td class="pp"><input type="text" name="name" value='<?=$mem['name']?>'></td>
    </tr>
    <tr>
        <td class="ct tt">電子信箱</td>
        <td class="pp"><input type="text" name="email"  value='<?=$mem['email']?>'></td>
    </tr>
    <tr>
        <td class="ct tt">住址</td>
        <td class="pp"><input type="text" name="addr" value='<?=$mem['addr']?>'></td>
    </tr>
    <tr>
        <td class="ct tt">電話</td>
        <td class="pp"><input type="text" name="tel"  value='<?=$mem['tel']?>'></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name='id' value='<?=$mem['id']?>'>
    <input type="submit" value="編緝">
    <input type="reset" value="重置">
    <input type="button" value="取消" onclick="goback()">
</div>
</form>
<script>
        function goback(){
        $('body').load('?do=mem');
    }
$("#editMem").submit(function(event){
event.preventDefault();
let formData = new FormData(this)
$.ajax({
    type:"POST",
    data:formData,
    contentType:false,
    processData:false,
    url:"./api/opr_mem.php",
    success:function(res){
       $('body').load('?do=mem');                
        }
})
})
</script>