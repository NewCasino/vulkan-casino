<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once("templates/admin_top.php");
include_once("templates/admin_menu.php");

$count_lotteries = mysql_num_rows(mysql_query("SELECT * FROM casino_lotteries"));
?>
	<td valign='top'>
		<table cellSpacing='0' cellPadding='0' width="100%" border='0' style="margin-top: 15px;">
			<tr>
				<td style='height: 5px; background-color: #C5BCB7;'></td>
			</tr>
			<tr>
				<td class=banner height=40>
					<div id='container' style="margin-left:10px;">
						<p class='topHeader'>Акции &gt;
								<?php if ($режим == ""):?>
									Список акций 
								<?php elseif ($режим == "addlottery"):?>
									Добавление акции
								<?php elseif ($режим == "edit"):?>
									Редактирование акции
								<?php endif; ?>
						</p> 
						<ul id='nav'>
							<li><a <?php if($режим == ""): ?>class="selected"<?php endif; ?> href="admin_lotteries.php">Акции(<?=$count_lotteries; ?>)</a></li>
						</ul>
					</div>
				</td>
			</tr>
			<tr style="height: 8px"></tr>
			<tr>
				<td class=tableheader>
					<?php if ($режим == ""):?>
						<a href="admin_lotteries.php?mode=addlottery" class="style3">Добавить акцию</a>
					<?php elseif ($режим == "addlottery"):?>
						Добавление акции: <a style='color: #fff;' href="<?=$_SERVER['HTTP_REFERER']?>">ВЕРНУТСЯ НАЗАД</a>
					<?php elseif ($режим == "edit"):?>
						Редактрование акции: <a style='color: #fff;' href="<?=$_SERVER['HTTP_REFERER']?>">ВЕРНУТСЯ НАЗАД</a>
					<?php endif; ?>
				</td>
			</tr>
		</table>
<?php if ( $режим == "" ): ?>
	<TABLE cellSpacing=1 bgColor=#cccccc cellPadding=3 width="100%" border=0  style='text-align: center;'>
		<TR class='colheader'>
			<TD width="60%">Название</TD>
			<TD width="40%">Управление</TD>
		</TR>
		<?php
		$lottteries = @mysql_query( "select * from casino_lotteries ORDER BY id_lottery DESC" );
		while ( $lottery = @mysql_fetch_array($lottteries) ):
		?>
			<TR>
				<TD class='tabledata' style='text-align: left;'><?=$lottery['title'];?></TD>
				<TD class='tabledata' vAlign='top'>
					<A href="admin_lotteries.php?mode=edit&id=<?=$lottery['id_lottery'];?>">Редактировать</A>
					&nbsp;|&nbsp;
					<A href="admin_lotteries.php?mode=delete&id=<?=$lottery['id_lottery'];?>">Удалить</A>
				</TD>
			</TR>
		<?php endwhile ?>
	</TABLE>
<?php endif; ?>

<?php if ($режим == "addlottery" || $режим == "edit"): ?>

