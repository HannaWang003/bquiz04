<?php
$goods = $Good->all();
?>
<h2><span id="mid">流行皮件</span> > <span id="good">男用皮件</span></h2>
<table class="all">
    <?php
foreach($goods as $good){
    ?>
    <tr>
        <td rowspan="4" class="pp ct"><img src="./img/<?=$good['img']?>" style="width:150px"></td>
        <td class="tt"><p class="ct" style="font-weight:bolder"><?=$good['name']?></p></td>
    </tr>
    <tr>
        <!-- <td></td> -->
        <td class="pp"></td>
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