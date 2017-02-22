<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title><?=$title; ?></title>
		<meta http-equiv='Content-Type' content='text/html; charset=windows-1251'>
		<script type='text/javascript' src='templates/ajax/lib/jquery.js'></script>
		<script type='text/javascript' src='templates/ajax/lib/jquery.bgiframe.min.js'></script>
		<script type='text/javascript' src='templates/ajax/lib/jquery.ajaxQueue.js'></script>
		<script type='text/javascript' src='templates/ajax/lib/thickbox-compressed.js'></script>
		<script type='text/javascript' src='templates/ajax/jquery.autocomplete.pack.js'></script>
		
		<script type='text/javascript' src='templates/js/ajaxupload.3.5.js'></script>
		
		<link rel="stylesheet" type="text/css" href="templates/ajax/jquery.autocomplete.css" />
		<link rel="stylesheet" href="templates/css/style.css" type="text/css" />
		<link rel="stylesheet" href="templates/css/adminstyles.css" type="text/css" />
		
		<script type="text/javascript">
			$().ready(function() {
				function log(event, data, formatted){
					$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
				}
				function formatItem(row){return row[0] + 
					"(<strong>id: " + row[1] + "</strong>)";
				}
				function formatResult(row){
					return row[0].replace(/(<.+?>)/gi, '');
				}
				$("#searchuser").autocomplete("ajax_search_user.php", {width: 260, selectFirst: false});
				$(":text, textarea").result(log).next().click(function() {$(this).prev().search();}); 
				$("#searchuser").result(function(event, data, formatted) {if (data)$(this).parent().next().find("input").val(data[1]);});
			});
			function submitMe() {if (window.event.keyCode == 13){document.myForm.submit();}}
		</script>
		<script language='javascript' src='templates/images/functions.js' type='text/javascript'></script>
		
		<style type='text/css' media='print'>
			.printHidden {display: none;}
			.tdSetting {height: 50px;}
			TABLE.tableBorder {border: 0px;}
		</style>
		<link href="ckeditor/sample.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>

<div class='topLine'></div>
<div class='wrappingTop'>
	<div class='wrappingLogoTop'>
		<a href="index.php"><img src="templates/images/logo.png"></a>
	</div>
	<div class='wrappingNavTop'>
		<a href="index.php" class="submitStyle pLeft">Помощь Клиентам</a>
		<img src="templates/images/divider.gif">
		<a href="quit.php" class="submitStyle pRight">Выход</a>
	</div>
</div>