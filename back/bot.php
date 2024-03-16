<form action="./api/save_bot.php" method="post">
    <table class="all">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="bot" id="bot" value="<?= $Bot->find(1)['bot'] ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="1">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>