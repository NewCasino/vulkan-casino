<article class="inner-block">
[main]
{freekassa}
{statistic}
[/main]
[freekassa]
<div class="inner-content">
			<aside class="left glow-block c-conform">
			<div class="inner-block">
				<header>�����</header>
				<ul class="menu-list">
	<li class="active"><a href="/{language}/in">��������� ����</a></li>
	<li><a href="/{language}/out">�������� �������</a></li>
	<li><a href="/{language}/about">������� ��������</a></li>
</ul>
			</div>
			</aside>
			<div class="content right glow-block c-conform">
				<article class="inner-block"><header>
				<h1>��������� ����</h1>
				</header>
				<div class="article-text">
		<TABLE width="100%">
		<TBODY>
		<TR vAlign=top>
		<TD width="100%">

		<form method="POST" action="/{language}/in">
		<header>������� ����� ��� ���������� ����� � ������</header>
			<input type="text" name="summa" size="1" value="1000"><br>
			<input type="hidden" name="mode" value="pay_freekassa">
			<button type="submit" name="process" style="font-size: 15px;"  >���������</button>
			
		</form>
		</TD>
		</TR>
		</TABLE>
</form>
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
[/freekassa]
[freekassa_proccess]


		<TABLE style="width: 905px;">
		<TBODY>
		<tr><td style="padding-bottom:10;"><h4>���������� �ר�� ����� ������� freekassa</h4><a href="http://www.free-kassa.ru/" title="��������� ������� ����� free-kassa.ru"><img align="right" src="http://www.free-kassa.ru/images/free-kassa.gif" alt="��������� ������� ����� free-kassa.ru" border="0" width="88" height="31"></a>
</td></tr>
		<TR vAlign=top>
		<TD width="100%">
			
			<form method=GET action='{freekssa_url}' id='autoProcessor'>
				<input type='hidden' name="m" value='{fk_merchant_id}'>
				<input type='hidden' name='oa' value='{fk_outsum_oa}'>
				<input type='hidden' name='s' value='{fk_hash}'>
				<input type='hidden' name='o' value='{fk_inv_id}'>
				<input type='submit' value='��������'>
			</form>
		
		</TD>
		</TR>
		</TABLE>
		<div id="error"></div>
		<!-- ���� ������� -->
		<script language="JavaScript" type="text/javascript">document.getElementById('autoProcessor').submit();</script>
[/freekassa_proccess]