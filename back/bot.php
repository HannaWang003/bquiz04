<?php
$bot = (($Bot->find(1)['bot'])) ?? "頁尾版權宣告";
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="./api/edit.php?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt">頁尾版權內容</td>
            <td class="pp"><input type="text" name="bot" value="<?= $bot ?>"></td>
        </tr>
    </table>

    <div class="ct">
        <input type="submit" value="編輯"><input type="reset" value="重置">
    </div>
</form>