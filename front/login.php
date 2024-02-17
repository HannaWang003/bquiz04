<h2>第一次購物</h2>
<div><img src="./icon/0413.jpg" onclick="reg()"></div>
<h2>會員登入</h2>
<form id="chkacc">
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="ct tt">驗證碼</td>
        <td class="pp">
            <span id="chk"></span>
            <input type="text" name="chkans" id="chkans">
        </td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="table" value="mem">
    <input type="submit" value="確認">
</div>
</form>
<script>
    randnum();
    function randnum(){
        let num1 = Math.floor(Math.random()*90)+10;
        let num2 = Math.floor(Math.random()*90)+10;
        let ans = Number(num1)+Number(num2);
        $.post("./api/chk_acc.php",{ans},function(){
$('#chk').html(`${num1}+${num2}=`);
$('#chkans').val("");
        })
        
    }
    $('#chkacc').submit(function(event){
event.preventDefault();
let formData = new FormData(this);
$.ajax({
    type:"POST",
    data:formData,
    url:"./api/chk_acc.php",
    contentType:false,
    processData:false,
    success:function(res){
switch(res){
    case "0":
        alert("帳號或密碼錯誤");
        randnum();
        break;
    case "1":
        alert("對不起，您輸入的驗證碼有誤，請您重新登入");
    randnum();
        break;
        case "2":
        $('body').load("?do=buycart");
        break;
}
    }
})
    })
function reg(){
    $.get("",function(res){
$('body').load("?do=reg");
    })
}
</script>