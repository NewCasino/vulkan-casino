<?php
defined('CASINOENGINE') or die("������ ��������!");
include_once("templates/admin_top.php");
include_once("templates/admin_menu.php");
//
//�������� ����� ���.
//
?>
	<td valign='top'>
		<div class='navigationTop'>
			<div class="line"></div>
			<div class="content">
				<p>���� &gt; ������ ���</p>
			</div>
		</div>
		
		<div class="wrappinContent">
			<?php if($mode != 'edit'): ?>
			<form action='/acp/acp_admin/C_GamesGroup.php?mode=add' method='post'>
				<p>�������� ������:<br/>
				<input type='text' maxlength='40' value='<?=$data['name'];?>' name='name' style='width: 500px;'>
				<input type='submit' value='��������'></p>
			</form>
			<?php endif; ?>
			
			<?php if($mode == 'edit'): ?>
			<form action='' method='post'>
				<p>�������� ������:<br/>
				<input type='text' maxlength='40' value='<?=$data['name'];?>' name='name' style='width: 500px;'>
				<input type='submit' value='���������'>
				</p>
			</form>
			<?php endif; ?>
			
			<p class='pError'>
			<?php foreach($errors as $error): ?>
				<?=$error; ?><br/>
			<?php endforeach; ?>
			</p>
			
			<hr style='margin: 6px 0px;'>
			
		<?php $c = 0; ?>
		<?php foreach($groups as $group): ?>
			<div class='list<?php if($c == 0): ?> oddBg<?php endif; ?>'>
				<p class='pLeft'><?=$group['name']?></p>
				<p class='pRight'>
					<a href='C_GamesGroup.php?mode=delete&id=<?=$group['id']?>' class='red'>�������</a>
					| 
					<a href='C_GamesGroup.php?mode=edit&id=<?=$group['id']?>' class='green'>�������������</a>
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