<?php
include_once "./api/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/js.js"></script>
    <script src="./js/jquery-1.9.1.min.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="?">
                <img src="./img/0416.jpg">
            </a>
            <div style="padding:10px;">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <button onclick="location.href='./api/logout.php?do=mem'">會員登出</button>|
                <?php
                } else {
                ?>
                    <a href="?do=login">會員登入</a> |
                <?php
                }
                if (isset($_SESSION['mag'])) {
                    echo  "<a href='./back.php'>回管理頁</a>";
                } else {
                    echo "<a href='?do=admin'>管理登入</a>";
                }
                ?>
            </div>
            <marquee behavior="" direction="">
                <span>年終特賣會開跑了</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>情人節特惠活動</span>
            </marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <?php
                $allnum = $Good->count(['sh' => 1]);
                echo "<a href='index.php'>全部商品($allnum)</a>";
                $bigs = $Type->all(['big_id' => 0]);
                foreach ($bigs as $big) {
                    $bignum = $Good->count(['sh' => 1, 'big' => $big['id']]);
                    echo "<div class='onhover'>";
                    $mids = $Type->all(['big_id' => $big['id']]);
                    echo "<a>{$big['name']}($bignum)</a>";
                    foreach ($mids as $mid) {
                        echo "<div class='s'>";
                        echo "<a href='index.php?mid={$mid['id']}'>{$mid['name']}</a>";
                        echo "</div>";
                    };
                    echo "</div>";
                }

                ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right" style="height:400px;overflow:auto;">
            <?php
            $do = ($_GET['do']) ?? "main";
            $file = "./front/$do.php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./front/main.php";
            }
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(./img/bot.png); color:#FFF;" class="ct">
            <?= $Bot->find(1)['bot'] ?></div>
    </div>
    <script>
        $('.onhover').hover(function() {
            console.log($(this));
            $('.s').hide();
            $(this).children('.s').show();
        }, function() {
            $('.s').hide();
        })
    </script>
</body>

</html>