<script type="text/javascript">
	var avatarAction = '/{language}/profile'; 
</script>

<div class="wrappingContentTwoColumn">
	<div class="rightColumn">
		<div class="infoBlock">
			<p style="font-size: 24px;">{login}</p>
			<div class="avatarBorder">
				<div class="avatar" style="background: url('{avatar_src}') center center no-repeat;"></div>
			</div>
			
			<a class="selectAvatar" href="javascript:showSelectAvatar();">Выбрать аватарку</a>
			<div class="uploadAvatar">Загрузить фото</div>
			
		</div>
		
		
		<div class="moneyBlock">			
			<p>Игровой счет:</p>
			<p class="rub">{money_rub} <span style="font-size: 16px;">руб</span></p>
		</div>
	</div>

	<div class="leftColumn">
			<div class="wrappingShadowTitle">
				<p class="shadowTitle">Мой профиль</p>
			</div>
			<div style="padding: 20px 40px 10px 50px;">
				<p class="pUserBlocksTitle">Регистрационные данные</p>
				<table class="userTableBlocks">
					<tr>
						<td class="small"><span>ID аккаунта:</span></td>
						<td><div class="divInputStyle">{id}</div></td>
					</tr>
					<tr>
						<td class="small"><span>Логин:</span></td>
						<td><div class="divInputStyle">{login}</div></td>
					</tr>
				</table>
			</div>
			<div style="padding: 20px 40px 10px 50px;">
				<p class="pUserBlocksTitle">Персональные данные</p>
				<table class="userTableBlocks">
					<tr style="width: 520px;">
						<td class="small"><span>Почта:</span></td>
						<td><div class="divInputStyle">{email}</div></td>
					</tr>
					<tr>
						<td colspan='2' style="width: 526px; font-size: 11px; color: #FFFDFD; text-align: justify;">
							<p>Чтобы изменить e-mail, отправьте с текущего ящика письмо по адресу {admin_email} с запросом на изменение и новым почтовым адресом, либо обратитесь в службу поддержки</p>
						</td>	
					</tr>
		<form method="post" action="/{language}/profile">
			<input type="hidden" name="action" value="update">
					<tr>
						<td class="small"><span>Страна:</label></td>
						<td>
							<select name="user_country" class="countrySelect">
								<option value="0">Не указано</option>
								{countries_options}
							</select>
						</td>
					</tr>
					<tr>
						<td class="small"><span><label for="fio">ФИО:</label></span></td>
						<td><input type="text" class="divInputStyle" name="fio" value="{fio}" id="fio" maxlength="80"></td>
					</tr>
					<tr class='errorTr'><td colspan='2'><span>{e_fio}</span></td></tr>
					<tr>
						<td class="small"><span><label for="number_phone">Номер телефона:</label></span></td>
						<td><input type="text" class="divInputStyle" name="number_phone" value="{number_phone}" id="number_phone" maxlength="30"></td>
					</tr>
					<tr class='errorTr'><td colspan='2'><span>{e_phone}</span></td></tr>
					<tr>
						<td class="small"><span>Дата рождения:</span></td>
						<td>
							<select name="birthday_day" class="bithdaySelect" id="birthday_day">
								{birthday_day_options}
							</select>
							<select name="birthday_month" class="bithdaySelect" id="birthday_month">
								{birthday_month_options}
							</select>
							<select name="birthday_year" class="bithdaySelect">
								{birthday_year_options}
							</select>
						</td>
					</tr>
					<tr>
						<td class="small"><span>Пол:</span></td>
						<td>
							<input {gender_man} type="radio" name="gender" value="2" id="gender_man"> <label for="gender_man">Мужской</label>
							&nbsp;&nbsp;
							<input {gender_woman} type="radio" name="gender" value="1" id="gender_woman"> <label for="gender_woman">Женский</label>
						</td>
					</tr>
				</table>
			</div>
			<div style="padding: 20px 40px 10px 50px;">
				<p class="pUserBlocksTitle">Контакты</p>
				<table class="userTableBlocks">
					<tr>
						<td class="small"><span><label for="icq">icq:</label></span></td>
						<td><input type="text" class="divInputStyle" name="icq" value="{icq}" id="icq" maxlength="50"></td>
					</tr>
					<tr class='errorTr'><td colspan='2'><span>{e_icq}</span></td></tr>
					<tr>
						<td class="small"><span><label for="skype">Skype:</label></span></td>
						<td><input type="text" class="divInputStyle" name="skype" value="{skype}" id="skype" maxlength="50"></td>
					</tr>
					<tr class='errorTr'><td colspan='2'><span>{e_skype}</span></td></tr>
				</table>
			</div>
			<div style="padding: 20px 40px 10px 50px;">
				<p class="pUserBlocksTitle">Измения пароля</p>
				<table class="userTableBlocks">
					<tr>
						<td class="small"><span><label for="new_password">Новый пароль:</label></span></td>
						<td><input type="password" class="divInputStyle" name="new_password" id="new_password" maxlength="20"></td>
					</tr>
					<tr class='errorTr'><td colspan='2'><span>{e_new_password}</span></td></tr>
					<tr>
						<td class="small"><span><label for="new_password_repeat">Повторите пароль:</label></span></td>
						<td><input type="password" class="divInputStyle" name="new_password_repeat" id="new_password_repeat" maxlength="20"></td>
					</tr>
					<tr class='errorTr'><td colspan='2'><span>{e_repeat_password}</span></td></tr>
					<tr>
						<td class="small"><span><label for="retro_password">Старый пароль:</label></span></td>
						<td><input type="password" class="divInputStyle" name="retro_password" id="retro_password" maxlength="20"></td>
					</tr>
					<tr class='errorTr'><td colspan='2'><span>{e_retro_password}</span></td></tr>
					<tr>
						<td colspan='2' style="width: 526px; font-size: 15px; color: #CE000F;">{errors}</td>
					</tr>
				</table>
			</div>
					<input type="submit" value="Сохранить" class="saveSubmit">
		</form>
	</div>
</div>

<div style="clear: both;"></div>

<div id="wrappingSelectAvatar">
	<p class='header'>Выберите аватарку:</p>
	[user_avatars]
	<p class="pUserBlocksTitle" style="padding: 10px 15px;">Пользовательские аватарки:</p>
	{user_avatars}
	[/user_avatars]
	
	<p class="pUserBlocksTitle" style="padding: 10px 15px;">Мужские аватарки:</p>
	{man_avatars}
	<div style="clear: both;"></div>
	
	<p class="pUserBlocksTitle" style="padding: 10px 15px;">Женские аватарки:</p>
	{woman_avatars}
	<div style="clear: both;"></div>
</div>
</div>