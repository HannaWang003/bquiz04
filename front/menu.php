<?php
$alltotal = $Good->count(['sh' => 1]);
$bigs = $Th->all(['big_id' => 0]);
?>
<a href="?do=main&all">全部商品(<?= $alltotal ?>)</a>
<?php
foreach ($bigs as $big) {
    $bigtotal = $Good->count(['sh' => 1, 'big' => $big['id']]);
?>
    <div class="menuBtn">
        <a href="?do=main&big=<?= $big['id'] ?>"><?= $big['type'] ?>(<?= $bigtotal ?>)</a>
        <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
            $midtotal = $Good->count(['sh' => 1, 'mid' => $mid['id']]);
        ?>
            <a href="?do=main&mid=<?= $mid['id'] ?>" style="background:lightgreen;display:none" class="submenu"><?= $mid['type'] ?>(<?= $midtotal ?>)</a>
    <?php
        }
        echo "</div>";
    }
    ?>

    <script>
        $('.menuBtn').hover(function() {
            $('.submenu').hide();
            $(this).find('.submenu').show()
        }, function() {
            $('.submenu').hide();
        })
    </script>