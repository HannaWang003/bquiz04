<!-- <button onclick="location.href='?do=buycart'">我要購買</button> -->
<?php
$type = $_GET['type'] ?? 0;
$nav = '';
$goods = null;
if ($type == 0) {
    $nav = '全部商品';
    $goods = $Goods->all(['sh' => 1]);
} else {
    $t = $Type->find($type);
    if ($t['big_id'] == 0) {
        $nav = $t['name'];
        $goods = $Goods->all(['sh' => 1, 'big' => $t['id']]);
    } else {
        $b = $Type->find($t['big_id']);
        $nav = $b['name'] . ">" . $t['name'];
        $goods = $Goods->all(['sh' => 1, 'mid' => $t['id']]);
    }
}

?>
<h2><?= $nav; ?></h2>
<style>
    .item {
        width: 80%;
        height: 160px;
        margin: 5px auto;
        display: flex;
    }

    .item .img {
        width: 33%;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid #fff;
    }

    .item .info {
        width: 65%;
        display: flex;
        flex-direction: column;

        div {
            border: 2px solid #fff;
            border-left: 0;
            border-top: 0;
            flex-grow: 1;
        }

        div:nth-child(1) {
            border-top: 2px solid #fff;
        }
    }
</style>
<?php
foreach ($goods as $good) {
?>
    <div class="item">
        <div class="img pp">
            <a href="?do=detail&id=<?= $good['id']; ?>">
                <img src="./img/<?= $good['img']; ?>" style="width:80%;height:110px">
            </a>
        </div>
        <div class="info pp">
            <div class='ct tt'><?= $good['name'] ?></div>
            <div>價錢:<?= $good['price'] ?>
                <img src="./icon/0402.jpg" style="float:right" onclick="location.href='?do=buycart&id=<?= $good['id']; ?>&qt=1'">
            </div>
            <div>規格:<?= $good['spec'] ?></div>
            <div>簡介:<?= mb_substr($good['intro'], 0, 25) ?>...</div>
        </div>
    </div>

<?php
}

?>