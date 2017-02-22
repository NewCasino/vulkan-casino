<script type="text/javascript">
	var loginSocUrl = "/{language}/social_login";
	var loginUrl = "/{language}/login";
	var registrationUrl = "/{language}/open_account";
	<?php if (isset($_SESSION['needToLogin'])): ?>
		$(function() {
			showLoginForm();
		});
	<?php 
		unset($_SESSION['needToLogin']);
		endif;
	?>
</script>
		<? if(!$_SESSION['login']) { ?>
		<div id="slider-bg">
	<div class="slider">
		<div class="bg" style="background-image: url(../uploads/banners-backgrounds/0ef33ca5d883e3d40875.png)">
		</div>
		<div class="bg" style="background-image: url(../uploads/banners-backgrounds/0628829f188830d05b55.jpg)">
		</div>
		<div class="bg" style="background-image: url(../uploads/banners-backgrounds/929cf9a8c73c3880f357.jpg)">
		</div>
		<div class="bg" style="background-image: url(../uploads/banners-backgrounds/6da1a0a292d7645b6910.png)">
		</div>
		<div class="bg" style="background-image: url(../uploads/banners-backgrounds/388a2b2fbeff221ca447.jpg)">
		</div>
	</div>
</div>
<div id="main">
	<div id="header">
		<div class="width">
			<a class="logo" href="/{language}/"></a>
								<form action="/<?=$_SESSION['language']?>/login" id="form-auth" method="post" name="form">
<fieldset>
	<div class="field">
		<label for="auth-login">Логин</label><input id="login" name="login" type="text" <? if($логин != '') { echo 'value="'.htmltext($логин).'"';} ?>>
	</div>
	<div class="field">
		<label for="auth-password">Пароль</label><input id="password" name="password" type="password" <? if($пароль != '') { echo 'value="'.htmltext($пароль).'"';} ?>>
	</div>
	<button class="btn btn-green" type="submit" class="cz_login_btn">Войти</button>
	<div class="links">
<a class="link link-pass-recover" href="/{language}/forgot_password">Забыли пароль?</a>
</div>
</fieldset>
				</form>
			<div class="social">
				<div class="title">
						Войти / Зарегистрироваться через:
						<script type="text/javascript" src="//ulogin.ru/js/ulogin.js"></script>
						<div style="float: right;" id="uLogin" data-ulogin="display=panel;fields=first_name,last_name,nickname ;providers=vkontakte,odnoklassniki,mailru,facebook,twitter,google,yandex;redirect_uri=;callback=UserSocialLogin"></div>
						</div>
				</div>
				
				</div>
				</div>
					<nav id="top-nav">
	<div class="width">
		<div class="nav">
			<a href="/{language}/">Игры</a>
			<a class="green" href="/{language}/lotteries">Акции</a>
			<a href="/{language}/news">Новости</a>
		</div>
		<div class="btns">
			<a class="btn btn-blue btn-quest" href="/{language}/start">Как начать?</a>
		</div>
	</div>
	</nav>
		<div class="width" id="container">
		<div class="right-side">
		<div class="block yellow block-register">
	<header>Регистрация</header>
<form action="/<?=$_SESSION['language']?>/index_reg" method="post" id="block_reg_form">
		<div class="field email">
			<input name="email" type="text" class='input'  id="email" placeholder="Email" value="<?  echo htmltext($регистрация_email); ?>">
		</div>
				<div class="field-double">
			<div class="field login">
				<input name="login" type="text" class='input' id="uid" placeholder="Логин" value="<?  echo htmltext($регистрация_логин); ?>">
			</div>
			<div class="field password">
				<input name="password" type="password" class='input' id="pass1" placeholder="Пароль" value="<?  echo htmltext($регистрация_пароль); ?>">
			</div>
		</div>
				<label>
					<input type="checkbox" name="confirm" id="confirm" checked="checked" value="on" />
				<span class="text">Я согласен с <a href="/{language}/conditions" target="_blank">правилами казино</a></span></label>
		<button class="btn btn-orange btn-reg" id="reg_your_details_submit" type="submit">Регистрация</button>
</form>
</div>
		<div class="block yellow block-jackpots">
				<header>Джекпот</header>
				<div style="display: block; text-align: center; float: none; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; z-index: auto; width: 241px; height: 134px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
					<div style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 3615px; height: 134px; z-index: auto; opacity: 1;" class="jackpot-info">
						<div class="item item-jackpot active">
							<div class="pic">
								<a href="/games/megajack/wildwest/"><img alt="Wild West" src="/uploads/jackpots/wildwest.png"></a>
							</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
							</div>
							<a class="btn btn-green" href="/games/megajack/wildwest/">Играть</a>
						</div>
						<div class="item item-jackpot">
<div class="pic">
<a href="/games/megajack/pirates/"><img alt="Пират" src="/uploads/jackpots/pirate.png"></a>
</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
</div>
<a class="btn btn-green" href="/games/megajack/pirates/">Играть</a>
</div>
<div class="item item-jackpot">
<div class="pic">
<a href="/games/megajack/aztek/"><img alt="Золото Ацтеков" src="/uploads/jackpots/aztec_gold.png"></a>
</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
</div>
<a class="btn btn-green" href="/games/megajack/aztek/">Играть</a>
</div>
<div class="item item-jackpot">
<div class="pic">
<a href="/games/megajack/pharaon/"><img alt="Pharaon Treasure" src="/uploads/jackpots/pharaon_treasures.png"></a>
</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
</div>
<a class="btn btn-green" href="/games/megajack/pharaon/">Играть</a>
</div>
						</div>
</div>
</div>
			<div class="block green block-winners" data-widget="latest_wins">
				<header>Сейчас выиграли</header>
								<div class="winners-list">
										<?php foreach ($winners as $winner): ?>
															<div class="item">
						<div class="left">
							<div class="name">
								<?=$winner['login'];?>
							</div>
							<hr><?=$winner['game'];?></hr>
						</div>
						<div class="sum">
							<?=$winner['win'];?> P
						</div>
					</div>
					
										<?php endforeach; ?>
								</div>
								</div>
								<div class="block green-blue block-god">
	<header>Игра недели</header><a class="item" href="/games/casinogame/roulette/roulette_premium.php"><img class="game-icon" alt="Европейская рулетка" title="Европейская рулетка" src="/img/games/submissions/roulette_euro.png"><span class="btn btn-green">Играть</span></a>
</div>
<div class="block yellow block-actions">
<header>Мы Вконтакте</header>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "241", height: "257", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 90304440);
</script>
</div>
								</div>
										<div class="left-side">
			<div id="slider-main">
				<div class="slider">
					<div class="item" style="background-image: url(../uploads/banners/fe9cb6c8d4cc0fa43f2a.png)">
						<!--<a class="btn btn-orange btn-reg" href="javascript:showRegistrationForm();">зарегистрироваться</a>-->
					</div>
					<div class="item" style="background-image: url(../uploads/banners/ac85d379924a4efec60e.png)">
						<!--<a class="btn btn-orange btn-reg" href="javascript:showRegistrationForm();">зарегистрироваться</a>-->
					</div>
					<div class="item" style="background-image: url(../uploads/banners/ed55e37a1e74d6512648.png)">
						<!--<a class="btn btn-orange btn-reg" href="javascript:showRegistrationForm();">зарегистрироваться</a>-->
					</div>
					<div class="item" style="background-image: url(../uploads/banners/bc4e20ebd0e5373e1ace.png)">
						<!--<a class="btn btn-orange btn-reg" href="javascript:showRegistrationForm();">зарегистрироваться</a>-->
					</div>
					<div class="item" style="background-image: url(../uploads/banners/300f2c01b6d054c7f0ed.png)">
						<!--<a class="btn btn-orange btn-reg" href="javascript:showRegistrationForm();">зарегистрироваться</a>-->
					</div>
				</div>
				<div id="pages">
				</div>
			</div>
			
			
			
