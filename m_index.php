<?php 
ini_set('display_errors', '0');

if($_GET['fb_login']){
    define('SET_SETTING_FILE', './');
    
    // Configuration
    if (require("config.php")) {
        require("config.php");
    }
    
    require_once(DIR_TO.'library/facebook/facebook.php');
    
    $long_id = 0;
    $fb = new Facebook(
        array(
            'appId'  	=> '1011014942321040',//$appId,
            'secret' 	=> 'e13f01f5b24f71abf22e48407ca4d650',//$secret,
        )
        );
    
    # Get User ID
    $user = $fb->getUser();
    $long_id = $user;
    
    if(empty($user) || !preg_match('/^[1-9][0-9]*$/', $user) || $_GET['login'] != '1'){
        $_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'].( strpos($_SERVER['REQUEST_URI'],'?')?'&':'?' ).'login=1';
        $fb->destroySession();
        $loginUrl = $fb->getLoginUrl(array('scope' => 'email')) . '&display=popup';
        header('Location: '.$loginUrl);
        exit;
    }
    
    
    
    
    $result = $fb->api("/me","GET");
    $fb_gender=$result['gender'];//抓出性別
    $fb_name=$result['name'];//抓出名字
    $email = $result['email'];
    
    $result = $fb->api("/me/ids_for_business","GET");
}

require_once 'm_header.php';
?>

<script>
$(document).ready(function() {
	$('.loading').hide();
	var now_page_name = '';

	$('#fullpage').fullpage({
		scrollBar: false,
		anchors: ['firstPage', 'secondPage', '3rdPage', '4rdPage'],
		afterLoad: function(anchorLink, index){
			$('.fix_btn').show();
			if(index == 1){
				$('.topbtn').hide();
				$('.logo a img').attr('src','m_images/logo_w.png');
				trackEvent('首頁', 'PV', '首頁Index');
				
			}

			if(index == 2){
				trackEvent('次頁', 'PV', 'MB-瑜珈篇影片');
			}

			if(index == 3){
				trackEvent('次頁', 'PV', 'MB-籃球篇影片');
			}

			if(index == 4){
				trackEvent('次頁', 'PV', 'MB-喝酒篇影片');
			}
			setTimeout('now_page_name = window.location.hash;',600);
		},
		onLeave: function(index,nextIndex,direction){
			if(nextIndex == 1){
				$('.topbtn').hide();
				$('.logo a img').attr('src','m_images/logo_w.png');
				
			}else{

				$('.topbtn').show();
				$('.logo a img').attr('src','m_images/logo_b.png');
			}
			
		},
	});

	$('#moveDown').on('click', function(){
        $.fn.fullpage.moveSectionDown();
    });


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


    $('.content .object01').on('click',function(){
    	get_share();
    });
});


var now_event = '';
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

	if(now_msg == 1)
	trackEvent('內容頁', 'PV', 'MB-瑜珈篇影片觀看頁');
	if(now_msg == 2)
	trackEvent('內容頁', 'PV', 'MB-籃球篇影片觀看頁');
	if(now_msg == 3)
	trackEvent('內容頁', 'PV', 'MB-喝酒篇影片觀看頁');

	$('#fb_msg1, #fb_msg2, #fb_msg3').hide();
	$('#fb_msg'+now_msg).show();
	fb_msg = now_msg;
}

var invo_item = 1;
function get_invoice(){
	trackEvent('首頁', 'Click', 'MB-登入發票');
	
    
	if(fb_id == ''){
    	if(!get_facebook()){
    		now_event = 'get_invoice';
        	//alert('Facebook 未正確登入!');
        	return false;
    	}
    }
    
    trackEvent('內容頁', 'PV', 'MB-發票登入');
    
    $('.invo').show();
	window.location.hash='#invoice';
	
    $('#twzipcode').twzipcode({
    	'css': ['county', 'district', 'zipcode'],
    	'countyName'   : 'invoice_county',
        'districtName' : 'invoice_district',
        'zipcodeName'  : 'invoice_zipcode'
    });

    $('.invo .invo_top .exit').on('click',function(){
    	$('.invo').hide();
    	window.location.hash = now_page_name;
    });

    $('.add_in').on('click', function(){
        if(invo_item < 5){
        	$('#invoice_box').append('<li class="add_invo"> <input id="invoice_num'+invo_item+'" name="invoice_num[]" type="text" value="" class="t_box"> </li>');
        	invo_item++;
        }
    });
}



