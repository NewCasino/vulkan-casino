<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once("templates/admin_top.php");
include_once("templates/admin_menu.php");
//
//Страница добавления информации по играм.
//
?>
<script type='text/javascript' src='templates/js/gamesinfo.js'></script>


	<td valign='top'>
		<div class='navigationTop'>
			<div class="line"></div>
			<div class="content">
				<p>Игры &gt; добавления информации по играм</p>
				<ul id='nav'>
					<li><a class='selected' href="C_AddGameInfo.php">Добавить инф.</a></li>
				</ul>
			</div>
		</div>
		
		<div class="wrappinContent">
			<form action='' method='post'>
				<p>Название игры:</p>
				<p class='pError'><?=$errors['name']?></p>
				<p>
					<input type='text' maxlength='50' value='<?=$data['name'];?>' name='name' style='width: 500px;'>
				</p>
				
				<p>Ссылка на игру: <small>Пример(/games/amarok/IndianaCroft/)</small></p>
				<p class='pError'><?=$errors['link_game']?></p>
				<p>
					<input type='text' maxlength='100' value='<?=$data['link_game'];?>' name='link_game' style='width: 500px;'>
				</p>
				
				<p>Введите желаемый URL-параметр по которому будет отображаться иформация о игре: <br/> <small><strong>Пример(pantheon) будет доступен по адресу game_info/pantheon.html</strong></small></p>
				<p class='pError'><?=$errors['link_info']?></p>
				<p>
					<input type='text' maxlength='50' value='<?=$data['link_info'];?>' name='link_info' style='width: 500px;'>
				</p>
				
				<p>Группа игры:</p>
				<p class='pError'><?=$errors['id_group']?></p>
				<p>
					<select name='id_group' style='width: 300px;'>
						<option value='0'>Не выбрано</option>
					<?php foreach($groups as $group): ?>
						<option <?php if($data['id_group']==$group['id']): ?>selected<?php endif;?> value='<?=$group['id']?>'><?=$group['name']?></option>
					<?php endforeach; ?>
					</select>
				</p>
				
				<p class='block_ch'>Характеристика игр:<br/>
					<?php if(count($data['characteristics']) <1): ?>
					<p>
						<input class='ch_name' name='ch_name' style='width: 240px;' value='название характеристики'>
						<input class='ch_value' name='ch_value' style='width: 240px;' value='значение характеристики'>
						<a title='удалить' href='#' class='delete_ch red'>X</a>
						<a title='добавить' class='add_ch green' href='#'>+</a>
					</p>
					<?php else: ?>
					<?php $c = 1; ?>
					<?php foreach($data['characteristics'] as $charN=>$charV): ?>
					<p>
						<input class='ch_name' name='ch_name' style='width: 240px;' value='<?=$charN;?>'>
						<input class='ch_value' name='ch_value' style='width: 240px;' value='<?=$charV;?>'>
						<a title='удалить' href='#' class='delete_ch red'>X</a>
						<?php if(count($data['characteristics']) == $c): ?>
						<a title='добавить' class='add_ch green' href='#'>+</a>
						<?php endif; ?>
					</p>
					<?php $c++; ?>
					<?php endforeach; ?>
					<?php endif; ?>
					<input type='hidden' name='characteristics'>
				</p>
				
				<p>Ключевые слова (Keywords) для ПС.</p>
				<p class='pError'><?=$errors['meta_keywords']?></p>
				<p>
					<input type='text' maxlength='200' value='<?=$data['meta_keywords'];?>' name='meta_keywords' style='width: 500px;'>
				</p>
				
				<p>Описание страницы (Description) для ПС.</p>
				<p class='pError'><?=$errors['meta_description']?></p>
				<p>
					<input type='text' maxlength='200' value='<?=$data['meta_description'];?>' name='meta_description' style='width: 500px;'>
				</p>
				
				<hr>
				<div class='wrappingUploadScreenshots'>
					<div style='width: 280px;' class='pLeft'>
						<p class='block_sc'><span class='blue pBold'>Скриншоты игры:</span><br/>
							<?php if (count($data['screenshots']) <1): ?>
							<p>
								<input class='sc_value' name='sc_value' style='width: 240px;' value='название рисунка'>
								<a title='удалить' href='' class='delete_sc red'>X</a>
								<a title='добавить' class='add_sc green' href=''>+</a>
							</p>
							<?php else: ?>
							<?php $c = 1; ?>
							<?php foreach($data['screenshots'] as $screenN): ?>
							<p>
								<input class='sc_value' name='sc_value' style='width: 240px;' value='<?=$screenN;?>'>
								<a title='удалить' href='' class='delete_sc red'>X</a>
								<?php if(count($data['screenshots']) == $c): ?>
								<a title='добавить' class='add_sc green' href=''>+</a>
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
							<p class='pBold red'>Предпочтительный размер загружаемого рисунка 495х369 пикселей.</p>
							<p>
								<span><a href='' class='uploadButtom'>Загрузить рисунок</a></span>
								|
								<span>Название рисунка: <input class='name_img'></span>
								&nbsp;&nbsp;
								<span class="status"></span>
							</p>
						</p>
						
						<div class="wrappingImgToSelect">
						<?php foreach ($imgsScreenshots as $imgScreenshots): ?>
							<div class='block'>
								<div class='wrappingImage'><img src="<?=$dirScreenshots.$imgScreenshots;?>" alt="<?=$imgScreenshots;?>"></div>
								<a href='' title='<?=$imgScreenshots;?>'>Удалить</a>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
					<br class='pClear'>
				</div>
				<hr>
				<div class='wrappingSubmissions'>
					<div style='width: 280px;' class='pLeft'>
						<p><span class='blue pBold'>Заставка игры:</span></p>
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
								<p class='pBold red'>Предпочтительный размер загружаемого рисунка 211х166 пикселей.</p>
								<span><a class='uploadButtom'>Загрузить рисунок</a></span>
								&nbsp;&nbsp;
								<span class="status"></span>
							</p>
						</p>
						
						<div class="wrappingImgToSelect">
						<?php foreach ($imgsSubmissions as $imgSubmissions): ?>
							<div class='block'>
								<div class='wrappingImage'><img src="<?=$dirSubmissions.$imgSubmissions;?>" alt="<?=$imgSubmissions;?>"></div>
								<a href='' title='<?=$imgSubmissions;?>'>Удалить</a>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
					<br class='pClear'>
				</div>
				<hr>

				<p>Описание игры:</p>
				<p>
					<?php
					include_once("ckeditor/ckeditor.php");
					$CKEditor = new CKEditor();
					$CKEditor->basePath = "ckeditor/";
					$CKEditor->editor("description",$data['description']);
					?>
				</p>
				<br/>
				
				<p>Правила игры:</p>
				<p>
					<?php
					include_once("ckeditor/ckeditor.php");
					$CKEditor = new CKEditor();
					$CKEditor->basePath = "ckeditor/";
					$CKEditor->editor("rules",$data['rules']);
					?>
				</p>
				<input type='submit' value='Добавить' class='add_info'>
			</form>
		</div>
		
	</td>
</tr>
<tr style='height: 10px;'></tr>
<?php include_once("templates/admin_footer.php"); ?>