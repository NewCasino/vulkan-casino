function UserSocialLogin(token) {	
	$.ajax({
		type: 		"POST",
		cache:		false,
		url:		loginSocUrl,
		data:		"uLoginToken="+token,
		dataType:	"json",
		success: function (data){
			if (data.status == 2){
				location.href = data.url;
			}
			if (data.status == 1){
				$.fancybox($('#socReg'), {
					'closeBtn': true
				});
			}
			if (data.status == 0){
				$.fancybox($('#errorSocLog'), {
					'closeBtn': true
				});
			}
		}
	});
}

$(function() {
	$("#socReg").submit(function() {
		if ($("#socLogin").val().length < 1 || $("#socPass").val().length < 1 || $("#socEmail").val().length < 1) {
			$("#socError").text("¬ведите данные").show();
		}
		else {
			//isChecked
			var isChecked = 'off';
			if ($('#socConfirm').prop("checked") == true){
				isChecked = 'on';
			}
			
			$("#socError").hide();
			$.fancybox.showLoading();
			$.ajax({
				type	 : "POST",
				cache	 : false,
				url		 : loginSocUrl,
				data	 : "socLogin=" +$('#socLogin').val()+ "&socPass=" +$('#socPass').val()+ "&socEmail="+$("#socEmail").val() +"&socConfirm=" + isChecked,
				dataType : "json",
				success: function(data) {
					if (data.status == "1") {
						var message = data.message;
						$("#socError").html(message).show();
					}
					if (data.status == "0") {
						$.fancybox.close();
						location.href = data.url;
					}
					$.fancybox.hideLoading();
				}
			});
		}
		return false;
	});
});