<? } else { ?>
<body data-user="{{login};{cash_wmr};}">
<div id="slider-bg">
	<div style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 1583px; height: 1080px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
		<div style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 4749px; height: 1080px;" class="slider">
			<div class="bg" style="background-image: url(/uploads/banners-backgrounds/929cf9a8c73c3880f357.jpg)">
			</div>
		</div>
	</div>
</div>
<div id="main">
					<div class="authorized" id="header">
										<div class="width">
						<a class="logo" href="/"></a>
						<div class="user-block">
						<div class="item bg user-info">
								<div class="avatar">
						<a href="/{language}/profile"><img src="{avatar_src}"></a>
							</div>
							<div class="info">
								<div class="login">
									<a href="/{language}/profile">{login}</a>
								</div>
								<div class="id">
								{id}
								</div>
								<div class="link">
									<a href="/{language}/profile">Мой профиль</a>
								</div>
							</div>
						</div>
						<a href="/{language}/in"><span class="item bg balance"><header>Баланс</header>
						<div class="sum" data-update="balance">
							{cash_wmr}<span class="rub">P</span>
						</div>
						<div class="link">
							Пополнить счет
						</div>
						</span></a>
					<script type="text/javascript">
						function gamemodereal() {
							document.location.href="/{language}/games/wmr";
						}
					</script>
					
<div class="item logout">
<a class="btn btn-blue" href="/{language}/quit">выход</a>
<div class="links">
<a class="news" href="/{language}/news"></a>
<a class="mess" href="/{language}/messages"></a>
</div>
</div>
					</div>						
					</div>							
					</div>							
										<nav id="top-nav">
	<div class="width">
		<div class="nav">
			<a href="/{language}/">Игры</a>
			<a href="/{language}/lotteries">Акции</a>
			<a href="/{language}/news">Новости</a>
			<a class="green" href="/{language}/in">Касса</a>
			<a href="/{language}/contact">Информация</a>
		</div>
	</div>
	</nav>
	
		<div class="width" id="container">
		<div class="right-side">
		<div class="block yellow block-jackpots">
				<header>Джекпот</header>
				<div style="display: block; text-align: center; float: none; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; z-index: auto; width: 241px; height: 134px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
					<div style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 3615px; height: 134px; z-index: auto; opacity: 1;" class="jackpot-info">
						<div class="item item-jackpot active">
							<div class="pic">
								<a href="/games/megajack/wildwest/"><img alt="Wild West" src="/uploads/jackpots/wildwest.png"></a>
							</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
							</div>
							<a class="btn btn-green" href="/games/megajack/wildwest/">Играть</a>
						</div>
						<div class="item item-jackpot">
<div class="pic">
<a href="/games/megajack/pirates/"><img alt="Пират" src="/uploads/jackpots/pirate.png"></a>
</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
</div>
<a class="btn btn-green" href="/games/megajack/pirates/">Играть</a>
</div>
<div class="item item-jackpot">
<div class="pic">
<a href="/games/megajack/aztek/"><img alt="Золото Ацтеков" src="/uploads/jackpots/aztec_gold.png"></a>
</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
</div>
<a class="btn btn-green" href="/games/megajack/aztek/">Играть</a>
</div>
<div class="item item-jackpot">
<div class="pic">
<a href="/games/megajack/pharaon/"><img alt="Pharaon Treasure" src="/uploads/jackpots/pharaon_treasures.png"></a>
</div>
							<div class="sum">
										<?php foreach($arrayJP as $arrayJPElement): ?>
							<span><?=$arrayJPElement?></span>
						<?php endforeach; ?>
						<span class="rub">P</span>
</div>
<a class="btn btn-green" href="/games/megajack/pharaon/">Играть</a>
</div>
						</div>
</div>
</div>
			<div class="block green block-winners" data-widget="latest_wins">
				<header>Сейчас выиграли</header>
								<div class="winners-list">
										<?php foreach ($winners as $winner): ?>
															<div class="item">
						<div class="left">
							<div class="name">
								<?=$winner['login'];?>
							</div>
							<hr><?=$winner['game'];?></hr>
						</div>
						<div class="sum">
							<?=$winner['win'];?> P
						</div>
					</div>
					
										<?php endforeach; ?>
								</div>
								</div>
								<div class="block green-blue block-god">
		<header>Игра недели</header><a class="item" href="/games/casinogame/roulette/roulette_premium.php"><img class="game-icon" alt="Европейская рулетка" title="Европейская рулетка" src="/img/games/submissions/roulette_euro.png"><span class="btn btn-green">Играть</span></a>
</div>
<div class="block yellow block-actions">
<header>Мы Вконтакте</header>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "241", height: "257", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 90304440);
</script>
</div>
								</div>
										<div class="left-side">
