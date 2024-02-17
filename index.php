<?php
include_once "./api/db.php";
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/js.js"></script>
    <script src="./js/jquery-1.9.1.min.js"></script>
</head>
<style>
#top {
    display: flex;
    justify-content: space-between;

    a {
        width: 50%;
    }

    img {
        width: 100%;
    }
}
</style>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="?">
                <img src="./img/0416.jpg">
            </a>
            <div style="padding:10px;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                if (isset($_SESSION['mem'])) {
                ?>
                <a onclick="logout('mem')">登出</a>
                <?php
                } else {
                ?>
                <a href="?do=login">會員登入</a>
                <?php
                }
                ?>
                |
                <?php
                if (isset($_SESSION['admin'])) {
                ?>
                <a href="back.php">回管理頁</a>
                <?php
                } else {
                ?>
                <a href="?do=admin">管理登入</a>
                <?php
                }
                ?>
            </div>
        </div>
        <marquee>情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</marquee>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <a href="">全部商品</a>
                <div id=menu>
                    <!-- ajax -->
                </div>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right" style="overflow:auto;">
            <?php
            $do = $_GET['do'] ?? "main";
            $file = "./front/{$do}.php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./front/main.php";
            }

            ?>

        </div>
        <div id="bottom" style="line-height:70px;background:url(./icon/bot.png); color:#FFF;" class="ct">
            <?= $Bot->find(1)['bottom'] ?> </div>
    </div>
    <script>
    $(document).ready(function() {
        let menu = $('#menu')
        $.ajax({
            type: 'post',
            data: {
                'table': 'Type',
                'big_id': 0,
            },
            dataType: 'json',
            url: './api/get.php',
            success: function(bigs) {
                // console.log(bigs);
                let html = '';
                $.each(bigs, (key, big) => {
                    html += `
<a class='big' data-id='${big.id}'>${big.name}</a>
<div></div>
`
                })
                menu.html(html)

            }
        })
        menu.on({
            'mouseenter':function(){
            // console.log($(this).data('id'))
            let nowitem = $(this);
            let big_id = $(this).data('id');
            // console.log($(this).next('div'));
menu.find('div').hide();
nowitem.next('div').show();
            $.ajax({
                type: 'post',
                data: {
                    'table': 'Type',
                    big_id,
                },
                dataType: 'json',
                url: './api/get.php',
                success: function(mid) {
                    // console.log(mid)
                    let html = '';
                    $.each(mid, function(key, val) {
                        html += `<a class='mid' style="background:lightgreen;width:80%;margin:5px 0px 5px auto">${val.name}</a>`;
                    })
                    nowitem.next('div').html(html);
                }

            })
    },
},'.big').on('mouseleave',function(){
    $(this).find('div').hide();
})
        
    })
    </script>
</body>

</html>