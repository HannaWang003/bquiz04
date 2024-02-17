<?php
include_once "../api/db.php";
$title = "新增管理帳號";
$subm = "新增";
if($_GET['opr']=="edit"){
    $title = "修改管理員權限";
    $admin = $Admin->find($_GET['id']);
    $pr = unserialize($admin['pr']);
    $subm = "修改";
}
?>
<h1 class="ct"><?=$title?></h1>
<form id="editAdminForm">
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp"><input type="text" name='acc' value="<?=($admin['acc'])??''?>"></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp"><input type="password" name='pw' value="<?=($admin['pw'])??''?>"></td>
    </tr>
    <tr>
        <td class="ct tt">權限</td>
        <td class="pp">
            <div class=""><input type="checkbox" name="pr[]" id="" value="1" <?=(!empty($pr) && in_array(1,$pr))?"checked":""?> >商品分類與管理</div>
            <div class=""><input type="checkbox" name="pr[]" id="" value="2" <?=(!empty($pr) && in_array(2,$pr))?"checked":""?> >訂單管理</div>
            <div class=""><input type="checkbox" name="pr[]" id="" value="3" <?=(!empty($pr) && in_array(3,$pr))?"checked":""?> >會員管理</div>
            <div class=""><input type="checkbox" name="pr[]" id="" value="4" <?=(!empty($pr) && in_array(4,$pr))?"checked":""?> >頁尾版權區管理</div>
            <div class=""><input type="checkbox" name="pr[]" id="" value="5" <?=(!empty($pr) && in_array(5,$pr))?"checked":""?> >最新消息管理</div>
        </td>
</div>    </tr>
</table>
<div class="ct">
    <?php
if($_GET['opr']=="edit"){
?>
<input type="hidden" name="id" value="<?=$admin['id']?>">
<?php
}
?>
    <input type="submit" value=<?=$subm?> >
    <input type="reset" value="重置">
</div>
</form>
<script>
$('#editAdminForm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        type:"post",
        data:formData,
        contentType:false,
        processData: false,
        url:"./api/opr_admin.php",
        success:function(res){
            $('body').load("?do=admin")
        }
    })
})
</script>