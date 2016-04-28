<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>KOH</title>
<meta name="author" content="">
<meta name="copyright" content="">
<meta name="keywords" content="koh coconut 有ㄒㄧㄠˋ俱樂部">
<meta name="description" content="koh coconut 有ㄒㄧㄠˋ俱樂部，想與部長”KOH寶”一樣活力充沛嗎?來有ㄒㄧㄠˋ聚樂部就對了!分享超KOH時刻，就有機會獲得泰國雙人假期!登錄發票泰國雙人遊等你來拿">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="js/jquery.fullPage.js"></script>
<link href="reset.css" rel="stylesheet"; type="text/css">
<link href="koh.css" rel="stylesheet"; type="text/css">
<link href="pop.css" rel="stylesheet"; type="text/css">
<link href="rd.css" rel="stylesheet"; type="text/css">
<script type="text/javascript">
	$(document).ready(function() {
		$('#fullpage').fullpage({
			// anchors: ['firstPage', 'secondPage', '3rdPage'],
			// sectionsColor: ['#71cff4', '#fcc153', '#79c3d1', '#f2786f'],
			scrollBar: false,
			afterLoad: function(anchorLink, index){
				$('.loading').hide();
				
				$('.fix_btn').show();
				$('.index').show();
				if(index == 1){
					$('#fix_share').hide();
					$('.logo_btn a').attr('class','');
				}
			},
			onLeave: function(index,nextIndex,direction){
				if(nextIndex == 1){
					$('#fix_share').hide();
					$('.logo_btn a').attr('class','');
				}else{
					$('#fix_share').show();
					$('.logo_btn a').attr('class','blue');
				}
				$('.kohbg01,.kohbg02,.kohbg03,.kohbg04,.kohbg05,.kohbg06,.kohbg07,.kohbg08,.kohbg09').animate({  borderSpacing: -90 }, {
				    step: function(now,fx) {
				        $(this).css('transform','rotate('+now+'deg)');  
				      },
				      duration:'slow'
				  },'linear');
			},
		});

		$('.index_btn').on('click', function(){
            $.fn.fullpage.moveSectionDown();
        });

		$('#moveDown').on('click', function(){
            $.fn.fullpage.moveSectionDown();
        });

        $('#home').on('click', function(){
			$.fn.fullpage.moveTo(1);
		});

        $('#rule').on('click', function(){
			$.fn.fullpage.moveTo(5);
		});

        $('#club').on('click', function(){
			$.fn.fullpage.moveTo(6);
		});

        
        /*var bg_pstion = 0;
        setTimeout(bg_position,12);
        function bg_position(){
			if(bg_pstion>=350){
				bg_pstion = 0;
			}else{
				bg_pstion += 1;
			}
			$('body').css('background-position',bg_pstion+'px 0px');
            setTimeout(bg_position,12);
        }*/
	});

	var product = 1;
	function changeProduct(type){
		var old_s = 1,new_s = 2;
		if(type == 'next'){
			if(product == 4){
				product = 1;
				old_s = 4;
				new_s = 1;
			}else{
				old_s = product;
				product++;
				new_s = product;
			}
		}else{
			if(product == 1){
				product = 4;
				old_s = 1;
				new_s = 4;
			}else{
				old_s = product;
				product--;
				new_s = product;
			}
		}
		
		//animate();
            if(type == 'next'){
            	$('.product0'+old_s).animate({"right": '+=800'});
                $('.product0'+new_s).attr('style','right: -706px;');
                $('.product0'+new_s).animate({"right": '+=742'});
            }else{
                $('.product0'+old_s).animate({"right": '-=800'});
                $('.product0'+new_s).attr('style','right: 742px;');
                $('.product0'+new_s).animate({"right": '-=706'});
            }
    }
</script>
</head>
<body style="background: url('images/video_bg.png') 0 0 repeat #dfffff;">
<!--loading頁-->
<div class="loading" >
    <div class="kohman">
        <img src="images/loading_koh.png">
    </div>    
</div>
<!--loading_end-->
    
<!--固定式按鈕-->
<div class="fix_btn" style="display:none;">
    <h1 class="logo_btn">
        <a href="http://kohcoconut.com/zh-hant/" title="KOH COCONUT" class="blue" target="_blank">KOH COCONUT</a>
    </h1>
    <div class="fb_btn">
        <a href="https://www.facebook.com/KohCoconut/" title="facebook" target="_blank">facebook</a>
    </div>
    <div class="invoice" >
        <a href="" title="登錄發票，泰國雙人遊等你來拿" class="invo_b sbtn">
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
    

