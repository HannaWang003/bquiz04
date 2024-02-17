// JavaScript Document
function lof(x)
{
	location.href=x
}
function logout(s){
	$.ajax({
		type:'POST',
		data:{
			"acc":s,
		},
		url:"./api/logout.php",
		success:function(res){
			alert("已登出")
			location.reload();
		}
	})
}