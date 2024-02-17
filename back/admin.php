<?php
$accs = $Admin->all();
?>
<h1>admin</h1>
<div class="ct"><input type="button" value="新增管理員" id="addAdmin"></div>
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="ct tt">密碼</td>
        <td class="ct tt">管理</td>
    </tr>
    <tbody id="admin">
        <?php
foreach($accs as $acc){
    $opr = "<input type='button' value='修改' class='editAdmin' data-id='{$acc['id']}'><input type='button' value='刪除' class='delAdmin' data-table='Admin'  data-id='{$acc['id']}'>";
    $pw = str_repeat("*",strlen($acc['pw']));
    if($acc['acc']=="admin"){
        $opr = "此帳號為最高權限";
    }
    ?>
<tr>
    <td class="ct pp"><?=$acc['acc']?></td>
    <td class="ct pp"><?=$pw?></td>
    <td class="ct pp"><?=$opr?></td>
</tr>
    <?php
}
?>

    </tbody>
</table>
<div class="ct"><input type="button" value="返回" onclick="location.href='index.php'"></div>
<script>
    $("#addAdmin").on("click",function(){
        $.ajax({
            type:"GET",
            data:{
                opr:"add"
            },
            url:"./back/opr_admin.php",
            success:function(res){
                $('#right').html(res)
            }
        })
    })
    $(".editAdmin").on("click",function(){
        $.ajax({
            type:"GET",
            data:{
                id:$(this).data('id'),
                opr:"edit"
            },
            url:"./back/opr_admin.php",
            success:function(res){
                $('#right').html(res)
            }
        })
    })
    $(".delAdmin").on('click',function(){
        $.ajax({
            type:"post",
            data:{
                id:$(this).data('id'),
                table:$(this).data('table')
            },
            url:"./api/del.php",
            success:function(res){
$('body').load("?do=admin");
            }

        })
    })
</script>