<!--登錄發票-->
<div class="invo_pop" style="display:none;">
    <div class="pop_top">
        <h3>喝就ㄒ一ㄠˋ登錄發票</h3>
        <a href="" title="" class="login">登入</a>
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
        <ul>
            <li class="normal">
                發票編號
                <input id="" type="text" value="" class="t_box">
                <a href="" title="新增" class="add_invo">新增</a>
            </li>
            <li class="add_invo">
                <input id="" type="text" value="" class="t_box">
            </li>
            <li class="add_invo">
                <input id="" type="text" value="" class="t_box">
            </li>
            <li class="add_invo">
                <input id="" type="text" value="" class="t_box">
            </li>
            <li class="add_invo">
                <input id="" type="text" value="" class="t_box">
            </li>
            <li class="add_invo">
                <em class="tip">KOH寶叮寧：點選+號一次最多登入5張發票編號。</em>
            </li>
            <li class="add_inf">
                <span>姓名</span>
                <input id="" type="text" value="" class="t_box">
            </li>
            <li class="add_inf">
                <span>性別</span>
                <input id="" type="checkbox" value="" >女
                <input id="" type="checkbox" value="" >男
            </li>
            <li class="add_inf">
                <span>年齡</span>
                <input id="" type="text" value="" class="t_box">
            </li>
            <li class="add_inf">
                <span>電話</span>
                <input id="" type="text" value="" class="t_box">
            </li>
            <li class="add_inf add">
                <span>通訊地址</span>
                <select id="">
                  <option selected="" value="縣市">縣市</option>
                  <option value="台北市">台北市</option>
                </select>
                <select id="">
                  <option selected="" value="鄉鎮市區">鄉鎮市區</option>
                  <option value="中山區">中山區</option>
                </select>
                <input id="" type="text" value="" class="t_box a_box">
            </li>
            <li class="agree">
                <input id="" type="checkbox" value="">我已閱讀過活動辦法，並同意主辦單位運用此資料進行贈獎事宜聯繫
            </li>
        </ul>
    </div>
    <div class="pop_bottom">
        <a href="" title="確認送出">確認送出</a>
        <div class="plan"></div>
    </div>
</div>
<!--登錄發票_end-->

<!--獲得抽獎資格-->
<div class="award_pop" style="display:none;">
    <div class="pop_top">
        <h3>恭喜獲得抽獎資格</h3>
    </div>
    <div class="pop_min">
        <p>感謝參與<br>祝您抽中超KOH大獎，連做夢都會ㄒㄧㄠˋ</p>
    </div>
    <div class="pop_bottom">
        <a href="" title="確認送出">確認送出</a>
        <div class="plan"></div>
    </div>
</div>
<!--獲得抽獎資格_end-->
    
<!--得獎名單-->
<div class="award_list" style="display:none;">
    <div class="pop_top">
        <h3>得獎名單</h3>
        <a href="" title="進入網站">進入網站</a>
    </div>
    <div class="pop_min">
        <div class="left_list">
            <h4 class="title">喝就ㄒㄧㄠ\ 登錄發票</h4>
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
    <div class="msg_top">
        <h3>超KOH時刻留言分享</h3>
        <a href="" title="關閉">關閉</a>
    </div>
    <div class="msg_min">
        <div class="arrow">
            <a href="" title="" class="left">left</a>
            <a href="" title="" class="right">right</a>
            <div class="clearboth"></div>
        </div>
        <div class="fb_msg"></div>
    </div>
    <div class="msg_bottom">
        <a href="" title="" class="like">讚</a>
        <a href="" title="" class="share">分享</a>
    </div>
</div>
<!--超KOH時刻留言分享_end-->

<!--恭喜分享成功-->
<div class="share_pop" style="display:none;">
    <div class="pop_top">
        <h3>恭喜分享成功</h3>
    </div>
    <div class="pop_min">
        <p>感謝參與<br>祝您抽中超KOH大獎，連做夢都會ㄒㄧㄠˋ</p>
    </div>
    <div class="pop_bottom">
        <a href="" title="確定">確定</a>
    </div>
</div>
<!--恭喜分享成功_end-->

