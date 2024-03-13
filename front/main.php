<?php
if (isset($_GET['mid'])) {
    $goods = $Good->all(['sh' => 1, 'mid' => $_GET['mid']]);
    $m = $Type->find($_GET['mid']);
    $m_name = $m['name'];
    $b_name = $Type->find($m['big_id'])['name'];
} else {
    $goods = $Good->all(['sh' => 1]);
    $b_name = "全部商品";
    $m_name = "";
}

?>
<h2><span id="mid"><?= $b_name ?></span> > <span id="good"><?= $m_name ?></span></h2>
<table class="all">
    <?php
    foreach ($goods as $good) {
    ?>
    <tr>
        <td rowspan="4" class="pp ct"><img src="./img/<?= $good['img'] ?>" style="width:150px;height:100px"></td>
        <td class="tt">
            <p class="ct" style="font-weight:bolder"><?= $good['name'] ?></p>
        </td>
    </tr>
    <tr>
        <!-- <td></td> -->
        <td class="pp">
            <a href="?do=buycart&id=<?= $good['id'] ?>"><img src="./img/0402.jpg" style="float:right;"></a>
        </td>
    </tr>
    <tr>
        <!-- <td></td> -->
        <td class="pp"></td>
    </tr>
    <tr>
        <!-- <td></td> -->
        <td class="pp"></td>
    </tr>
    <?php
    }
    ?>
</table>