	$(document).ready(function() {
		var vid1 = document.getElementById("video_box1"),vid2 = document.getElementById("video_box2"),vid3 = document.getElementById("video_box3");
		var video_cnt = 0;
		vid1.onloadstart = function() {
			video_cnt++;
		};
		
		vid2.onloadstart = function() {
			video_cnt++;
		};
		
		vid3.onloadstart = function() {
			video_cnt++;
		};
		chk_video_cnt();
		function chk_video_cnt(){
			if(video_cnt != 3){
				setTimeout(chk_video_cnt,1000);
				return false;
			}
			$('.loading').hide();
		}
		
		var small_man_rotate = 0;
		var now_page_name = '';
		$('#fullpage').fullpage({
			// anchors: ['firstPage', 'secondPage', '3rdPage'],
			// sectionsColor: ['#71cff4', '#fcc153', '#79c3d1', '#f2786f'],
			anchors: ['firstPage', 'secondPage', '3rdPage', '4rdPage', '5rdPage-1', '6rdPage-1'],
			scrollBar: false,
			afterLoad: function(anchorLink, index){
				if(anchorLink == '5rdPage-1' || (window.location.hash == '#5rdPage-1' && index != 5)){
					if(rule_menu != anchorLink.substring(anchorLink.length-1,anchorLink.length)){
						window.location.hash='#5rdPage-'+rule_menu;
					}
					
					if(anchorLink != '5rdPage-1'){
						setTimeout('$.fn.fullpage.moveTo(5);',250);
						setTimeout('changeRule(1,1);',450);
					}
				}
				
				if(window.location.hash == '#5rdPage-2' && index != 5){
					setTimeout('$.fn.fullpage.moveTo(5);',250);
					setTimeout('changeRule(2,1);',450);
				}
				
				if(window.location.hash == '#5rdPage-3' && index != 5){
					setTimeout('$.fn.fullpage.moveTo(5);',250);
					setTimeout('changeRule(3,1);',450);
				}
				

				if(anchorLink == '6rdPage-1' || (window.location.hash == '#6rdPage-1' && index != 6)){
					if(product != anchorLink.substring(anchorLink.length-1,anchorLink.length)){
						window.location.hash='#6rdPage-'+product;
					}
					
					if(anchorLink != '6rdPage-1'){
						setTimeout('$.fn.fullpage.moveTo(6);',250);
						setTimeout('changeProduct(1,true);',450);
					}
				}
				
				if(window.location.hash == '#6rdPage-2' && index != 6){
					setTimeout('$.fn.fullpage.moveTo(6);',250);
					setTimeout('changeProduct(2,true);',450);
				}
				
				if(window.location.hash == '#6rdPage-3' && index != 6){
					setTimeout('$.fn.fullpage.moveTo(6);',250);
					setTimeout('changeProduct(3,true);',450);
				}
				
				if(window.location.hash == '#6rdPage-4' && index != 6){
					setTimeout('$.fn.fullpage.moveTo(6);',250);
					setTimeout('changeProduct(4,true);',450);
				}
				
				
				$('.video_box').hide();
				$('.fix_btn').show();
				$('.index').show();
				$('.logo_btn a').attr('class','blue');
				$('.lt_menu').attr('class','lt_menu blue');
				$('.index .next_btn').hide();
				if(index == 1){
					trackEvent('首頁', 'PV', '首頁Index');
					$('#fix_share').hide();
					$('.logo_btn a').attr('class','');
					$('.lt_menu').attr('class','lt_menu');
					$('.index .next_btn').show();
					$('.video_box').show();
					setTimeout("$('.index .content .title01 h2').addClass( 'zoomIn animated' ).show();",400);
					setTimeout("$('.index .content .title02').addClass( 'rollIn animated' ).show();",500);
					setTimeout("$('.index .content .title03').addClass( 'bounceIn animated' ).show();",800);
					$('.index .content .title04').addClass( 'zoomIn animated' ).show();
					setTimeout("$('.index .content .title05').addClass( 'zoomIn animated' ).show();",1000);
					setTimeout("$('.index .content .title01 .share a').addClass( 'bounceIn animated' ).css({'display':'block'});",100);
					setTimeout("$('.index .content .title01 .share a').removeClass( 'bounceIn' ).css({'display':'block'});",700);
					
				}
				if(index == 2){
					trackEvent('次頁', 'PV', 'PC-瑜珈篇影片');
					setTimeout("$('.mov01 .content .object01').addClass( 'rotateInUpRight animated' ).show();",80);
					setTimeout("$('.mov01 .content .object02').addClass( 'rotateIn animated' ).show();",20);
					setTimeout("$('.mov01 .content .object04').addClass( 'fadeInRightBig animated' ).show();",50);
					$('.mov01 .content .object06').addClass( 'fadeInUpBig animated' ).show();
					$('.mov01 .content .object07').addClass( 'fadeInLeftBig animated' ).show();
				}
				if(index == 3){
					trackEvent('次頁', 'PV', 'PC-籃球篇影片');
					$('.mov02 .content .object01').addClass( 'fadeInLeftBig animated' ).show();
					setTimeout("$('.mov02 .content .object02').addClass( 'rotateInUpRight animated' ).show();",80);
					setTimeout("$('.mov02 .content .object06').addClass( 'rotateIn animated' ).show();",20);
					setTimeout("$('.mov02 .content .object04').addClass( 'fadeInRightBig animated' ).show();",50);
					$('.mov02 .content .object05').addClass( 'fadeInUpBig animated' ).show();
					setTimeout("$('.mov02 .content .object07').addClass( 'bounceIn animated' ).show();",800);
				}
				if(index == 4){
					trackEvent('次頁', 'PV', 'PC-喝酒篇影片');
					$('.mov03 .content .object01').addClass( 'fadeInLeftBig animated' ).show();
					$('.mov03 .content .kohbg08').addClass( 'fadeInLeftBig animated' ).show();
					setTimeout("$('.mov03 .content .object02').addClass( 'rotateInUpRight animated' ).show();",80);
					setTimeout("$('.mov03 .content .object03').addClass( 'rotateIn animated' ).show();",20);
					setTimeout("$('.mov03 .content .object06').addClass( 'fadeInLeftBig animated' ).show();",50);
					$('.mov03 .content .object07').addClass( 'fadeInUpBig animated' ).show();
					setTimeout("$('.mov03 .content .object04').addClass( 'bounceIn animated' ).show();",800);
				}
				if(index == 5){
					$('.logo_btn a').attr('class','');
					$('.lt_menu').attr('class','lt_menu');
					$('.rule_page .content .object01').addClass( 'bounceIn animated' ).show();
					$('.rule_page .content .object02').addClass( 'bounceIn animated' ).show();
					setTimeout("$('.rule_page .content .object03').addClass( 'rotateIn animated' ).show();",80);
					setTimeout("$('.rule_page .content .rule_cont').addClass( 'fadeInLeftBig animated' ).show();",400);
				}
				if(index == 6){
					$('.club_member .content .title h3').addClass( 'pamela_blow animated' ).show();
					setTimeout("$('.club_member .content .arrow_btn').addClass( 'fadeInRightBig animated' ).show();",400);
				}
				
				setTimeout('now_page_name = window.location.hash;',600);
			},
			onLeave: function(index,nextIndex,direction){
				if(nextIndex == 1 || nextIndex == 5){
					$('.logo_btn a').attr('class','');
					$('.lt_menu').attr('class','lt_menu');
				}else{
					$('.logo_btn a').attr('class','blue');
					$('.lt_menu').attr('class','lt_menu blue');
				}
				
				if(nextIndex <= 4){
					$('#fix_share').hide();
				}else{
					$('#fix_share').show();
				}
				
				//,.kohbg03,.kohbg05,.kohbg08,.kohbg09
				$('.kohbg01,.kohbg02,.kohbg04,.kohbg06,.kohbg07').animate({  borderSpacing: -300 }, {
				    step: function(now,fx) {
				    	var now_rot = 0;
				    	now_rot = ((-300 * small_man_rotate) % 360)+now;
				    	if(now == -300){
				    		small_man_rotate++;
				    	}
				        
				    	$(this).css('transform','rotate('+now_rot+'deg)');
				      },
				      duration:'slow'
				  },'linear');
			},
		});

		$('#moveDown').on('click', function(){
            $.fn.fullpage.moveSectionDown();
        });
		
		$('#fix_share, .index .share a').on('click', function(){
			$.fn.fullpage.moveTo(2);
		});

        $('#home').on('click', function(){
        	trackEvent('首頁', 'Click', 'PC-回首頁');
			$.fn.fullpage.moveTo(1);
		});

        $('#rule').on('click', function(){
        	trackEvent('首頁', 'Click', 'PC-活動辦法');
			$.fn.fullpage.moveTo(5);
		});

        $('#club').on('click', function(){
        	trackEvent('首頁', 'Click', 'PC-產品介紹');
        	$.fn.fullpage.moveTo(6);
		});

		$('#award').on('click', function(){
			return false;
			$('.pop_background').show();
	        $('.award_list').show();
	        trackEvent('次頁', 'PV', 'PC-得獎名單公布');
	        trackEvent('首頁', 'Click', 'PC-得獎名單');

	        $('.award_list .pop_top a').on('click',function(){
	            $('.pop_background').hide();
	            $('.award_list').hide();
	        });
		});

//		bg_position();
//		function bg_position(){
//			//$('body').removeClass( 'body_bg_gogo' );
//			//$('body').addClass( 'body_bg_gogo' );
//			//setTimeout(bg_position,5000)
//			/*$('body').animate({ 'background-position': 350 }, 5000, 'linear',
//				function(){
//					$('body').css('background-position', 0);
//					bg_position();
//				});*/
//		}

	});

	var now_event = '';
	var goit_id = 1;
	var rule_menu = 1, rule_item = 1;
	function changeRule(menu,item){
		if(rule_menu != menu || rule_item != item){
			if(rule_menu != menu){
				$('.rule_cont .menu01 .nor0'+menu).attr("class", "nor0"+menu+" op0"+menu);
				$('.rule_cont .menu01 .nor0'+rule_menu).attr("class", "nor0"+rule_menu);
			}
			
			if(rule_menu != menu){
				if(menu == 1){
					window.location.hash='#5rdPage-1';
					trackEvent('次頁', 'PV', 'PC-活動辦法-登入發票');
					trackEvent('次頁', 'Click', 'PC-活動辦法-登入發票點選');
				}else if(menu == 2){
					window.location.hash='#5rdPage-2';
					trackEvent('內容頁', 'PV', 'PC-活動辦法-分享超KOH時刻');
					trackEvent('內容頁', 'Click', 'PC-活動辦法-分享超KOH時刻點選');
				}else if(menu == 3){
					window.location.hash='#5rdPage-3';
					trackEvent('內容頁', 'PV', 'PC-活動辦法-其他說明');
					trackEvent('內容頁', 'Click', 'PC-活動辦法-其他說明點選');
				}
			}
			
			now_page_name = window.location.hash;


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
	function changeProduct(type,theOne){
		var old_s = 1,new_s = 2;
		if(theOne == true){
			old_s = product;
			product = new_s = type;
			type = 'next';
		}else if(type == 'next'){
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
		
		
		
		if(product == 1){
			window.location.hash='#6rdPage-1';
			trackEvent('次頁', 'PV', 'PC-產品介紹-椰子水');
		}else if(product == 2){
			window.location.hash='#6rdPage-2';
			trackEvent('內容頁', 'PV', 'PC-產品介紹-原味');
		}else if(product == 3){
			window.location.hash='#6rdPage-3';
			trackEvent('內容頁', 'PV', 'PC-產品介紹-哇沙米');
		}else if(product == 4){
			window.location.hash='#6rdPage-4';
			trackEvent('內容頁', 'PV', 'PC-產品介紹-巧克力');
		}
		now_page_name = window.location.hash;
		if(old_s == new_s){return false;}
            if(type == 'next'){
            	if(old_s == 1){
            		trackEvent('內容頁', 'Click', 'PC-產品介紹-原味(下一頁)');
            	}else if(old_s == 2){
            		trackEvent('內容頁', 'Click', 'PC-產品介紹-哇沙米(下一頁)');
            	}else if(old_s == 3){
            		trackEvent('內容頁', 'Click', 'PC-產品介紹-巧克力(下一頁)');
            	}
                $('.product0'+old_s).attr('style','right: 72px;');
            	$('.product0'+old_s).animate({"right": '+=830'});
                $('.product0'+new_s).attr('style','right: -706px;');
                $('.product0'+new_s).animate({"right": '+=742'});
            }else{
                $('.product0'+old_s).attr('style','right: 0px;');
                $('.product0'+old_s).animate({"right": '-=830'});
                $('.product0'+new_s).attr('style','right: 742px;');
                $('.product0'+new_s).animate({"right": '-=706'});
            }
    }

	var fb_msg = 1;
	function changeFbMsg(type,page){
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
		
		if(type == 'goit'){
			now_msg = page;
		}

		window.location.hash='#fbmsg-'+now_msg;

        var iframe = document.getElementById('fb_msg'+fb_msg);
        iframe.src = iframe.src;

		if(now_msg == 1){
			trackEvent('內容頁', 'PV', 'PC-瑜珈篇影片觀看頁');

		}else if(now_msg == 2){
			trackEvent('內容頁', 'PV', 'PC-籃球篇影片觀看頁');

		}else if(now_msg == 3){
			trackEvent('內容頁', 'PV', 'PC-喝酒篇影片觀看頁');

		}
		
		$('#fb_msg1, #fb_msg2, #fb_msg3').hide();
		$('#fb_msg'+now_msg).show();
		fb_msg = now_msg;
	}

	var invo_item = 1;
    function get_invoice(){

        if(fb_id == ''){
        	if(!get_facebook()){
        		now_event = 'get_invoice';
            	//alert('Facebook 未正確登入!');
            	return false;
        	}
        }

        trackEvent('內容頁', 'PV', 'PC-發票登入');
        trackEvent('首頁', 'Click', 'PC-登入發票');

        u_data = ajax_user_invoice();
		window.location.hash='#invoice';
        
        $('#twzipcode').twzipcode({
        	'css': ['county', 'district', 'zipcode'],
        	'countyName'   : 'invoice_county',
            'districtName' : 'invoice_district',
            'zipcodeName'  : 'invoice_zipcode'
        });
        $('.pop_background').show();
        $('.invo_pop').addClass( 'fadeIn animated' ).show();
        setTimeout("$('.invo_pop').removeClass( 'fadeIn animated' );",400);
        

        $('.invo_pop .login').on('click',function(){
            $('.pop_background').hide();
            $('.invo_pop').addClass( 'fadeOut animated' );
            setTimeout("$('.invo_pop').removeClass( 'fadeOut animated' ).hide();",400);
            window.location.hash = now_page_name;
        });

        $('.add_invo').on('click', function(){
            if(invo_item < 5){
            	$('#invoice_box').append('<li class="add_invo"> <input id="invoice_num'+invo_item+'" name="invoice_num[]" type="text" value="" class="t_box"> </li>');
            	invo_item++;
            }
        });
    }

    function get_share(id){
        if(fb_id == ''){
        	if(!get_facebook()){
            	now_event = 'get_share';
            	goit_id = id;
            	return false;
        	}
        }
        
        if(id != fb_msg){
        	changeFbMsg('goit',id);
        }
        

        var iframe = document.getElementById('fb_msg'+id);
        iframe.src = iframe.src;
        
        $('.pop_background').show();
		window.location.hash='#fbmsg-'+fb_msg;
        
		trackEvent('內容頁', 'PV', 'PC-瑜珈篇影片觀看頁');
		trackEvent('首頁', 'Click', 'PC-分享超KOH時刻');

        $('.koh_msg').addClass( 'fadeIn animated' ).show();
        setTimeout("$('.koh_msg').removeClass( 'fadeIn animated' );",400);

        $('.koh_msg .msg_top a').on('click',function(){
            iframe.src = iframe.src;
            $('.pop_background').hide();
            $('.koh_msg').addClass( 'fadeOut animated' );
            setTimeout("$('.koh_msg').removeClass( 'fadeOut animated' ).hide();",400);
            window.location.hash = now_page_name;
        });
        
    }
    
    //var fb_id = "1582921411";
    //var fb_name = "pamela";
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
    				FB.login(function(response) {
				      if (response.authResponse) {
				       FB.api('/me', function(response) {
				           ajax_facebook(response.id, response.name);
					       return true;
				       });
				      }else{
							console.log('登入gg!');
					        return false;
				      }
    				});
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
						get_share(goit_id);
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
//                alert('3'+xhr.status); 
//                alert(thrownError); 
            }
        });
    }

    function ajax_invoice(){

    	trackEvent('內容頁', 'Click', 'PC-發票確認送出');
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

    	$('.pop_bottom a').hide();

    	$.ajax({
            url: 'ajax.php?mod=invoice',
            data: $('#invoice_form').serialize(),
            type:"POST",
            dataType: 'json',
            success: function(response){
				if(response.s == '1'){
					$('.invo_pop').hide();
					trackEvent('內容頁', 'PV', 'PC-發票登入成功');
					trackEvent('內容頁', 'Click', 'PC-發票成功送出');
					$('.award_pop').show();
					$('.pop_bottom a').show();
		            window.location.hash = now_page_name;
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
                alert('1'+xhr.status); 
                alert(thrownError); 
                $('.pop_bottom a').show();
            }
        });
    	
    }

    function ajax_video(){

    	if(fb_msg == 1){
    		trackEvent('內容頁', 'Click', 'PC-瑜珈篇影片分享');
    	}else if(fb_msg == 2){
    		trackEvent('內容頁', 'Click', 'PC-籃球篇影片分享');
    	}else if(fb_msg == 3){
    		trackEvent('內容頁', 'Click', 'PC-喝酒篇影片分享');
    	}
    	

    	
    	if(fb_id == ''){
        	if(!get_facebook()){
            	alert('Facebook 未正確登入!');
            	return false;
        	}
        }
    	
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
		            window.location.hash = now_page_name;
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
                alert('2'+xhr.status); 
                alert(thrownError); 
                $('.koh_msg .msg_bottom a.share').show();
            }
        });
    }
    
    function ajax_user_invoice(){
    	if(fb_id == ''){
        	if(!get_facebook()){
            	alert('Facebook 未正確登入!');
            	return false;
        	}
        }
    	

    	$.ajax({
            url: 'ajax.php?mod=get_user',
            data: 'fb_id=' + fb_id ,
            type:"POST",
            dataType: 'json',
            success: function(response){
				if(response.s == '1'){
					$('#invoice_name').val(response.msg.name);
					//$('#invoice_sex').val(response.msg.name);
					$('#invoice_age').val(response.msg.age);
					$('#invoice_tel').val(response.msg.tel);
					$('input[name=invoice_sex][value="'+response.msg.sex+'"]').attr('checked',true);
					$('input[name=invoice_zipcode]').val(response.msg.addr[0]).trigger( "change" );
					$('select[name=invoice_county]').val(response.msg.addr[1]).trigger( "change" );
					$('select[name=invoice_district]').val(response.msg.addr[2]).trigger( "change" );
					$('#invoice_addr').val(response.msg.addr[3]);
					return response;
				}else{
		        	return false;
				}
            },
            error:function(xhr, ajaxOptions, thrownError){ 
                alert('4'+xhr.status); 
                alert(thrownError); 
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
    
    
    function share_mag(){
    	if(fb_msg == 1){
    		trackEvent('內容頁', 'Click', 'PC-瑜珈篇-影片分享');
    		window.open('https://www.facebook.com/sharer/sharer.php?app_id=1011014942321040&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841581602638770%2F&display=popup&ref=plugin&src=share_button', '發布到 Facebook', config='height=670,width=670,top=150,left=500');
    	}
    	
    	if(fb_msg == 2){
    		trackEvent('內容頁', 'Click', 'PC-籃球篇-影片分享');
    		window.open('https://www.facebook.com/sharer/sharer.php?app_id=1011014942321040&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580432638887%2F&display=popup&ref=plugin&src=share_button', '發布到 Facebook', config='height=670,width=670,top=150,left=500');
        	}
    	
    	if(fb_msg == 3){
    		trackEvent('內容頁', 'Click', 'PC-喝酒篇-影片分享');
    		window.open('https://www.facebook.com/sharer/sharer.php?app_id=1011014942321040&sdk=joey&u=https%3A%2F%2Fwww.facebook.com%2FadidasRunningTW%2Fvideos%2F841580969305500%2F&display=popup&ref=plugin&src=share_button', '發布到 Facebook', config='height=670,width=670,top=150,left=500');
        }
    }
    
    