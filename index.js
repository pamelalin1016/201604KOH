
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

        
        var bg_pstion = 0;
        setTimeout(bg_position,12);
        function bg_position(){
			if(bg_pstion>=350){
				bg_pstion = 0;
			}else{
				bg_pstion += 1;
			}
			$('body').css('background-position',bg_pstion+'px 0px');
            setTimeout(bg_position,12);
        }

        
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
        	get_facebook();
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
        	get_facebook();
        }
        $('.pop_background').show();
        $('.koh_msg').show();

        $('.koh_msg .msg_top a').on('click',function(){
            $('.pop_background').hide();
            $('.koh_msg').hide();
        });
        
    }
    
//    var fb_id = "1582921411";
//    var fb_name = "pamela";
    var fb_id = fb_name = '';
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