<div id="fullpage">
	<div class="section">
		<!--index-->
		<div class="index">
		    <div class="content">
		        <div class="title01">
		        <h2>有ㄒㄧㄠˋ俱樂部</h2>
		        <div class="title02"></div>
		        <div class="title03"></div>
		        <div class="title04"></div>
		        <div class="title05">想與部長”KOH寶”一樣活力充沛嗎?<br>
		來有ㄒㄧㄠ\聚樂部就對了!</div>
		        <div class="share">
		            <a href="" title="分享超KOH時刻，就有機會獲得泰國雙人假期">分享超KOH時刻，就有機會獲得泰國雙人假期</a>
		        </div>
		        </div>     
		<!--
		        <div class="video01"></div>
		        <div class="video02"></div>
		        <div class="video03"></div>
		-->
		        <div class="clearboth"></div>
		    </div>
		    <div class="next_btn" id="moveDown">KOH時刻，立即見，ㄒㄧㄠˋ</div>
		</div>
		<!--index_end-->
	</div>
	<div class="section" id="section0">
		<!--mov01-->
		<div class="mov01">
		    <div class="content">
		        <div class="object01"></div>
		        <div class="object02"></div>
		        <div class="object03"></div>
		        <div class="object04"></div>
		        <div class="object05"></div>
		        <div class="object06"></div>
		        <div class="object07">
		            <a href="" title=""></a>
		        </div>
		    </div>
		    <div class="kohbg01"></div>
		    <div class="kohbg02"></div>
		    <div class="kohbg03"></div>
		</div>
		<!--mov01_end-->
	</div>

	<div class="section" id="section1">
		<!--mov02-->
		<div class="mov02">
		    <div class="content">
		        <div class="object01">
		            <a href="" title=""></a>
		        </div>
		        <div class="object02"></div>
		        <div class="object03"></div>
		        <div class="object04"></div>
		        <div class="object05"></div>
		        <div class="object06"></div>
		        <div class="object07"></div>
		        <div class="kohbg04"></div>
		        <div class="kohbg05"></div>
		        <div class="kohbg06"></div>
		    </div>
		</div>
		<!--mov02_end-->
	</div>

	<div class="section" id="section2">
		<!--mov03-->
		<div class="mov03">
		    <div class="content">
		        <div class="object01">
		            <a href="" title=""></a>
		        </div>
		        <div class="object02"></div>
		        <div class="object03"></div>
		        <div class="object04"></div>
		        <div class="object05"></div>
		        <div class="object06"></div>
		        <div class="object07"></div>
		        <div class="kohbg07"></div>
		        <div class="kohbg08"></div>
		        <div class="kohbg09"></div>
		        <div class="clearboth"></div>
		    </div>
		</div>
		<!--mov03_end-->
	</div>

	<div class="section" id="section3">
		<!--活動辦法-->
		<div class="rule_page">
		    <div class="content">
		        <div class="title">
		            <div class="object01"></div>
		            <h3 class="object02"></h3>
		            <div class="object03"></div>
		        </div>
		        <div class="rule_cont">
		            <div class="menu01">
		                <div class="top">
		                    <a href="" title="【喝就ㄒㄧㄠˋ】登錄發票" class="nor01 op01">【喝就ㄒㄧㄠˋ】登錄發票</a>
		                    <a href="" title="【超KOH時刻】留言分享" class="nor02">【超KOH時刻】留言分享</a>
		                    <a href="" title="其他" class="nor03">其他</a>
		                    <div class="clearboth"></div>
		                </div>
		            </div>
		            <div class="menu01_b">
		                <div class="p1"></div>
		                <div class="p2" style="display:none;"></div>
		                <div class="p3" style="display:none;"></div>
		                <div class="p4" style="display:none;"></div>
		                <p>
		                    <a href="" title="">●</a>
		                    <a href="" title="">●</a>
		                    <a href="" title="">●</a>
		                    <a href="" title="">●</a>
		                </p>
		            </div>
		            <div class="menu02_b" style="display:none;">
		                <div class="p1"></div>
		                <div class="p2" style="display:none;"></div>
		                <p>
		                    <a href="" title="">●</a>
		                    <a href="" title="">●</a>
		                </p>
		            </div>
		            <div class="menu03_b" style="display:none;">
		                <div class="p1"></div>
		                <div class="p2" style="display:none;"></div>
		                <div class="p3" style="display:none;"></div>
		                <div class="p4" style="display:none;"></div>
		                <p>
		                    <a href="" title="">●</a>
		                    <a href="" title="">●</a>
		                    <a href="" title="">●</a>
		                    <a href="" title="">●</a>
		                </p>
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
		        <div class="title">
		            <h3>俱樂部成員</h3>
		        </div>
		        <div class="tip">
		            <div class="tip_koh">
		                部長 - KOH寶：有用不完的活力，總是充滿體力最喜歡將歡ㄒㄧㄠ\散佈給大家
		            </div>
		        </div>
		        <div class="arrow_btn">
		        	<div class="product">
			            <ul>
			                <li class="product01">KOH COCONUT酷椰子純椰子汁</li>
			                <li class="product02" style="display:none;">香椰脆片-原味</li>
			                <li class="product03" style="display:none;">香椰脆片-哇沙米</li>
			                <li class="product04" style="display:none;">香椰脆片-巧克力</li>
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
		<div class="club_member">
		    <div class="footer">
		        <div class="content">
		            <a href="" title="WORLD GYM" class="world">WORLD GYM</a>
		            <a href="" title="TOUCH AREO" class="touch">TOUCH AREO</a>
		            <div class="copyright">Copyright © 2016  BABI  Inc. All Rights Reserved. Designed by Penetration Internet Agency</div>
		            <div class="clearboth"></div>
		        </div>
		    </div>
		</div>
		<!--俱樂部成員_end-->
	</div>
</div>
</body>
</html>