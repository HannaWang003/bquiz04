<h2><?= $_SESSION['user'] ?>的購物車</h2>
<table width="100%">
    <tr>
        <th class=" tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">數量</th>
        <th class="tt">庫存量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
        <th class="tt">刪除</th>
    </tr>
    <tr>
        <td class="pp">編號</td>
        <td class="pp">商品名稱</td>
        <td class="pp">數量</td>
        <td class="pp">庫存量</td>
        <td class="pp">單價</td>
        <td class="pp">小計</td>
        <td class="pp">刪除</td>
    </tr>
</table>
<div class="ct">
    <button onclick="location.href='?do=main'"><img src="./img/0411.jpg"></button>
    <button onclick="location.href='?do=checkout'"><img src="./img/0412.jpg"></button>
</div>