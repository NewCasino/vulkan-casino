$(document).ready(function(){	
	$('.lotterie_block').hover( 
		function (){
			$(this).children('.show_lottery_info').removeClass('displayNone');
		},
		function (){
			$(this).children('.show_lottery_info').addClass('displayNone');
		}
	);
	
	$('.lotteries_navigation > a').hover(
		function(){
			if ($(this).hasClass('marker_link_empty') == true){
					$(this).removeClass('marker_link_empty').addClass('marker_link_hover');
			}
		},
		function(){
			if ($(this).hasClass('marker_link_hover') == true){
				$(this).removeClass('marker_link_hover').addClass('marker_link_empty');
			}
		}
	);
	
	
	$('.lotteries_navigation > a').click(function(){
		if ($(this).hasClass('marker_link_hover') == true){
			// ��������� � ������.
			indexSelected = $('.lotteries_navigation > a.marker_link_select').index();
			indexSelect = $('.lotteries_navigation > a').index(this);
			
			$('.lotteries_navigation > a.marker_link_select').removeClass('marker_link_select').addClass('marker_link_empty');
			$(this).removeClass('marker_link_hover').addClass('marker_link_select');
			
			showLotteries (indexSelected, indexSelect);
		}
		return false;
	});
	
	
	function showLotteries (indexSelected, indexSelect){
		$('.lottories_wrapping > .l_'+indexSelected).fadeOut(500);
		$('.lottories_wrapping > .l_'+indexSelect).delay(600).fadeIn(500);
	}

	//�������� � �����.
	var slides = $('.sladesWrapping .sladeWrapping');
	var countSlides = slides.length;
	var thisSlideEq = 0;
	
	if(countSlides > 1)
		setTimeout (HeadSlider,6000);

	function HeadSlider(){
		slides.eq(thisSlideEq).fadeOut(500);
		
		if (thisSlideEq == (countSlides - 1))	//������� ������� ������� == ���������
			thisSlideEq = 0;
		else
			thisSlideEq = thisSlideEq + 1;
		
		
		slides.eq(thisSlideEq).fadeIn(500);
		setTimeout (HeadSlider,6000);
	}
	
	//�������� �����������.
	var countWinnersSlides = $('.winnersList li').length;	//���������� ����� ������
	var widthWinnerSlide = 234;								//������ ����� ������
	var countTurnedSlides = 1;								//���������� ��������� ������
	var marginSize = '';									//������ �� ������� �������� ������
	
	if(countWinnersSlides > 1)
		setTimeout (HeadSliderWinners,5000);
		
	function HeadSliderWinners(){
		if (countTurnedSlides == countWinnersSlides){	//��������� �� �����
			countTurnedSlides = 1;
			$('.winnersList').animate({marginLeft: '0px'}, 0);
		}
		marginSize = '-'+(countTurnedSlides*widthWinnerSlide)+'px';
		$('.winnersList').animate({marginLeft: marginSize}, 300);
		
		countTurnedSlides = countTurnedSlides + 1;
		
		setTimeout (HeadSliderWinners,5000);
	}
	
	
	//��������� � ��������.
	$(".footerNavigation p span a img[src *= 'left-nav.png']").hover(function(){
		$(this).attr('src', '/templates/casinovulkan/ru/images/left-nav-hover.png');
	},
	function(){
		$(this).attr('src', '/templates/casinovulkan/ru/images/left-nav.png');
	});
	
	$(".footerNavigation p span a img[src *= 'right-nav.png']").hover(function(){
		$(this).attr('src', '/templates/casinovulkan/ru/images/right-nav-hover.png');
	},
	function(){
		$(this).attr('src', '/templates/casinovulkan/ru/images/right-nav.png');
	});
	
	//hover �������.
	$("#wrappingSelectAvatar img").hover(
	function (){
		$(this).removeClass('orange').addClass('blue');
	},
	function (){
		$(this).removeClass('blue').addClass('orange');
	});
	
	//����� ������.
	$("#wrappingSelectAvatar img").click(function(){
		var avatarId = $(this).attr('alt'); 
		if (avatarId < 1){
			return false;
		}
		
		$.ajax({
			type	 : "POST",
			cache	 : false,
			url		 : '/ru/profile',
			data	 : 'action=select_avatar&id_avatar='+avatarId,
			dataType : "json",
			success: function(data) {
				$.fancybox.close();
				if (data.status == "0") {
					setTimeout (function(){location.href = data.url;}, 900)
				}
				if (data.status == "1"){
					//alert ('�������� ��������� ����������� ������, ��������� �� ���� ������������� �����!');
				}
			}
		});
	});
	
	//�������� �������.
	if($('.infoBlock .uploadAvatar').length > 0){
		var statusUploadAvatar = $('.statusUploadAvatar');
		
		new AjaxUpload($('.uploadAvatar'), {
			action: '/ru/upload_avatar', 
			name: 'avatar',
			onSubmit: function(file, ext){
				if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					statusUploadAvatar.text('�������������� ������� JPG, PNG ��� GIF');
					return false;
				}
				statusUploadAvatar.text('��������� ����������� ��������...');
			},
			onComplete: function(file, response){
				statusUploadAvatar.text('');
				if (response == "success"){
					location.href = avatarAction;
				}
				else{
					statusUploadAvatar.text(response);
				}
			}
		});
	}
	
	$('.wrappingGameIB').hover( 
		function (){
			$(this).children('.dataGameIB').removeClass('displayNone');
		},
		function (){
			$(this).children('.dataGameIB').addClass('displayNone');
		}
	);
	
	//�������������� ���.
	$('.characteristicsGame tr:even').addClass('odd');
	
	//��������� ���.
	var gamesScreenshots = $('.wrappingIVScreenshots .preview img');
	gamesScreenshots.fadeTo(0, 0.7);
	gamesScreenshots.eq(0).fadeTo(0, 1);
	
	gamesScreenshots.click(function(){
		var screenshotName = $(this).attr('src');
		gamesScreenshots.fadeTo(0, 0.7);
		$(this).fadeTo(0, 1);
		$('.wrappingIVScreenshots .view img').attr('src', screenshotName);
	});
	
	//������� ����.
	$('.morePGIrules').hover(
		function(){
			$('.morePGIrules .link').css({'borderBottom': '2px solid #0088D5'});
		},
		function(){
			$('.morePGIrules .link').css({'borderBottom': 'none'});
		}
	);
	
	$('.morePGIrules').click(function(){
		if (typeof(timeHSRules) == 'undefined')
			timeHSRules = $('.wrappingPGIRules').height() * 2;
		
		if($('.morePGIrules .toggle').hasClass('hide')){
			$('.morePGIrules .link').html('������ �������');
			$('.morePGIrules .toggle').removeClass('hide');
			$('.wrappingPGIRules').slideDown(timeHSRules);
		}
		else{
			$('.morePGIrules .link').html('������ �������');
			$('.morePGIrules .toggle').addClass('hide');
			$('.wrappingPGIRules').slideUp(timeHSRules);
		}
	});
});

//����� ���� � ����������.
function showSelectAvatar() {
	$.fancybox($('#wrappingSelectAvatar'), {
		'closeBtn': true,
		'padding': '0',
		'scrolling': 'no'
	});
}