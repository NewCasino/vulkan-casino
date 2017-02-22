<?php 
// Проверим на доступ
if (!defined('CASINOENGINE')) {
	die("Нет доступа!<script>location.href='/';</script>");
} 
// Берём название казино
$sitename_query = @mysql_fetch_array(@mysql_query("SELECT * FROM casino_settings"));

$sitename = strip_tags($sitename_query['sitename']);

if ($page_filter == true) {
	if ($_SESSION['language'] == 'ru') { // Гланые странички
		if ($page == 'index') {
			$title = $sitename;
		} 

		if ($page == 'login') {
			$title = 'Вход - ' . $sitename;
		} 

		if ($page == 'terms') {
			$title = 'Правила казино онлайн - Условия использования';
		}
		
		if ($page == 'jackpot') {
			$title = 'Джек пот игровые автоматы';
		}
		
		if ($page == 'bonus') {
			$title = 'Бонусы онлайн казино';
		} 
		
		if ($page == 'support') {
			$title = 'Служба поддержки - Онлайн Казино';
		} 

		if ($page == 'forgot_password') {
			$title = 'Востановление пароля - ' . $sitename;
		} 

		if ($page == 'open_account') {
			$title = 'Регистрация - ' . $sitename;
		} 

		if ($page == 'games') {
			$title = 'Игры - Онлайн Казино';
		} 

		if ($page == 'partners') {
			$title = 'Партнерская программа нашего интернет онлайн казино';
		} 
		
		if ($page == 'actia') {
			$title = 'Акция Казино Онлайн - Розыгрыш Автомобиля Audi Q7';
		}
		
		if ($page == 'faq') {
			$title = 'Часто Задаваемые Вопросы казино онлайн - FAQ';
		} 
		// Пользовательская часть
		if ($page == 'messages') {
			$title = 'Служба поддержки - ' . $sitename;
		} 

		if ($page == 'in') {
			$title = 'Пополнение счёта - ' . $sitename;
		} 

		if ($page == 'out') {
			$title = 'Вывод средств - ' . $sitename;
		} 
		
		if ($page == 'partner') {
			$title = 'Партнёрская программа - ' . $sitename;
		}
		
		//
		if ($page == 'lotteries') {
			$title = 'Акции - '. $sitename;
		}
		
		if ($page == 'news') {
			$title = 'Новости - '. $sitename;
		}
		
		if ($page == 'profile') {
			$title = 'Настройка профиля - '. $sitename;
		}
				if ($page == 'start') {
			$title = 'Как начать? - '. $sitename;
		}
				if ($page == 'mailing') {
			$title = 'FAQ - '. $sitename;
		}
				if ($page == 'contact') {
			$title = 'Контакты - '. $sitename;
		}
				if ($page == 'about') {
			$title = 'О нас - '. $sitename;
		}
				if ($page == 'privacy') {
			$title = 'Защита информации - '. $sitename;
		}
				if ($page == 'conditions') {
			$title = 'Соглашение - '. $sitename;
		}
						if ($page == 'slots') {
			$title = 'Слоты - '. $sitename;
		}
						if ($page == 'cards') {
			$title = 'Карточные - '. $sitename;
		}
						if ($page == 'roulettes') {
			$title = 'Рулетки - '. $sitename;
		}
								if ($page == 'offers_policy') {
			$title = 'Бонусная политика - '. $sitename;
		}
			if ($page == 'jackpots') {
			$title = 'Джекпоты - '. $sitename;
		}
		
			if ($page == 'index_reg') {
			$title = 'Регистрация - '. $sitename;
		}
	} 

	if ($_SESSION['language'] == 'en') {
		if ($page == 'index') {
			$title = 'Казино онлайн игровые автоматы';
		} 

		if ($page == 'login') {
			$title = 'Играть в игровые автоматы казино онлайн';
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