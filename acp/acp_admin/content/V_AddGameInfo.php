<?php
defined('CASINOENGINE') or die("������ ��������!");
include_once("templates/admin_top.php");
include_once("templates/admin_menu.php");
//
//�������� ���������� ���������� �� �����.
//
?>
<script type='text/javascript' src='templates/js/gamesinfo.js'></script>


	<td valign='top'>
		<div class='navigationTop'>
			<div class="line"></div>
			<div class="content">
				<p>���� &gt; ���������� ���������� �� �����</p>
				<ul id='nav'>
					<li><a class='selected' href="C_AddGameInfo.php">�������� ���.</a></li>
				</ul>
			</div>
		</div>
		
		<div class="wrappinContent">
			<form action='' method='post'>
				<p>�������� ����:</p>
				<p class='pError'><?=$errors['name']?></p>
				<p>
					<input type='text' maxlength='50' value='<?=$data['name'];?>' name='name' style='width: 500px;'>
				</p>
				
				<p>������ �� ����: <small>������(/games/amarok/IndianaCroft/)</small></p>
				<p class='pError'><?=$errors['link_game']?></p>
				<p>
					<input type='text' maxlength='100' value='<?=$data['link_game'];?>' name='link_game' style='width: 500px;'>
				</p>
				
				<p>������� �������� URL-�������� �� �������� ����� ������������ ��������� � ����: <br/> <small><strong>������(pantheon) ����� �������� �� ������ game_info/pantheon.html</strong></small></p>
				<p class='pError'><?=$errors['link_info']?></p>
				<p>
					<input type='text' maxlength='50' value='<?=$data['link_info'];?>' name='link_info' style='width: 500px;'>
				</p>
				
				<p>������ ����:</p>
				<p class='pError'><?=$errors['id_group']?></p>
				<p>
					<select name='id_group' style='width: 300px;'>
						<option value='0'>�� �������</option>
					<?php foreach($groups as $group): ?>
						<option <?php if($data['id_group']==$group['id']): ?>selected<?php endif;?> value='<?=$group['id']?>'><?=$group['name']?></option>
					<?php endforeach; ?>
					</select>
				</p>
				
				<p class='block_ch'>�������������� ���:<br/>
					<?php if(count($data['characteristics']) <1): ?>
					<p>
						<input class='ch_name' name='ch_name' style='width: 240px;' value='�������� ��������������'>
						<input class='ch_value' name='ch_value' style='width: 240px;' value='�������� ��������������'>
						<a title='�������' href='#' class='delete_ch red'>X</a>
						<a title='��������' class='add_ch green' href='#'>+</a>
					</p>
					<?php else: ?>
					<?php $c = 1; ?>
					<?php foreach($data['characteristics'] as $charN=>$charV): ?>
					<p>
						<input class='ch_name' name='ch_name' style='width: 240px;' value='<?=$charN;?>'>
						<input class='ch_value' name='ch_value' style='width: 240px;' value='<?=$charV;?>'>
						<a title='�������' href='#' class='delete_ch red'>X</a>
						<?php if(count($data['characteristics']) == $c): ?>
						<a title='��������' class='add_ch green' href='#'>+</a>
						<?php endif; ?>
					</p>
					<?php $c++; ?>
					<?php endforeach; ?>
					<?php endif; ?>
					<input type='hidden' name='characteristics'>
				</p>
				
				<p>�������� ����� (Keywords) ��� ��.</p>
				<p class='pError'><?=$errors['meta_keywords']?></p>
				<p>
					<input type='text' maxlength='200' value='<?=$data['meta_keywords'];?>' name='meta_keywords' style='width: 500px;'>
				</p>
				
				<p>�������� �������� (Description) ��� ��.</p>
				<p class='pError'><?=$errors['meta_description']?></p>
				<p>
					<input type='text' maxlength='200' value='<?=$data['meta_description'];?>' name='meta_description' style='width: 500px;'>
				</p>
				
				<hr>
				<div class='wrappingUploadScreenshots'>
					<div style='width: 280px;' class='pLeft'>
						<p class='block_sc'><span class='blue pBold'>��������� ����:</span><br/>
							<?php if (count($data['screenshots']) <1): ?>
							<p>
								<input class='sc_value' name='sc_value' style='width: 240px;' value='�������� �������'>
								<a title='�������' href='' class='delete_sc red'>X</a>
								<a title='��������' class='add_sc green' href=''>+</a>
							</p>
							<?php else: ?>
							<?php $c = 1; ?>
							<?php foreach($data['screenshots'] as $screenN): ?>
							<p>
								<input class='sc_value' name='sc_value' style='width: 240px;' value='<?=$screenN;?>'>
								<a title='�������' href='' class='delete_sc red'>X</a>
								<?php if(count($data['screenshots']) == $c): ?>
								<a title='��������' class='add_sc green' href=''>+</a>
								<?php endif; ?>
							</p>
							<?php $c++; ?>
							<?php endforeach; ?>
							<?php endif; ?>
							<input type='hidden' name='screenshots'>
						</p>
					</div>
					<div class='pRight'>
						<p>
							<p class='pBold red'>���������������� ������ ������������ ������� 495�369 ��������.</p>
							<p>
								<span><a href='' class='uploadButtom'>��������� �������</a></span>
								|
								<span>�������� �������: <input class='name_img'></span>
								&nbsp;&nbsp;
								<span class="status"></span>
							</p>
						</p>
						
						<div class="wrappingImgToSelect">
						<?php foreach ($imgsScreenshots as $imgScreenshots): ?>
							<div class='block'>
								<div class='wrappingImage'><img src="<?=$dirScreenshots.$imgScreenshots;?>" alt="<?=$imgScreenshots;?>"></div>
								<a href='' title='<?=$imgScreenshots;?>'>�������</a>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
					<br class='pClear'>
				</div>
				<hr>
				<div class='wrappingSubmissions'>
					<div style='width: 280px;' class='pLeft'>
						<p><span class='blue pBold'>�������� ����:</span></p>
						<p class='pError'><?=$errors['img']?></p>
						<div class='previewImageBlock'>
							<?php if(!empty($data['img'])):?>
							<img src='<?=$dirSubmissions.$data['img']; ?>'>
							<?php endif; ?>
						</div>
						<input type='hidden' name='img' class='name_img' value='<?=$data['img'];?>'>
					</div>
					<div class='pRight'>
						<p>
							<p>
								<p class='pBold red'>���������������� ������ ������������ ������� 211�166 ��������.</p>
								<span><a class='uploadButtom'>��������� �������</a></span>
								&nbsp;&nbsp;
								<span class="status"></span>
							</p>
						</p>
						
						<div class="wrappingImgToSelect">
						<?php foreach ($imgsSubmissions as $imgSubmissions): ?>
							<div class='block'>
								<div class='wrappingImage'><img src="<?=$dirSubmissions.$imgSubmissions;?>" alt="<?=$imgSubmissions;?>"></div>
								<a href='' title='<?=$imgSubmissions;?>'>�������</a>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
					<br class='pClear'>
				</div>
				<hr>

				<p>�������� ����:</p>
				<p>
					<?php
					include_once("ckeditor/ckeditor.php");
					$CKEditor = new CKEditor();
					$CKEditor->basePath = "ckeditor/";
					$CKEditor->editor("description",$data['description']);
					?>
				</p>
				<br/>
				
				<p>������� ����:</p>
				<p>
					<?php
					include_once("ckeditor/ckeditor.php");
					$CKEditor = new CKEditor();
					$CKEditor->basePath = "ckeditor/";
					$CKEditor->editor("rules",$data['rules']);
					?>
				</p>
				<input type='submit' value='��������' class='add_info'>
			</form>
		</div>
		
	</td>
</tr>
<tr style='height: 10px;'></tr>
<?php include_once("templates/admin_footer.php"); ?>