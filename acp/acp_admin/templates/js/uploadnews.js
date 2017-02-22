$(function(){
var dirImages = '../../img/news/';
var status=$('#status');

//������ ��������.
new AjaxUpload($('#upload'), {
	action: '/acp/acp_admin/admin_news.php?mode=add_img', 
	name: 'img',
	onSubmit: function(file, ext){
		 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
			status.text('�������������� ������� JPG, PNG ��� GIF');
			return false;
		}
		status.text('��������...');
	},
	onComplete: function(file, response){
		status.text('');
		if(response!="error"){
			$('<li></li>').prependTo('#files').html('<div class="gray"><img src="'+dirImages+response+'" alt="'+response+'" /></div>'+response+' <a href="#" style="color: red;">Del</a>');
			
			//����� �������
			$('#files li div.gray').click(function(){
				selectImg(this);
			});
			
			//����� ��������.
			$('#files li a').click(function(){
				deleteImg(this);
			});
		} else{
			$('<li></li>').prependTo('#files').text('���� �� ��������' + file).addClass('error');
		}
	}
});

//����� ����� �������.
$('#files li div.gray').click(function(){
	selectImg(this);
});
	
//����� �������.
function selectImg (selectElement){
	$('#status').text('');
	
	$('#files li div.blue').removeClass('blue').addClass('gray');
	$(selectElement).removeClass('gray').addClass('blue');
	
	var selectImgName = $.trim($('img', selectElement).attr('alt'));
	$('input.img_src').val('/img/news/'+selectImgName);
	
	$('.preview').html('<img alt="'+selectImgName+'" src="'+dirImages+selectImgName+'">');
}
	
//����� ��������.
$('#files li a').click(function(){
	deleteImg(this);
});

//��������.
function deleteImg(aSelect){
	$('#status').text('');
	
	var deleteImgName = $(aSelect)
					.parent('li')
					.children('div')
					.children('img')
					.attr('alt');
					
	if(confirm('������� �������?') == true) {
		$.ajax({
			type: 		"POST",
			cache:		false,
			url:		'/acp/acp_admin/admin_news.php?mode=delete_img',
			data:		"img_name="+deleteImgName,
			dataType:	"json",
			success: function (data){
				if (data.status == 1){	//��������
					var deleteLi = $('#files li img[alt='+deleteImgName+']').parent('div').parent('li');
					
					if ($('.preview img').attr('alt') == deleteImgName)
						$('.preview > img[alt='+deleteImgName+']').hide();
					
					if($('input.img_src').val() == '/img/news/'+deleteImgName)
						$('input.img_src').val('');
						
					deleteLi.hide();
				}
				if (data.status == 0){	//������
					alert('������ ��������');
				}
			}
		});
	}
	
	return false;
}
});