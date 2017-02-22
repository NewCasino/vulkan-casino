{webmoney}
[/main]
[webmoney]
		
<div class="inner-content">
			<aside class="left glow-block c-conform">
			<div class="inner-block">
				<header>Касса</header>
				<ul class="menu-list">
	<li class="etc"><a href="/{language}/in">Пополнить счет</a></li>
	<li class="active"><a href="/{language}/out">Получить выигрыш</a></li>
	<li><a href="/{language}/about">История платежей</a></li>
</ul>
			</div>
			</aside>
			<div class="content right glow-block c-conform">
				<article class="inner-block"><header>
				<h1>Получить выигрыш</h1>
				</header>
				<div class="article-text">
<p>
<header>Ваш баланс:{cash}</header>
	</p>
	<div class="hr_m hr_orange">
	</div>
	<div class="b-contacts">
		<div class="b-contacts__blocks">
			<div class="b-contacts__block">
				<div class="b-page__subtit_big fz-20">
					<form method="POST" action="/{language}/out">
	<header>Выберите способ</header>
<div class="line">
	<input name="type" type="radio" VALUE="QIWI" checked id="r3">
	<label for="r3"><b>QIWI кошелёк</b></label>
</div>
<div class="line">
	<input name="type" type="radio" VALUE="WMR" id="r1">
	<label for="r1"><b>Webmoney (WMR)</b> </label>
</div>
<div class="line">
	<input name="type" type="radio" VALUE="YAD" id="r2">
	<label for="r2"><b>Яндекс.Деньги</b></label>
</div>
<div class="line">
	<input name="type" type="radio" VALUE="MASTERCARD" id="r4">
	<label for="r4"><b>Карты MASTERCARD</b></label>
</div>

<div class="line">
	<input name="type" type="radio" VALUE="VISA" id="r5">
	<label for="r5"><b>Карты VISA</b></label>
</div>
<br>
<header>Введите свой номер счета</header>
	<input type="text" name="purse" class='input' size="16"><br>
	<header>Введите сумму которую желаете снять в Рублях</header>
	<input type="text" name="summa" class='input' size="4">
	<input type="hidden" name="action" value="1"><br>
	<input type="hidden" name="mode" value="out">
	<button  type="submit" style="font-size: 15px;">Снять</button>

</form>
<br>
<header>Выплаты осуществляются нашими операторами в течении 2х суток.</header>
				</div>
		</div>
		<br>
		</div>
	</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
[/webmoney]