function get_share(){
    if(fb_id == ''){
    	if(!get_facebook()){
        	now_event = 'get_share';
        	return false;
    	}
    }

    $('.koh_msg').show();
    trackEvent('內容頁', 'PV', 'MB-瑜珈篇影片觀看頁');
    $('.koh_msg .msg_top .exit').on('click',function(){
        $('.koh_msg').hide();
    });
    
}

// var fb_id = "1582921411";
// var fb_name = "pamela";
var fb_id = fb_name = '';
function get_facebook(){

	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '1011014942321040',
	      xfbml      : true,
	      version    : 'v2.6'
	    });
	    
	    FB.getLoginStatus(function(response) {
	    	  if (response.status === 'connected') {
	    	    FB.api('/me', function(response) {
			        ajax_facebook(response.id, response.name);
			        return true;
			    });
	    	  }
	    	  else {
	    		window.location.href='index.php?fb_login=1';
				/*FB.login(function(response) {
				    alert(4);
			      if (response.authResponse) {
					    alert(5);
			       FB.api('/me', function(response) {
					    alert(6);
			           ajax_facebook(response.id, response.name);
				       return true;
			       });
			      }else{
						console.log('登入gg!');
				        return false;
			      }
				});*/
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
				
				if(now_event == 'get_invoice'){
					get_invoice();
				}
				
				if(now_event == 'get_share'){
					get_share();
				}
			}else{
				alert('登入失敗請重新再登入一次!');
				window.location.reload();
				window.location.reload();
				window.location.reload();
	        	return false;
			}
		},
        error:function(xhr, ajaxOptions, thrownError){ 
//             alert(xhr.status); 
//             alert(thrownError); 
        }
    });
}

