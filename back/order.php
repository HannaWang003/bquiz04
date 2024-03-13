<div class="ct">訂單管理</div>
<table width="95%">
    <tr>
        <th class="tt">訂單編號</th>
        <th class="tt">金額</th>
        <th class="tt">會員帳號</th>
        <th class="tt">姓名</th>
        <th class="tt">下單時間</th>
        <th class="tt">操作</th>
    </tr>
    <?php
$orders = $Order->all();
foreach($orders as $order){
    ?>
  <tr>
        <td class="pp"><a href="?do=more&no=<?=$order['no']?>" ><?=$order['no']?></a></td>
        <td class="pp"><?=$order['total']?></td>
        <td class="pp"><?=$order['acc']?></td>
        <td class="pp"><?=$order['name']?></td>
        <td class="pp"><?=$order['orderdate']?></td>
        <td class="pp"><button onclick="del(this,<?=$order['id']?>)">刪除</button></td>
    </tr>
    <?php
}

?>
</table>
<script>
    function del(elm,id){
    let tr=$(elm).closest('tr');
$.post('./api/del_order.php',{id},function(res){
    tr.remove();
})
    }
</script>