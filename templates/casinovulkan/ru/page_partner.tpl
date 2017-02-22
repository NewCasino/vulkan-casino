<div class="inner-content">
<aside class="left glow-block c-conform">
<div class="inner-block">
<header>Статистика</header>
				<ul class="menu-list">
						<li>Всего заработано: {part_total}</li>
						<li>Выплачено: {part_withdrawn}</li>
						<li>Ожидает выплаты: {part_pending}</li>
						<li>Текущий баланс: {part_balance}</li>
						<li>Переходов по ссылке: {part_hits}</li>
						<li>Привлечено рефералов: {part_refs}</li>
				</ul>
		</div>
</aside>
<div class="content right glow-block c-conform">
<article class="inner-block">
				<header>
				<h1>Партнёрская программа</h1>
				</header>
<div class="article-text">
		<h1>Ваша ссылка: http://{base_url}/?ref={login}</h1>
		<br>
	<h1>Код ссылки: &lt;a href=&quot;http://{base_url}/?ref={login}&quot; target=&quot;_blank&quot;&gt;Текст ссылки&lt;/a&gt;</h1>
		<br>
					<form method="post">
						<h4 align="center">Заказать выплату</h4>
						<b style="color: red">{validation}</b>
						<b style="color: green">{approve}</b>
						Сумма: 
						<input type="text" class="input" name="withdraw_summ" value="{part_balance}">
						<input type="hidden" name="user" value="{login}">
						<input type="submit" value="Заказать" class="input">
					</form>
							<div id="cz_pp_tabs_gif_tab"><!--GIF-->
				<h4>GIF баннеры</h4>
				<p>
					Баннеры 468 Х 60:<br>
					<img src="/uploads/promo/468x60.gif" border="0"><br/>
					Код баннера:
					<div class="cz_pp_code2">
						&lt;a href=&quot;http://{base_url}/?ref={login}&quot target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://{base_url}/uploads/promo/468x60.gif&quot; border=&quot;0&quot;&gt;&lt;/a&gt;
					</div>
					<img src="/uploads/promo/468x60r1.gif" border="0"><br/>
					Код баннера:
					<div class="cz_pp_code2">
						&lt;a href=&quot;http://{base_url}/?ref={login}&quot target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://{base_url}/uploads/promo/468x60r1.gif&quot; border=&quot;0&quot;&gt;&lt;/a&gt;
					</div>
				</p>
				
				<br>
				<br>
				
				<p>
					Баннер 125 Х 125:<br />
					<img src="/promo/images/125x125.gif" border="0"><br/>
					Код баннера:<br />
					<div class="cz_pp_code2">&lt;a href=&quot;http://{base_url}/?ref={login}&quot target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://{base_url}/promo/images/125x125.gif&quot; border=&quot;0&quot;&gt;&lt;/a&gt;</div>
				</p>
			</div>
			
			<div id="cz_pp_tabs_flash_tab">
				<h4>Flash баннеры</h4>
				<p>
					Баннер 600 Х 200:<br />
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="600px" height="200px">
						<param name="movie" value="http://{base_url}/promo/banner600x200.swf">
						<param name="flashvars" value="link=http://{base_url}/?ref={login}">
						<param name="quality" value="high">
						<embed src="http://{base_url}/promo/banner600x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="600px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false">
						</embed>
					</object>
					<br>
					Код баннера:<br />
					<div class="cz_pp_code2">
						&lt;object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="600px" height="200px"&gt;
						&lt;param name="movie" value="http://{base_url}/promo/banner600x200.swf"&gt;
						&lt;param name="flashvars" value="link=http://{base_url}/?ref={login}"&gt;
						&lt;param name="quality" value="high"&gt;
						&lt;embed src="http://{base_url}/promo/banner600x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="600px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false"&gt;
						&lt;/embed&gt;
						&lt;/object&gt; 				
					</div>
				</p>
					
				<p>
					Баннер 200 Х 200:<br />
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200px" height="200px">
						<param name="movie" value="http://{base_url}/promo/banner200x200.swf">
						<param name="flashvars" value="link=http://{base_url}/?ref={login}">
						<param name="quality" value="high">
						<embed src="http://{base_url}/promo/banner200x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false">
						</embed>
					</object>
					<br/>
					Код баннера:<br />
					<div class="cz_pp_code2">
						&lt;object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200px" height="200px"&gt;
							&lt;param name="movie" value="http://{base_url}/promo/banner200x200.swf"&gt;
							&lt;param name="flashvars" value="link=http://{base_url}/?ref={login}"&gt;
							&lt;param name="quality" value="high"&gt;
							&lt;embed src="http://{base_url}/promo/banner200x200.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200px" height="200px" flashvars="link=http://{base_url}/?ref={login}" menu="false"&gt;
							&lt;/embed&gt;
						&lt;/object&gt;	 			
					</div>
				</p>
			</div>
				<h4 align="center">Статистика за последние 12 месяцев</h4>
				<div align="center">
				{refstats}
				</div>
			</div>
		</div>
	</div>
</div>