<script type='text/javascript' src='templates/js/ajaxupload.3.5.js'></script>
<script type='text/javascript' src='templates/js/uploadlotteries.js'></script>

	<?php if ($режим == "addlottery"): ?>
		<form method="post" action="admin_lotteries.php?mode=addlottery">
	<?php elseif ($режим == "edit"): ?>
		<form method="post" action="admin_lotteries.php?mode=edit&id=<?=$id?>">
	<?php endif; ?>
	<table class='editTable' cellSpacing='0' cellPadding='5' border='0' width='100%'>
		<tr><td colSpan='2'>Параметры акции:</td></tr>
		<TR>
			<td>Название:</td>
			<td>
				<INPUT name="title" size='50' maxLength='100' value='<?=$lotteryArray['title']; ?>'>
			</td>
				</TR>
				<TR>
					<TD>Keywords:</TD>
					<TD>
						<INPUT value="<?=$lotteryArray['keywords']?>" name="keywords" size=50 maxLength=100>
					</TD>
				</TR>
				<TR>
					<TD>Description:</TD>
					<TD>
						<INPUT name="description" size='50' value="<?=$lotteryArray['description']?>" maxLength='100'>
					</TD>
				</TR>			
				<TR>
					<TD width="50%" valign='top' style='border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;'>
						<INPUT name="small_img" id='small_img' type='hidden' value='<?=$lotteryArray['img']; ?>'>
						<div id="uploadsmall" ><span>Загрузить новый рисунок<span></div>
						Малый рисунок акции:<small>(<strong>размер рисунка 211х166.</strong>)</small>
						<br>
						<span id="statussmall" ></span>
						<div class='previewsmall'>
							<img src="<?=$dirSmall.$lotteryArray['img']; ?>" alt="<?=$lotteryArray['img']; ?>">
						</div>
					</TD>
					<TD style='border-bottom: 1px solid #ccc; border-top: 1px solid #ccc;'>
						<ul id="filessmall" class='uploadfiles'>
							<?php
								$files = scandir($dirSmall);
								foreach ($files as $file){
									if (strlen($file) > 4){
										$ext = substr($file, strrpos($file, '.'));
										if (in_array($ext,$filetypes))
											echo 
											'<li>
												<div class="gray">
													<img alt="'.$file.'" src="'.$dirSmall.$file.'">
												</div>
												'.$file.'
												<a href="#" style="color: red;">Del</a>
											</li>';
									}
								}
							?>
						</ul>
					</TD>
				</TR>
				<TR>
					<TD valign='top' style='border-bottom: 1px solid #ccc;'>
						<INPUT name="big_img" id='big_img' type='hidden' value='<?=$lotteryArray['img_big']; ?>'>
						<div id="uploadbig" ><span>Загрузить новый рисунок<span></div>
						<label>
							<input type='checkbox' name='need_big' value='yes' <?php if($lotteryArray['display_big'] == 1): ?> checked <?php endif;?>>Транслировать рисунок в большем слайдере.
						</label>
						<br>
						<span style="color: red;"><strong>*Не обязательно</strong></span>
						<small>установите галочку для использования(<strong>размер рисунка 698х230.</strong>)</small>
						<br>
						<span id="statusbig" ></span>
						<div class='previewbig'>
							<img src="<?=$dirBig.$lotteryArray['img_big']; ?>" alt="<?=$lotteryArray['img_big']; ?>">
						</div>
					</TD>
					<TD style='border-bottom: 1px solid #ccc;'>
						<ul id="filesbig">
							<?php
								$files = scandir($dirBig);
								foreach ($files as $file){
									if (strlen($file) > 4){
										$ext = substr($file, strrpos($file, '.'));
										if (in_array($ext,$filetypes))
											echo 
											'<li>
												<div class="gray">
													<img alt="'.$file.'" src="'.$dirBig.$file.'">
												</div>
												'.$file.'
												<a href="#" style="color: red;">Del</a>
											</li>';
									}
								}
							?>
						</ul>
					</TD>
				</TR>
				<TR>
					<TD width="50%">Дата старта акции:</TD>
					<TD>
						<?php if ($режим == "addlottery"): ?>
							<INPUT name="date_start" value="<?=date('Y-m-d');?>" size=10 maxLength=10>
						<?php elseif ($режим == "edit"): ?>
							<INPUT name="date_start" value="<?=$lotteryArray['date_start']?>" size=10 maxLength=10>
						<?php endif; ?>
					</TD>
				</TR>
				<TR>
					<TD>Дата окончания акции:</TD>
					<TD>
						<?php if ($режим == "addlottery"): ?>
							<INPUT name="date_end" value="<?=date('Y-m-d', time()+3600*24*31);?>" size=10 maxLength=10>
						<?php elseif ($режим == "edit"): ?>
							<INPUT name="date_end" id="affilpercentage" value="<?=$lotteryArray['date_end']?>" size=10 maxLength=10>
						<?php endif; ?>
						
					</TD>
				</TR>
				<TR>
					<TD class=colheader colSpan=2>Краткая акция (желательно до 50 символов)</TD>
				</TR>
				<TR>
					<TD>Краткое описание акции:<small>(рекомендуемая длина до 50 символов, не использовать тэги)</small></TD>
					<TD>
						<textarea name="lottery_short" cols="40"><?=$lotteryArray['short_story'];?></textarea>
					</TD>
				</TR>
				<TR>
					<TD class=colheader colSpan=2>Полная акция</TD>
				</TR>
				<TR>
					<TD colspan="2">
						<div id="alerts">
							<noscript>
								<p>
									<strong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript tsupport, like yours, you should still see the contents (HTML data) and you should tbe able to edit it normally, without a rich editor interface.
								</p>
							</noscript>
						</div>
						<!-- This <fieldset> holds the HTML that you will usually find in your pages. -->
						<fieldset title="Output" style='width: 98%'>
							<p>
								<?php
								include_once( "ckeditor/ckeditor.php" );
								$CKEditor = new CKEditor( );
								$CKEditor->basePath = "ckeditor/";
								$CKEditor->editor("lottery_full", $lotteryArray['full_story']);
								?>
							</p>
						</fieldset>
					</TD>
				</TR>
				<tr>
					<td colspan='2'>
						<div style='color: red; font-weight: bold;'>
							<?php foreach ($errors as $error): ?>
								<p><?=$error; ?></p>
							<?php endforeach; ?>
						</div>
						<?php if ($режим == "addlottery"): ?>
							<input type="submit" class='lgbutton' value="Добавить акцию" />
						<?php elseif ($режим == "edit"): ?>
							<input type="submit" class='lgbutton' value="Сохранить изменения" />
						<?php endif; ?>
					</td>
				</tr>
		</TABLE>                        
	</form>	
<?php endif; ?>
	</TD>
</TR>
<tr style='height: 10px;'></tr>
<?php
include_once( "templates/admin_footer.php" );
?>