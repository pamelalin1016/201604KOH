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
<script type="text/javascript" src="js/jquery.twzipcode.min.js"></script>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="koh.css" rel="stylesheet" type="text/css">
<link href="pop.css" rel="stylesheet" type="text/css">
<link href="rd.css" rel="stylesheet" type="text/css">
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
				//,.kohbg03,.kohbg05,.kohbg08,.kohbg09
				$('.kohbg01,.kohbg02,.kohbg04,.kohbg06,.kohbg07').animate({  borderSpacing: -270 }, {
				    step: function(now,fx) {
				        $(this).css('transform','rotate('+now+'deg)');  
				      },
				      duration:'slow'
				  },'linear');
			},
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

		$('#award').on('click', function(){
			$('.pop_background').show();
	        $('.award_list').show();

	        $('.award_list .pop_top a').on('click',function(){
	            $('.pop_background').hide();
	            $('.award_list').hide();
	        });
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

	var rule_menu = 1, rule_item = 1;
	function changeRule(menu,item){
		if(rule_menu != menu || rule_item != item){
			if(rule_menu != menu){
				$('.rule_cont .menu01 .nor0'+menu).attr("class", "nor0"+menu+" op0"+menu);
				$('.rule_cont .menu01 .nor0'+rule_menu).attr("class", "nor0"+rule_menu);
			}

			$('.menu0'+menu+'_b div p a').attr('style','');
			$('.menu0'+menu+'_b div p a:eq('+(item-1)+')').attr('style','color: blanchedalmond;');
			
			$('.menu0'+rule_menu+'_b .p'+rule_item).animate({"opacity": '-=1'});
			$('.menu0'+menu+'_b .p'+item).css('opacity','0');
			$('.menu0'+menu+'_b').show();
			$('.menu0'+menu+'_b .p'+item).show();
			$('.menu0'+menu+'_b .p'+item).animate({"opacity": '+=1'});

			if(rule_menu != menu){
				$('.menu0'+menu+'_b').animate({"opacity": '+=1'});
				$('.menu0'+rule_menu+'_b').animate({"opacity": '-=1'}, {
					start:function() {
						setTimeout("$('.menu0"+rule_menu+"_b').hide();",500);
					},
				  },'linear');
			}
			
			rule_menu = menu;
			rule_item = item;
		}
	}
	
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

	var fb_msg = 1;
	function changeFbMsg(type){
		var now_msg = 1;
		if(type == 'left'){
			if(fb_msg == 1){
				now_msg = 3;
			}else{
				now_msg = fb_msg-1;
			}
		}

		if(type == 'right'){
			if(fb_msg == 3){
				now_msg = 1;
			}else{
				now_msg = fb_msg+1;
			}
		}

		$('#fb_msg1, #fb_msg2, #fb_msg3').hide();
		$('#fb_msg'+now_msg).show();
		fb_msg = now_msg;
	}

	var invo_item = 1;
    function get_invoice(){
        if(fb_id == ''){
        	if(!get_facebook()){
            	alert('Facebook 未正確登入!');
            	return false;
        	}
        }
        
        $('#twzipcode').twzipcode({
        	'css': ['county', 'district', 'zipcode'],
        	'countyName'   : 'invoice_county',
            'districtName' : 'invoice_district',
            'zipcodeName'  : 'invoice_zipcode'
        });
        $('.pop_background').show();
        $('.invo_pop').show();

        $('.invo_pop .login').on('click',function(){
            $('.pop_background').hide();
            $('.invo_pop').hide();
        });

        $('.add_invo').on('click', function(){
            if(invo_item < 5){
            	$('#invoice_box').append('<li class="add_invo"> <input id="invoice_num'+invo_item+'" name="invoice_num[]" type="text" value="" class="t_box"> </li>');
            	invo_item++;
            }
        });
    }

    function get_share(){
        if(fb_id == ''){
        	if(!get_facebook()){
            	alert('Facebook 未正確登入!');
            	return false;
        	}
        }
        $('.pop_background').show();
        $('.koh_msg').show();

        $('.koh_msg .msg_top a').on('click',function(){
            $('.pop_background').hide();
            $('.koh_msg').hide();
        });
        
    }
    
    var fb_id = "1582921411";
    var fb_name = "pamela";
    //var fb_id = fb_name = '';
    function get_facebook(){
    	window.fbAsyncInit = function() {
    	    FB.init({
    	      appId      : '543797882389004',
    	      xfbml      : true,
    	      version    : 'v2.5'
    	    });
    	    
    	    FB.getLoginStatus(function(response) {
    	    	  if (response.status === 'connected') {
    	    	    FB.api('/me', function(response) {
				        ajax_facebook(response.id, response.name);
				        return true;
    			    });
    	    	  }
    	    	  else {
    				FB.login(function(response) {
				      if (response.authResponse) {
				       FB.api('/me', function(response) {
				           ajax_facebook(response.id, response.name);
					       return true;
				       });
				      }else{
					      return false;
				      }
    				}, {scope: 'public_profile,email'});
    	    	  }
    	    	});
    	    	
    	  };

    	  (function(d, s, id){
    	     var js, fjs = d.getElementsByTagName(s)[0];
    	     if (d.getElementById(id)) {return;}
    	     js = d.createElement(s); js.id = id;
    	     js.src = "//connect.facebook.net/zh_TW/sdk.js";
    	     fjs.parentNode.insertBefore(js, fjs);
    	   }(document, 'script', 'facebook-jssdk'));
    	  
    }

    function ajax_facebook(id, name){
        fb_id = id;
        fb_name = name;

    	$.ajax({
        	type: 'post',
			url: 'ajax.php?mod=fb',
			data: 'fb_id=' + id + '&name=' + name ,
			dataType: 'json',
			success: function(response){
				if(response.s == '1'){
					console.log('登入成功!');
				}else{
					alert('登入失敗請重新再登入一次!');
					window.location.reload();
					window.location.reload();
					window.location.reload();
		        	return false;
				}
			},
            error:function(xhr, ajaxOptions, thrownError){ 
                alert(xhr.status); 
                alert(thrownError); 
            }
        });
    }

    function ajax_invoice(){
    	if(!check_form_invoice()){
        	return false;
    	}

    	$('#invoice_fb_id').val(fb_id);

    	//$('.pop_bottom a').hide();

    	$.ajax({
            url: 'ajax.php?mod=invoice',
            data: $('#invoice_form').serialize(),
            type:"POST",
            dataType: 'json',
            success: function(response){
				if(response.s == '1'){
					$('.invo_pop').hide();
					$('.award_pop').show();

					$('.pop_bottom a').show();
				}else{
					console.log(response);
					alert('發票登錄失敗請重新再試一次!');
					window.location.reload();
					window.location.reload();
					window.location.reload();
		        	return false;
				}
            },
            error:function(xhr, ajaxOptions, thrownError){ 
                alert(xhr.status); 
                alert(thrownError); 
                $('.pop_bottom a').show();
            }
        });
    	
    }

    function ajax_video(){
        $('.koh_msg .msg_bottom a.share').hide();
        
    	$.ajax({
            url: 'ajax.php?mod=video',
            data: 'fb_id=' + fb_id + '&video=' + fb_msg ,
            type:"POST",
            dataType: 'json',
            success: function(response){
				if(response.s == '1'){
					$('.koh_msg').hide();
					$('.share_pop').show();

					$('.koh_msg .msg_bottom a.share').show();
				}else{
					console.log(response);
					alert('發票登錄失敗請重新再試一次!');
					window.location.reload();
					window.location.reload();
					window.location.reload();
		        	return false;
				}
				$('.koh_msg').hide();
				$('.share_pop').show();

				$('.koh_msg .msg_bottom a.share').show();
            },
            error:function(xhr, ajaxOptions, thrownError){ 
                alert(xhr.status); 
                alert(thrownError); 
                $('.koh_msg .msg_bottom a.share').show();
            }
        });
    }

    function check_form_invoice(){

    	for(var i = 0 ; i < invo_item ; i++){
            if($('#invoice_num' + i).val() == ''){
                alert('發票號碼是必填欄位!');
                return false;
            }

            var re = /^[a-zA-Z]{2}-[0-9]{8}$/;
            if (!re.test($('#invoice_num' + i).val())){
            	$('#invoice_num' + i).val('');
            	alert('發票號碼格式錯誤!');
                return false;
            }
    	}
        
        if($('#invoice_name').val() == ''){
            alert('姓名是必填欄位!');
            return false;
        }

        if($('#invoice_age').val() == ''){
            alert('年齡是必填欄位!');
            return false;
        }

        if($('#invoice_tel').val() == ''){
            alert('電話是必填欄位!');
            return false;
        }

        var re = /^[0-9]{9}$/;
        var re2 = /^[0-9]{10}$/;
        if (!(re.test($('#invoice_tel').val()) || re2.test($('#invoice_tel').val()))){
        	alert('電話號碼格式錯誤!');
            return false;
        }

        if($('select[name=invoice_county]').val() == ''){
            alert('縣市是必填欄位!');
            return false;
        }

        if($('select[name=invoice_district]').val() == ''){
            alert('鄉鎮市區是必填欄位!');
            return false;
        }

        if($('#invoice_addr').val() == ''){
            alert('地址詳細是必填欄位!');
            return false;
        }

        if(!$('#invoice_chk').prop("checked")){
        	alert('請確認已閱讀活動辦法');
            return false;
        }
        return true;
    }

    function close_award_pop(){
        $('.share_pop').hide();
        $('.award_pop').hide();
        $('.pop_background').hide();
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
    <a id="fix_share" title="分享超KOH時刻，就有機會獲得泰國雙人假期" class="s_btn" onclick="get_share();">分享超KOH時刻，就有機會獲得泰國雙人假期</a>
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
        <p>感謝參與<br>祝您抽中超KOH大獎，連做夢都會ㄒㄧㄠˋ</p>
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
        <a title="關閉"></a>
    </div>
    <div class="msg_min">
        <div class="fb_msg">
        	<iframe id="fb_msg1" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FKohCoconut%2Fposts%2F811866428943621&width=500&show_text=true&appId=543797882389004&height=520" width="500" height="520" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        	<iframe id="fb_msg2" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FKohCoconut%2Fposts%2F802976773165920&width=500&show_text=true&appId=543797882389004&height=520" width="500" height="520" style="border:none;overflow:hidden;display: none;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        	<iframe id="fb_msg3" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FKohCoconut%2Fposts%2F808866192576978&width=500&show_text=true&appId=543797882389004&height=520" width="500" height="520" style="border:none;overflow:hidden;display: none;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>
        <div class="arrow">
            <a title="" class="left" onclick="changeFbMsg('left');">left</a>
            <a title="" class="right" onclick="changeFbMsg('right');">right</a>
            <div class="clearboth"></div>
        </div>
    </div>
    <div class="msg_bottom">
        <!-- <a title="" class="like">讚</a> -->
        <a title="" class="share" onclick="ajax_video();window.open('https://www.facebook.com/sharer/sharer.php?app_id=543797882389004&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FKohCoconut%2Fposts%2F811866428943621&display=popup&ref=plugin&src=share_button', '發布到 Facebook', config='height=670,width=670,top=150,left=500');">分享</a>
        
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
		        <h2>有ㄒㄧㄠˋ俱樂部</h2>
		        <div class="title02"></div>
		        <div class="title03"></div>
		        <div class="title04"></div>
		        <div class="title05">想與部長”KOH寶”一樣活力充沛嗎?<br>
		來有ㄒㄧㄠ\聚樂部就對了!</div>
		        <div class="share">
		            <a title="分享超KOH時刻，就有機會獲得泰國雙人假期" onclick="get_share();">分享超KOH時刻，就有機會獲得泰國雙人假期</a>
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
		                    <a title="【喝就ㄒㄧㄠˋ】登錄發票" class="nor01 op01" onclick="changeRule(1,1);">【喝就ㄒㄧㄠˋ】登錄發票</a>
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