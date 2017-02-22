$(function(){
//Малые рисунки.
var dirImagesSmall = '../../img/lotteries/small/';
var statusSmall=$('#statussmall');

//Большие рисунки.
var dirImagesBig = '../../img/lotteries/big/';
var statusBig=$('#statusbig');	

//Создание кнопки загрузки маленьких рисунков.
new AjaxUpload($('#uploadsmall'), {
	action: '/acp/acp_admin/admin_lotteries.php?mode=add_img&type=small', 
	name: 'img',
	onSubmit: function(file, ext){
		 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
			statusSmall.text('Поддерживаемые форматы JPG, PNG или GIF');
			return false;
		}
		statusSmall.text('Загрузка...');
	},
	onComplete: function(file, response){
		statusSmall.text('');
		if(response!="error"){
			$('<li></li>').prependTo('#filessmall').html('<div class="gray"><img src="'+dirImagesSmall+response+'" alt="'+response+'" /></div>'+response+' <a href="#" style="color: red;">Del</a>');
			
			//Вызов выбора маленького рисунка.
			$('#filessmall li div.gray').click(function(){
				selectImg(this, 'small');
			});
			
			//Вызов удаления малого рисунка
			$('#filessmall li a').click(function(){
				deleteImg(this, 'small');
			});
		} else{
			$('<li></li>').prependTo('#filessmall').text('Файл не загружен' + file).addClass('error');
		}
	}
});

//Создание кнопки загрузки больших рисунков.
new AjaxUpload($('#uploadbig'), {
	action: '/acp/acp_admin/admin_lotteries.php?mode=add_img&type=big', 
	name: 'img',
	onSubmit: function(file, ext){
		 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
			statusBig.text('Поддерживаемые форматы JPG, PNG или GIF');
			return false;
		}
		statusBig.text('Загрузка...');
	},
	onComplete: function(file, response){
		statusBig.text('');
		if(response!="error"){
			$('<li></li>').prependTo('#filesbig').html('<div class="gray"><img src="'+dirImagesBig+response+'" alt="'+response+'" /></div>'+response+' <a href="#" style="color: red;">Del</a>');
			
			//Вызов выбора большого рисунка.
			$('#filesbig li div.gray').click(function(){
				selectImg(this, 'big');
			});
			
			//Вызов удаления большого рисунка.
			$('#filesbig li a').click(function(){
				deleteImg(this, 'big');
			});
		} else{
			$('<li></li>').prependTo('#filesbig').text('Файл не загружен' + file).addClass('error');
		}
	}
});

//Вызов выбора маленького рисунка.
$('#filessmall li div.gray').click(function(){
	selectImg(this, 'small');
});

//Вызов выбора большого рисунка.
$('#filesbig li div.gray').click(function(){
	selectImg(this, 'big');
});
	
//Выбор рисунка по клику.
function selectImg (selectElement, type){
	$('#status'+type+'').text('');
	
	$('#files'+type+' li div.blue').removeClass('blue').addClass('gray');
	$(selectElement).removeClass('gray').addClass('blue');
	
	var selectImgName = $.trim($('img', selectElement).attr('alt'));
	$('#'+type+'_img').val(selectImgName);
	
	$('.preview'+type+'').html('<img alt="'+selectImgName+'" src="../../img/lotteries/'+type+'/'+selectImgName+'">');
	
	//Активировать чекбокс.
	if (type == 'big')
		$('[name=need_big]').not(':checked').attr('checked',true);
}
	
//Вызов удаления малого рисунка.
$('#filessmall li a').click(function(){
	deleteImg(this, 'small');
});

//Вызов удаления большого рисунка.
$('#filesbig li a').click(function(){
	deleteImg(this, 'big');
});
	
//Удаление малого рисунка.
function deleteImg(aSelect, type){
	$('#status'+type+'').text('');
	
	var deleteImgName = $(aSelect)
					.parent('li')
					.children('div')
					.children('img')
					.attr('alt');
					
	if(confirm('Удалить рисунок?') == true) {
		$.ajax({
			type: 		"POST",
			cache:		false,
			url:		'/acp/acp_admin/admin_lotteries.php?mode=delete_img&type='+type+'',
			data:		"img_name="+deleteImgName,
			dataType:	"json",
			success: function (data){
				if (data.status == 1){	//удаленно
					var deleteLi = $('#files'+type+' li img[alt='+deleteImgName+']').parent('div').parent('li');
					
					if ($('.preview'+type+' img').attr('alt') == deleteImgName)
						$('.preview'+type+' > img[alt='+deleteImgName+']').hide();
					
					if ($('#big_img').val() == deleteImgName)
						$('[name=need_big]').removeAttr('checked');
					
					if($('#'+type+'_img').val() == deleteImgName)
						$('#'+type+'_img').val('');
						
					deleteLi.hide();
				}
				if (data.status == 0){	//ошибка
					alert('Ошибка удаления');
				}
			}
		});
	}
	
	return false;
}
});