<h1>會員管理</h1>
<table class="all" id='memlist'>
    <tr>
        <th class="ct tt">姓名</th>
        <th class="ct tt">會員帳號</th>
        <th class="ct tt">註冊日期</th>
        <th class="ct tt">操作</th>
    </tr>
<!-- ajax #memlist.append -->
</table>
<script>
    let memlist = $('#memlist');
    function del(dom,id){
        let tr = $(dom).closest("tr");
$.ajax({
    type:'post',
    data:{
        'table':'Mem',
        id
    },
    url:'./api/del.php',
    success:function(res){
tr.remove();
    }
})
    }
    function edit(id){
$.ajax({
    type:'get',
    data:{
        id
    },
    url:'./back/edit_mem.php',
    success:function(res){
        $('#right').html(res);
    }
})
    }
    $('document').ready(function(){
        $.ajax({
            type:'post',
            data:{
                'table':'Mem'
            },
            dataType:'json',
            url:'./api/get.php',
            success:function(res){
                let html='';
                $.each(res,(key,mem)=>{
html+=`
<tr>
        <td class="ct pp">${mem.name}</td>
        <td class="ct pp">${mem.acc}</td>
        <td class="ct pp">${mem.regdate}</td>
        <td class="ct pp">
            <button onclick='edit(${mem.id})'>修改</button>
            <button onclick='del(this,${mem.id})'>刪除</button>
        </td>
    </tr>
`
                })
                memlist.append(html);
            }
        })
    })
</script>