<?php
$id = $_GET['id'];
$g = $Good->find($id);
?>
<h1><?= $g['name'] ?></h1>
<div style="display:flex;width:100%">
    <div class='pp' style="width:60%;height:300px;display:flex;justify-content:center;align-items:center;"><img
            src="./img/<?= $g['img'] ?>" style="width:90%;height:80%;border:2px solid #fff;">
    </div>
    <div style="width:40%;height:300px;display: flex;flex-direction: column;">
        <div class="pp" style="flex:1;border:1px solid #eee">
            分類:<?= $Th->find($g['big'])['type'] ?> > <?= $Th->find($g['mid'])['type'] ?>
        </div>
        <div class="pp" style="flex:1;border:1px solid #eee;display:flex;justify-content:space-between;">
            編號:<?= $g['no'] ?></div>
        <div class="pp" style="flex:1;border:1px solid #eee">價格<?= $g['price'] ?></div>
        <div class="pp" style="flex:1;border:1px solid #eee"><?= $g['intro'] ?></div>
        <div class="pp" style="flex:1;border:1px solid #eee">庫存量:<?= $g['stock'] ?></div>
    </div>
</div>
<div style="width:100%" class="tt ct">
    購買數量: <input type="number" value="1" id="buyqt">
    <button data-id="<?= $g['id'] ?>"><img src="./img/0402.jpg" alt=""></button>
</div>
<script>
$('button').on('click', function() {
    let id = $(this).data('id');
    let qt = $('#buyqt').val();
    $.post('./api/buycart.php', {
        id,
        qt
    }, function(res) {
        // console.log(res)
        location.href = "./index.php?do=buycart";
    })

})
</script>