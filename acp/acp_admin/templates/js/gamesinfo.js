$(document).ready(function(){
	//���������.
	var wrappingScreenshots = $('.wrappingUploadScreenshots');
	var folderScreenshots = '../../img/games/screenshots/';
	//�������� ����������.
	new AjaxUpload(wrappingScreenshots.find('.uploadButtom'), {
		action: '/acp/acp_admin/image_actions/games_screenshots.php?mode=add', 
		name: 'img',
		onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				wrappingScreenshots.find('.status')
					.removeClass('success')
					.addClass('error')
					.text('�������������� ������� JPG, PNG ��� GIF');
				
				return false;
			}
			
			wrappingScreenshots.find('.status')
				.removeClass('error')
				.addClass('success')
				.text('��������...');
		},
		onComplete: function(file, response){
			if(response == "error_1" || response == "error_2"){	//������.
				switch(response){
					case "error_1": error = '�������������� ������� JPG, PNG ��� GIF.'; break;
					case "error_2": error = '������ �������� �� ������ ��������� 200 ��.'; break;
				}
				wrappingScreenshots.find('.status')
					.removeClass('success')
					.addClass('error')
					.text(error);
			}
			else{	//����������.
				wrappingScreenshots.find('.status')
					.removeClass('success')
					.removeClass('error')
					.text('');
				
				//��������� �������.
				wrappingScreenshots.find('.wrappingImgToSelect')
					.prepend(
						"<div class='block'><div class='wrappingImage'><img src='"+folderScreenshots+response+"'alt='"+response+"'></div><a href='#' title='"+response+"'>�������</a></div>"
					);
				
				//Select & Delete
				wrappingScreenshots.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectScreenshot($(this));});
				wrappingScreenshots.find('.wrappingImgToSelect .block a').click(function(){deleteScreenshot($(this)); return false;});
			}
		}
	});
	
	//Select & Delete ���������.
	wrappingScreenshots.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectScreenshot($(this));});
	wrappingScreenshots.find('.wrappingImgToSelect .block a').click(function(){deleteScreenshot($(this)); return false;});
	
	//Select ��������.
	//block - ������� �� ������� ����������� �������.
	function selectScreenshot(block){
		selectImgName = block.children('img').attr('alt');
		wrappingScreenshots.find('.wrappingImgToSelect .block .wrappingImage').removeClass('select');
		block.addClass('select');
		wrappingScreenshots.find('.name_img').attr('value', selectImgName);
	}
	
	//Delete ��������.
	//link - ������� ������.
	function deleteScreenshot(link){
		if(confirm('������� �������?') == true){
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
						alert('������ ��������.');
					}
				}
			});
		}
	}
	
	//���������.
	var wrappingSubmissions = $('.wrappingSubmissions');
	var folderSubmissions = '../../img/games/submissions/';
	//�������� �������� ���.
	new AjaxUpload(wrappingSubmissions.find('.uploadButtom'), {
		action: '/acp/acp_admin/image_actions/games_submissions.php?mode=add', 
		name: 'img',
		onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				wrappingSubmissions.find('.status')
					.removeClass('success')
					.addClass('error')
					.text('�������������� ������� JPG, PNG ��� GIF');
				
				return false;
			}
			
			wrappingSubmissions.find('.status')
				.removeClass('error')
				.addClass('success')
				.text('��������...');
		},
		onComplete: function(file, response){
			if(response=="error_1" || response=="error_2"){	//������.
				switch(response){
					case "error_1": error = '�������������� ������� JPG, PNG ��� GIF.'; break;
					case "error_2": error = '������ �������� �� ������ ��������� 200 ��.'; break;
				}
				wrappingSubmissions.find('.status')
					.removeClass('success')
					.addClass('error')
					.text(error);
			}
			else{	//����������.
				wrappingSubmissions.find('.status')
					.removeClass('success')
					.removeClass('error')
					.text('');
				
				//��������� �������.
				wrappingSubmissions.find('.wrappingImgToSelect')
					.prepend(
						"<div class='block'><div class='wrappingImage'><img src='"+folderSubmissions+response+"'alt='"+response+"'></div><a href='#' title='"+response+"'>�������</a></div>"
					);
				
				//Select & Delete
				wrappingSubmissions.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectSubmission($(this));});
				wrappingSubmissions.find('.wrappingImgToSelect .block a').click(function(){deleteSubmission($(this)); return false;});
			}
		}
	});
	
	//Select & Delete ������ ���.
	wrappingSubmissions.find('.wrappingImgToSelect .block .wrappingImage').click(function(){selectSubmission($(this));});
	wrappingSubmissions.find('.wrappingImgToSelect .block a').click(function(){deleteSubmission($(this)); return false;});
	
	
	//Select ����� ����.
	//block - ������� �� ������� ����������� �������.
	function selectSubmission(block){
		selectImgName = block.children('img').attr('alt');
		wrappingSubmissions.find('.wrappingImgToSelect .block .wrappingImage').removeClass('select');
		block.addClass('select');
		wrappingSubmissions.find('.name_img').attr('value', selectImgName);
		wrappingSubmissions.find('.previewImageBlock').html("<img src='"+folderSubmissions+selectImgName+"'>");
	}
	
	//Delete ����� ����.
	//link - ������� ������.
	function deleteSubmission(link){
		if(confirm('������� �������?') == true){
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
						alert('������ ��������.');
					}
				}
			});
		}
	}
	
	//������ �� �����������.
	$('.sc_value').focus(function(){if($(this).val() == '�������� �������') $(this).val('');});
	$('.sc_value').blur(function(){if($(this).val() == '') $(this).val('�������� �������');});
	
	$('.add_sc').click(function(){AddScRow(); return false;});
	$('.delete_sc').click(function(){DeleteScRow($(this)); return false;});
	
	//������ � ���������������� ���.
	$('.ch_name').focus(function(){if($(this).val() == '�������� ��������������') $(this).val('');});
	$('.ch_name').blur(function(){if($(this).val() == '') $(this).val('�������� ��������������');});
	$('.ch_value').focus(function(){if($(this).val() == '�������� ��������������')$(this).val('');});
	$('.ch_value').blur(function(){if($(this).val() == '') $(this).val('�������� ��������������');});
	
	$('.add_ch').click(function(){AddChRow(); return false;});
	$('.delete_ch').click(function(){DeleteChRow($(this)); return false;});
	
	//�������� ���� ������������� ���.
	function DeleteChRow(x_element){
		x_element.parent('p').remove();
		if($('.add_ch').length == 0){
			$('.block_ch br').before(" <a title='��������' class='add_ch green' href='#'>+</a>");
			
			$('.add_ch').click(function(){AddChRow(); return false;});
		}
	}
	
	//�������� ���� ����������.
	function DeleteScRow(x_element){
		x_element.parent('p').remove();
		if($('.add_sc').length == 0){
			$('.block_sc br').before(" <a title='��������' class='add_sc green' href='#'>+</a>");
			
			$('.add_sc').click(function(){AddScRow(); return false;});
		}
	}
	
	//���������� ���� ���������.
	function AddScRow(){
		if($('.sc_value').length <= 2){
			$('.add_sc').remove();
			$('[name=screenshots]').before("<p><input class='sc_value' name='sc_value' style='width: 240px;' value='�������� �������'> <a title='�������' href='#' class='delete_sc red'>X</a> <a title='��������' class='add_sc green' href='#'>+</a></p>");
			
			//Inputs.
			$('.sc_value').focus(function(){if($(this).val() == '�������� �������') $(this).val('');});
			$('.sc_value').blur(function(){if($(this).val() == '') $(this).val('�������� �������');});
			$('.sc_value').length;
			$('.sc_value').val();
			$('.add_sc').click(function(){AddScRow(); return false;});
			$('.delete_sc').click(function(){DeleteScRow($(this)); return false;});
		}
		else{
			alert('�������� �� ������ 3 �����...');
		}
	}
	
	//���������� ���� ������������� ���.
	function AddChRow(){
		$('.add_ch').remove();
		$('[name=characteristics]').before("<p><input class='ch_name' name='ch_name' style='width: 240px;' value='�������� ��������������'> <input class='ch_value' name='ch_value' style='width: 240px;' value='�������� ��������������'> <a title='�������' href='#' class='delete_ch red'>X</a> <a title='��������' class='add_ch green' href='#'>+</a></p>");
		//Inputs.
		$('.ch_name').focus(function(){if($(this).val() == '�������� ��������������') $(this).val('');});
		$('.ch_name').blur(function(){if($(this).val() == '') $(this).val('�������� ��������������');});
		$('.ch_value').focus(function(){if($(this).val() == '�������� ��������������')$(this).val('');});
		$('.ch_value').blur(function(){if($(this).val() == '') $(this).val('�������� ��������������');});
		$('.ch_name').length;
		$('.ch_value').length;
		$('.ch_name').val();
		$('.ch_value').val();
		$('.add_ch').click(function(){AddChRow(); return false;});
		$('.delete_ch').click(function(){DeleteChRow($(this)); return false;});
	}
	
	$('.add_info').click(function(){
		var arrCh = '';		//������ ������������� ��� � ��� ������������.
		$('.ch_name[value=�������� ��������������]').parent().remove();
		$('.ch_value[value=�������� ��������������]').parent().remove();
		var countCh = $('.ch_name').length;
		for (i = 0; i < countCh; i++){
			arrCh += $('.ch_name').eq(i).val() +' -,- '+ $('.ch_value').eq(i).val();
			if(i != countCh-1)
				arrCh +=  " -;- ";
		}
		
		var arrSc = '';		//������ ���������� � ����� � ��� ������������.
		$('.sc_value[value=�������� �������]').parent().remove();
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