<div id="slider-main">
	<div style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 940px; height: 244px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
		<div style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 2820px; height: 244px;" class="slider">
			<div class="item" style="background-image: url(/uploads/banners/6703a118db5a12a849f1.png)">
				<a class="btn btn-orange btn-reg" href="/games/slots/eastern-delights/play">играть сейчас</a>
			</div>
		</div>
	</div>
	<div class="hidden" style="display: none;" id="pages">
		<a class="selected" href="#"><span>1</span></a>
	</div>
</div>


                                                <?php/*         </div>
                                                            </div>
                                                        </div> */ ?>
<? } ?>

			<?php //Социальная регистрация ?>
	<div class="hidden">
		<div id="errorSocLog" style="color: #fff; padding: 50px 10px; text-align: center; width:220px;">
			<p>Извините, произошла неизвестная ошибка, если это повториться, сообщите администрации сайта.</p>		
		</div>
	</div>
	
	<div class="hidden">
		<form id="socReg" method="post" action="">
			<p style="font-size: 14px; color: #ffffff; text-align: center;">Введите данные для продолжения:</p>
	    	<p id="socError" class="hidden" style="color: red; padding: 5px;">&nbsp;</p>
			<div style="margin: 30px auto 0 auto; width: 392px; text-align: center;">
				<table style="color: #ffffff; text-align: left;" width="392" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="90" align="right"><label for="socLogin">Логин&nbsp;&nbsp;&nbsp;</label></td>
					<td><input type="text" id="socLogin" name="login" size="30" /></td>
				</tr>
				<tr><td colspan="2"><p style="font-size: 11px; text-align: center;">Логин может состоять из цифр и букв английского алфавита.<br> От трёх до двадцати символов. Пример: JohnDoe54</p><br /></td></tr>
				<tr>
					<td align="right"><label for="socPass">Пароль&nbsp;&nbsp;&nbsp;</label></td>
					<td><input type="password" id="socPass" name="password" size="30" /></td>
				</tr>
				<tr><td colspan="2"><p style="font-size: 11px; text-align: center;">Пароль может состоять из цифр и букв английского алфавита. <br> От шести до двадцати символов.</p><br /></td></tr>
				<tr>
					<td align="right"><label for="socEmail">Email&nbsp;&nbsp;</label></td>
					<td><input type="text" id="socEmail" name="email" size="30" /></td>
				</tr>
				<tr><td colspan="2"><p style="font-size: 11px; text-align: center;">На указанный вами Email будет выслан логин и пароль от аккаунта<br/>Пример: yourname@email.com</p><br /></td></tr>
				
				<tr>
					<td colspan="2">
						<p style="font-size: 13px; text-align: center;">
							<input type="checkbox" name="socConfirm" id="socConfirm" value="on" />
							<label for="socConfirm">Я принимаю <a href="/{language}/terms" target="_blank">правила и условия <?=$sitename?></a></label>
						</p><br/>
					</td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"><input type="submit" class="cz_login_btn" value="Далее"/></td>
				</tr>
				</table>
			</div>
		</form>
	</div>
	<?php //Конец социальной регистрации ?>
		<div class="hidden">
		<form id="login_form" method="post" action="">
	    	<p id="login_error" class="hidden">&nbsp;</p>
			<div style="margin: 30px auto 0 auto; width: 392px; text-align: center;">
				<table style="color: #ffffff; text-align: left;" width="392" border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td width="90" align="right"><label for="login">Логин&nbsp;&nbsp;&nbsp;</label></td>
				<td><input type="text" id="login" name="login" size="30" /></td>
				</tr>
				
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
				
				<tr>
				<td align="right"><label for="password">Пароль&nbsp;&nbsp;&nbsp;</label></td>
				<td><input type="password" id="password" name="password" size="30" /></td>
				</tr>
				
				<tr>
				<td colspan="2" align="center">
				<input type="hidden" id="send" name="send" value="1" />
				<input type="submit" class="cz_login_btn" value="Войти"/></td>
				</tr>
				
				<tr>
				<td colspan="2" align="center">
					<div class="cz_restore_pass_btn">
						<a href="/{language}/forgot_password">Восстановить пароль</a>
					</div>
					<div class="cz_reg_btn">
						<a href="#" onclick="javascript:showRegistrationForm(); return false;">Регистрация</a>
					</div>
				</td>		
				</tr>
				</table>
			</div>
		</form>
	</div>
	<div class="hidden">
		<form id="reg_form" method="post" action="">
	    	<p id="reg_error" class="hidden">&nbsp;</p>
			
			<table style="color: #ffffff; text-align: left; font-size: 12px;" width="500" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="120">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
				<tr>
					<td valign="top"><label for="uid">Логин: </label></td>
					<td><input name="login" type="text" id="uid" style="width:180px;" value="<?  echo htmltext($регистрация_логин); ?>" maxlength="12"><br>
				Логин может состоять из цифр и букв английского алфавита.<br> От трёх до двадцати символов. Пример: JohnDoe54</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="pass1">Пароль: </label></td>
					<td><input name="password" type="password" id="pass1" style="width:180px;" value="<?  echo htmltext($регистрация_пароль); ?>"><br>
				Пароль может состоять из цифр и букв английского алфавита. <br> От трёх до двадцати символов.</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="pass2">Повторите пароль: </label></td>
					<td><input name="password2" type="password" id="pass2" style="width:180px;" value="<?  echo htmltext($регистрация_пароль2); ?>"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="email">Ваш email адрес: </label></td>
					<td><input name="email" type="text" maxLength='30' id="email" style="width:180px;" value="<?  echo htmltext($регистрация_email); ?>"><br>
				Пример: yourname@email.com</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td valign="top"><label for="captcha_code">Код: </label></td>
					<td><img id="captcha" src="/engine/securimage/securimage_show_example.php " alt="CAPTCHA Image" />
				<br>
				<a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">Обновить изображение</a><br>
				</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Введите Код:<br></td>
					<td><input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="8" value="<?=htmltext($капча)?>" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="checkbox" name="confirm" id="confirm" value="on" />
						<label for="confirm" class="confirm">Я принимаю <a href="/{language}/terms">правила и условия казино Lavanda</a></label>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
							<input type="submit" class="cz_reg_btn2" value="Зарегистрироватся" id="reg_your_details_submit" />
						
					</td>
				</tr>				
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</form>
	</div>