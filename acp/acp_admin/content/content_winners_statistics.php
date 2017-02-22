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
				<td class='banner' height='40'>
					<div id='container' style="margin-left:10px;">
						<p class='topHeader'>���� ���������� &gt; ���������� �����������</p>
						<ul id='nav'>
							<li><a href="admin_winners_settings.php">���������</a></li>
							<li><a <?php if ($mode != 'edit' && $mode != 'add'): ?>class="selected" <?php endif; ?> href="admin_winners_statistics.php">���������� �����.</a></li>
							<li><a <?php if ($mode == 'add'): ?>class="selected" <?php endif; ?> href="admin_winners_statistics.php?mode=add">�������� ������</a></li>
							<?php if ($mode != 'edit'): ?>
							<li><a style='float: right;' href="admin_winners_statistics.php?mode=update_list">�������� ����������</a></li>
							 <?php endif; ?>
						</ul>
					</div>
				</td>
			</tr>
			<tr style="height: 8px"></tr>
			<?php if ($mode != 'edit' && $mode != 'add'): ?>
			<tr class='tableheader'>
				<td style='padding: 4px 10px;'>
					<span>���������� �����������</span>
					<br >
					<br >
					<span class='navigationWinners'>
						<span><a href="/acp/acp_admin/admin_winners_statistics.php">������������</a></span>
						&nbsp;|&nbsp;
						<span><a href="/acp/acp_admin/admin_winners_statistics.php?mode=locked">��������������</a></span>
						&nbsp;|&nbsp;
						<span><a href="/acp/acp_admin/admin_winners_statistics.php?mode=remnant">��������� ��� ������</a></span>
						&nbsp;|&nbsp;
						<span><a href="/acp/acp_admin/admin_winners_statistics.php?mode=incompatible">�� �������� �� ����������</a></span>
					</span>
				</td>
			</tr>
			<?php endif; ?>
		</table>
		<?php if ($mode != 'edit' && $mode != 'add'): ?>
		<table cellspacing="1" cellpadding="3" border="0" bgcolor="#cccccc" width='100%'>
			<tr class="colheader">
				<td width='10%'>�����</td>
				<td width='10%'>������</td>
				<td width='10%'>������</td>
				<td width='10%'>�������</td>
				<td width='15%'>����</td>
				<td width='45%'>��������� ������</td>
			</tr>
			<?php foreach ($winners as $winner): ?>
			<tr class="colheader" style='font-weight: normal;'>
				<td width='10%' class='tabledata'><?=$winner['login']; ?></td>
				<td width='10%' class='tabledata'>
					<?php if($typeWinners == 'display'): ?>
						<span style='color: green;'>������������</span>
					<?php elseif ($typeWinners == 'locked'): ?>
						<span style='color: red;'>�������������</span>
					<?php elseif($typeWinners == 'remnant'): ?>
						<span style='color: orange;'>��������</span>
					<?php elseif($typeWinners == 'incompatible'): ?>
						<span style='color: gray;'>����������</span>
					<?php endif; ?>	
				</td>
				<td width='10%' class='tabledata'><?=$winner['bet']; ?></td>
				<td width='10%' class='tabledata'><?=$winner['win']; ?></td>
				<td width='15%' class='tabledata'><?=$winner['game']; ?></td>
				<td width='45%' class='tabledata'>
					<a href='/acp/acp_admin/admin_winners_statistics.php?mode=delete&id=<?=$winner['id']?>'>�������</a>
					&nbsp;|&nbsp;
					<a href='/acp/acp_admin/admin_winners_statistics.php?mode=edit&id=<?=$winner['id']?>'>�������������</a>
					&nbsp;|&nbsp;
					<?php if ($winner['activity'] == 0): ?>
						<a href='/acp/acp_admin/admin_winners_statistics.php?mode=activate&id=<?=$winner['id']?>'>������������</a>
					<?php else: ?>
						<a href='/acp/acp_admin/admin_winners_statistics.php?mode=deactivate&id=<?=$winner['id']?>'>��������������</a>
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
						��������������			
					</td>
				</tr>
				<tr>				
					<td width='40%'>
						<p>����� ������������</p>
						<p>������</p>
						<p>�������</p>
						<p>����</p>
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
							<input type="submit" class='lgbutton' value="��������" />
						<?php elseif ($mode == 'add'): ?>
							<input type="submit" class='lgbutton' value="��������" />
						<?php endif; ?>
					</td>
					<td>
					<?php if ($mode == 'edit'): ?>
						<a href='/acp/acp_admin/admin_winners_statistics.php?mode=delete&id=<?=$winner['id']?>'>�������</a>
						&nbsp;|&nbsp;
						<?php if ($winner['activity'] == 0): ?>
							<a href='/acp/acp_admin/admin_winners_statistics.php?mode=activate&id=<?=$winner['id']?>'>������������</a>
						<?php else: ?>
							<a href='/acp/acp_admin/admin_winners_statistics.php?mode=deactivate&id=<?=$winner['id']?>'>��������������</a>
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