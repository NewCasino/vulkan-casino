<?php 
// �������� �� ������
if (!defined('CASINOENGINE')) {
	die("��� �������!<script>location.href='/';</script>");
} 
// ���� �������� ������
$sitename_query = @mysql_fetch_array(@mysql_query("SELECT * FROM casino_settings"));

$sitename = strip_tags($sitename_query['sitename']);

if ($page_filter == true) {
	if ($_SESSION['language'] == 'ru') { // ������ ���������
		if ($page == 'index') {
			$title = $sitename;
		} 

		if ($page == 'login') {
			$title = '���� - ' . $sitename;
		} 

		if ($page == 'terms') {
			$title = '������� ������ ������ - ������� �������������';
		}
		
		if ($page == 'jackpot') {
			$title = '���� ��� ������� ��������';
		}
		
		if ($page == 'bonus') {
			$title = '������ ������ ������';
		} 
		
		if ($page == 'support') {
			$title = '������ ��������� - ������ ������';
		} 

		if ($page == 'forgot_password') {
			$title = '������������� ������ - ' . $sitename;
		} 

		if ($page == 'open_account') {
			$title = '����������� - ' . $sitename;
		} 

		if ($page == 'games') {
			$title = '���� - ������ ������';
		} 

		if ($page == 'partners') {
			$title = '����������� ��������� ������ �������� ������ ������';
		} 
		
		if ($page == 'actia') {
			$title = '����� ������ ������ - �������� ���������� Audi Q7';
		}
		
		if ($page == 'faq') {
			$title = '����� ���������� ������� ������ ������ - FAQ';
		} 
		// ���������������� �����
		if ($page == 'messages') {
			$title = '������ ��������� - ' . $sitename;
		} 

		if ($page == 'in') {
			$title = '���������� ����� - ' . $sitename;
		} 

		if ($page == 'out') {
			$title = '����� ������� - ' . $sitename;
		} 
		
		if ($page == 'partner') {
			$title = '���������� ��������� - ' . $sitename;
		}
		
		//
		if ($page == 'lotteries') {
			$title = '����� - '. $sitename;
		}
		
		if ($page == 'news') {
			$title = '������� - '. $sitename;
		}
		
		if ($page == 'profile') {
			$title = '��������� ������� - '. $sitename;
		}
				if ($page == 'start') {
			$title = '��� ������? - '. $sitename;
		}
				if ($page == 'mailing') {
			$title = 'FAQ - '. $sitename;
		}
				if ($page == 'contact') {
			$title = '�������� - '. $sitename;
		}
				if ($page == 'about') {
			$title = '� ��� - '. $sitename;
		}
				if ($page == 'privacy') {
			$title = '������ ���������� - '. $sitename;
		}
				if ($page == 'conditions') {
			$title = '���������� - '. $sitename;
		}
						if ($page == 'slots') {
			$title = '����� - '. $sitename;
		}
						if ($page == 'cards') {
			$title = '��������� - '. $sitename;
		}
						if ($page == 'roulettes') {
			$title = '������� - '. $sitename;
		}
								if ($page == 'offers_policy') {
			$title = '�������� �������� - '. $sitename;
		}
			if ($page == 'jackpots') {
			$title = '�������� - '. $sitename;
		}
		
			if ($page == 'index_reg') {
			$title = '����������� - '. $sitename;
		}
	} 

	if ($_SESSION['language'] == 'en') {
		if ($page == 'index') {
			$title = '������ ������ ������� ��������';
		} 

		if ($page == 'login') {
			$title = '������ � ������� �������� ������ ������';
		}
		
		//
		if ($page == 'lotteries') {
			$title = 'Action - '. $sitename;
		}
		
		if ($page == 'news') {
			$title = 'News - '. $sitename;
		}
	} 
} 

?>