function ajax_invoice(){
	if(fb_id == ''){
    	if(!get_facebook()){
        	alert('Facebook 未正確登入!');
        	return false;
    	}
    }
	
	if(!check_form_invoice()){
    	return false;
	}

	$('#invoice_fb_id').val(fb_id);

	$('.invo_min .enter a').hide();

	$.ajax({
        url: 'ajax.php?mod=invoice',
        data: $('#invoice_form').serialize(),
        type:"POST",
        dataType: 'json',
        success: function(response){
			if(response.s == '1'){
				$('.invo').hide();
				$('.award').show();
				trackEvent('內容頁', 'PV', 'MB-發票登入成功');
				trackEvent('內容頁', 'Click', 'MB-發票成功送出');

				$('.invo_min .enter a').show();
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
            $('.invo_min .enter a').show();
        }
    });
	
}

function ajax_video(){

	if(fb_id == ''){
    	if(!get_facebook()){
        	alert('Facebook 未正確登入!');
        	return false;
    	}
    }
    $('.koh_msg .msg_bottom a.share').hide();

    if(fb_msg == 1)
    trackEvent('內容頁', 'Click', 'MB-瑜珈篇影片分享');
    if(fb_msg == 2)
    trackEvent('內容頁', 'Click', 'MB-籃球篇影片分享');
    if(fb_msg == 3)
    trackEvent('內容頁', 'Click', 'MB-喝酒篇影片分享');

    
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

	//window.open('https://www.facebook.com/sharer/sharer.php?app_id=1011014942321040&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FKohCoconut%2Fposts%2F811866428943621&display=popup&ref=plugin&src=share_button', '發布到 Facebook');
	

	if(fb_msg == 1){
		trackEvent('內容頁', 'Click', 'MB-瑜珈篇-影片分享');
		window.open('https://www.facebook.com/sharer/sharer.php?app_id=1011014942321040&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841581602638770%2F&display=popup&ref=plugin&src=share_button', '發布到 Facebook');
	}
	
	if(fb_msg == 2){
		trackEvent('內容頁', 'Click', 'MB-籃球篇-影片分享');
		window.open('https://www.facebook.com/sharer/sharer.php?app_id=1011014942321040&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580432638887%2F&display=popup&ref=plugin&src=share_button', '發布到 Facebook');
    }
	
	if(fb_msg == 3){
		trackEvent('內容頁', 'Click', 'MB-喝酒篇-影片分享');
		window.open('https://www.facebook.com/sharer/sharer.php?app_id=1011014942321040&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580969305500%2F&display=popup&ref=plugin&src=share_button', '發布到 Facebook');
    }
	$('.koh_msg').hide();
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
    $('.award').hide();
}

</script>

    

<div id="fullpage">
	<div class="section">
        <!--index-->
        <div class="index">
            <div class="content">
                <div class="title01">
                    <h2>
                        <img src="m_images/index_04.gif" alt="有ㄒㄧㄠˋ俱樂部">
                    </h2>
                    <img src="m_images/m_index01.png">
                </div>
                 <a title="登錄發票泰國雙人遊等你來拿" class="invoice_btn" onclick="get_invoice();">
                    <img src="m_images/invo_btn.png">
                </a>
                <a title="KOH時刻，立即見 ㄒㄧㄠˋ" class="next_btn" id="moveDown">KOH時刻，立即見 <b class="svgword"><img src="images/word.svg"></b></a>
            </div>
        </div>
        <!--index_end-->
    </div>
    <div class="section">
    	<!--mov01-->
        <div class="mov01">
            <div class="content">
                <h3 class="object01" onclick="trackEvent('次頁', 'Click', 'MB-瑜珈篇影片觀看');">
                    <img src="m_images/m_mov01.png">
                </h3>
                <div class="object02">
                    <img src="m_images/mov01_cnt03.gif">
                </div>
            </div>
        </div>
        <!--mov01_end-->
    </div>
    <div class="section">
    	<!--mov02-->
        <div class="mov02">
            <div class="content">
                <h3 class="object01" onclick="trackEvent('內容頁', 'PV', 'MB-籃球篇影片觀看頁');trackEvent('次頁', 'Click', 'MB-籃球篇影片觀看');">
                    <img src="m_images/m_mov02.png">
                </h3>
                <div class="object02">
                    <img src="m_images/mov02_cnt01.gif">
                </div>
            </div>
        </div>
        <!--mov02_end-->
    </div>
    <div class="section">
    	<!--mov03-->
        <div class="mov03">
            <div class="content">
                <h3 class="object01" onclick="trackEvent('內容頁', 'PV', 'MB-喝酒篇影片觀看頁');trackEvent('次頁', 'Click', 'MB-喝酒篇影片觀看');">
                    <img src="m_images/m_mov03.png">
                </h3>
                <div class="object02">
                    <img src="m_images/mov03_cnt03.gif">
                </div>
            </div>
        </div>
        <!--mov01_end-->
    </div>
</div>

<!-- topbtn -->
<div class="topbtn" style="display:none;">
    <div class="content">
        <div class="object03">
            <a title="登錄發票泰國雙人遊等你來拿" onclick="get_invoice();">
                <img src="m_images/invo_btn.png">
            </a>
        </div>
    </div>
</div>
<!-- topbtn_end -->






    
<!--登錄發票-->
<div class="invo" style="display:none;">
    <div class="invo_top">
    	<a class="exit">
            <img src="m_images/invoice_02.png">
        </a>
        <h3>
            <img src="m_images/m_invo01.png">
        </h3>
        <p>活動期間內不限通路購買KOH COCONUT酷椰嶼椰子汁或香椰脆片任一產品
            之發票(發票上需有「 KOH COCONUT 」商品)，登錄發票並填寫資料，即可獲得抽獎機會！
            <br>※發票日期須為2016/05/09～2016/06/08內，期間外則無效
            <br>※每人不限登錄一張發票，登錄越多，中獎機率越高
            <br>※不分獎項，每人僅限得獎一次
        </p>
    </div>
    <form id="invoice_form" action="" method="post">
    <input type="hidden" id="invoice_fb_id" name="invoice_fb_id" />
    <div class="invo_min">
        <ul id="invoice_box">
            <li class="normal">
                發票編號<br>
                <input id="invoice_num0" name="invoice_num[]" type="text" value="" class="t_box">
                <a title="新增" class="add_in">新增</a>
            </li>
        </ul>
        <ul>
            <li class="add_invo">
                <em class="tip">KOH寶叮寧：點選+號一次最多登入5張發票編號。</em>
            </li>
            <li class="add_inf">
                <span>姓名</span><br>
                <input id="invoice_name" name="invoice_name" type="text" value="" class="t_box">
            </li>
            <li class="add_inf">
                <span>性別</span>
                <input id="invoice_sex0" name="invoice_sex" type="radio" value="0" class="checkbox" checked="checked">女
                <input id="invoice_sex1" name="invoice_sex" type="radio" value="1" class="checkbox">男
            </li>
            <li class="add_inf">
                <span>年齡</span><br>
                <input id="invoice_age" name="invoice_age" type="text" value="" class="t_box">
            </li>
            <li class="add_inf">
                <span>電話</span><br>
                <input id="invoice_tel" name="invoice_tel" type="text" value="" class="t_box">
            </li>
            <li class="add_inf add">
                <span>通訊地址</span><br>
                <span id="twzipcode"></span>
            </li>
            <li class="add_inf inf">
                <input id="invoice_addr" name="invoice_addr" type="text" value="" class="t_box a_box">
            </li>
            <li class="agree">
                <input id="invoice_chk" name="invoice_chk" type="checkbox" value="">
                <label for="invoice_chk">我已閱讀過活動辦法，並同意主辦單位運用此資料進行贈獎事宜聯繫</label>
            </li>
            <li class="enter">
                <a title="確認送出" onclick="ajax_invoice();trackEvent('內容頁', 'Click', 'MB-發票確認送出');">確認送出</a>
            </li>
        </ul>
    </div>
    </form>
</div>
<!--登錄發票_end-->

<!--獲得抽獎資格-->
<div class="award" style="display:none;">
    <div class="award_top">
        <h3><img src="m_images/m_invo01.png"></h3>
    </div>
    <div class="award_min">
        <h4>
            <img src="m_images/invoice_06.png">
        </h4>
        <p>感謝參與<br>祝您抽中超KOH大獎，連做夢都會<b class="svgword"><img src="images/word.svg"></b></p>
        <a title="" onclick="close_award_pop();">確定</a>
    </div>
</div>
<!--獲得抽獎資格_end-->

<!--超KOH時刻留言分享-->
<div class="koh_msg" style="display:none;">
    <div class="msg_top">
    	<a class="exit">
            <img src="m_images/invoice_02.png">
        </a>
        <h3>
            <img src="m_images/m_share01.png">
        </h3>
    </div>
    <div class="msg_min">
        <iframe id="fb_msg1" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841581602638770%2F&width=500&show_text=true&appId=1011014942321040&height=520" width="100%" height="520" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        <iframe id="fb_msg2" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580432638887%2F&width=500&show_text=true&appId=1011014942321040&height=520" width="100%" height="520" style="border:none;overflow:hidden;display: none;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        <iframe id="fb_msg3" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580969305500%2F&width=500&show_text=true&appId=1011014942321040&height=520" width="100%" height="520" style="border:none;overflow:hidden;display: none;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>
    <div class="msg_bottom">
        <div class="fb">
            <a title="" class="share" onclick="ajax_video();share_mag();">分享</a>
<!--             <a href="" title="" class="like">讚</a> -->
            <div class="clearboth"></div>
        </div>
            <a onclick="changeFbMsg('left');" title="" class="left"></a>
            <a onclick="changeFbMsg('right');" title="" class="right"></a>
            <div class="clearboth"></div>
    </div>
</div>
<!--超KOH時刻留言分享_end-->

<!--恭喜分享成功-->
<div class="share_pop" style="display:none;">
    <div class="pop_top">
        <h3>
            <img src="m_images/m_share01.png">
        </h3>
    </div>
    <div class="pop_min">
        <h4>
            <img src="m_images/msg_06.png">
        </h4>
        <p>感謝參與<br>祝您抽中超KOH大獎，連做夢都會<b class="svgword"><img src="images/word.svg"></b></p>
        <a title="" onclick="close_award_pop();">確定</a>
    </div>
</div>
<!--恭喜分享成功_end-->

<!--固定式按鈕--> 
<?php require_once 'm_menu.php';?>
<!--固定式按鈕_end--> 
</body>
</html>