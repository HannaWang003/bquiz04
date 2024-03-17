<?php
if (isset($_GET['big'])) {
    $bigitems = $Good->all(['sh' => 1, 'big' => $_GET['big']]);
    $big = $Th->find($_GET['big']);
    $goods = $Good->all(['sh' => 1, 'big' => $_GET['big']]);
?>
<h1><?= $big['type'] ?></h1>
<?php
} elseif (isset($_GET['mid'])) {
    $miditems = $Good->all(['sh' => 1, 'mid' => $_GET['mid']]);
    $mid = $Th->find($_GET['mid']);
    $bigtitle = $Th->find($mid['big_id'])['type'];
    $goods = $Good->all(['sh' => 1, 'mid' => $_GET['mid']]);
?>
<h1><?= $bigtitle ?> > <?= $mid['type'] ?></h1>
<?php
} else {
    $goods = $Good->all(['sh' => 1]);
?>
<h1 id="alltitle">全部商品</h1>
<?php
}
?>
<?php
foreach ($goods as $good) {
?>
<div class="all" style="display:flex">
    <div class='pp' style="width:35%;height:200px;display:flex;justify-content:center;align-items:center;"><a
            href="?do=detail&id=<?= $good['id'] ?>"><img src="./img/<?= $good['img'] ?>"
                style="width:150px;height:80%;border:2px solid #fff;"></a>
    </div>
    <div style="width:65%;height:200px;display: flex;flex-direction: column;">
        <div class="tt" style="flex:1;border:1px solid #eee">
            <h3 class="ct"><?= $good['name'] ?></h3>
        </div>
        <div class="pp" style="flex:1;border:1px solid #eee;display:flex;justify-content:space-between;">
            <?= $good['price'] ?><a onclick="buycart(<?= $good['id'] ?>)"><img src="./img/0402.jpg"></a></div>
        <div class="pp" style="flex:1;border:1px solid #eee"><?= $good['spec'] ?></div>
        <div class="pp" style="flex:1;border:1px solid #eee"><?= $good['intro'] ?></div>
    </div>
</div>
<?php
}
?>
<script>
function buycart(id) {
    $.post('./api/buycart.php', {
        id
    }, function(res) {
        // console.log(res)
        location.href = "./index.php?do=buycart";
    })
}
</script>