<?php
defined('CASINOENGINE') or die("������ ��������!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
?>
    <td valign='top'>
		<table cellSpacing='0' cellPadding='0' width="100%" border='0' style="margin-top: 15px;">
			<tr>
				<td style='height: 5px; background-color: #C5BCB7;'></td>
			</tr>
			<tr>
				<td class=banner height=40>
					<div id='container' style="margin-left:10px;">
						<p class='topHeader'>���� ���������� &gt; ���������</p>
						<ul id='nav'>
							<li><a class="selected" href="admin_winners_settings.php">���������</a></li>
							<li><a href="admin_winners_statistics.php">���������� �����.</a></li>
						</ul>
					</div>
				</td>
			</tr>
			<tr style="height: 8px"></tr>
		</table>
		<table class='editTable' cellspacing='0' cellpadding='5' border='0'>
			<form method="post" action="">
				<tr>
					<td class='colheader' colSpan='2'>
						���������			
					</td>
				</tr>
				<tr>				
					<td width='40%'>
						<p>����������� �������� ��</p>
						<p>���������� ������������ ���������</p>
					</td>
					<td>
						<p><input type="text" size='12' name='start_money' value="<?=$starMoney; ?>"></p>
						<p><input type="text" size='12' name='count_winners' value="<?=$countWinners; ?>"></p>
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<div style='color: red; font-weight: bold;'>
						<?php foreach($errors as $error): ?>
							<p><?=$error; ?></p>
						<?php endforeach ?>
						</div>
						<input type="submit" class='lgbutton' value="��������" />
					</td>
				</tr>
			</form>
		</table>
	</td>
</tr>
<tr style='height: 10px;'></tr>
<?php include_once("templates/admin_footer.php"); ?>