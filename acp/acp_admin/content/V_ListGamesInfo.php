<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once("templates/admin_top.php");
include_once("templates/admin_menu.php");
//
//Страница списка игр.
//
?>
	<td valign='top'>
		<div class='navigationTop'>
			<div class="line"></div>
			<div class="content">
				<p>Игры &gt; Информация по играм</p>
				<ul id='nav'>
					<li><a href="C_AddGameInfo.php">Добавить инф.</a></li>
				</ul>
			</div>
		</div>
		
		<div class="wrappinContent">
			<p class='pCenter'>Информация по играм:</p>
			<hr style='margin: 6px 0px;'>
		<?php $c = 0; ?>
		<?php foreach($games as $game): ?>
			<div class='list<?php if($c == 0): ?> oddBg<?php endif; ?>'>
				<p class='pLeft'><?=$game['name']?></p>
				<p class='pRight'>
					<?php if($game['popular'] == 1): ?>
					<a href='C_ListGamesInfo.php?mode=pullof_popular&id=<?=$game['id']?>' class='orange'>Деактивировать</a>
					<?php else: ?>
					<a href='C_ListGamesInfo.php?mode=set_popular&id=<?=$game['id']?>' class='orange'>Активировать</a>
					<?php endif; ?>
					| 
					<a href='C_ListGamesInfo.php?mode=delete&id=<?=$game['id']?>' class='red'>Удалить</a>
					| 
					<a href='C_EditGameInfo.php?id=<?=$game['id']?>' class='green'>Редактировать</a>
				</p>
				<p style='clear: both;'></p>
			</div>
		<?php if($c == 0) $c++; else $c = 0; ?>
		<?php endforeach; ?>
		</div>
		
	</td>
</tr>
<tr style='height: 10px;'></tr>
<?php include_once("templates/admin_footer.php"); ?>