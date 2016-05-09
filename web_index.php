<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>KOH有ㄒㄧㄠˋ俱樂部</title>
<meta name="author" content="">
<meta name="copyright" content="">
<meta name="keywords" content="koh coconut 有ㄒㄧㄠˋ俱樂部">
<meta name="description" content="koh coconut 有ㄒㄧㄠˋ俱樂部，想與部長”KOH寶”一樣活力充沛嗎?來有ㄒㄧㄠˋ聚樂部就對了!分享超KOH時刻，就有機會獲得泰國雙人假期!登錄發票泰國雙人遊等你來拿">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<?php if($_SERVER['HTTPS'] || $_SERVER['SERVER_PORT']  == 443){?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<?php }else{?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<?php }?>
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="js/jquery.fullPage.js"></script>
<script type="text/javascript" src="js/jquery.twzipcode.min.js"></script>
<script type="text/javascript" src="index.js"></script>
<script type="text/javascript" src="ga.js"></script>
<link href="https://kohcoconut.ptt.com.tw/favicon.ico" rel="shortcut icon" >
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="koh_V2.css" rel="stylesheet" type="text/css">
<link href="pop.css" rel="stylesheet" type="text/css">
<link href="rd_V2.css" rel="stylesheet" type="text/css">
<link href="animate.css" rel="stylesheet" type="text/css">
<?php if(false){?>
<!-- 
 *
 *                                 _oo8oo_
 *                                o8888888o
 *                                88" . "88
 *                                (| -_- |)
 *                                0\  =  /0
 *                              ___/'==='\___
 *                            .' \\|     |// '.
 *                           / \\|||  :  |||// \
 *                          / _||||| -:- |||||_ \
 *                         |   | \\\  -  /// |   |
 *                         | \_|  ''\---/''  |_/ |
 *                         \  .-\__  '-'  __/-.  /
 *                       ___'. .'  /--.--\  '. .'___
 *                    ."" '<  '.___\_<|>_/___.'  >' "".
 *                   | | :  `- \`.:`\ _ /`:.`/ -`  : | |
 *                   \  \ `-.   \_ __\ /__ _/   .-` /  /
 *               =====`-.____`.___ \_____/ ___.`____.-`=====
 *                                 `=---=`
 *
 * 趕得要死就只能這樣凌亂的JS吧
 * 我寫的時候只有我跟天知道，現在只有天知道了...
 * 請尊大神來保佑這個活動順利進行
 * 看到這樣笑果就知道有多哀怨了吧
 * 
 -->
 <?php }?>
</head>
<body style="background: url('images/video_bg.png') 0 0 repeat #dfffff;" class="body_bg_gogo">
<!--loading頁-->
<div class="loading" >
    <div class="kohman">
        <img src="images/loading_koh.gif">
    </div>    
</div>
<!--loading_end-->
    
<!--固定式按鈕-->
<div class="fix_btn" style="display:none;">
    <h1 class="logo_btn">
        <a href="http://kohcoconut.com/zh-hant/" title="KOH COCONUT" class="blue" target="_blank" onclick="trackEvent('首頁', 'Click', 'PC-官網連結');">KOH COCONUT</a>
    </h1>
    <div class="fb_btn">
        <a href="https://www.facebook.com/KohCoconut/" title="facebook" target="_blank" onclick="trackEvent('首頁', 'Click', 'PC-紛絲專業連結');">facebook</a>
    </div>
    <div class="invoice" >
        <a title="登錄發票，泰國雙人遊等你來拿" class="invo_b sbtn" onclick="get_invoice();">
            <img src="images/invo_btn.png">
        </a>
    </div>
    <div class="lt_menu">
        <ul>
            <li >
                <a id="home" title="首頁" class="index_btn">首頁</a>
            </li>
            <li>
                <a id="rule" title="活動辦法" class="rule_btn">活動辦法</a>
            </li>
            <li>
                <a id="club" title="聚樂部成員" class="club_m">聚樂部成員</a>
            </li>
            <li>
                <a id="award" title="得獎名單" class="award_lt">得獎名單</a>
            </li>
        </ul>
    </div>
    <a id="fix_share" title="分享超KOH時刻，就有機會獲得泰國雙人假期" class="s_btn">分享超KOH時刻，就有機會獲得泰國雙人假期</a>
</div>
<!--固定式按鈕_end-->
    
<!-- pop 遮罩 -->
<div class="pop_background" >
</div>
<!-- pop 遮罩 end -->

<!--登錄發票-->
<div class="invo_pop" style="display:none;">
	<form id="invoice_form" action="" method="post">
	<input type="hidden" name="invoice_fb_id" id="invoice_fb_id" value=""/>
    <div class="pop_top">
        <h3>喝就ㄒ一ㄠˋ登錄發票</h3>
        <a title="" class="login"></a>
    </div>
    <div class="pop_min">
        <ul>
            <li>
                <p>活動期間內不限通路購買KOH COCONUT酷椰嶼椰子汁或香椰脆片任一產品
                    之發票(發票上需有「 KOH COCONUT 」商品)，登錄發票並填寫資料，即可獲得抽獎機會！
                    <br>※發票日期須為2016/05/09～2016/06/08內，期間外則無效
                    <br>※每人不限登錄一張發票，登錄越多，中獎機率越高
                    <br>※不分獎項，每人僅限得獎一次
                </p>
            </li>
        </ul>
        <ul id="invoice_box">
            <li class="normal">
                發票編號
                <input id="invoice_num0" name="invoice_num[]" type="text" value="" class="t_box">
                <a title="新增" class="add_invo">新增</a>
            </li>
        </ul>
        <ul>
            <li class="add_invo">
                <em class="tip">KOH寶叮寧：點選+號一次最多登入5張發票編號。</em>
            </li>
            <li class="add_inf">
                <span>姓名</span>
                <input id="invoice_name" name="invoice_name" type="text" value="" class="t_box">
            </li>
            <li class="add_inf">
                <span>性別</span>
                <input id="invoice_sex0" name="invoice_sex" type="radio" value="0" checked="checked">女
                <input id="invoice_sex1" name="invoice_sex" type="radio" value="1" >男
            </li>
            <li class="add_inf">
                <span>年齡</span>
                <input id="invoice_age" name="invoice_age" type="text" value="" class="t_box">
            </li>
            <li class="add_inf">
                <span>電話</span>
                <input id="invoice_tel" name="invoice_tel" type="text" value="" class="t_box">
            </li>
            <li class="add_inf add">
                <span>通訊地址</span>
                <span id="twzipcode"></span>
                <input id="invoice_addr" name="invoice_addr" type="text" value="" class="t_box a_box">
            </li>
            <li class="agree">
                <input id="invoice_chk" name="invoice_chk" type="checkbox" value=""><label for="invoice_chk">我已閱讀過活動辦法，並同意主辦單位運用此資料進行贈獎事宜聯繫</label>
            </li>
        </ul>
    </div>
    <div class="pop_bottom">
        <a title="確認送出"  onclick="ajax_invoice();">確認送出</a>
        <div class="plan"></div>
    </div>
    </form>
</div>
<!--登錄發票_end-->

<!--獲得抽獎資格-->
<div class="award_pop" style="display:none;">
    <div class="pop_top">
        <h3>恭喜獲得抽獎資格</h3>
    </div>
    <div class="pop_min">
        <p>感謝參與<br>祝您抽中超KOH大獎，連做夢都會<b class="svgword"><img src="images/word.svg"></b></p>
    </div>
    <div class="pop_bottom">
        <a title="確認送出" onclick="close_award_pop();">確認送出</a>
        <div class="plan"></div>
    </div>
</div>
<!--獲得抽獎資格_end-->
    
<!--得獎名單-->
<div class="award_list" style="display:none;">
    <div class="pop_top">
        <h3>得獎名單</h3>
        <a title="進入網站"></a>
    </div>
    <div class="pop_min">
        <div class="left_list">
            <h4 class="title">喝就<b class="svgword"><img src="images/word.svg"></b>登錄發票</h4>
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
            <h4 class="title">【超KOH時刻】留言分享</h4>
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
    </div>
    <div class="pop_bottom"></div>
</div>
<!--得獎名單_end-->
    
<!--超KOH時刻留言分享-->
<div class="koh_msg" style="display:none;">
	<div class="koh_msg_center">
    <div class="msg_top">
        <h3>超KOH時刻留言分享</h3>
        <a title="關閉"></a>
    </div>
    <div class="msg_min">
        <div class="fb_msg">
        	<iframe id="fb_msg1" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841581602638770%2F&width=500&show_text=true&appId=1011014942321040&height=520" width="500" height="520" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        	<iframe id="fb_msg2" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580432638887%2F&width=500&show_text=true&appId=1011014942321040&height=520" width="500" height="520" style="border:none;overflow:hidden;display: none;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        	<iframe id="fb_msg3" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580969305500%2F&width=500&show_text=true&appId=1011014942321040&height=520" width="500" height="520" style="border:none;overflow:hidden;display: none;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>
        <div class="arrow">
            <a title="" class="left" onclick="changeFbMsg('left');">left</a>
            <a title="" class="right" onclick="changeFbMsg('right');">right</a>
            <div class="clearboth"></div>
        </div>
    </div>
    <div class="msg_bottom">
        <!-- <a title="" class="like">讚</a> -->
        <a title="" class="share" onclick="ajax_video();share_mag();">分享</a>
        
    </div>
    </div>
</div>
<!--超KOH時刻留言分享_end-->

<!--恭喜分享成功-->
<div class="share_pop" style="display:none;">
    <div class="pop_top">
        <h3>恭喜分享成功</h3>
    </div>
    <div class="pop_min">
        <p>感謝參與<br>祝您抽中超KOH大獎，連做夢都會<b class="svgword"><img src="images/word.svg"></b></p>
    </div>
    <div class="pop_bottom">
        <a title="確定" onclick="close_award_pop();">確定</a>
    </div>
</div>
<!--恭喜分享成功_end-->

<div id="fullpage">
	<div class="section">
		<!--index-->
		<div class="index">
		    <div class="content">
		        <div class="title01">
                    <img src="images/index_02.png" style="width: 100%;">
    		        <h2>
                        <img src="images/index_04.gif">
                    </h2>
    		        <div class="title02">
                        <img src="images/index_03.png">
                    </div>
    		        <div class="title03">
                        <img src="images/index_05.png">
                    </div>
    		        <div class="title04">
                        <img src="images/index_01.png">
                    </div>
    		        <div class="title05">想與部長"KOH寶"一樣活力充沛嗎?<br>來有
                        <b class="svgword"><img src="images/word.svg"></b>聚樂部就對了!
                    </div>
    		        <div class="share">
    		            <a title="分享超KOH時刻，就有機會獲得泰國雙人假期" ><img src="images/share_btn.png"></a>
    		        </div>
		        </div>     
		<!--
		        <div class="video01"></div>
		        <div class="video02"></div>
		        <div class="video03"></div>
		-->
		        <div class="clearboth"></div>
		    </div>
<!-- 		    <div class="video_top"></div> -->
		    <div class="video_box">
    		    <div class="video_box1">
    		    	<video id="video_box1" poster="images/m_sss_bg.png" loop="true" autoplay="autoplay" preload="metadata" muted="">
        		    	<source src="video/KOH - Basketball_5s.mp4" type="video/mp4">
        		    </video>
    		    </div>
    		    <div class="video_box2">
    		    	<video id="video_box2" poster="images/m_sss_bg.png" loop="true" autoplay="autoplay" preload="metadata" muted="">
        		    	<source src="video/KOH - YOGA_5s.mp4" type="video/mp4">
        		    </video>
    		    </div>
    		    <div class="video_box3">
    		    	<video id="video_box3" poster="images/m_sss_bg.png" loop="true" autoplay="autoplay" preload="metadata" muted="">
        		    	<source src="video/KOH - Drink_5s.mp4" type="video/mp4">
        		    </video>
    		    </div>
		    </div>
		    <div class="next_btn" id="moveDown">KOH時刻，立即見<b class="svgword"><img src="images/word.svg"></b></div>
		</div>
		<!--index_end-->
	</div>
	<div class="section" id="section0">
		<!--mov01-->
		<div class="mov01">
		    <div class="content">
		        <div class="object01"><img src="images/mov01_title01.png"></div>
		        <div class="object02"><img src="images/mov01_title02.png"></div>
		        <div class="object03"><img src="images/mov01_title03.png"></div>
		        <div class="object04"><img src="images/mov01_cnt01.png"></div>
		        <div class="object05"><img src="images/mov01_cnt02.png"></div>
		        <div class="object06"><img src="images/mov01_cnt03.gif"></div>
		        <div class="object07">
<!--		        	<div>-->
		            	<a title="影片分享" onclick="trackEvent('次頁', 'Click', 'PC-瑜珈篇影片觀看');get_share(1);"><img src="images/mov01.jpg"></a>
<!--		            </div>-->
		        </div>
                <div class="kohbg01"></div>
                <div class="kohbg02"></div>
                <div class="kohbg03"></div>
		    </div>
		</div>
		<!--mov01_end-->
	</div>

	<div class="section" id="section1">
		<!--mov02-->
		<div class="mov02">
		    <div class="content">
		        <div class="object01">
<!--		        	<div>-->
		          <a title="影片分享" onclick="trackEvent('次頁', 'Click', 'PC-籃球篇影片觀看');get_share(2);"><img src="images/mov02.jpg"></a>
<!--		            </div>-->
		        </div>
		        <div class="object02"><img src="images/mov02_title01.png"></div>
		        <div class="object03"><img src="images/mov02_cnt03.png"></div>
		        <div class="object04"><img src="images/mov02_cnt02.png"></div>
		        <div class="object05"><img src="images/mov02_cnt01.gif"></div>
		        <div class="object06"><img src="images/mov02_title02.png"></div>
		        <div class="object07"><img src="images/mov02_title03.png"></div>
		        <div class="kohbg04"><img src="images/kohbg04.png"></div>
		        <div class="kohbg05"><img src="images/kohbg05.png"></div>
		        <div class="kohbg06"><img src="images/kohbg06.png"></div>
		    </div>
		</div>
		<!--mov02_end-->
	</div>

	<div class="section" id="section2">
		<!--mov03-->
		<div class="mov03">
		    <div class="content">
		        <div class="object01">
<!--		        	<div>-->
		          <a title="影片分享" onclick="trackEvent('次頁', 'Click', 'PC-喝酒篇影片觀看');get_share(3);"><img src="images/mov03.jpg"></a>
<!--		            </div>-->
		        </div>
		        <div class="object02"><img src="images/mov03_title01.png"></div>
		        <div class="object03"><img src="images/mov03_title02.png"></div>
		        <div class="object04"><img src="images/mov02_title03.png"></div>
		        <div class="object05"><img src="images/mov03_title03.png"></div>
		        <div class="object06"><img src="images/mov03_cnt02.png"></div>
		        <div class="object07"><img src="images/mov03_cnt03.gif"></div>
		        <div class="kohbg07"><img src="images/kohbg07.png"></div>
		        <div class="kohbg08"><img src="images/kohbg08.png"></div>
		        <div class="kohbg09"><img src="images/kohbg09.png"></div>
		        <div class="clearboth"></div>
		    </div>
		</div>
		<!--mov03_end-->
	</div>

	<div class="section" id="section3">
		<!--活動辦法-->
		<div class="rule_page">
		    <div class="content">
                <div class="shrink">
		        <div class="title">
		            <div class="object01"><img src="images/rule_title02.png"></div>
		            <h3 class="object02"><img src="images/rule_title03.png"></h3>
		            <div class="object03"><img src="images/rule_title04.png"></div>
		        </div>
		        <div class="rule_cont">
		            <div class="menu01">
		                <div class="top">
		                    <a title="【喝就ㄒㄧㄠˋ】登錄發票" class="nor01 op01" onclick="changeRule(1,1);">【喝就<b class="svgword"><img src="images/word.svg"></b>】登錄發票</a>
		                    <a title="【超KOH時刻】留言分享" class="nor02" onclick="changeRule(2,1);">【超KOH時刻】留言分享</a>
		                    <a title="其他" class="nor03" onclick="changeRule(3,1);">其他</a>
		                    <div class="clearboth"></div>
		                </div>
		            </div>
		            <div class="menu01_b">
		                <div class="p1"></div>
		                <div class="p2" style="display:none;"></div>
		                <div class="p3" style="display:none;"></div>
		                <div class="p4" style="display:none;"></div>
		                <div>
		                	<p>
    		                    <a title="" onclick="changeRule(1,1);" style="color:blanchedalmond;">●</a>
    		                    <a title="" onclick="changeRule(1,2);">●</a>
    		                    <a title="" onclick="changeRule(1,3);">●</a>
    		                    <a title="" onclick="changeRule(1,4);">●</a>
		                    </p>
		                </div>
		            </div>
		            <div class="menu02_b" style="display:none;opacity: 0;">
		                <div class="p1"></div>
		                <div class="p2" style="display:none;"></div>
		                <div>
		                	<p>
		                    <a title="" onclick="changeRule(2,1);">●</a>
		                    <a title="" onclick="changeRule(2,2);">●</a>
		                    </p>
		                </div>
		            </div>
		            <div class="menu03_b" style="display:none;opacity: 0;">
		                <div class="p1"></div>
		                <div class="p2" style="display:none;"></div>
		                <div class="p3" style="display:none;"></div>
		                <div class="p4" style="display:none;"></div>
		                <div>
		                	<p>
		                    <a title="" onclick="changeRule(3,1);">●</a>
		                    <a title="" onclick="changeRule(3,2);">●</a>
		                    <a title="" onclick="changeRule(3,3);">●</a>
		                    <a title="" onclick="changeRule(3,4);">●</a>
		                    </p>
		                </div>
		            </div>
		        </div>
                </div>
		    </div>    
		</div>
		<!--活動辦法_end-->
	</div>
	<div class="section" id="section4">
		<!--俱樂部成員-->
		<div class="club_member">
		    <div class="content">
                <div class="shrink">
		        <div class="title">
		            <h3>俱樂部成員</h3>
		        </div>
		        <!-- <div class="tip">
		            <div class="tip_koh">
		                部長 - KOH寶：有用不完的活力，總是充滿體力最喜歡將歡ㄒㄧㄠ\散佈給大家
		            </div>
		        </div> -->
		        <div class="arrow_btn">
		        	<div class="product">
			            <ul>
			                <li class="product01">
                		        <div class="tip" >
                		            <div class="tip_koh">
                		                部長 - KOH寶：有用不完的活力，總是充滿體力最喜歡將歡<b class="svgword"><img src="images/word.svg"></b>散佈給大家
                		            </div>
                		        </div>
                                <img src="images/club_put01.png" width="95%">
		        			</li>
			                <li class="product02" style="display:none;"><img src="images/club_put02.png" width="95%"></li>
			                <li class="product03" style="display:none;"><img src="images/club_put03.png" width="95%"></li>
			                <li class="product04" style="display:none;"><img src="images/club_put04.png" width="95%"></li>
			            </ul>
		            </div>
		            <div class="lr_btn">
		                <a class="left" onclick="changeProduct('prev');">left</a>
		                <a class="right" onclick="changeProduct('next');">right</a>
		                <div class="clearboth"></div>
		            </div>
		        </div>
		      </div>
            </div>
		</div>    
		<div class="club_member" style="overflow: initial;">
		    <div class="footer">
		        <div class="content">
		            <a href="http://www.worldgymtaiwan.com/" title="WORLD GYM" class="world" target="_blank">WORLD GYM</a>
		            <a href="http://www.touchaero.com.tw/" title="TOUCH AREO" class="touch" target="_blank">TOUCH AREO</a>
		            <div class="copyright">Copyright © 2016  BABI  Inc. All Rights Reserved. Designed by <a href="http://www.ptt.com.tw" title="Penetration Internet Agency" target="_blank">Penetration Internet Agency</a></div>
		            <div class="clearboth"></div>
		        </div>
		    </div>
		</div>
		<!--俱樂部成員_end-->
	</div>
</div>
</body>
</html>