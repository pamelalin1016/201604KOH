<?php 
require_once 'm_header.php';
?>

<script>
$(document).ready(function() {

	
    $(".loading").css({"display":"none"});
    $('.fix_btn').css({"display":"block"});
    $('.logo a img').attr('src','m_images/logo_b.png');
    $(".club_member").css({"display":"block"});
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

<!--俱樂部成員-->
<div class="club_member" style="display:none;">
    <div class="content">
        <div class="title">
            <h3>
                <img src="m_images/m_club01.png">
            </h3>
        </div>
        <div class="tip">
            <img src="m_images/m_club02.png">
        </div>
        <div class="cont_min">
            <ul>
                <li class="product01">
                    <img src="m_images/m_put01.png">
                </li>
                <li class="product02">
                    <img src="m_images/m_put02.png">
                </li>
                <li class="product03">
                    <img src="m_images/m_put03.png">
                </li>
                <li class="product04">
                    <img src="m_images/m_put04.png">
                </li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <a href="" title="WORLD GYM" class="world">
            <img src="m_images/wg_logo.png">
        </a>
        <a href="" title="TOUCH AREO" class="touch">
            <img src="m_images/ta_logo.png">
        </a>
        <div class="copyright">Copyright © 2016  BABI  Inc. All Rights Reserved. Designed by Penetration Internet Agency</div>
        <div class="clearboth"></div>
    </div>
</div>    
<!--俱樂部成員_end-->

<?php require_once 'm_footer.php';?>
