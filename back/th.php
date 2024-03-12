<h1 class="ct">商品分類</h1>
<div class="ct">新增大分類<input type="text" name="big" id="big"><button class='addBig'>新增</button></div>
<div class="ct">新增中分類
    <select name="bigs" id="bigs">

    </select>
    <input type="text" name="mid" id="mid"><button class='addSub'>新增</button>
</div>
<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <th class="tt"><?= $big['name'] ?></th>
            <th class="tt"></th>
        </tr>
        <?
        $subs = $Type->all(['big_id' => $big['id']]);
        foreach ($subs as $sub) {
        ?>
            <tr>
                <th class="pp"><?= $sub['name'] ?></th>
                <th class="pp"></th>
            </tr>
    <?php
        };
    }
    ?>
</table>

<script>
    getbig();

    function getbig() {
        $.post('./api/getbig.php', function(res) {
            $('#bigs').html(res);
        })
    }
    $('.addBig').on('click', function() {
        let name = $('#big').val();
        $.post('./api/add_type.php', {
            name
        }, function(res) {
            location.reload();
            getbig();
        })
    })
    $('.addSub').on('click', function() {
        let name = $(this).siblings('input').val();
        let big_id = $('#bigs').val();
        $.post('./api/add_type.php', {
            big_id,
            name
        }, function(res) {
            location.reload();
        })
    })
</script>