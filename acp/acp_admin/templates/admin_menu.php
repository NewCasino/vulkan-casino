<?php
if (!defined("CASINOENGINE")) exit("<script>location.href='/';</script>");
  
$a = $_SESSION['session_admin'];

$categories = array (
	array (
		'id' => 1,
		'issetSub' => false,
		'name' => 'Центр Поддержки',
		'menuName' => '',
		'href' => 'index.php'
	),
	array (
		'id' => 2,
		'issetSub' => true,
		'name' => 'Настройки Казино',
		'menuName' => 'config',
		'href' => ""
	),
	array (
		'id' => 3,
		'issetSub' => true,
		'name' => 'Парт. программа',
		'menuName' => 'partnership',
		'href' => ""
	),
	array (
		'id' => 4,
		'issetSub' => true,
		'name' => 'Пользователи',
		'menuName' => 'user',
		'href' => ""
	),
	array (
		'id' => 5,
		'issetSub' => true,
		'name' => 'Финансы',
		'menuName' => 'pay',
		'href' => ""
	),
	array (
		'id' => 6,
		'issetSub' => true,
		'name' => 'Новости',
		'menuName' => 'article',
		'href' => ""
	),
	array (
		'id' => 7,
		'issetSub' => true,
		'name' => 'Акции',
		'menuName' => 'lotteries',
		'href' => ""
	),
	array (
		'id' => 8,
		'issetSub' => true,
		'name' => 'Игры',
		'menuName' => 'games',
		'href' => ""
	),
	array (
		'id' => 9,
		'issetSub' => true,
		'name' => 'Дополнительно',
		'menuName' => 'module',
		'href' => ""
	),
	array (
		'id' => 10,
		'issetSub' => true,
		'name' => 'Стат. &amp; Аналитика',
		'menuName' => 'statistic',
		'href' => ""
	),
	array (
		'id' => 11,
		'issetSub' => true,
		'name' => 'Наши победители',
		'menuName' => 'winners',
		'href' => ""
	)
);

$subcategories = array(
	array (
		'category' => 2,
		'href' => 'admin_config.php',
		'name' => 'Главные Настройки'
	),
	array (
		'category' => 2,
		'href' => 'admin_config_bank.php',
		'name' => 'Настройки Банков'
	),
	array (
		'category' => 2,
		'href' => 'admin_config_jp.php',
		'name' => 'Настройки Джекпотов'
	),
	array (
		'category' => 2,
		'href' => 'admin_config_pay.php',
		'name' => 'Платежные Настройки'
	),
	array (
		'category' => 2,
		'href' => 'admin_config_profile.php',
		'name' => 'Изменить пароль'
	),
	array (
		'category' => 3,
		'href' => 'admin_partnership_options.php',
		'name' => 'Настройки'
	),
	array (
		'category' => 3,
		'href' => 'admin_partnership_users.php',
		'name' => 'Список партнёров'
	),
	array (
		'category' => 3,
		'href' => 'admin_partnership_withdraw.php',
		'name' => 'Вывод средств'
	),
	array (
		'category' => 4,
		'href' => 'admin_userlist.php',
		'name' => 'Список Пользователей'
	),
	array (
		'category' => 5,
		'href' => 'admin_pay_deposit.php',
		'name' => 'Внесли'
	),
	array (
		'category' => 5,
		'href' => 'admin_pay_withdrawals.php',
		'name' => 'Выплаты'
	),
	array (
		'category' => 6,
		'href' => 'admin_news.php',
		'name' => 'Новости'
	),
	array (
		'category' => 7,
		'href' => 'admin_lotteries.php',
		'name' => 'Акции'
	),
	array (
		'category' => 8,
		'href' => 'admin_config_games.php',
		'name' => 'Настройки Игр'
	),
	array (
		'category' => 8,
		'href' => 'C_GamesGroup.php',
		'name' => 'Группы игр'
	),
	array (
		'category' => 8,
		'href' => 'C_ListGamesInfo.php',
		'name' => 'Информация по играм'
	),
	array (
		'category' => 9,
		'href' => 'admin_mass_email.php',
		'name' => 'Рассылка E-Mail'
	),
	array (
		'category' => 9,
		'href' => 'admin_mass_pm.php',
		'name' => 'Рассылка ПМ'
	),
	array (
		'category' => 10,
		'href' => 'admin_statistic_history.php',
		'name' => 'Игровая статистика'
	),
	array (
		'category' => 11,
		'href' => 'admin_winners_settings.php',
		'name' => 'Настройки'
	),
	array (
		'category' => 11,
		'href' => 'admin_winners_statistics.php',
		'name' => 'Статистика победителей'
	)
);

?>

<style type='text/css'>
	.menuBg a img{
		border: 0;
		widht: 8px;
		height: 8px;
	}
	
	.elementMenuNotSubs{
		background: #F5F5F5;
		width:158px; 
	}
</style>

<TABLE cellSpacing="0" cellPadding="0" width="100%" border="0">
	<TR>
		<TD vAlign="top" width="180">
			<TABLE class="printHidden" cellSpacing="0" cellPadding="0" border="0">
				<TR>
					<TD width="180">
						<TABLE cellSpacing="0" cellPadding="0" border="0">
							<TR>
								<TD colSpan=2>
									<IMG height=16 src="templates/images/member_top.gif" width=180>
								</TD>
							</TR>
							<TR>
								<TD bgColor=#f8f8f8>
									<IMG height=39 src="templates/images/spacer.gif" width=23>
								</TD>
								<TD class=copymidbrn width=157 bgColor=#f8f8f8>
									<br>
									<strong>Вы зашли как: <?=$a; ?></strong>
								</TD>
							</TR>
							<TR>
								<TD colSpan=2>
									<IMG height=17 src="templates/images/member_bottom.gif" width=180>
								</TD>
							</TR>
						</TABLE>
					</TD>
				</TR>
				<TR>
					<TD>
						<TABLE class=navigationTable cellSpacing=0 cellPadding=0 border=0>
							<TR>
								<TD>
									<TABLE cellSpacing=2 cellPadding=0 border=0 width="170">
<?php foreach ($categories as $category): ?>
	<tr>
		<td>
			<div class='menuBg'>
			<?php if ($category['issetSub'] == false): ?>
				<a class='mI <?php if($category['href'] == $menu_sub) echo 'elementMenuNotSubs'; ?>' href="<?=$category['href'];?>"><?=$category['name']; ?></a>
			<?php else: ?>
				<a class='mI' href="javascript:showHideTable('innerTable<?=$category['id']; ?>')"><img src="templates/images/nav_arrow_timp.gif"> <?=$category['name']; ?></a>
			<?php endif; ?>
					
				<table id='innerTable<?=$category['id']; ?>' style="DISPLAY: <?if ($menu == $category['menuName'])echo "block";else echo "none";?>" cellSpacing='0' cellPadding='0' width="100%">
					<?php foreach($subcategories as $subcategory): ?>
						<?php if($category['id'] == $subcategory['category']): ?>
								<tr>
									<td noWrap>
										<a class="
										<?php
											if ($menu_sub == $subcategory['href'])
												echo "mI_on";
											else
												echo "mI2";
										?>
										" href="<?=$subcategory['href'];?>"><?=$subcategory['name'];?></a>
									</TD>
								</TR>
						<?php endif; ?> 
					<?php endforeach; ?>
				</table>	
			</div>
		</td>
	</tr>
<?php endforeach; ?>
</TABLE>
</TD>
</TR>
</TABLE>
</TD>
</TR>
</TABLE>
</TD>