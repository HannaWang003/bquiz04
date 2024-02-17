<h1 class="ct">會員註冊</h1>
<form id="addMem">
<table class="all">
    <tr>
        <td class="ct tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="nam"></td>
    </tr>
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"><input id="chkBtn" data-type="chk" type="button" value="檢查帳號"></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="ct tt">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="ct tt">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="ct tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct"><input type="submit" value="註冊"><input type="reset" value="重置"></div>
</form>
<script>
$("#chkBtn").on("click",function(){
    let acc = $("#acc").val();
    let type = $(this).data('type');
    $.post("./api/opr_mem.php",{acc,type},function(res){
if(res=="0"){
    alert("此帳號可註冊");
}
else if(res=="2"){
    alert("勿使用admin註冊")
}
else{
    alert("此帳號已存在，請重新設定")
    $("#acc").val("");
}
    })
})
$("#addMem").submit(function(event){
event.preventDefault();
let formData = new FormData(this)
$.ajax({
    type:"POST",
    data:formData,
    contentType:false,
    processData:false,
    url:"./api/opr_mem.php",
    success:function(res){
        if(res!=0){
            alert("請重新確認帳號，不得使用admin及已存在的帳號")
        }else{
            alert("已完成註冊，請登入")
                $('body').load("?do=login")
        }
                
        }
})
})
</script>