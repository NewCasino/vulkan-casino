<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
?>
    <td valign='top'>
		<table cellSpacing='0' cellPadding='0' width="100%" border='0' style="margin-top: 15px;">
			<tr>
				<td style='height: 5px; background-color: #C5BCB7;'></td>
			</tr>
			<tr>
				<td class='banner' height='40'>
					<div id='container' style="margin-left:10px;">
						<p class='topHeader'>Наши победители &gt; Статистика победителей</p>
						<ul id='nav'>
							<li><a href="admin_winners_settings.php">Настройки</a></li>
							<li><a <?php if ($mode != 'edit' && $mode != 'add'): ?>class="selected" <?php endif; ?> href="admin_winners_statistics.php">Статистика побед.</a></li>
							<li><a <?php if ($mode == 'add'): ?>class="selected" <?php endif; ?> href="admin_winners_statistics.php?mode=add">Добавить победу</a></li>
							<?php if ($mode != 'edit'): ?>
							<li><a style='float: right;' href="admin_winners_statistics.php?mode=update_list">Обновить статистику</a></li>
							 <?php endif; ?>
						</ul>
					</div>
				</td>
			</tr>
			<tr style="height: 8px"></tr>
			<?php if ($mode != 'edit' && $mode != 'add'): ?>
			<tr class='tableheader'>
				<td style='padding: 4px 10px;'>
					<span>Статистика победителей</span>
					<br >
					<br >
					<span class='navigationWinners'>
						<span><a href="/acp/acp_admin/admin_winners_statistics.php">Отображаемые</a></span>
						&nbsp;|&nbsp;
						<span><a href="/acp/acp_admin/admin_winners_statistics.php?mode=locked">Заблокированые</a></span>
						&nbsp;|&nbsp;
						<span><a href="/acp/acp_admin/admin_winners_statistics.php?mode=remnant">Доступные для показа</a></span>
						&nbsp;|&nbsp;
						<span><a href="/acp/acp_admin/admin_winners_statistics.php?mode=incompatible">Не подходят по параметрам</a></span>
					</span>
				</td>
			</tr>
			<?php endif; ?>
		</table>
		<?php if ($mode != 'edit' && $mode != 'add'): ?>
		<table cellspacing="1" cellpadding="3" border="0" bgcolor="#cccccc" width='100%'>
			<tr class="colheader">
				<td width='10%'>Игрок</td>
				<td width='10%'>Статус</td>
				<td width='10%'>Ставка</td>
				<td width='10%'>Выигрыш</td>
				<td width='15%'>Игра</td>
				<td width='45%'>Настройки записи</td>
			</tr>
			<?php foreach ($winners as $winner): ?>
			<tr class="colheader" style='font-weight: normal;'>
				<td width='10%' class='tabledata'><?=$winner['login']; ?></td>
				<td width='10%' class='tabledata'>
					<?php if($typeWinners == 'display'): ?>
						<span style='color: green;'>Отображается</span>
					<?php elseif ($typeWinners == 'locked'): ?>
						<span style='color: red;'>Заблокировано</span>
					<?php elseif($typeWinners == 'remnant'): ?>
						<span style='color: orange;'>Доступно</span>
					<?php elseif($typeWinners == 'incompatible'): ?>
						<span style='color: gray;'>Неподходит</span>
					<?php endif; ?>	
				</td>
				<td width='10%' class='tabledata'><?=$winner['bet']; ?></td>
				<td width='10%' class='tabledata'><?=$winner['win']; ?></td>
				<td width='15%' class='tabledata'><?=$winner['game']; ?></td>
				<td width='45%' class='tabledata'>
					<a href='/acp/acp_admin/admin_winners_statistics.php?mode=delete&id=<?=$winner['id']?>'>Удалить</a>
					&nbsp;|&nbsp;
					<a href='/acp/acp_admin/admin_winners_statistics.php?mode=edit&id=<?=$winner['id']?>'>Редактировать</a>
					&nbsp;|&nbsp;
					<?php if ($winner['activity'] == 0): ?>
						<a href='/acp/acp_admin/admin_winners_statistics.php?mode=activate&id=<?=$winner['id']?>'>Активировать</a>
					<?php else: ?>
						<a href='/acp/acp_admin/admin_winners_statistics.php?mode=deactivate&id=<?=$winner['id']?>'>Деактивировать</a>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>
		<?php if ($mode == 'edit' || $mode == 'add'): ?>
		<table class='editTable' cellspacing='0' cellpadding='5' border='0'>
			<form method="post" action="">
				<tr>
					<td class='colheader' colSpan='2'>
						Редактирование			
					</td>
				</tr>
				<tr>				
					<td width='40%'>
						<p>Логин пользователя</p>
						<p>Ставка</p>
						<p>Выигрыш</p>
						<p>Игра</p>
					</td>
					<td>
						<p><input type="text" size='50' name='login' value="<?=$winner['login']; ?>"></p>
						<p><input type="text" size='50' name='bet' value="<?=$winner['bet']; ?>"></p>
						<p><input type="text" size='50' name='win' value="<?=$winner['win']; ?>"></p>
						<p><input type="text" size='50' name='game' value="<?=$winner['game']; ?>"></p>
					</td>
				</tr>
				<tr>
					<td>
						<div style='color: red; font-weight: bold;'>
						<?php foreach($errors as $error): ?>
							<p><?=$error; ?></p>
						<?php endforeach ?>
						</div>
						<?php if ($mode == 'edit'): ?>
							<input type="submit" class='lgbutton' value="Изменить" />
						<?php elseif ($mode == 'add'): ?>
							<input type="submit" class='lgbutton' value="Добавить" />
						<?php endif; ?>
					</td>
					<td>
					<?php if ($mode == 'edit'): ?>
						<a href='/acp/acp_admin/admin_winners_statistics.php?mode=delete&id=<?=$winner['id']?>'>Удалить</a>
						&nbsp;|&nbsp;
						<?php if ($winner['activity'] == 0): ?>
							<a href='/acp/acp_admin/admin_winners_statistics.php?mode=activate&id=<?=$winner['id']?>'>Активировать</a>
						<?php else: ?>
							<a href='/acp/acp_admin/admin_winners_statistics.php?mode=deactivate&id=<?=$winner['id']?>'>Деактивировать</a>
						<?php endif; ?>
					<?php endif; ?>
					</td>
				</tr>
			</form>
		</table>
		<?php endif; ?>
	</td>
</tr>
<tr style='height: 10px;'></tr>
<?php include_once("templates/admin_footer.php"); ?>