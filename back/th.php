<h2 class="ct">商品類</h2>
<div class="ct">新增大分類<input type="text" name="big" id="big" /><button class="addBig">新增</button></div>
<div class="ct">
    新增中分類
    <select name="big_id" id="big_id">
        <?php
        $rows = $Th->all(['big_id' => 0]);
        if (!empty($rows)) {
            foreach ($rows as $row) {
        ?>
                <option value="<?= $row['id'] ?>"><?= $row['type'] ?></option>
        <?php
            }
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid" />
    <button class="addMid">新增</button>
</div>
<table class="all">
    <?php
    $bigs = $Th->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt"><?= $big['type'] ?></td>
            <td class="tt"><button class="modify" data-id="<?= $big['id'] ?>">修改</button><button class="del" data-id="<?= $big['id'] ?>" data-table="Th">刪除</button></td>
        </tr>
        <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="pp"><?= $mid['type'] ?></td>
                <td class="pp"><button class="modify" data-id="<?= $mid['id'] ?>">修改</button><button class="del" data-id="<?= $mid['id'] ?>" data-table="Th">刪除</button></td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<div class="ct">商品管理</div>
<div class="ct"><button onclick="location.href='?do=add_good'">新增商品</button></div>
<table class="all">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">庫存量</th>
        <th class="tt">狀態</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $goods = $Good->all();
    foreach ($goods as $good) {
    ?>
        <tr>
            <td class="pp"><?= $good['no'] ?></td>
            <td class="pp"><?= $good['name'] ?></td>
            <td class="pp"><?= $good['stock'] ?></td>
            <td class="pp"><?= ($good['sh'] == 1) ? "販售中" : "已下架" ?></td>
            <td class="pp">
                <button onclick="location.href='?do=edit_good&id=<?= $good['id'] ?>'">修改</button>
                <button class="del" data-id="<?= $good['id'] ?>" data-table="Good">刪除</button><br>
                <button data-staus="1" data-id="<?= $good['id'] ?>" class="stausBtn">上架</button>
                <button data-staus="0" data-id="<?= $good['id'] ?>" class="stausBtn">下架</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<script>
    $('.addBig').on('click', function() {
        let big = $('#big').val();
        $.post('./api/add_th.php', {
            big
        }, function(res) {
            location.reload();
        })
    })
    $('.addMid').on('click', function() {
        let mid = $('#mid').val();
        let big_id = $('#big_id').val()
        $.post('./api/add_th.php', {
            big_id,
            mid
        }, function(res) {
            location.reload();
        })
    })
    $('.del').on('click', function() {
        let id = $(this).data('id');
        let table = $(this).data('table');
        $.post('./api/del.php', {
            id,
            table
        }, function(res) {
            location.reload();
        })
    })
</script>