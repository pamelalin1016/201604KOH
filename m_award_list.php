<?php 
require_once 'm_header.php';
?>

<script>
$(document).ready(function() {

	
    $(".loading").css({"display":"none"});
    $('.fix_btn').css({"display":"block"});
    $('.logo a img').attr('src','m_images/m_sss_bg.png');
    $(".award_list").css({"display":"block"});
    $(".fix_btn .m_btn .open").click(function() {
        $(".fix_btn .menu").animate({"left":"20%"});
        $(".m_btn div").animate({"right": "83.91%"});
        $(".fix_btn .m_btn .back").css({"display": "block"});
    });
    $(".fix_btn .m_btn .back").click(function() {
        $(".fix_btn .menu").animate({"left":"100%"});
        $(".m_btn div").animate({"right": "3.91%"});
        $(".fix_btn .m_btn .back").css({"display": "none"});
    });
});

</script>

<!--得獎名單-->
<div class="award_list" style="display:none;">
    <div class="pop_top">
        <h3>
            <img src="m_images/m_award01.png">
        </h3>
    </div>
    <div class="left_list">
        <h4 class="title">
            <img src="m_images/rule_menu01_1.png">
        </h4>
        <ul>
            <li class="title">泰國五星艾美雙人假期</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <div class="clearboth"></div>
        </ul>
        <ul>
            <li class="title">WORLD GYM世界健身俱樂部1年會員</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <div class="clearboth"></div>
        </ul>
        <ul>
            <li class="title">多款TOUCH AERO塔奇艾羅商品</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <div class="clearboth"></div>
        </ul>
        <ul>
            <li class="title">TOUCH AERO環保瑜珈舖巾</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <div class="clearboth"></div>
        </ul>
        <ul>
            <li class="title">TOUCH AERO女款有氧T恤罩衫</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <li class="name">王小明</li>
            <li class="number">0985XXX972</li>
            <div class="clearboth"></div>
        </ul>
    </div>
    <div class="right_list">
        <h4 class="title">
            <img src="m_images/rule_menu02_1.png">
        </h4>
        <ul>
            <li class="title">泰國五星艾美雙人假期</li>
            <li class="name">王小明</li>
            
        </ul>
        <ul>
            <li class="title">WORLD GYM世界健身俱樂部6個月會員</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
        </ul>
        <ul>
            <li class="title">WORLD GYM世界健身俱樂部3個月會員</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
        </ul>
        <ul>
            <li class="title">TOUCH AERO塔奇艾羅現金禮券</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
        </ul>
        <ul>
            <li class="title">多款TOUCH AERO塔奇艾羅商品</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
            <li class="name">王小明</li>
        </ul>
    </div>
    <div class="pop_bottom"></div>
</div>
<!--得獎名單_end-->

<?php require_once 'm_footer.php';?>