<?php
if(!empty($_POST)){
    $Bot->save($_POST);
}
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
<table class="all">
    <tr>
        <td class="ct tt">頁尾宣告內容</td>
        <td class="pp"><input type="text" name="bot" value="<?=$Bot->find(1)['bottom']?>" style="width:80%"></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name='id' value="<?=$Bot->find(1)['id']?>">
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
</div>
</form>