$(document).ready(function(){
	//Параметры.
	var wrappingScreenshots = $('.wrappingUploadScreenshots');
	var folderScreenshots = '../../img/games/screenshots/';
	//Аплоадер скриншотов.
	new AjaxUpload(wrappingScreenshots.find('.uploadButtom'), {
		action: '/acp/acp_admin/image_actions/games_screenshots.php?mode=add', 
		name: 'img',
		onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				wrappingScreenshots.find('.status')
					.removeClass('success')
					.addClass('error')
					.text('Поддерживаемые форматы JPG, PNG или GIF');
				
				return false;
			}
			
			wrappingScreenshots.find('.status')
				.removeClass('error')
				.addClass('success')
				.text('Загрузка...');
		},
		onComplete: function(file, response){
			if(response == "error_1" || response == "error_2"){	//Ошибка.
				switch(response){
					case "error_1": error = 'Поддерживаемые форматы JPG, PNG или GIF.'; break;
					case "error_2": error = 'Размер картинки не должен привышать 200 Кб.'; break;
				}
				wrappingScreenshots.find('.status')
					.removeClass('success')
					.addClass('error')
					.text(error);
			}
			else{	//Успешность.
				wrappingScreenshots.find('.status')
					.removeClass('success')
					.removeClass('error')
					.text('');
				
				//Добаление рисунка.
				wrappingScreenshots.find('.wrappingImgToSelect')
					.prepend(
						"<div class='block'><div class='wrappingImage'><img src='"+folderScreenshots+response+"'alt='"+response+"'></div><a href='#' title='"+response+"'>Удалить</a></div>"
					);
				
				//Select & Delete
				wrappingScreenshots.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectScreenshot($(this));});
				wrappingScreenshots.find('.wrappingImgToSelect .block a').click(function(){deleteScreenshot($(this)); return false;});
			}
		}
	});
	
	//Select & Delete скриншоты.
	wrappingScreenshots.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectScreenshot($(this));});
	wrappingScreenshots.find('.wrappingImgToSelect .block a').click(function(){deleteScreenshot($(this)); return false;});
	
	//Select скриншот.
	//block - элемент на который выполняется нажатие.
	function selectScreenshot(block){
		selectImgName = block.children('img').attr('alt');
		wrappingScreenshots.find('.wrappingImgToSelect .block .wrappingImage').removeClass('select');
		block.addClass('select');
		wrappingScreenshots.find('.name_img').attr('value', selectImgName);
	}
	
	//Delete скриншот.
	//link - элемент ссылка.
	function deleteScreenshot(link){
		if(confirm('Удалить рисунок?') == true){
			$.ajax({
				type: 'POST',
				cache: false,
				url: '/acp/acp_admin/image_actions/games_screenshots.php?mode=delete',
				data: 'img_name='+link.attr('title'),
				dataType: 'json',
				success: function(data){
					if(data.status == 1){
						if(wrappingScreenshots.find('.name_img').val() == link.attr('title')){
							wrappingScreenshots.find('.name_img').val('');
						}
						link.parent().remove();
					}
					else{
						alert('Ошибка удаления.');
					}
				}
			});
		}
	}
	
	//Параметры.
	var wrappingSubmissions = $('.wrappingSubmissions');
	var folderSubmissions = '../../img/games/submissions/';
	//Аплоадер рисунков игр.
	new AjaxUpload(wrappingSubmissions.find('.uploadButtom'), {
		action: '/acp/acp_admin/image_actions/games_submissions.php?mode=add', 
		name: 'img',
		onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				wrappingSubmissions.find('.status')
					.removeClass('success')
					.addClass('error')
					.text('Поддерживаемые форматы JPG, PNG или GIF');
				
				return false;
			}
			
			wrappingSubmissions.find('.status')
				.removeClass('error')
				.addClass('success')
				.text('Загрузка...');
		},
		onComplete: function(file, response){
			if(response=="error_1" || response=="error_2"){	//Ошибка.
				switch(response){
					case "error_1": error = 'Поддерживаемые форматы JPG, PNG или GIF.'; break;
					case "error_2": error = 'Размер картинки не должен привышать 200 Кб.'; break;
				}
				wrappingSubmissions.find('.status')
					.removeClass('success')
					.addClass('error')
					.text(error);
			}
			else{	//Успешность.
				wrappingSubmissions.find('.status')
					.removeClass('success')
					.removeClass('error')
					.text('');
				
				//Добаление рисунка.
				wrappingSubmissions.find('.wrappingImgToSelect')
					.prepend(
						"<div class='block'><div class='wrappingImage'><img src='"+folderSubmissions+response+"'alt='"+response+"'></div><a href='#' title='"+response+"'>Удалить</a></div>"
					);
				
				//Select & Delete
				wrappingSubmissions.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectSubmission($(this));});
				wrappingSubmissions.find('.wrappingImgToSelect .block a').click(function(){deleteSubmission($(this)); return false;});
			}
		}
	});
	
	//Select & Delete образы игр.
	wrappingSubmissions.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectSubmission($(this));});
	wrappingSubmissions.find('.wrappingImgToSelect .block a').click(function(){deleteSubmission($(this)); return false;});
	
	
	//Select образ игры.
	//block - элемент на который выполняется нажатие.
	function selectSubmission(block){
		selectImgName = block.children('img').attr('alt');
		wrappingSubmissions.find('.wrappingImgToSelect .block .wrappingImage').removeClass('select');
		block.addClass('select');
		wrappingSubmissions.find('.name_img').attr('value', selectImgName);
		wrappingSubmissions.find('.previewImageBlock').html("<img src='"+folderSubmissions+selectImgName+"'>");
	}
	
	//Delete образ игры.
	//link - элемент ссылка.
	function deleteSubmission(link){
		if(confirm('Удалить рисунок?') == true){
			$.ajax({
				type: 'POST',
				cache: false,
				url: '/acp/acp_admin/image_actions/games_submissions.php?mode=delete',
				data: 'img_name='+link.attr('title'),
				dataType: 'json',
				success: function(data){
					if(data.status == 1){
						if(wrappingSubmissions.find('.name_img').val() == link.attr('title')){
							wrappingSubmissions.find('.name_img').val('');
							wrappingSubmissions.find('.previewImageBlock').html('');
						}
						link.parent().remove();
					}
					else{
						alert('Ошибка удаления.');
					}
				}
			});
		}
	}
	
	//Работа со скриншотами.
	$('.sc_value').focus(function(){if($(this).val() == 'название рисунка') $(this).val('');});
	$('.sc_value').blur(function(){if($(this).val() == '') $(this).val('название рисунка');});
	
	$('.add_sc').click(function(){AddScRow(); return false;});
	$('.delete_sc').click(function(){DeleteScRow($(this)); return false;});
	
	//Работа с характеристиками игр.
	$('.ch_name').focus(function(){if($(this).val() == 'название характеристики') $(this).val('');});
	$('.ch_name').blur(function(){if($(this).val() == '') $(this).val('название характеристики');});
	$('.ch_value').focus(function(){if($(this).val() == 'значение характеристики')$(this).val('');});
	$('.ch_value').blur(function(){if($(this).val() == '') $(this).val('значение характеристики');});
	
	$('.add_ch').click(function(){AddChRow(); return false;});
	$('.delete_ch').click(function(){DeleteChRow($(this)); return false;});
	
	//Удаление ряда характеристик игр.
	function DeleteChRow(x_element){
		x_element.parent('p').remove();
		if($('.add_ch').length == 0){
			$('.block_ch br').before(" <a title='добавить' class='add_ch green' href='#'>+</a>");
			
			$('.add_ch').click(function(){AddChRow(); return false;});
		}
	}
	
	//Удаление ряда скриншотов.
	function DeleteScRow(x_element){
		x_element.parent('p').remove();
		if($('.add_sc').length == 0){
			$('.block_sc br').before(" <a title='добавить' class='add_sc green' href='#'>+</a>");
			
			$('.add_sc').click(function(){AddScRow(); return false;});
		}
	}
	
	//Добавления ряда скриншота.
	function AddScRow(){
		if($('.sc_value').length <= 2){
			$('.add_sc').remove();
			$('[name=screenshots]').before("<p><input class='sc_value' name='sc_value' style='width: 240px;' value='название рисунка'> <a title='удалить' href='#' class='delete_sc red'>X</a> <a title='добавить' class='add_sc green' href='#'>+</a></p>");
			
			//Inputs.
			$('.sc_value').focus(function(){if($(this).val() == 'название рисунка') $(this).val('');});
			$('.sc_value').blur(function(){if($(this).val() == '') $(this).val('название рисунка');});
			$('.sc_value').length;
			$('.sc_value').val();
			$('.add_sc').click(function(){AddScRow(); return false;});
			$('.delete_sc').click(function(){DeleteScRow($(this)); return false;});
		}
		else{
			alert('Доступно не больше 3 полей...');
		}
	}
	
	//Добавление ряда характеристик игр.
	function AddChRow(){
		$('.add_ch').remove();
		$('[name=characteristics]').before("<p><input class='ch_name' name='ch_name' style='width: 240px;' value='название характеристики'> <input class='ch_value' name='ch_value' style='width: 240px;' value='значение характеристики'> <a title='удалить' href='#' class='delete_ch red'>X</a> <a title='добавить' class='add_ch green' href='#'>+</a></p>");
		//Inputs.
		$('.ch_name').focus(function(){if($(this).val() == 'название характеристики') $(this).val('');});
		$('.ch_name').blur(function(){if($(this).val() == '') $(this).val('название характеристики');});
		$('.ch_value').focus(function(){if($(this).val() == 'значение характеристики')$(this).val('');});
		$('.ch_value').blur(function(){if($(this).val() == '') $(this).val('значение характеристики');});
		$('.ch_name').length;
		$('.ch_value').length;
		$('.ch_name').val();
		$('.ch_value').val();
		$('.add_ch').click(function(){AddChRow(); return false;});
		$('.delete_ch').click(function(){DeleteChRow($(this)); return false;});
	}
	
	$('.add_info').click(function(){
		var arrCh = '';		//Массив характеристик игр и его формирование.
		$('.ch_name[value=название характеристики]').parent().remove();
		$('.ch_value[value=значение характеристики]').parent().remove();
		var countCh = $('.ch_name').length;
		for (i = 0; i < countCh; i++){
			arrCh += $('.ch_name').eq(i).val() +' -,- '+ $('.ch_value').eq(i).val();
			if(i != countCh-1)
				arrCh +=  " -;- ";
		}
		
		var arrSc = '';		//Массив скриншотов к играм и его формирование.
		$('.sc_value[value=название рисунка]').parent().remove();
		var countSc = $('.sc_value').length;
		for (i = 0; i < countSc; i++){
			arrSc += $('.sc_value').eq(i).val();
			if(i != countSc-1)
				arrSc +=  " -,- ";
		}
		$('[name=characteristics]').val(arrCh);
		$('[name=screenshots]').val(arrSc);
		
		$('.ch_name').remove();
		$('.ch_value').remove();
		$('.sc_value').remove();
	});
});