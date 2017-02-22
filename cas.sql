--
-- Структура таблицы `amarok_banks`
--

CREATE TABLE IF NOT EXISTS `amarok_banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('game','profit') NOT NULL,
  `title` varchar(50) NOT NULL,
  `balance` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `amarok_banks`
--

INSERT INTO `amarok_banks` (`id`, `type`, `title`, `balance`) VALUES
(1, 'profit', '???????', 0),
(2, 'game', '???????', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `amarok_game_configs`
--

CREATE TABLE IF NOT EXISTS `amarok_game_configs` (
  `game_name` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('char','int','float','bool') DEFAULT 'char',
  `value_char` varchar(255) NOT NULL,
  `value_int` int(11) NOT NULL,
  `value_float` double NOT NULL,
  PRIMARY KEY (`game_name`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `amarok_game_configs`
--

INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES
('Safari', 'onfree_win_multiplication', 'int', '', 3, 0),
('Safari', 'onfree_win_chance', 'int', '', 6, 0),
('Safari', 'onfree_free_game_chance', 'int', '', 12, 0),
('Safari', 'win_chance', 'int', '', 9, 0),
('Safari', 'free_game_chance', 'int', '', 9, 0),
('Safari', 'testing', 'bool', 'false', 0, 0),
('Safari', 'profit_percent', 'float', '', 0, 50),
('Safari', 'profit_bank', 'int', '', 1, 0),
('Safari', 'free_percent', 'float', '', 0, 0),
('Safari', 'free_game_bank', 'int', '', 2, 0),
('Safari', 'game_bank', 'int', '', 2, 0),
('Safari', 'coinsize', 'float', '', 0, 0.25),
('Safari', 'debug', 'bool', 'false', 0, 0),
('RueDuCommerce', 'wildchar_win_multiplication', 'int', '', 2, 0),
('RueDuCommerce', 'wheel_size_max', 'int', '', 50, 0),
('RueDuCommerce', 'wheel_size_min', 'int', '', 30, 0),
('RueDuCommerce', 'double_4_chance', 'int', '', 8, 0),
('RueDuCommerce', 'double_2_chance', 'int', '', 8, 0),
('RueDuCommerce', 'bonus_chance', 'int', '', 11, 0),
('RueDuCommerce', 'win_chance', 'int', '', 9, 0),
('RueDuCommerce', 'profit_percent', 'float', '', 0, 50),
('RueDuCommerce', 'profit_bank', 'int', '', 1, 0),
('RueDuCommerce', 'bonus_percent', 'float', '', 0, 0),
('RueDuCommerce', 'bonus_bank', 'int', '', 2, 0),
('RueDuCommerce', 'game_bank', 'int', '', 2, 0),
('RueDuCommerce', 'coinsize', 'float', '', 0, 0.25),
('RueDuCommerce', 'testing', 'bool', 'false', 0, 0),
('RueDuCommerce', 'debug', 'bool', 'false', 0, 0),
('RoyalFruit', 'wildchar_win_multiplication', 'int', '', 2, 0),
('RoyalFruit', 'onfree_win_multiplication', 'int', '', 3, 0),
('RoyalFruit', 'onfree_win_chance', 'int', '', 6, 0),
('RoyalFruit', 'onfree_free_game_chance', 'int', '', 12, 0),
('RoyalFruit', 'win_chance', 'int', '', 9, 0),
('RoyalFruit', 'free_game_chance', 'int', '', 9, 0),
('RoyalFruit', 'testing', 'bool', 'false', 0, 0),
('RoyalFruit', 'profit_percent', 'float', '', 0, 50),
('RoyalFruit', 'profit_bank', 'int', '', 1, 0),
('RoyalFruit', 'free_percent', 'float', '', 0, 0),
('RoyalFruit', 'free_game_bank', 'int', '', 2, 0),
('RoyalFruit', 'game_bank', 'int', '', 2, 0),
('RoyalFruit', 'coinsize', 'float', '', 0, 0.25),
('RoyalFruit', 'debug', 'bool', 'false', 0, 0),
('Paris', 'wildchar_win_multiplication', 'int', '', 2, 0),
('Paris', 'wheel_size_max', 'int', '', 50, 0),
('Paris', 'wheel_size_min', 'int', '', 30, 0),
('Paris', 'double_4_chance', 'int', '', 8, 0),
('Paris', 'double_2_chance', 'int', '', 8, 0),
('Paris', 'bonus_chance', 'int', '', 11, 0),
('Paris', 'win_chance', 'int', '', 9, 0),
('Paris', 'profit_percent', 'float', '', 0, 50),
('Paris', 'profit_bank', 'int', '', 1, 0),
('Paris', 'bonus_percent', 'float', '', 0, 0),
('Paris', 'bonus_bank', 'int', '', 2, 0),
('Paris', 'game_bank', 'int', '', 2, 0),
('Paris', 'coinsize', 'float', '', 0, 0.25),
('Paris', 'testing', 'bool', 'false', 0, 0),
('Paris', 'debug', 'bool', 'false', 0, 0),
('Pantheon', 'wildchar_win_multiplication', 'int', '', 2, 0),
('Pantheon', 'onfree_win_multiplication', 'int', '', 3, 0),
('Pantheon', 'onfree_win_chance', 'int', '', 6, 0),
('Pantheon', 'onfree_free_game_chance', 'int', '', 12, 0),
('Pantheon', 'win_chance', 'int', '', 9, 0),
('Pantheon', 'free_game_chance', 'int', '', 9, 0),
('Pantheon', 'testing', 'bool', 'false', 0, 0),
('Pantheon', 'profit_percent', 'float', '', 0, 50),
('Pantheon', 'profit_bank', 'int', '', 1, 0),
('Pantheon', 'free_percent', 'float', '', 0, 0),
('Pantheon', 'free_game_bank', 'int', '', 2, 0),
('Pantheon', 'game_bank', 'int', '', 2, 0),
('Pantheon', 'coinsize', 'float', '', 0, 0.25),
('Pantheon', 'debug', 'bool', 'false', 0, 0),
('New-York', 'wildchar_win_multiplication', 'int', '', 2, 0),
('New-York', 'wheel_size_max', 'int', '', 50, 0),
('New-York', 'wheel_size_min', 'int', '', 30, 0),
('New-York', 'double_4_chance', 'int', '', 8, 0),
('New-York', 'double_2_chance', 'int', '', 8, 0),
('New-York', 'bonus_chance', 'int', '', 11, 0),
('New-York', 'win_chance', 'int', '', 9, 0),
('New-York', 'profit_percent', 'float', '', 0, 50),
('New-York', 'profit_bank', 'int', '', 1, 0),
('New-York', 'bonus_percent', 'float', '', 0, 0),
('New-York', 'bonus_bank', 'int', '', 2, 0),
('New-York', 'game_bank', 'int', '', 2, 0),
('New-York', 'coinsize', 'float', '', 0, 0.25),
('New-York', 'testing', 'bool', 'false', 0, 0),
('New-York', 'debug', 'bool', 'false', 0, 0),
('NewYearEve', 'wildchar_win_multiplication', 'int', '', 2, 0),
('NewYearEve', 'onfree_win_multiplication', 'int', '', 3, 0),
('NewYearEve', 'onfree_win_chance', 'int', '', 6, 0),
('NewYearEve', 'onfree_free_game_chance', 'int', '', 12, 0),
('NewYearEve', 'win_chance', 'int', '', 9, 0),
('NewYearEve', 'free_game_chance', 'int', '', 9, 0),
('NewYearEve', 'testing', 'bool', 'false', 0, 0),
('NewYearEve', 'profit_percent', 'float', '', 0, 50),
('NewYearEve', 'profit_bank', 'int', '', 1, 0),
('NewYearEve', 'free_percent', 'float', '', 0, 0),
('NewYearEve', 'free_game_bank', 'int', '', 2, 0),
('NewYearEve', 'game_bank', 'int', '', 2, 0),
('NewYearEve', 'coinsize', 'float', '', 0, 0.25),
('NewYearEve', 'debug', 'bool', 'false', 0, 0),
('MahJong', 'wildchar_win_multiplication', 'int', '', 2, 0),
('MahJong', 'onfree_win_multiplication', 'int', '', 3, 0),
('MahJong', 'onfree_win_chance', 'int', '', 6, 0),
('MahJong', 'onfree_free_game_chance', 'int', '', 12, 0),
('MahJong', 'win_chance', 'int', '', 9, 0),
('MahJong', 'free_game_chance', 'int', '', 9, 0),
('MahJong', 'testing', 'bool', 'false', 0, 0),
('MahJong', 'profit_percent', 'float', '', 0, 50),
('MahJong', 'profit_bank', 'int', '', 1, 0),
('MahJong', 'free_percent', 'float', '', 0, 0),
('MahJong', 'free_game_bank', 'int', '', 2, 0),
('MahJong', 'game_bank', 'int', '', 2, 0),
('MahJong', 'coinsize', 'float', '', 0, 0.25),
('MahJong', 'debug', 'bool', 'false', 0, 0),
('London', 'wildchar_win_multiplication', 'int', '', 2, 0),
('London', 'wheel_size_max', 'int', '', 50, 0),
('London', 'wheel_size_min', 'int', '', 30, 0),
('London', 'double_4_chance', 'int', '', 8, 0),
('London', 'double_2_chance', 'int', '', 8, 0),
('London', 'bonus_chance', 'int', '', 11, 0),
('London', 'win_chance', 'int', '', 9, 0),
('London', 'profit_percent', 'float', '', 0, 50),
('London', 'profit_bank', 'int', '', 1, 0),
('London', 'bonus_percent', 'float', '', 0, 0),
('London', 'bonus_bank', 'int', '', 2, 0),
('London', 'game_bank', 'int', '', 2, 0),
('London', 'coinsize', 'float', '', 0, 0.25),
('London', 'testing', 'bool', 'false', 0, 0),
('London', 'debug', 'bool', 'false', 0, 0),
('LasVegas', 'wildchar_win_multiplication', 'int', '', 2, 0),
('LasVegas', 'wheel_size_max', 'int', '', 50, 0),
('LasVegas', 'wheel_size_min', 'int', '', 30, 0),
('LasVegas', 'double_4_chance', 'int', '', 8, 0),
('LasVegas', 'double_2_chance', 'int', '', 8, 0),
('LasVegas', 'bonus_chance', 'int', '', 11, 0),
('LasVegas', 'win_chance', 'int', '', 9, 0),
('LasVegas', 'profit_percent', 'float', '', 0, 50),
('LasVegas', 'profit_bank', 'int', '', 1, 0),
('LasVegas', 'bonus_percent', 'float', '', 0, 0),
('LasVegas', 'bonus_bank', 'int', '', 2, 0),
('LasVegas', 'game_bank', 'int', '', 2, 0),
('LasVegas', 'coinsize', 'float', '', 0, 0.25),
('LasVegas', 'testing', 'bool', 'false', 0, 0),
('LasVegas', 'debug', 'bool', 'false', 0, 0),
('IndianaCroft', 'wildchar_win_multiplication', 'int', '', 2, 0),
('IndianaCroft', 'onfree_win_multiplication', 'int', '', 3, 0),
('IndianaCroft', 'onfree_win_chance', 'int', '', 6, 0),
('IndianaCroft', 'onfree_free_game_chance', 'int', '', 12, 0),
('IndianaCroft', 'win_chance', 'int', '', 9, 0),
('IndianaCroft', 'free_game_chance', 'int', '', 9, 0),
('IndianaCroft', 'testing', 'bool', 'false', 0, 0),
('IndianaCroft', 'profit_percent', 'float', '', 0, 50),
('IndianaCroft', 'profit_bank', 'int', '', 1, 0),
('IndianaCroft', 'free_percent', 'float', '', 0, 0),
('IndianaCroft', 'free_game_bank', 'int', '', 2, 0),
('IndianaCroft', 'game_bank', 'int', '', 2, 0),
('IndianaCroft', 'coinsize', 'float', '', 0, 0.25),
('IndianaCroft', 'debug', 'bool', 'false', 0, 0),
('HappyChristmas', 'wildchar_win_multiplication', 'int', '', 2, 0),
('HappyChristmas', 'onfree_win_multiplication', 'int', '', 3, 0),
('HappyChristmas', 'onfree_win_chance', 'int', '', 6, 0),
('HappyChristmas', 'onfree_free_game_chance', 'int', '', 12, 0),
('HappyChristmas', 'win_chance', 'int', '', 9, 0),
('HappyChristmas', 'free_game_chance', 'int', '', 9, 0),
('HappyChristmas', 'testing', 'bool', 'false', 0, 0),
('HappyChristmas', 'profit_percent', 'float', '', 0, 50),
('HappyChristmas', 'profit_bank', 'int', '', 1, 0),
('HappyChristmas', 'free_percent', 'float', '', 0, 0),
('HappyChristmas', 'free_game_bank', 'int', '', 2, 0),
('HappyChristmas', 'game_bank', 'int', '', 2, 0),
('HappyChristmas', 'coinsize', 'float', '', 0, 0.25),
('HappyChristmas', 'debug', 'bool', 'false', 0, 0),
('DaVinci', 'wildchar_win_multiplication', 'int', '', 2, 0),
('DaVinci', 'onfree_win_multiplication', 'int', '', 3, 0),
('DaVinci', 'onfree_win_chance', 'int', '', 6, 0),
('DaVinci', 'onfree_free_game_chance', 'int', '', 12, 0),
('DaVinci', 'win_chance', 'int', '', 9, 0),
('DaVinci', 'free_game_chance', 'int', '', 9, 0),
('DaVinci', 'testing', 'bool', 'false', 0, 0),
('DaVinci', 'profit_percent', 'float', '', 0, 50),
('DaVinci', 'profit_bank', 'int', '', 1, 0),
('DaVinci', 'free_percent', 'float', '', 0, 0),
('DaVinci', 'free_game_bank', 'int', '', 2, 0),
('DaVinci', 'game_bank', 'int', '', 2, 0),
('DaVinci', 'coinsize', 'float', '', 0, 0.25),
('DaVinci', 'debug', 'bool', 'false', 0, 0),
('JulesVerne', 'wildchar_win_multiplication', 'int', '', 2, 0),
('JulesVerne', 'onfree_win_multiplication', 'int', '', 3, 0),
('JulesVerne', 'onfree_win_chance', 'int', '', 6, 0),
('JulesVerne', 'onfree_free_game_chance', 'int', '', 12, 0),
('JulesVerne', 'win_chance', 'int', '', 9, 0),
('JulesVerne', 'free_game_chance', 'int', '', 9, 0),
('JulesVerne', 'testing', 'bool', 'false', 0, 0),
('JulesVerne', 'profit_percent', 'float', '', 0, 50),
('JulesVerne', 'profit_bank', 'int', '', 1, 0),
('JulesVerne', 'free_percent', 'float', '', 0, 0),
('JulesVerne', 'free_game_bank', 'int', '', 2, 0),
('JulesVerne', 'game_bank', 'int', '', 2, 0),
('JulesVerne', 'coinsize', 'float', '', 0, 0.25),
('JulesVerne', 'debug', 'bool', 'false', 0, 0),
('Grizzly', 'win_chance', 'int', '', 9, 0),
('Grizzly', 'testing', 'bool', 'false', 0, 0),
('Grizzly', 'profile', 'int', '', 1, 0),
('Grizzly', 'percent', 'float', '', 0, 50),
('Grizzly', 'profit_bank', 'int', '', 1, 0),
('Grizzly', 'game_bank', 'int', '', 2, 0),
('Grizzly', 'coinsize', 'float', '', 0, 0.25),
('Grizzly', 'debug', 'bool', 'false', 0, 0),
('JamesBand', 'wildchar_win_multiplication', 'int', '', 2, 0),
('JamesBand', 'onfree_win_multiplication', 'int', '', 3, 0),
('JamesBand', 'onfree_win_chance', 'int', '', 6, 0),
('JamesBand', 'onfree_free_game_chance', 'int', '', 12, 0),
('JamesBand', 'win_chance', 'int', '', 9, 0),
('JamesBand', 'free_game_chance', 'int', '', 9, 0),
('JamesBand', 'testing', 'bool', 'false', 0, 0),
('JamesBand', 'profit_percent', 'float', '', 0, 50),
('JamesBand', 'profit_bank', 'int', '', 1, 0),
('JamesBand', 'free_percent', 'float', '', 0, 0),
('JamesBand', 'free_game_bank', 'int', '', 2, 0),
('JamesBand', 'game_bank', 'int', '', 2, 0),
('JamesBand', 'coinsize', 'float', '', 0, 0.25),
('JamesBand', 'debug', 'bool', 'false', 0, 0),
('CrazyDoctors', 'wildchar_win_multiplication', 'int', '', 2, 0),
('CrazyDoctors', 'wheel_size_max', 'int', '', 50, 0),
('CrazyDoctors', 'wheel_size_min', 'int', '', 30, 0),
('CrazyDoctors', 'double_4_chance', 'int', '', 8, 0),
('CrazyDoctors', 'double_2_chance', 'int', '', 8, 0),
('CrazyDoctors', 'bonus_chance', 'int', '', 11, 0),
('CrazyDoctors', 'win_chance', 'int', '', 9, 0),
('CrazyDoctors', 'profit_percent', 'float', '', 0, 50),
('CrazyDoctors', 'profit_bank', 'int', '', 1, 0),
('CrazyDoctors', 'bonus_percent', 'float', '', 0, 0),
('CrazyDoctors', 'bonus_bank', 'int', '', 2, 0),
('CrazyDoctors', 'game_bank', 'int', '', 2, 0),
('CrazyDoctors', 'coinsize', 'float', '', 0, 0.25),
('CrazyDoctors', 'testing', 'bool', 'false', 0, 0),
('CrazyDoctors', 'debug', 'bool', 'false', 0, 0),
('Cartoons', 'wildchar_win_multiplication', 'int', '', 2, 0),
('Cartoons', 'onfree_win_multiplication', 'int', '', 3, 0),
('Cartoons', 'onfree_win_chance', 'int', '', 6, 0),
('Cartoons', 'onfree_free_game_chance', 'int', '', 12, 0),
('Cartoons', 'win_chance', 'int', '', 9, 0),
('Cartoons', 'free_game_chance', 'int', '', 9, 0),
('Cartoons', 'testing', 'bool', 'false', 0, 0),
('Cartoons', 'profit_percent', 'float', '', 0, 50),
('Cartoons', 'profit_bank', 'int', '', 1, 0),
('Cartoons', 'free_percent', 'float', '', 0, 0),
('Cartoons', 'free_game_bank', 'int', '', 2, 0),
('Cartoons', 'game_bank', 'int', '', 2, 0),
('Cartoons', 'coinsize', 'float', '', 0, 0.25),
('Cartoons', 'debug', 'bool', 'false', 0, 0),
('Safari', 'wildchar_win_multiplication', 'int', '', 2, 0),
('SergentPepper', 'debug', 'bool', 'false', 0, 0),
('SergentPepper', 'testing', 'bool', 'false', 0, 0),
('SergentPepper', 'coinsize', 'float', '', 0, 0.25),
('SergentPepper', 'game_bank', 'int', '', 2, 0),
('SergentPepper', 'bonus_bank', 'int', '', 2, 0),
('SergentPepper', 'bonus_percent', 'float', '', 0, 0),
('SergentPepper', 'profit_bank', 'int', '', 1, 0),
('SergentPepper', 'profit_percent', 'float', '', 0, 50),
('SergentPepper', 'win_chance', 'int', '', 9, 0),
('SergentPepper', 'bonus_chance', 'int', '', 11, 0),
('SergentPepper', 'double_2_chance', 'int', '', 8, 0),
('SergentPepper', 'double_4_chance', 'int', '', 8, 0),
('SergentPepper', 'wheel_size_min', 'int', '', 30, 0),
('SergentPepper', 'wheel_size_max', 'int', '', 50, 0),
('SergentPepper', 'wildchar_win_multiplication', 'int', '', 2, 0),
('Shinobi', 'debug', 'bool', 'false', 0, 0),
('Shinobi', 'testing', 'bool', 'false', 0, 0),
('Shinobi', 'coinsize', 'float', '', 0, 0.25),
('Shinobi', 'game_bank', 'int', '', 2, 0),
('Shinobi', 'bonus_bank', 'int', '', 2, 0),
('Shinobi', 'bonus_percent', 'float', '', 0, 0),
('Shinobi', 'profit_bank', 'int', '', 1, 0),
('Shinobi', 'profit_percent', 'float', '', 0, 50),
('Shinobi', 'win_chance', 'int', '', 9, 0),
('Shinobi', 'bonus_chance', 'int', '', 11, 0),
('Shinobi', 'double_2_chance', 'int', '', 8, 0),
('Shinobi', 'double_4_chance', 'int', '', 8, 0),
('Shinobi', 'wheel_size_min', 'int', '', 30, 0),
('Shinobi', 'wheel_size_max', 'int', '', 50, 0),
('Shinobi', 'wildchar_win_multiplication', 'int', '', 2, 0),
('SpaceRunners', 'debug', 'bool', 'false', 0, 0),
('SpaceRunners', 'coinsize', 'float', '', 0, 0.25),
('SpaceRunners', 'game_bank', 'int', '', 2, 0),
('SpaceRunners', 'free_game_bank', 'int', '', 2, 0),
('SpaceRunners', 'free_percent', 'float', '', 0, 0),
('SpaceRunners', 'profit_bank', 'int', '', 1, 0),
('SpaceRunners', 'profit_percent', 'float', '', 0, 50),
('SpaceRunners', 'testing', 'bool', 'false', 0, 0),
('SpaceRunners', 'free_game_chance', 'int', '', 9, 0),
('SpaceRunners', 'win_chance', 'int', '', 9, 0),
('SpaceRunners', 'onfree_free_game_chance', 'int', '', 12, 0),
('SpaceRunners', 'onfree_win_chance', 'int', '', 6, 0),
('SpaceRunners', 'onfree_win_multiplication', 'int', '', 3, 0),
('SpaceRunners', 'wildchar_win_multiplication', 'int', '', 2, 0),
('SuperHeroes', 'debug', 'bool', 'false', 0, 0),
('SuperHeroes', 'coinsize', 'float', '', 0, 0.25),
('SuperHeroes', 'game_bank', 'int', '', 2, 0),
('SuperHeroes', 'free_game_bank', 'int', '', 2, 0),
('SuperHeroes', 'free_percent', 'float', '', 0, 0),
('SuperHeroes', 'profit_bank', 'int', '', 1, 0),
('SuperHeroes', 'profit_percent', 'float', '', 0, 50),
('SuperHeroes', 'testing', 'bool', 'false', 0, 0),
('SuperHeroes', 'free_game_chance', 'int', '', 9, 0),
('SuperHeroes', 'win_chance', 'int', '', 9, 0),
('SuperHeroes', 'onfree_free_game_chance', 'int', '', 12, 0),
('SuperHeroes', 'onfree_win_chance', 'int', '', 6, 0),
('SuperHeroes', 'onfree_win_multiplication', 'int', '', 3, 0),
('SuperHeroes', 'wildchar_win_multiplication', 'int', '', 2, 0),
('Tokyo', 'debug', 'bool', 'false', 0, 0),
('Tokyo', 'testing', 'bool', 'false', 0, 0),
('Tokyo', 'coinsize', 'float', '', 0, 0.25),
('Tokyo', 'game_bank', 'int', '', 2, 0),
('Tokyo', 'bonus_bank', 'int', '', 2, 0),
('Tokyo', 'bonus_percent', 'float', '', 0, 0),
('Tokyo', 'profit_bank', 'int', '', 1, 0),
('Tokyo', 'profit_percent', 'float', '', 0, 50),
('Tokyo', 'win_chance', 'int', '', 9, 0),
('Tokyo', 'bonus_chance', 'int', '', 11, 0),
('Tokyo', 'double_2_chance', 'int', '', 8, 0),
('Tokyo', 'double_4_chance', 'int', '', 8, 0),
('Tokyo', 'wheel_size_min', 'int', '', 30, 0),
('Tokyo', 'wheel_size_max', 'int', '', 50, 0),
('Tokyo', 'wildchar_win_multiplication', 'int', '', 2, 0),
('WorldCup', 'debug', 'bool', 'false', 0, 0),
('WorldCup', 'coinsize', 'float', '', 0, 0.25),
('WorldCup', 'game_bank', 'int', '', 2, 0),
('WorldCup', 'free_game_bank', 'int', '', 2, 0),
('WorldCup', 'free_percent', 'float', '', 0, 0),
('WorldCup', 'profit_bank', 'int', '', 1, 0),
('WorldCup', 'profit_percent', 'float', '', 0, 50),
('WorldCup', 'testing', 'bool', 'false', 0, 0),
('WorldCup', 'free_game_chance', 'int', '', 9, 0),
('WorldCup', 'win_chance', 'int', '', 9, 0),
('WorldCup', 'onfree_free_game_chance', 'int', '', 12, 0),
('WorldCup', 'onfree_win_chance', 'int', '', 6, 0),
('WorldCup', 'onfree_win_multiplication', 'int', '', 3, 0),
('WorldCup', 'wildchar_win_multiplication', 'int', '', 2, 0),
('JustMarried', 'debug', 'bool', 'false', 0, 0),
('JustMarried', 'coinsize', 'float', '', 0, 0.25),
('JustMarried', 'game_bank', 'int', '', 2, 0),
('JustMarried', 'free_game_bank', 'int', '', 2, 0),
('JustMarried', 'free_percent', 'float', '', 0, 0),
('JustMarried', 'profit_bank', 'int', '', 1, 0),
('JustMarried', 'profit_percent', 'float', '', 0, 50),
('JustMarried', 'testing', 'bool', 'false', 0, 0),
('JustMarried', 'free_game_chance', 'int', '', 9, 0),
('JustMarried', 'win_chance', 'int', '', 9, 0),
('JustMarried', 'onfree_free_game_chance', 'int', '', 12, 0),
('JustMarried', 'onfree_win_chance', 'int', '', 6, 0),
('JustMarried', 'onfree_win_multiplication', 'int', '', 3, 0),
('JustMarried', 'wildchar_win_multiplication', 'int', '', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `amarok_game_debug`
--

CREATE TABLE IF NOT EXISTS `amarok_game_debug` (
  `date` datetime NOT NULL,
  `client_addr` int(11) unsigned NOT NULL,
  `game_name` varchar(20) DEFAULT NULL,
  `message` text,
  KEY `date` (`date`,`client_addr`),
  KEY `date_2` (`date`,`game_name`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Структура таблицы `amarok_game_player_statistics_average`
--

CREATE TABLE IF NOT EXISTS `amarok_game_player_statistics_average` (
  `game_name` varchar(20) NOT NULL,
  `player_login` varchar(20) NOT NULL,
  `games_count_total` bigint(15) NOT NULL,
  `games_count_win` bigint(15) NOT NULL,
  `games_count_lose` bigint(15) NOT NULL,
  `games_count_lose_out` bigint(15) NOT NULL,
  `games_count_drawn` bigint(15) NOT NULL,
  `bet_min` double NOT NULL,
  `bet_max` double NOT NULL,
  `bet_total` double NOT NULL,
  `win_min` double NOT NULL,
  `win_max` double NOT NULL,
  `win_total` double NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`game_name`,`player_login`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `amarok_game_statistics`
--

CREATE TABLE IF NOT EXISTS `amarok_game_statistics` (
  `game_date` datetime NOT NULL,
  `game_name` varchar(20) NOT NULL,
  `game_postfix` varchar(20) NOT NULL,
  `player_login` varchar(20) NOT NULL,
  `player_balance` double NOT NULL,
  `bank_id` int(11) NOT NULL,
  `bank_balance` double DEFAULT NULL,
  `bet` double NOT NULL,
  `win` double NOT NULL,
  PRIMARY KEY (`game_date`,`game_name`,`player_login`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `amarok_game_statistics_average`
--

CREATE TABLE IF NOT EXISTS `amarok_game_statistics_average` (
  `game_name` varchar(20) NOT NULL DEFAULT '',
  `games_count_total` bigint(15) NOT NULL,
  `games_count_win` bigint(15) NOT NULL,
  `games_count_lose` bigint(15) NOT NULL,
  `games_count_lose_out` bigint(15) NOT NULL,
  `games_count_drawn` bigint(15) NOT NULL,
  `players_count_total` bigint(15) NOT NULL,
  `players_count_winners` bigint(15) NOT NULL,
  `players_count_losers` bigint(15) NOT NULL,
  `bet_min` double NOT NULL,
  `bet_max` double NOT NULL,
  `bet_total` double NOT NULL,
  `win_min` double NOT NULL,
  `win_max` double NOT NULL,
  `win_total` double NOT NULL,
  `game_bank_balance_min` double NOT NULL,
  `game_bank_balance_max` double NOT NULL,
  `game_bank_balance_average` double NOT NULL,
  `player_balance_min` double NOT NULL,
  `player_balance_max` double NOT NULL,
  `player_balance_average` double NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`game_name`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `amarok_player_statistics_average`
--

CREATE TABLE IF NOT EXISTS `amarok_player_statistics_average` (
  `player_login` varchar(20) NOT NULL,
  `games_count_total` bigint(15) NOT NULL,
  `games_count_win` bigint(15) NOT NULL,
  `games_count_lose` bigint(15) NOT NULL,
  `games_count_lose_out` bigint(15) NOT NULL,
  `games_count_drawn` bigint(15) NOT NULL,
  `bet_min` double NOT NULL,
  `bet_max` double NOT NULL,
  `bet_total` double NOT NULL,
  `win_min` double NOT NULL,
  `win_max` double NOT NULL,
  `win_total` double NOT NULL,
  `balance_min` double NOT NULL,
  `balance_max` double NOT NULL,
  `balance_average` double NOT NULL,
  `cash_input_min` double NOT NULL,
  `cash_input_max` double NOT NULL,
  `cash_input_total` double NOT NULL,
  `cash_input_average` double NOT NULL,
  `cash_output_min` double NOT NULL,
  `cash_output_max` double NOT NULL,
  `cash_output_total` double NOT NULL,
  `cash_output_average` double NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`player_login`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `casino_admin`
--

CREATE TABLE IF NOT EXISTS `casino_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(12) DEFAULT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `pass2` varchar(256) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_last` varchar(30) DEFAULT NULL,
  `ip_last` varchar(30) DEFAULT '0.0.0.0',
  `admin_notes` text,
  `operator_notes` text,
  `status_message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `casino_admin`
--

INSERT INTO `casino_admin` (`id`, `login`, `pass`, `pass2`, `email`, `date_last`, `ip_last`, `admin_notes`, `operator_notes`, `status_message`) VALUES
(1, 'admin', '46f94c8de14fb36680850768ff1b7f2a', '46f94c8de14fb36680850768ff1b7f2a', 'support@casino.ru', '', '0.0.0.0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `casino_lotteries`
--

CREATE TABLE IF NOT EXISTS `casino_lotteries` (
  `id_lottery` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `short_story` text CHARACTER SET cp1251 NOT NULL,
  `full_story` text CHARACTER SET cp1251 NOT NULL,
  `description` text CHARACTER SET cp1251 NOT NULL,
  `keywords` text CHARACTER SET cp1251 NOT NULL,
  `img` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `img_big` varchar(255) CHARACTER SET cp1251 DEFAULT NULL,
  `display_big` int(1) NOT NULL DEFAULT '0',
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id_lottery`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `casino_lotteries`
--

INSERT INTO `casino_lotteries` (`id_lottery`, `title`, `short_story`, `full_story`, `description`, `keywords`, `img`, `img_big`, `display_big`, `date_start`, `date_end`) VALUES
(4, 'Джекпоты от Lavanda Casino', 'Поздравляем всех игроков с Дюхой', '<p>\r\n	<span style="\\&quot;\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;font-size:14px;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\&quot;"><span><span>Какой игрок не мечтает о джекпоте? Сорвать по-настоящему большой куш &mdash; заветное желание каждого любителя азарта. Мы готовы помочь своим игрокам в осуществлении мечты. Рады представить наши обновленные джекпоты! Теперь игр с джекпотами стало четыре, с общим обьедененным джекпотом, джекпоты &mdash; крупнее, шансы на выигрыш &mdash; выше, а ставки &mdash; доступнее. Испытать свою удачу по-крупному теперь можно в различных играх! Это любимые нашими игроками слоты. Перейти на страницу игр с джекпотом. Все наши джекпоты прогрессивные. Они растут с каждой ставкой, сделанной игроками в этой игре. При этом внушительные суммы джекпотов можно выиграть, не делая невероятных ставок. У наших игроков есть уникальная возможность сорвать джекпот с минимальной ставкой всего от 1 рубля. Условия выигрыша джекпота просты.&nbsp;</span></span></span>Необходимо, чтобы на барабане слот автомата выпала максимальная комбинация. Счастливчику, которому выпадет заветная комбинация достанется прогрессивный джекпот. Его сумма зависит от времени его формирования, и ее всегда можно увидеть в игре. Испытайте свою удачу и, возможно, большой куш станет Вашим! Джекпоты ждут своих обладателей.&nbsp;</p>', 'Джекпоты от Lavanda Casino', 'Джекпоты от Lavanda Casino', 'be8ad227df3121948878.png', '', 0, '2014-01-04', '2015-07-08'),
(5, 'Игра Недели', 'Игра недели', '<p>\r\n	Продолжение акции игра дня. Провести время за увлекательной игрой и получить большой выигрыш &mdash; это реально с нашей новой акцией &laquo;Игра недели&raquo;). Еженедельно &nbsp;выбирается игра недели в которую за прошедшую недели играли чаще всего, которая позволяет выигрывать чаще и больше на 25%. Это отличная возможность заработать, а также разнообразить свою игровую историю. В акции участвуют все слоты нашего казино. Узнать, какой слот даёт 25% выигрыш на этой недели вы можете на главной странице в блоке Игра Недели.</p>', 'Игра Недели', 'Игра Недели', 'a17a2ae92d048c7e438f.png', '', 0, '2014-08-18', '2015-09-18'),
(6, 'Подарок в День Рождения', 'Подарок в День Рождения', '<p>\r\n	Каждый наш игрок в день своего рождения может получить подарок на свой счет суммой 1000 рублей. Все, что нужно для получения бонуса отослать &nbsp;электронной почтой на адрес <span style="\\&quot;\\\\&quot;color:#00ff00;\\\\&quot;\\&quot;">support@casino.ru</span> скан документа, удостоверяющего личность, на котором видно дату рождения. Данный бонус доступен, если Ваша суммарная история депозитов больше 1000 рублей.</p>', 'Подарок в День Рождения', 'Подарок в День Рождения', '25bc955f8ed88bfeb64b.png', '', 0, '2015-03-18', '2015-09-18'),
(7, '100% Бонус на первый депозит', 'Бонус на депозит', '<p>\r\n	Внесите свой первый депозит и получите 100% бонус на депозит, для этого ничего не нужно делать, просто внесите депозит и в течении суток мы его удвоим. Для скорейшего получения бонуса свяжитесь с нами по почте support@casino.ru или через онлайн чат. Вейджер x10 это означает что бы отыграть бонус вам нужно сделать ставок в 10 раз больше суммы бонуса.</p>', '100% Бонус на первый депозит', '100% Бонус на первый депозит', 'eefa7abc83b612b5826b.jpg', '', 0, '2015-03-18', '2015-04-18'),
(8, 'Возврат денег', 'Возврат денег', '<p>\r\n	Прогрыши неизбежны, но вы всегда можете оставаться в плюсе с помощью нашей акции CASHBACK. Каждый игрок нашего казино имеет право получить возврат 15% проигранных денег. Для этого необходимо написать на почту support@casino.ru или связаться со службой поддержки через онлайн чат.</p>\r\n<p>\r\n	Внимание! Возврат осуществляется всех проигранных денег с момента регистрации и доступен лишь один раз! Если вы планируете продолжать играть в нашем казино, не спешите использовать свой шанс возврата так как после этого все последующие проигрыши вы уже не сможете вернуть.</p>', 'Возврат денег', 'Возврат денег', '125.jpg', '', 0, '2015-03-23', '2015-04-23');

-- --------------------------------------------------------

--
-- Структура таблицы `casino_messages`
--

CREATE TABLE IF NOT EXISTS `casino_messages` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL DEFAULT '0',
  `date` varchar(30) NOT NULL DEFAULT '',
  `time` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(20) NOT NULL DEFAULT '',
  `message` varchar(1000) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `id_main` varchar(10) NOT NULL DEFAULT '0',
  `route` varchar(10) NOT NULL DEFAULT 'contact',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `casino_news`
--

CREATE TABLE IF NOT EXISTS `casino_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT '0000-00-00',
  `title` varchar(255) NOT NULL DEFAULT '',
  `short_story` text NOT NULL,
  `full_story` text NOT NULL,
  `descr` varchar(200) NOT NULL DEFAULT '',
  `keywords` text NOT NULL,
  `category` varchar(200) NOT NULL DEFAULT '0',
  `alt_name` varchar(200) NOT NULL DEFAULT '',
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `news_read` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tags` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `alt_name` (`alt_name`),
  KEY `category` (`category`),
  KEY `approve` (`approve`),
  KEY `date` (`date`),
  KEY `tags` (`tags`),
  FULLTEXT KEY `short_story` (`short_story`,`full_story`,`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `casino_news`
--

INSERT INTO `casino_news` (`id`, `date`, `title`, `short_story`, `full_story`, `descr`, `keywords`, `category`, `alt_name`, `approve`, `news_read`, `tags`) VALUES
(35, '2015-02-23', 'День защитника отечества!', '<p>\r\n	<img alt=\\"\\" src=\\"/img/news/news.jpg\\" style=\\"width: 268px; height: 118px; float: left;\\" />День защитника Отчества &mdash; самый мужественный и отважный праздник в году! Сегодня мы поздравляем всех наших игроков и дарим Вам специальные подарки. Но так как это подарки для настоящих мужчин, их еще нужно заполучить! Попадите точно в цель и выиграйте бездеп на 10$ или 150% бонус на депозит. Просто зайдите на сайт в 15:00 по московскому времени и окажитесь в числе счастливчиков. Среди всех игроков мы выберем 50 счастливчиков, которые получат бездепозитные бонусы на 10$ времяя акции &mdash; московское, В акции участвуют только игроки, депозиты которых за 2015 год составляют не менее 50$.</p>\r\n', '<p>\r\n	<img alt=\\"\\" src=\\"/img/news/news.jpg\\" style=\\"width: 268px; height: 118px; float: left;\\" />День защитника Отчества &mdash; самый мужественный и отважный праздник в году! Сегодня мы поздравляем всех наших игроков и дарим Вам специальные подарки. Но так как это подарки для настоящих мужчин, их еще нужно заполучить! Попадите точно в цель и выиграйте бездеп на 10$ или 150% бонус на депозит. Просто зайдите на сайт в 15:00 по московскому времени и окажитесь в числе счастливчиков. Среди всех игроков мы выберем 50 счастливчиков, которые получат бездепозитные бонусы на 10$ времяя акции &mdash; московское, В акции участвуют только игроки, депозиты которых за 2015 год составляют не менее 50$.</p>\r\n', 'День защитника отечества!', 'День защитника отечества!', '0', '', 0, 0, ''),
(34, '2015-03-01', 'Встречаем весну джекпотами!', '<p>\r\n	<img alt="" src="/img/news/jackpot.png" style="width: 270px; height: 120px; float: left;" />Конец зимы и начало весны в нашем казино ознаменовались двумя крупными джекпотами. Легендарный слот Wild West принес невероятные выигрыши двум игрокам из России. Последний зимний день стал особенно удачным для игрока с ID 10***. Комбинация из пяти семерок принесла счастливчику выигрыш в размере 163 726.30 RUB. Ставка, принесшая джекпот, составила всего 60 RUB. Второй джекпот в той же игре и с такой же ставкой был сорван вчера. 276 343.20 RUB выигрыша стали отличным началом весеннего игрового сезона для любителя азарта с ID 98***. Поздравляем счастливчиков и желаем, чтобы эти джекпоты были не последними в Вашей игровой истории!</p>\r\n', '<p>\r\n	<img alt="" src="/img/news/jackpot.png" style="width: 270px; height: 120px; float: left;" />Конец зимы и начало весны в нашем казино ознаменовались двумя крупными джекпотами. Легендарный слот Wild West принес невероятные выигрыши двум игрокам из России. Последний зимний день стал особенно удачным для игрока с ID 10***. Комбинация из пяти семерок принесла счастливчику выигрыш в размере 163 726.30 RUB. Ставка, принесшая джекпот, составила всего 60 RUB. Второй джекпот в той же игре и с такой же ставкой был сорван вчера. 276 343.20 RUB выигрыша стали отличным началом весеннего игрового сезона для любителя азарта с ID 98***. Поздравляем счастливчиков и желаем, чтобы эти джекпоты были не последними в Вашей игровой истории!</p>\r\n', 'Встречаем весну джекпотами!', 'Встречаем весну джекпотами!', '0', '', 0, 0, ''),
(30, '2014-12-16', 'Обновление', '<p>\r\n	<img alt="" src="/img/news/galka.jpg" style="width: 268px; height: 118px; float: left;" />Уважаемые игроки, сегодня в нашем казино произошло грандиозное обновление. Казино преобразилось и мы решили начать всё с нуля. Встречайте хорошо знакомый Lavanda Casino в новом завораживающем облике! Неоспоримые преимущества нового дизайна дополняют&nbsp;технические новшества сайта. Благодаря переезду на новую платформу, в казино появилось множество новых возможностей. Мы рады предложить Вам свежие динамичные акции, увлекательные турниры, азартные розыгрыши и введены постоянные лотереи. Любителей играть по-крупному порадует, что игр с джекпотами стало больше, а сами джекпоты &mdash; крупнее. Главное, подарков станет еще больше и их не нужно будет отыгрывать. Получайте &mdash; выводите! Оцените и Вы новый Lavanda Casino.</p>\r\n', '<p>\r\n	<img alt="" src="/img/news/galka.jpg" style="width: 268px; height: 118px; float: left;" />Уважаемые игроки, сегодня в нашем казино произошло грандиозное обновление. Казино преобразилось и мы решили начать всё с нуля. Встречайте хорошо знакомый Lavanda Casino в новом завораживающем облике! Неоспоримые преимущества нового дизайна дополняют&nbsp;технические новшества сайта. Благодаря переезду на новую платформу, в казино появилось множество новых возможностей. Мы рады предложить Вам свежие динамичные акции, увлекательные турниры, азартные розыгрыши и введены постоянные лотереи. Любителей играть по-крупному порадует, что игр с джекпотами стало больше, а сами джекпоты &mdash; крупнее. Главное, подарков станет еще больше и их не нужно будет отыгрывать. Получайте &mdash; выводите! Оцените и Вы новый Lavanda Casino.</p>\r\n', 'Пополнение счета казино', 'Бонус казино, бонус онлайн казино, бонус от казино, бонусы казино, бонус казино', '0', '', 0, 0, ''),
(32, '2014-12-31', 'Новый год', '<p>\r\n	<img alt="" src="/img/news/snegobik.jpg" style="width: 268px; height: 118px; float: left;" />Сегодня Новый год и отметить его нужно так что бы этот день оказался самым лучшим в прошедшем году, а это значит очередное грандиозное событие, мы разыграем огромный джекпот в джекпот играх, общий призовой фонд которых составляет 167539 рублей &nbsp;Да-да сегодня это будет разыграно и обязательно найдется победитель, по этому играйте без перерыва до 00.00 в любой момент этим победителем можете оказаться Вы.</p>\r\n', '<p>\r\n	<img alt="" src="/img/news/snegobik.jpg" style="width: 268px; height: 118px; float: left;" />Сегодня Новый год и отметить его нужно так что бы этот день оказался самым лучшим в прошедшем году, а это значит очередное грандиозное событие, мы разыграем огромный джекпот в джекпот играх, общий призовой фонд которых составляет 167539 рублей &nbsp;Да-да сегодня это будет разыграно и обязательно найдется победитель, по этому играйте без перерыва до 00.00 в любой момент этим победителем можете оказаться Вы.</p>\r\n', 'Новый год', 'Новый год', '0', '', 0, 0, ''),
(39, '2015-03-08', '8 марта в Lavanda Casino', '<p>\r\n	<img alt="" src="/img/news/news.jpg" style="width: 268px; height: 118px; float: left;" />Дорогие женщины, поздравляем Вас с прекрасным весенним праздником! Желаем Вам всегда сиять и блистать, радовать окружающих своей красотой и очарованием. Мы верим в то, что красота спасет мир. Пополните счет сегодня и получите праздничный бонус. И не забудьте сыграть на слоте Lucky Lady&#39;s Charm Deluxe. Сегодня эта игра принесет еще больше прибыли за каждую сделанную ставку. Желаем Вам хорошего праздника и отличного настроения!</p>\r\n', '<p>\r\n	<img alt="" src="/img/news/news.jpg" style="width: 268px; height: 118px; float: left;" />Дорогие женщины, поздравляем Вас с прекрасным весенним праздником! Желаем Вам всегда сиять и блистать, радовать окружающих своей красотой и очарованием. Мы верим в то, что красота спасет мир. Пополните счет сегодня и получите праздничный бонус. И не забудьте сыграть на слоте Lucky Lady&#39;s Charm Deluxe. Сегодня эта игра принесет еще больше прибыли за каждую сделанную ставку. Желаем Вам хорошего праздника и отличного настроения!</p>\r\n', '8 марта в Lavanda Casino', '8 марта в Lavanda Casino', '0', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `casino_online`
--

CREATE TABLE IF NOT EXISTS `casino_online` (
  `session` char(100) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `casino_online`
--

INSERT INTO `casino_online` (`session`, `time`) VALUES
('7ifrm2ces28roqgrv1ckssg0p0', 1430967585);

-- --------------------------------------------------------

--
-- Структура таблицы `casino_settings`
--

CREATE TABLE IF NOT EXISTS `casino_settings` (
  `license` varchar(50) NOT NULL,
  `siteadress` varchar(100) NOT NULL DEFAULT 'http://site.ru',
  `sitename` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `keywords` varchar(2000) NOT NULL,
  `partnerproc` decimal(2,0) NOT NULL DEFAULT '30',
  `partnerprocdomain` decimal(2,0) NOT NULL DEFAULT '50',
  `languagesite` decimal(1,0) NOT NULL DEFAULT '1',
  `languageadmin` decimal(1,0) NOT NULL DEFAULT '1',
  `bonusreg` decimal(10,2) NOT NULL DEFAULT '0.00',
  `bonustuday` decimal(10,2) NOT NULL DEFAULT '0.00',
  `emailcasino` varchar(50) NOT NULL DEFAULT 'example@mail.ru',
  `emailadmin` varchar(50) NOT NULL DEFAULT 'example@mail.ru',
  `icqadmin` varchar(10) NOT NULL DEFAULT '0000000000',
  `notesin` varchar(3) DEFAULT 'yes',
  `notesout` varchar(3) DEFAULT 'yes',
  `notesres` varchar(3) DEFAULT 'yes',
  `fun_reg` int(10) NOT NULL DEFAULT '10000',
  `fun_day` int(10) NOT NULL DEFAULT '1000',
  `jpupdatetime` int(10) NOT NULL DEFAULT '10',
  `newsmain` int(1) NOT NULL DEFAULT '2',
  `version` varchar(10) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `casino_settings`
--

INSERT INTO `casino_settings` (`license`, `siteadress`, `sitename`, `description`, `keywords`, `partnerproc`, `partnerprocdomain`, `languagesite`, `languageadmin`, `bonusreg`, `bonustuday`, `emailcasino`, `emailadmin`, `icqadmin`, `notesin`, `notesout`, `notesres`, `fun_reg`, `fun_day`, `jpupdatetime`, `newsmain`, `version`) VALUES
('LICENSE-0000-0000-0000-0000-0000-0000-0000', 'casino.ru', 'Lavanda Casino', 'Лаванда казино - щедрые бонусы, акции и новые игры в нашем казино', 'lavanda, casino, Лаванда, казино, онлайн, играть, слоты, рулетка, игры, деньги', '10', '10', '1', '1', '0.00', '0.00', 'support@casino.ru', 'support@casino.ru', '123456', 'yes', 'yes', 'yes', 0, 0, 101, 10, '1.3');

-- --------------------------------------------------------

--
-- Структура таблицы `casino_tickets`
--

CREATE TABLE IF NOT EXISTS `casino_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `priority` int(1) NOT NULL DEFAULT '0',
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `newforuser` enum('0','1') NOT NULL DEFAULT '0',
  `newforadmin` enum('1','0') NOT NULL DEFAULT '1',
  `userid` int(11) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) DEFAULT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `cash` decimal(12,2) DEFAULT '0.00',
  `cashin` decimal(12,2) DEFAULT '0.00',
  `cashout` decimal(12,2) DEFAULT '0.00',
  `cashfun` decimal(12,2) DEFAULT '0.00',
  `cashfunin` decimal(12,2) DEFAULT '0.00',
  `cashfunout` decimal(12,2) DEFAULT '0.00',
  `fun_date` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `check_mail` int(1) unsigned DEFAULT '0',
  `ip_reg` varchar(30) DEFAULT '0.0.0.0',
  `ip_last` varchar(30) DEFAULT '0.0.0.0',
  `admin_notes` text,
  `operator_notes` text,
  `status_message` text,
  `login_block` int(1) unsigned DEFAULT '0',
  `login_number` int(1) unsigned DEFAULT '0',
  `pm_all` mediumint(9) DEFAULT '0',
  `pm_unread` mediumint(9) DEFAULT '0',
  `status` varchar(1) DEFAULT '0',
  `key_reset` varchar(64) NOT NULL,
  `referer` int(11) NOT NULL DEFAULT '-1',
  `cash_ref` float(11,2) NOT NULL DEFAULT '0.00',
  `cash_pending` float(11,2) NOT NULL DEFAULT '0.00',
  `cash_ref_withdrawn` float(11,2) NOT NULL DEFAULT '0.00',
  `partner_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `cash_ref_total` double(11,2) NOT NULL DEFAULT '0.00',
  `hits` bigint(20) unsigned NOT NULL DEFAULT '0',
  `registers` int(10) unsigned NOT NULL DEFAULT '0',
  `holdset` varchar(128) DEFAULT NULL,
  `win_double` decimal(12,2) NOT NULL DEFAULT '0.00',
  `mode` varchar(128) DEFAULT NULL,
  `mode2` varchar(128) DEFAULT NULL,
  `mode3` varchar(128) DEFAULT NULL,
  `mode4` varchar(128) DEFAULT NULL,
  `social_network` varchar(255) DEFAULT NULL,
  `social_uid` varchar(255) DEFAULT NULL,
  `id_avatar` int(7) NOT NULL DEFAULT '1',
  `birthday` date NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '0',
  `id_country` int(4) NOT NULL DEFAULT '0',
  `fio` varchar(80) NOT NULL,
  `number_phone` varchar(30) NOT NULL,
  `icq` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=443 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `login`, `pass`, `cash`, `cashin`, `cashout`, `cashfun`, `cashfunin`, `cashfunout`, `fun_date`, `email`, `date`, `check_mail`, `ip_reg`, `ip_last`, `admin_notes`, `operator_notes`, `status_message`, `login_block`, `login_number`, `pm_all`, `pm_unread`, `status`, `key_reset`, `referer`, `cash_ref`, `cash_pending`, `cash_ref_withdrawn`, `partner_blocked`, `cash_ref_total`, `hits`, `registers`, `holdset`, `win_double`, `mode`, `mode2`, `mode3`, `mode4`, `social_network`, `social_uid`, `id_avatar`, `birthday`, `gender`, `id_country`, `fio`, `number_phone`, `icq`, `skype`) VALUES
(386, 'Admin', '6bf37a3cf714e5c14b09882e5f3a452b', '1901.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-18', 'mrm50@yandex.ru', '2015-03-18 15:53:59', 0, '88.200.137.15', '88.200.214.15', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'vkontakte', '248407299', 11, '0000-00-00', 0, 0, '', '', '', ''),
(402, 'wer', '22c276a05aa7c90566ae2175bcc2a9b0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', 'wer3@yandex.ru', '2015-03-24 21:17:55', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(378, 'kvin', '9f3aae0c8e3450e02a68c02c0b0a5728', '576.00', '1.00', '0.00', '0.00', '0.00', '0.00', '2015-03-04', 'kvin@mailforspam.com', '2015-03-04 18:01:30', 0, '109.106.138.100', '109.106.138.100', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 1.00, 0.00, 0.00, 0, 1.00, 7, 2, NULL, '0.00', NULL, NULL, NULL, NULL, 'vkontakte', '238243499', 39, '1955-01-01', 0, 0, '', '', '', ''),
(385, 'FireZZ', '80cf4d4ecfc3496c62c3f20db3c5f996', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-17', 'gmcrazy900@gmail.com', '2015-03-17 14:19:21', 0, '37.79.250.59', '37.79.248.86', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(397, 'part', 'f4c9385f1902f7334b00b9b4ecd164de', '0.00', '2.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', 'fozzy@mailforspam.com', '2015-03-24 14:31:49', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', 378, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(398, 'pihota', '12817efd4bef0d5493b9118a932f4b85', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', 'dima-pihota@mail.ru', '2015-03-24 14:37:19', 0, '109.185.115.233', '109.185.115.233', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(400, '234234', '289dff07669d7a23de0ef88d2f7129e7', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', '34ww3w@mail.ru', '2015-03-24 21:04:01', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(401, 'asd', '7815696ecbf1c96e6894b779456d330e', '4.00', '5.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', '23434@mailforspam.com', '2015-03-24 21:09:58', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', 378, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(403, 'werwer4', '39f5d1a99af19ffa74b68b334e2efa8b', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', '349@mail.ru', '2015-03-24 21:19:59', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(404, '345', '0393a6f30601e450e3079b9e85b40cec', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', '123455@mailforspam.com', '2015-03-24 21:22:54', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(405, '345tyr', '26025f93d6854975c2cde766eb5fc795', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', '34ww345w@mail.ru', '2015-03-24 21:27:03', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(406, 'tyrty445', '7db8187e64272678462717a005089b96', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', '545t6eyrt@mail.ru', '2015-03-24 21:29:48', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(407, 'ter6t345t45', 'cf0804d6fa7f81ee10301338f360886c', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-24', '34w345w345w@mail.ru', '2015-03-24 21:34:17', 0, '109.106.137.168', '109.106.137.168', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(408, 'Sheka', '8c5a5d6bd5331ff057610bbb17ea5ec5', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-29', 'zzaassww@gmail.com', '2015-03-29 19:54:44', 0, '188.130.179.30', '188.130.179.30', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'vkontakte', '10249851', 1, '0000-00-00', 0, 0, '', '', '', ''),
(409, 'casinoru', 'af4da7799f9ea9ae672276acd3315a7a', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-03-31', 'partners@casino.ru', '2015-03-31 09:58:06', 0, '46.119.216.164', '46.119.216.164', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 45.00, 0.00, 0.00, 0, 45.00, 10, 2, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(410, 'odegov66', '69a579db7e01f75aad2418a3643d1c25', '50.00', '50.00', '0.00', '0.00', '0.00', '0.00', '2015-04-01', 'odegov66@narod.ru', '2015-04-01 22:55:08', 0, '85.93.58.78', '85.93.58.78', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', 409, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(411, 'yoa42', '5eed441b946f16814aed95f795742cfc', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-05', 'yoa42@mail.ru', '2015-04-05 13:20:23', 0, '158.46.65.183', '158.46.65.183', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 5, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(412, 'Test1', '9fe92cd7e8fca17cb9cbac9e33a29d69', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-07', 'monaco2014@yandex.ru', '2015-04-07 16:25:34', 0, '178.151.104.14', '178.151.104.14', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(413, 'avast81nk', '104f829a8031414e81112be07e88069c', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-09', 'avast81nk@mail.ru', '2015-04-09 19:29:43', 0, '85.26.165.37', '85.26.165.37', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'vkontakte', '97214042', 1, '0000-00-00', 0, 0, '', '', '', ''),
(414, 'asd444', 'ddbbb3cf39fedda381a18fd081fbcbe2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-10', 'asd@mailforspam.com', '2015-04-10 09:24:14', 0, '77.45.129.60', '77.45.129.60', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(415, 'agag848g4as', 'd2864f55df267347abdf79999cdb0d26', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-10', '48844@ya.ru', '2015-04-10 09:27:30', 0, '91.237.121.51', '91.237.121.51', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'yandex', '76746349', 1, '0000-00-00', 0, 0, '', '', '', ''),
(416, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-11', 'David093030306@mail.ru', '2015-04-11 02:39:31', 0, '46.130.46.192', '46.130.46.192', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(417, 'SampSellRu', 'e396bbb053529d2ddb17b100aa04d7c5', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-11', 'svlroleplay@gmail.com', '2015-04-11 10:18:21', 0, '37.213.59.79', '37.213.59.79', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'vkontakte', '257593576', 1, '0000-00-00', 0, 0, '', '', '', ''),
(418, 'onlineprofits', '67942a4c7c2b6c3fe2345596bf0954e0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-12', 'admin@online-profits.ru', '2015-04-12 07:55:30', 0, '5.44.168.78', '5.44.168.78', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(419, '53454534535', '9ee4b70b3dbd8b36410f626f84f39d3f', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-12', '43643543543@mail.ru', '2015-04-12 10:49:57', 0, '91.105.156.105', '91.105.156.105', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(420, 'name001', '131ca7a3a762176cfa5a4b84e6aed7b2', '49768.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-13', 'ya.ya-capper@yandex.ru', '2015-04-13 19:35:02', 0, '84.51.80.85', '91.123.30.198', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'vkontakte', '219623740', 1, '0000-00-00', 0, 0, '', '', '', ''),
(421, 'zzzzzz', '453e41d218e071ccfb2d1c99ce23906a', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-14', 'tyms777@mail.ru', '2015-04-14 02:38:15', 0, '93.73.54.64', '93.73.54.64', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 4, '0000-00-00', 0, 0, '', '', '', ''),
(422, 'victorash1989', '17a821dfa961c93a6c586ca257750fb2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-15', 'gherciu-victor@mail.ru', '2015-04-15 17:22:26', 0, '194.105.214.134', '194.105.214.134', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'mailru', '10768932348388972380', 1, '0000-00-00', 0, 0, '', '', '', ''),
(423, 'huywqeqw', '3fc0a7acf087f549ac2b266baf94b8b1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-15', 'anonymmr@yandex.ru', '2015-04-15 23:39:12', 0, '178.49.2.17', '178.49.2.17', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(424, 'mitis111', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-16', 'mitis111@gmail.com', '2015-04-16 08:37:26', 0, '188.138.212.103', '188.138.212.103', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(425, '79130212772', 'cf364a90838851e2838384302a9af349', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-16', 'qwer777@mail.ru', '2015-04-16 19:57:19', 0, '91.221.70.92', '91.221.70.92', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'vkontakte', '1389379', 1, '0000-00-00', 0, 0, '', '', '', ''),
(426, 'karpey', '2283d4a5b25b5b6144652bb35218cf79', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-18', 'akarpey2000@mail.ru', '2015-04-18 16:14:54', 0, '93.84.16.210', '178.121.217.237', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(427, 'xaxaxa', '5669dc348737ddda620bd0dd966f60f9', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-20', 'xaxaxa@mail.ru', '2015-04-20 05:14:44', 0, '85.115.224.209', '5.142.136.52', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(428, 'ipalex', '3443df741647bd2e33769a38fc916bd8', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-20', 'iam80@list.ru', '2015-04-20 11:41:55', 0, '178.137.192.234', '178.137.192.234', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(429, 'jackpot', '3b943c46a36d932c2410e8f5949a3ab7', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-20', 'denisabr5@gmail.com', '2015-04-20 17:12:54', 0, '213.57.249.136', '213.57.249.136', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(430, 'berezasan', 'de3ea8652d249fb439cf6e20a1d9dd8a', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-20', 'berezasan@mail.ru', '2015-04-20 17:53:08', 0, '178.62.225.72', '178.62.225.72', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', 409, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(431, 'dimitron', '25f9e794323b453885f5181f1b624d0b', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-22', 'gae0n@mail.ru', '2015-04-22 18:07:34', 0, '88.147.152.13', '88.147.152.13', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'odnoklassniki', '830068784980', 1, '0000-00-00', 0, 0, '', '', '', ''),
(432, 'lumueri', 'e448e61493d006805b8db51d6fc789eb', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-23', 'lumueri@gmail.com', '2015-04-23 16:18:49', 0, '193.104.208.56', '193.104.208.56', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(433, 'romikus', 'd8578edf8458ce06fbc5bb76a58c5ca4', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-26', 'iptekasska@gmail.com', '2015-04-26 23:41:12', 0, '5.18.34.36', '5.18.34.36', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'google', '110200145810611795968', 1, '0000-00-00', 0, 0, '', '', '', ''),
(434, 'milo', 'c38c7b164e16d054433516d2c635bd33', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-30', 'mail@mail.ru', '2015-04-30 17:06:33', 0, '176.101.1.81', '176.101.1.81', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(435, 'vadim2015', '9c23526c9d775559328a3593e2d071f9', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-04-30', 'vadim.golopov@mail.ru', '2015-04-30 18:51:43', 0, '193.19.118.144', '193.19.118.144', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '23ad5c875da0f610d3ba2803507db5d2', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(436, 'kpbILLIka', 'cb9cd6fcf5d6d57e91c31d3a000ebd67', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-05-01', 'kpbILLIka@mail.ru', '2015-05-01 08:55:44', 0, '5.136.94.193', '5.136.94.193', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(437, 'ViTeK38RUS', '7e21162f535a6803254fd0d67d229f9f', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-05-02', 'vitek38rus@gmail.com', '2015-05-02 15:43:25', 0, '109.163.216.188', '109.163.216.188', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'twitter', '1379409625', 1, '0000-00-00', 0, 0, '', '', '', ''),
(438, 'qweeeee', 'eeae93cfccc5754da71a8e1f368744f2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-05-05', 'xxrat@mail.ru', '2015-05-05 06:51:18', 0, '77.92.224.235', '77.92.224.235', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, 'mailru', '15992431385192950177', 1, '0000-00-00', 0, 0, '', '', '', ''),
(439, 'casino2105', 'e67116c6a342622edf3ae3209eb32141', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-05-05', 'avasterm@gmail.com', '2015-05-05 12:54:52', 0, '46.164.164.29', '46.164.164.29', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(440, 'wewr23', '80ee4721913c95beb6da71774c346b9b', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-05-06', 'qwe@mail.rus', '2015-05-06 16:32:31', 0, '69.10.55.96', '69.10.55.96', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(441, '345345rewte', 'b738b8a461d68d351a986cc2e981dd7a', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-05-06', 'qweqwe@mail.ru', '2015-05-06 16:33:00', 0, '69.10.55.96', '69.10.55.96', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', ''),
(442, 'fghygfd', 'f7c88f787c7293a56f7f8a50dd6dea97', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2015-05-06', 'fghygfd@bk.ru', '2015-05-06 18:44:15', 0, '69.10.55.96', '69.10.55.96', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `altname` varchar(100) NOT NULL,
  `id_bank` varchar(10) DEFAULT '2',
  `id_funbank` varchar(10) DEFAULT '1',
  `id_jp` varchar(10) DEFAULT '1',
  `bonus` varchar(10) NOT NULL,
  `bonus_desc` text NOT NULL,
  `win` text NOT NULL,
  `ddouble` text NOT NULL,
  `mode` char(1) NOT NULL DEFAULT '2',
  `delitel` varchar(2) DEFAULT '81',
  `extended` int(1) NOT NULL DEFAULT '0',
  `extended_table` varchar(50) NOT NULL DEFAULT 'games',
  `desc` varchar(200) NOT NULL,
  `url_game` varchar(500) NOT NULL DEFAULT '/games/',
  `url_image` varchar(500) NOT NULL DEFAULT '/games/_thumbs/',
  `edit` int(1) NOT NULL DEFAULT '1',
  `reserv1` int(10) NOT NULL DEFAULT '0',
  `totalgame` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=446 ;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `name`, `altname`, `id_bank`, `id_funbank`, `id_jp`, `bonus`, `bonus_desc`, `win`, `ddouble`, `mode`, `delitel`, `extended`, `extended_table`, `desc`, `url_game`, `url_image`, `edit`, `reserv1`, `totalgame`) VALUES
(423, 'Shinobi', 'Shinobi', '2', '1', '10', '10||', '', '15|14|12|11|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(422, 'SergentPepper', 'SergentPepper', '2', '1', '10', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(421, 'Safari', 'Safari', '2', '1', '10', '10||', '', '11|15|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(420, 'RueDuCommerce', 'RueDuCommerce', '2', '1', '10', '10||', '', '15|14|13|12|10', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(419, 'RoyalFruit', 'RoyalFruit', '2', '1', '10', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(418, 'Paris', 'Paris', '2', '1', '10', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(417, 'Pantheon', 'Pantheon', '2', '1', '10', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(416, 'New-York', 'New-York', '2', '1', '10', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(415, 'NewYearEve', 'NewYearEve', '2', '1', '10', '11||', '', '9|13|11|15|12', '14', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(414, 'MahJong', 'MahJong', '2', '1', '10', '10||', '', '12|11|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(413, 'London', 'London', '2', '1', '10', '10||', '', '13|14|15|15|14', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(412, 'LasVegas', 'LasVegas', '2', '1', '10', '10||', '', '13|14|15|15|14', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(411, 'IndianaCroft', 'IndianaCroft', '2', '1', '10', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(410, 'HappyChristmas', 'HappyChristmas', '2', '1', '10', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(409, 'DaVinci', 'DaVinci', '2', '1', '10', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(408, 'JulesVerne', 'JulesVerne', '2', '1', '10', '11||', '', '10|9|12|13|14', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(407, 'Grizzly', 'Grizzly', '2', '1', '10', '11||', '', '12|9|13|14|15', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(406, 'CrazyDoctors', 'CrazyDoctors', '2', '1', '10', '15||', '', '15|13|15|14|13', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(405, 'JamesBand', 'JamesBand', '2', '1', '10', '13||', '', '12|9|11|14|10', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(404, 'Cartoons', 'Cartoons', '2', '1', '10', '15||', '', '14|12|13|11|9', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(76, 'kingofcards', 'King of Сards', '2', '2', '10', '14|15|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 449504),
(75, 'mermaidspearl', 'Mermaids Pearl', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 382237),
(74, 'sparta', 'Sparta', '2', '2', '10', '11|150|10', 'Бонус игра', '9|11|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 263853),
(73, 'safariheat', 'Safari Heat', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 186822),
(72, 'polarfox', 'PolarFox', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 138315),
(71, 'pharaohsgoldll', 'PharaohsGold 3', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|9', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 317240),
(70, 'wonderfulflute', 'Wonderful Flute', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 159246),
(69, 'gryphonsgold', 'Gryphons Gold', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|10', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 143714),
(68, 'goldenplanet', 'Golden Planet', '2', '2', '10', '11|150|10', 'Бонус игра', '12|9|13|14|12', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 268096),
(67, 'dynasty', 'Dynasty of Ming', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|13', '12', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 293315),
(66, 'attila', 'Attila', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 866817),
(65, 'magicprincess', 'Magic Princess', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 259323),
(64, 'secretforest', 'Secret Forest', '2', '2', '10', '11|150|10', 'Бонус игра', '12|9|13|14|9', '12', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 221322),
(63, 'unicorn', 'Unicorn', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 271633),
(62, 'sharky', 'Sharky', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|13|14|9', '12', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 1252),
(61, 'queenof', 'Queen of Hearts', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|9', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 822045),
(60, 'markopolo', 'MarkoPolo', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|9', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 406384),
(59, 'royaltreasures', 'Royal Treasures', '2', '2', '10', '11|150|10', 'Бонус игра', '12|9|13|14|12', '11', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 89068),
(58, 'pharaohsgoldlll', 'PharaohsGold 2', '2', '2', '10', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 403297),
(57, 'columbusdelux', 'ColumbusDelux', '2', '2', '10', '30|40|50', 'Бонус игра', '7|7|7|7|7', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 333415),
(56, 'columbus', 'Columbus', '2', '2', '10', '10|150|11', 'Бонус игра', '10|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 221),
(55, 'bookofra', 'Book of Ra', '2', '2', '10', '15|10|9', 'Бонус игра', '11|9|12|14|13', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 3193456),
(54, 'bananasplash', 'BananaSplash', '2', '2', '10', '10|150|11', 'Бонус игра', '10|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 393849),
(53, 'bananas', 'Bananas', '2', '2', '10', '11|12|10', 'Бонус игра', '10|9|13|14|13', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 1054312),
(52, 'moneygame', 'Money Game', '2', '2', '10', '15|14|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 814765),
(51, 'dolphins', 'Dolphins', '2', '2', '10', '15|10|11', 'Бонус игра', '10|9|12|14|13', '11', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 1152451),
(50, 'aztectreasure', 'Aztec Treasure', '2', '2', '9', '10|10|10', 'Бонус игра', '13|14|15|15|14', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 738182),
(49, 'luckylady', 'Lucky Lady', '2', '2', '10', '30|40|50', 'Бонус игра', '7|7|7|7|7', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 1281309),
(48, 'ramsesII', 'Ramses II', '2', '2', '10', '30|40|50', 'Бонус игра', '7|7|7|7|7', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 189544),
(47, 'panteron', 'Panteron', '2', '1', '10', '30|40|50', 'Бонус игра', '7|7|7|7|7', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 230050),
(46, 'CaptainCavern', 'CaptainCavern', '2', '1', '10', '11||', '', '15|13|14|11|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(45, 'alcatraz', 'alcatraz', '2', '2', '10', '12|10|15', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|11|12|13|14', '15', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(44, 'island', 'island', '2', '2', '10', '12|10|15', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|11|12|13|15', '14', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(43, 'wildwest', 'wildwest', '2', '2', '9', '10|11|9', 'Бонус игра', '10|15|14|13|12', '13', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(42, 'pirates', 'pirates', '2', '2', '9', '99|20|20', 'Бонус игра', '11|15|14|13|12', '2', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(41, 'pharaon', 'pharaon', '2', '2', '9', '10|11|12', 'Бонус игра', '10|15|14|13|12', '15', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(40, 'deluxe', 'deluxe', '2', '2', '10', '9|10|11', 'Бонус игра', '11|15|14|13|12', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(1, 'aztec', 'aztec', '2', '2', '10', '88||', 'Бонус игра', '77|56|55|44|33', '41', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(2, 'keks', 'keks', '2', '2', '10', '12|10|13', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|11|14|15|13', '9', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(3, 'resident', 'resident', '2', '2', '10', '10|15|13', 'Бонус игра|Супер бонус игра|', '11|9|12|11|13', '12', '1', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(4, 'gnome', 'gnome', '2', '2', '10', '11|10|9', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '12|13|14|9|15', '9', '5', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(5, 'garage', 'garage', '2', '2', '10', '10|11|9', 'Бонус игра|Бонус игра 2|Супер бонус игра|', '11|12|13|14|15', '11', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(6, 'fairy_land', 'fairy_land', '2', '2', '10', '9|11|9', 'Бонус игра|', '11|12|13|15|15', '14', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(7, 'rockclimber', 'rockclimber', '2', '2', '10', '11|10|9', 'Бонус игра|', '15|11|13|15|13', '12', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(8, 'lucky_drink', 'lucky_drink', '2', '2', '10', '11|10|12', 'Бонус игра|', '9|10|13|14|15', '12', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(9, 'lucky_haunter', 'lucky_haunter', '2', '2', '10', '12|10|9', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|12|13|15|14', '11', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(10, 'cocktail', 'cocktail', '2', '2', '10', '11|10|14', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|13|11|15|9', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(11, 'chukcha', 'chukcha', '2', '2', '10', '10|9|11', 'Бонус игра|Бонус игра 2|Идол в бонус игре|', '9|12|13|11|15', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(12, 'crazymonkey', 'crazymonkey', '2', '2', '10', '10||', 'Бонус игра|', '12|13|14|13|13', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(13, 'bigkahuna', 'bigkahuna', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '15|14|11|10|9', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(14, 'gophergold', 'gophergold', '2', '2', '10', '10|12|', 'Скаттер|Бесплатная игра|', '9|15|14|11|9', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(15, 'ofortune', 'ofortune', '2', '2', '10', '11|10|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(16, 'secretadm', 'secretadm', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '12|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(17, 'thunders', 'thunders', '2', '2', '10', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(18, 'winwiz', 'winwiz', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(19, 'carnaval', 'carnaval', '2', '2', '10', '10|9|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(20, 'cashapillar', 'cashapillar', '2', '2', '10', '10|9|', 'Скаттер|Бесплатная игра|', '12|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(21, 'sunquest', 'sunquest', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(22, 'ladies', 'ladies', '2', '2', '10', '10|12|', 'Скаттер|Бесплатная игра|', '14|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(23, 'majormillions', 'majormillions', '2', '2', '10', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(24, 'reelthunder', 'reelthunder', '2', '2', '10', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(25, 'bigtop', 'bigtop', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '9|12|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(26, 'geniesgems', 'geniesgems', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(27, 'monster', 'monster', '2', '2', '10', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(28, 'realdriver', 'realdriver', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(29, 'whathoot', 'whathoot', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(30, 'zorro', 'zorro', '2', '2', '10', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(31, 'tensorbetter', 'tensorbetter', '2', '2', '10', '0', '', '0', '0', '2', '81', 1, 'games_poker', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(32, 'jacksorbetter', 'jacksorbetter', '2', '2', '10', '0', '', '0', '0', '2', '81', 1, 'games_poker', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(33, 'acesandfaces', 'acesandfaces', '2', '2', '10', '0', '', '0', '0', '2', '81', 1, 'games_poker', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(34, 'blackjackclassic', 'blackjackclassic', '2', '2', '10', '', '', '', '', '', '', 1, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(36, 'blackjackvip', 'blackjackvip', '2', '2', '10', '', '', '', '', '', '81', 1, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(35, 'blackjackgold', 'blackjackgold', '2', '2', '10', '', '', '', '', '', '', 1, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(37, 'roulette', 'roulette', '2', '2', '10', '15||', '0', '14|13|14|11|10', '2', '2', '81', 0, 'games', '0', '/games/', '/games/_thumbs/', 1, 0, 0),
(38, 'cargame', 'cargame', '2', '2', '10', '9||', '0', '10|11|12|14|15', '11', '0', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(39, 'champ', 'champ', '2', '2', '10', '9|10|11', 'Бонус игра', '12|15|14|13|12', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(424, 'SpaceRunners', 'SpaceRunners', '2', '1', '10', '10||', '', '11|15|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(425, 'SuperHeroes', 'SuperHeroes', '2', '1', '10', '10||', '', '15|13|14|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(426, 'Tokyo', 'Tokyo', '2', '1', '10', '10||', '', '15|14|11|12|9', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(427, 'WorldCup', 'WorldCup', '2', '1', '10', '10||', '', '11|13|12|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(428, 'JustMarried', 'JustMarried', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(429, 'atlantis', 'atlantis', '2', '1', '10', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(430, 'Dartagnan', 'Dartagnan', '2', '1', '10', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(431, 'Gladiator', 'Gladiator', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(432, 'devilsbike', 'devilsbike', '2', '1', '10', '10||', '', '12|15|14|13|12', '11', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(433, 'Dracula', 'Dracula', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(434, 'HappyFarm', 'HappyFarm', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(435, 'Jungle', 'Jungle', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(436, 'jurassic', 'jurassic', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(437, 'luke', 'luke', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(438, 'LunaPark', 'LunaPark', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(439, 'mafia', 'mafia', '2', '1', '10', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(440, 'mont-blanc', 'mont-blanc', '2', '1', '10', '10||', '', '11|15|13|12|14', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(441, 'Navy', 'Navy', '2', '1', '10', '10||', '', '15|13|14|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(442, 'Numbers', 'Numbers', '2', '1', '10', '10||', '', '15|11|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(443, 'Small-life', 'Small-life', '2', '1', '10', '10||', '', '13|15|14|11|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(444, 'Zorro', 'Zorro', '2', '1', '10', '10||', '', '13|14|11|15|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(445, '25linb2', '25linb2', '2', '1', '10', '10||', '', '15|13|12|14|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `games_bank`
--

CREATE TABLE IF NOT EXISTS `games_bank` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `bank` decimal(20,2) NOT NULL DEFAULT '0.00',
  `proc` decimal(3,0) NOT NULL DEFAULT '100',
  `winmax` decimal(12,2) NOT NULL DEFAULT '0.00',
  `income` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonus` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonus2` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusready` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusproc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusmode` decimal(12,2) NOT NULL DEFAULT '0.00',
  `jackpot` decimal(12,2) NOT NULL DEFAULT '0.00',
  `jpotproc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `mode` varchar(128) DEFAULT NULL,
  `mode2` varchar(128) DEFAULT NULL,
  `mode3` varchar(128) DEFAULT NULL,
  `mode4` varchar(128) DEFAULT NULL,
  `incash` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=166 ;

--
-- Дамп данных таблицы `games_bank`
--

INSERT INTO `games_bank` (`id`, `name`, `bank`, `proc`, `winmax`, `income`, `bonus`, `bonus2`, `bonusready`, `bonusproc`, `bonusmode`, `jackpot`, `jpotproc`, `mode`, `mode2`, `mode3`, `mode4`, `incash`) VALUES
(2, 'Главный Money Банк', '3573.70', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(1, 'Главный FUN банк', '0.00', '1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00');

-- --------------------------------------------------------

--
-- Структура таблицы `games_garage`
--

CREATE TABLE IF NOT EXISTS `games_garage` (
  `g_bon1` int(5) NOT NULL DEFAULT '1',
  `g_bon2` int(5) NOT NULL DEFAULT '1',
  `g_bon3` int(5) NOT NULL DEFAULT '1',
  `g_bon1_1` int(20) NOT NULL DEFAULT '1',
  `g_bon1_2` int(20) NOT NULL DEFAULT '1',
  `g_bon1_3` int(20) NOT NULL DEFAULT '1',
  `g_bon1_fun` int(5) NOT NULL DEFAULT '1',
  `g_bon2_fun` int(5) NOT NULL DEFAULT '3',
  `g_bon3_fun` int(5) NOT NULL DEFAULT '4',
  `g_bon1_1_fun` int(20) NOT NULL DEFAULT '10',
  `g_bon1_2_fun` int(20) NOT NULL DEFAULT '50',
  `g_bon1_3_fun` int(20) NOT NULL DEFAULT '100'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `games_garage`
--

INSERT INTO `games_garage` (`g_bon1`, `g_bon2`, `g_bon3`, `g_bon1_1`, `g_bon1_2`, `g_bon1_3`, `g_bon1_fun`, `g_bon2_fun`, `g_bon3_fun`, `g_bon1_1_fun`, `g_bon1_2_fun`, `g_bon1_3_fun`) VALUES
(3, 3, 2, 363, 43, 5, 3, 3, 2, 181, 163, 181);

-- --------------------------------------------------------

--
-- Структура таблицы `games_group`
--

CREATE TABLE IF NOT EXISTS `games_group` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `games_group`
--

INSERT INTO `games_group` (`id`, `name`) VALUES
(9, 'Слоты'),
(10, 'Рулетка'),
(11, 'Карточные'),
(12, 'Джекпот');

-- --------------------------------------------------------

--
-- Структура таблицы `games_info`
--

CREATE TABLE IF NOT EXISTS `games_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_group` int(3) NOT NULL,
  `popular` int(1) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `rules` text NOT NULL,
  `link_game` varchar(150) NOT NULL,
  `link_info` varchar(100) NOT NULL,
  `screenshots` text NOT NULL,
  `characteristics` text NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link_info` (`link_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Дамп данных таблицы `games_info`
--

INSERT INTO `games_info` (`id`, `id_group`, `popular`, `name`, `img`, `description`, `rules`, `link_game`, `link_info`, `screenshots`, `characteristics`, `meta_keywords`, `meta_description`) VALUES
(7, 9, 1, 'Crazy Doctor', 'CrazyDoctor.png', '<p>\r\n	Ведь если кто-то платит слишком много, значит кто-то слишком много получает. Вот и вам предлагается выступить в роли главврача частной клиники.</p>', '<p>\r\n	<strong>Автомат Crazy Doctor</strong> имеет в себе все необходимое для того, чтобы носить гордое звание современного слота. Здесь и десять линий для ставок, и бонусный символ, и wild-ячейка, и даже пресловутый символ разброса. Чего уж там, даже про риск-игру не забыли, причем, оформили ее довольно необычно.<br />\r\n	Итак, вращая барабаны, вы составляете выигрышные комбинации по три и более одинаковых символа. Помогает вам в этом scatter-ячейка, которая может заменить собой любую другую. Кроме того, собрав три или более символов разброса, вы не только получите крупный выигрыш, но и право вращать барабаны 15 раз за счет казино.</p>', '/games/amarok/CrazyDoctors/', 'crazydoctor', 'a:0:{}', 'a:0:{}', 'Crazy Doctor, Игровой автомат', 'Как многим известно, болеть сегодня обходится довольно дорого. Но что еще значит этот обыденный факт? Ведь если кто-то платит слишком много, значит кто-то слишком много получает.'),
(12, 9, 1, 'Обезьянки(Crazy Monkey)', 'crazymonkey.png', '<p>\r\n	Игровой автомат Crazy Monkey.</p>', '<p>\r\n	Сюжет игрового аппарата Crazy Monkey достаточно прост и незауряден. Прежде чем запустить слот необходимо сделать свою ставку, нажав на соответствующую кнопку (&laquo;Ставка&raquo;). Минимальный размер не должен равняться нулю. Далее нужно выбрать желаемое количество активных линий &ndash; от 1 до 9 &ndash; и можно смело вращать барабаны, нажав на кнопку &laquo;Старт&raquo;.</p>\r\n<p>\r\n	После того как однорукий бандит Обезьянки остановится на игровом поле будут подсвечены линии, принесшие вам удачу и выигрыш. Призовые комбинации формируются с правой или левой стороны минимум по три одинаковых символа в одном ряду. Причем чем больше количество активных линий, тем шансов заполучить выигрыш выше. Ну, а если госпожа Фортуна на вашей стороне, то и по всем сразу.</p>\r\n<p>\r\n	Кроме того, онлайн-казино AzartPlay предоставляет всем пользователям шанс совершенно бесплатно и без регистрации сыграть в игровой аппарат Макаки в демо-режиме. Это дает возможность новичкам изучить правила, а профессионалам потренироваться перед игрой на деньги. Отметим, что бесплатная демо-игра ничем не отличается от игры на реальные деньги. Разве что все ваши ставки виртуальные, поэтому, играя на бесплатные кредиты, вы не сможете вывести и получить свой выигрыш. Поэтому не медлите ни минуты, открывайте счет и выигрывайте реальные деньги в онлайн-игре Crazy Monkey.</p>\r\n<p>\r\n	Помимо заводных Обезьян в игровом автомате Crazy Monkey вы встретите множество зверей, приносящих удачу и выигрышные комбинации. Роль Дикого символа в игре выполняет &laquo;маска&raquo;. Она вправе заменить собой любой символ с меньшим коэффициентом до выигрышного совпадения. При выпадении сразу нескольких призовых комбинаций на одной активной линии, &laquo;маска&raquo; заменяет самый больший из них.</p>\r\n<p>\r\n	&laquo;Изюминкой&raquo; игрового аппарата Манки является уникальная бонус-игра. Она открывается при выпадении на игровом поле от трех и более &laquo;обезьянок&raquo;. Перед вами появится главная героиня и пять веревок, за которыми скрыты экзотические фрукты. Если все пройдет успешно, и вы выберите &laquo;правильные&raquo; веревки, то получите неплохой выигрыш. В противном случае вам на голову может упасть что-нибудь тяжеленькое. Например, наковальня. Конечно, от неё можно спастись. Для этого нужно будет просто надеть каску, за которую в свою очередь придется заплатить деньжат.</p>\r\n<p>\r\n	После каждой удачной комбинации у игрока появляется шанс рискнуть и получить свой выигрыш в двойном размере. Нажмите на кнопку &laquo;Макс.ставка&raquo; и на экране появиться пять карт, одна из которых будет открыта. Ваша задача выбрать карту номиналом выше открытой. При удачном раскладе ваша ставка начнет расти в геометрической прогрессии.</p>', '/games/igrosoft/crazymonkey/', 'crazymonkey', 'a:0:{}', 'a:0:{}', 'fruitcocktail', 'fruitcocktail'),
(14, 9, 1, 'The Money Game(Мани Гейм)', 'Moneygame.png', '<p>\r\n	Кто откажется иметь в своем распоряжении собственный источник богатства? Пожалуй, никто.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Для тех, кто любит азарт и деньги этот слот именно то, что нужно. Игровой автомат The Money Game, пожалуй, самый денежный слот в мире. Все, что вы комбинируете и получаете в данной слот-машине &ndash; это &laquo;баксы&raquo;. Ну и, конечно, сопутствующая роскошь. С чего начать? Для начала сделайте свою ставку и активируйте на свое усмотрение линии выплат. Отметим, что число активных линии и размер ставки прямо пропорциональны вашим шансам получить крупный денежный приз. Итак, следующим шагом запускаем слот, нажав на кнопку &laquo;Пуск&raquo;.</p>\r\n	<p>\r\n		На игровом поле вас ждут самые желанные вещицы &ndash; кошельки, доверху набитые купюрами, пачки денег, мешки с золотом и доллары. Все эти символы способны формировать призовые комбинации, приносящие весьма ощутимые дивиденды. Всего три символа, совпавших в активном ряду, уже смогут принести выигрыш.</p>\r\n	<p>\r\n		Богатеть можно как наяву, так и в сказке, а точнее в бесплатной демо-игре игрового автомата Мани Гейм. Зайдя на сайт казино AzartPlay любой желающий может почувствовать себя богачом и сыграть в демо-игру на бесплатные кредиты. Только учтите, что выигрыш, полученный в этой игре, нельзя вывести, а, следовательно, получить. Поэтому, как только приноровитесь делать ставки и вращать барабаны, смело вступайте в игру на реальные деньги. Ведь куда приятнее стать миллионером наяву, нежели тешить себя сладкими мечтами о красивой жизни.</p>\r\n	<p>\r\n		Кстати, утверждение о том, что богатые люди &ndash; жадные, не иначе как миф. Именно миллионер, разгуливающий по вашему игровому полю, готов прийти к вам на помощь в любую минуту. Этот благодушный сеньор сможет заменить собой любой недостающий символ до выигрышной комбинации.</p>\r\n	<p>\r\n		Фортуна любит смелых. Поэтому не бойтесь рисковать и тем самым увеличивать свою прибыль. Каждый азартный игрок может испытать удачу в игре на удвоение. Задача проста и предельно ясна: вам нужно правильно определить цвет закрытой карты. Если вы действительно любите азарт и не прочь рискнуть, поставив на кон свои денежки, то крупный денежный приз для вас неизбежен.</p>\r\n	<p>\r\n		С игровым автоматом The Money Game вы сможете разбогатеть, не выходя из дома. Единственное, что важно для успешной игры &ndash; это нужные сочетания символов и чуть-чуть везения. Играйте в игровой автомат The Money Game и крупный денежный приз не заставит себя долго ждать.</p>\r\n</div>', '/games/novomatic/index.php?game=moneygame', 'themoneygame', 'a:0:{}', 'a:0:{}', 'The Money Game', 'The Money Game'),
(15, 9, 1, 'Аттила', 'attila.png', '<p>\r\n	Представляем вашему вниманию игровой автомат Attila (Аттила). Стоит отметить, что сюжетная линия слота полностью посвящена Великому вождю гуннов Аттиле.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Attila онлайн представляет собой классический игровой автомат, девять игровых линий которого размещены на пяти барабанах. Основную часть символов игрового слота составляют портреты воинов, поля сражений, а также различные военные атрибуты того времени. Естественно, самый ожидаемый символ Attila в онлайн казино является портрет с изображением самого вождя гуннов.</p>\r\n	<p>\r\n		Если игроку удастся собрать 5 символов Аттилы, которые встанут в один ряд на игровой линии, то ставка по этой линии увеличится сразу в 10000 раз! Кроме того, символ Аттила является &quot;диким&quot; и заменяет собой любые символы, кроме скеттера. Скеттер &mdash; это замечательный символ, умножающий общую ставку при наличии 2 и более символов, вне зависимости от места их выпадения. А также 3 и более символа скеттер дарят игроку 16 бесплатных вращений. Особым шиком и удачей у игроков считается получение дополнительных бесплатных вращений во время самих вращений, для чего достаточно еще раз собрать 3 скеттера.</p>\r\n</div>', '/games/novomatic/index.php?game=attila', 'attila', 'a:0:{}', 'a:0:{}', 'Attila', 'Attila'),
(16, 9, 1, 'Bananas go Bahamas(Бананы)', 'bananas_go_bahamas.png', '<p>\r\n	Солнечные пляжи, горячий песок, освещающие коктейли и морской прибой&hellip; Зачем попусту мечтать, когда с игровым автоматом Bananas go Bahamas все это может стать вашим! Слот Чемоданы знаменит своей щедростью.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Игровой автомат Чемоданы подарит вам безудержное веселье и множество ценных призов. Данный слот привлекателен не только своими щедрыми выплатами, но и отменной красочной графикой, а также простым и интуитивно понятным геймплеем. Как мы уже говорили, игровой автомат Bananas go Bahamas оснащен пятью барабанами, каждый из которых вращается независимо друг от друга. Прежде чем запустить механизм необходимо выбрать количество монет кнопкой &laquo;Ставка&raquo; от 1 цента до 1 доллара. Определив сумму, на которую будете играть, активируем линии выплат. На выбор вам будет предложено 1, 3, 5, 7 и 9 активных линий. Выбираете желаемые и нажимаете на кнопку &laquo;Пуск&raquo;.</p>\r\n	<p>\r\n		Как только слот Бананы остановиться на игровом поле будут формироваться призовые комбинации. Так, уже три одинаковых совпадения символов в одном активном ряду смогут порадовать вас хорошей прибылью.</p>\r\n	<p>\r\n		Если вы не совсем уверенны в своих силах и пока не готовы зарабатывать реальные деньги онлайн-казино AzartPlay предлагает вам сыграть в игровой автомат Bananas go Bahamas бесплатно. Просто открываете демо-игру Бананы и бесплатно практикуете свои навыки. К тому же это будет полезно тем, кто желает потренироваться перед борьбой за большой денежный куш в онлайн-игре на деньги.</p>\r\n	<p>\r\n		С игровым автоматом Чемоданы вы окажитесь на настоящей пляжной вечеринке, где сможете оторваться по полной. Очаровательная клубничка, веселый кокос, обаятельный арбуз и заводной Банан сделают ваш отдых незабываемым. Ведь именно они будут приносить вам выигрышные комбинации, открывать бонусные игры и дарить призы. Особо азартные игроки смогут испытать удачу в риск-игре и заполучить выигрыш в двойном размере.</p>\r\n	<p>\r\n		Спешите, пляжная вечеринка в игровом автомате Bananas go Bahamas уже в самом разгаре!</p>\r\n</div>', '/games/novomatic/index.php?game=bananas', 'bananasgobahamas', 'a:0:{}', 'a:0:{}', 'Bananas go Bahamas', 'Bananas go Bahamas'),
(17, 9, 1, 'Banana Splash', 'banana_splash.png', '<p>\r\n	Сыграйте непременно в &laquo;Banana splash&raquo;, и крупный выигрыш вкупе с хорошим настроением практически Вам гарантированы!</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Как, вы уже устали от непогоды и вам хочется снова в лето? Нет ничего проще &ndash; заходите в виртуальное казино Azart Play. Там вам предложат прекрасный и захватывающий отдых на берегу лазурного моря с массой курортных развлечений. Вам достаточно нажать клавишу &laquo;играть!&raquo;, и автомат Banana Splash мгновенно перенесёт вас туда, где время летит незаметно, а отдых может сочетаться с прекрасной возможностью заработать неплохие деньги.</p>\r\n	<p>\r\n		На игровых барабанах сладко нежится под солнцем целая команда отдыхающих, очень похожих на соблазнительные фрукты. Вы можете присоединиться к их компании, начав с пробных туров. Любите клубнику? Правильно! Потому что линия, выстроенная с её присутствием, сделает вас намного богаче. А вот и арбуз! Он-то точно позаботится о том, чтобы время, проведенное за игрой, было не только интересным, но и весьма прибыльным.</p>\r\n	<p>\r\n		Но самый долгожданный и наиболее щедрый посетитель игровой площадки &ndash; сам банан. Он может просто осыпать вас золотом или драгоценными каменьями, если вам повезет увидеть его в пятикратном изображении. У него же функция &laquo;дикого&raquo; символа, хотя он вполне симпатичный. Его одиночное появление означает, что может быть заменена любая фигура на игровом поле, для составления выигрышной линии.</p>\r\n	<p>\r\n		Если вы пришли в Azart Play, значит, хотите развлечься и заработать. И то, и другое предложит вам яркий и оригинальный слот Banana Splash и другие красочные и увлекательные игровые автоматы в игре на реальные деньги. Приступайте и зарабатывайте! Банановые всплески наверняка принесут вам удачу!</p>\r\n</div>', '/games/novomatic/index.php?game=bananasplash', 'bananasplash', 'a:0:{}', 'a:0:{}', 'Banana Splash', 'Banana Splash'),
(18, 9, 1, 'Book of Ra(Книга Ра)', 'bookofra.png', '<p>\r\n	Книга способна подарить не только знания, но и несметные сокровища.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Вся прелесть игрового автомата Книга Ра в том, что играть в него очень просто и плюс ко всему выгодно. Для того, чтобы начать играть установите минимальный размер своей ставки. При условии, что она будет выше, чем ноль. Далее активируйте игровые линии, которых в слоте всего девять (1,3,5,7,9). Увеличивая размер своей ставки и число активных линий, вы тем самым повышаете свои шансы заполучить крупный денежный приз. Итак, приводим барабаны в действие, нажав на кнопку &laquo;Пуск&raquo;.</p>\r\n	<p>\r\n		На пути к богатству вам будут встречаться жуки-скарабеи, золотые статуэтки, пирамиды, фараоны и многое другое. При удачном совпадении они способны принести неплохую прибыль. Так, уже при выпадении трех одинаковых символов от левого края в активном ряду вы получаете призовые дивиденды.</p>\r\n	<p>\r\n		В онлайн-казино AzartPlay испытать удачу может любой игрок. Если вы новичок и желаете воочию ознакомиться с правилами игры предлагаем вам бесплатно попробовать свои силы в демо-игре Book of Ra. К тому же это прекрасный шанс и для опытных игроков подготовиться перед &laquo;большой&raquo; игрой на деньги. Между бесплатным демо-режим слота Книга Ра и онлайн-игрой на деньги нет какой-либо разницы. За исключением одного &ndash; вы не можете выводить свои денежные призы, играя на бесплатные кредиты. Поэтому если вы любите проводить время не только с удовольствием, но и пользой, предлагаем вам онлайн-игру Book of Ra на деньги.</p>\r\n	<p>\r\n		В охоте за сокровищами вам понадобится помощь археолога. Именно его присутствие может сыграть решающую роль в формировании выигрышных комбинаций. Символ с археологом всегда выручит в трудную минуту и заменит собой недостающую иконку. С ним ваши шансы получить бонусные очки заметно выше.</p>\r\n	<p>\r\n		Игровой автомат Книга Ра &ndash; это не только священное собрание мудрости, но и хороший заработок. При выпадении трех символов с этим волшебным фолиантом на игровом поле перед вами откроется бонус-игра. Её исход для каждого игрока станет настоящим сюрпризом, так как он суммируется по результатам 10 бесплатных вращений.</p>\r\n	<p>\r\n		Но и это еще не все. Если вы уже заработали неплохую денежную сумму, но желаете получить в два раза больше азарта и призов, предлагаем вам сыграть в риск-игру. Задача несложная &ndash; всего лишь правильно определить цвет выпавшей карты. Сделав верный выбор, ваша ставка начнет расти в геометрической прогрессии, принося неплохой &laquo;урожай&raquo;.</p>\r\n	<p>\r\n		Готовы познать тайны древних цивилизаций и овладеть священной Книгой мудрости? Тогда открывайте игровой автомат Book of Ra в онлайн-казино AzartPlay и начинайте играть. Быть может именно вам Книга Ра поведает истинный путь к богатству.</p>\r\n</div>', '/games/novomatic/index.php?game=bookofra', 'bookofra', 'a:0:{}', 'a:0:{}', 'Book of Ra(Книга Ра)', 'Book of Ra(Книга Ра)'),
(19, 9, 1, 'Колумб(Columbus)', 'columbus_deluxe.png', '<p>\r\n	Об открытиях Христофора Колумба известно всем: в честь него названо государство, несколько городов и даже валюта в двух странах.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 барабанов, 10 игровых линий, дикий символ, скеттрер символ, дающий 10 бесплатных вращений, во время которых бонусные символы приобретают функцию диких символов. Возможность выигрывать дополнительные бесплатные вращения. Многократное увеличение выигрыша в два раза, в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Фрегат - скеттер символ. Появляется только на 1, 3 и 5 игровых барабанах. Появление одновременно трёх символов запускает 10 бесплатных вращений, во время которых у этих символов появляется дополнительная функция - они становятся дикими, то есть заменяют любые другие символы.<br />\r\n		Колумб - дикий символ. Заменяет собой все другие символы, кроме скеттеров. Является самым высокооплачиваемым символом этой игры: за пять таких символов, собранных на активной игровой линии, ставка на линию увеличивается в 5000 раз!</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Каждый раз, когда в игре выпадает выигрыш, есть возможность рискнуть, поставив на кон в простой игре на удвоение. Для победы необходимо угадать цвет карты, случайно выбранной из колоды, и в случае удачи, текущий выигрыш будет удвоен. Играть можно несколько раз подряд, что позволит выигрышу расти в геометрической прогрессии, но весь выигрыш пропадает при первой же ошибке.</p>\r\n</div>', '/games/novomatic/index.php?game=columbusdelux', 'columbus', 'a:0:{}', 'a:0:{}', 'Колумб(Columbus)', 'Колумб(Columbus)'),
(20, 9, 1, 'Dolphin\\''s Pearl Deluxe', 'dolphins.png', '<p>\r\n	Тайна подводного мира раскрыта! Оказывается в раковинах таятся не просто жемчужины, а настоящие сокровища.</p>', '<div class=\\"\\\\&quot;article-text\\\\&quot;\\">\r\n	<p>\r\n		<b>Характеристики слота</b></p>\r\n	<p>\r\n		5 барабанов, 10 игровых линий , дикий символ, скеттер, позволяющий получить 15 бесплатных вращений с возможностью выиграть дополнительные вращения, возможность неоднократного увеличения выигрыша в риск-игре.</p>\r\n	<p>\r\n		Игровые символы</p>\r\n	<p>\r\n		Дикий символ - дельфин. Заменяет собой любые символы, кроме скеттера. За пять батискафов на активной линии ставка на линию увеличивается в 9000 раз!</p>\r\n	<p>\r\n		Скеттер - раковина с жемчужиной внутри. Награда за три и более таковых в любом месте - 15 бесплатных вращений. Кроме того, в зависимости от количества выпавших скеттеров, общая ставка умножается в 2-500 раз.</p>\r\n	<p>\r\n		<b>Риск-игра</b></p>\r\n	<p>\r\n		Каждый раз, когда основная игра приносит выигрыш, есть возможность рискнуть им, попытавшись увеличить. Для этого нужно угадать цвет масти скрытой карты. Удваивать выигрыш можно неоднократно.</p>\r\n</div>', '/games/novomatic/index.php?game=dolphins', 'dolphins', 'a:0:{}', 'a:0:{}', 'Dolphin\\\\', 'Dolphin\\\\'),
(21, 9, 1, 'Dynasty of Ming', 'dynasty.png', '<p>\r\n	Для всех любителей древней культуры Азии представляем игровой автомат Dynasty of Ming, который позволит окунуться в те захватывающие времена.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Обращаясь к техническим характеристикам Dynasty of Ming в онлайн казино, необходимо отметить, что данный слот имеет 12 игровых линий, расположенный на 5 барабанах, которые вращаются автономно, т.е. независимо друг от друга. Честность игры обеспечивается современным генератором случайных чисел.</p>\r\n	<p>\r\n		Игра Dynasty of Ming имеет несколько видов символов. Так, в роли Wild-символа выступает изображение Царя Минь. Стоит отметить, что данный символ имеет позыв к главной комбинации в игровом автомате. Так, если на одной игровой линии выпадет пять символов Царя Минь, ставка на линию увеличится в 9000 раз!</p>\r\n	<p>\r\n		Также, когда вы начали играть в автомат Династия Минг онлайн, можно столкнуться со Скеттер-символом, представленным в виде изображения головы дракона. Если на игровой линии выпадет 3 и более подобных символа, запускается бонусная игра. Главной задачей в последней является максимальное получение выгоды из бесплатных вращений. Кроме того, все деньги, которые вы заработаете в бесплатных вращениях, автоматически умножатся в три раза. Таким образом, играть на деньги становится весьма прибыльным занятием.</p>\r\n</div>', '/games/novomatic/index.php?game=dynasty', 'dynastyofming', 'a:0:{}', 'a:0:{}', 'Dynasty of Ming', 'Dynasty of Ming'),
(22, 9, 1, 'Лягушки(Fairy Land)', 'fairy_land.png', '<p>\r\n	Название можно перевести как волшебная страна, и не случайно ведь главной героиней является лягушка.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 барабанов, 9 игровых линий, дикий символ, бонус символ. Увлекательная, щедрая и необычная бонус-игра. Многократное увеличение выигрыша в два раза, в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Лягушка - бонус символ, главная героиня игры. Если Вам повезло собрать три и более таких символа в любых местах на игровых барабанах, значит настало время для самого интересного и пожалуй самого прибыльного момента игры - бонуса. Хамелеон - дикий символ. Как известно хамелеоны отлично маскируются, поэтому они с лёгкостью заменяют собой все другие символы, кроме бонусных и Fairy Land, что позволяет выигрывать больше!<br />\r\n		Fairy Land наиболее высокооплачиваемый символ этой игры: за пять таких символов, собранных на активной игровой линии, ставка на линию увеличивается в 10000 раз!</p>\r\n	<p>\r\n		<b>Бонус игра</b><br />\r\n		Задача игрока помочь пропрыгать лягушке по кувшинкам так, чтоб не попасть за завтрак крокодилу. Если пройдено 5 кувшинок, отважной лягушке предстоит новое испытание - отыскать в болоте подружек, избежав встречи с вечнозеленым и вечно голодным хищником.</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Каждый раз, когда в игре выпадает выигрыш, есть возможность рискнуть им, поставив на кон в простой игре на удвоение. Из карточной колоды раздаётся пять случайных карт, левую открывает дилер, игроку предлагается выбрать любую из оставшихся карт, так чтоб она оказалась старше карты дилера. Играть можно несколько раз подряд, что позволит выигрышу расти в геометрической прогрессии, но весь выигрыш пропадает при первой же ошибке.</p>\r\n</div>', '/games/igrosoft/fairyland/', 'fairyland', 'a:0:{}', 'a:0:{}', 'fairyland', 'fairyland'),
(23, 9, 1, 'Fruit Cocktail(Клубничка)', 'fruit_coctail.png', '<p>\r\n	Завсегдатаи игорных заведений не понаслышке знакомы с игровым автоматом Fruit Cocktail. Теперь аппетитные Клубнички есть и у нас в онлайн-казино.</p>', '<div class=\\"\\\\&quot;article-text\\\\&quot;\\">\r\n	<p>\r\n		Что может быть чудесней освежающего коктейля из спелых фруктов? Нет, речь не идет о правильном питании и детокс-диетах. Мы говорим о по-настоящему ярких и интересных фруктах, от которых захватывает дух. Яблоки, груши, арбузы, персики и ягодки игрового автомата Fruit Cocktail представлены здесь в полном изобилии. Насытиться ими невозможно, однако ими они сделают вашу жизнь поистине сладкой.</p>\r\n	<p>\r\n		Что для этого нужно? Вращать барабаны и собирать выигрышные комбинации. Но прежде чем это сделать установите минимальный размер своей ставки (&laquo;Мин.ставка&raquo;) и активируйте желаемое число линий выплат (1, 3, 5, 7 и 9). Готово? Тогда нажимаем &laquo;Пуск&raquo; и ждем совпадений.</p>\r\n	<p>\r\n		Играть в слот Ягодки достаточно просто. Важно запомнить, что шансы получить крупный выигрыш высоки тогда, когда вы выбираете наиболее высокую ставку и активируете максимальное количество рядов.</p>\r\n	<p>\r\n		Если вы сомневаетесь в своих возможностях или желаете разобраться в тонкостях игры онлайн-казино AzartPlay предлагает вам сыграть в бесплатную демо-версию игры Фрут Коктейль. Так, вы не тратите средства из своего кошелька и знакомитесь с правилами. Плюс ко всему это хорошая тренировка перед игрой на деньги. Ведь только в онлайн-игре Fruit Cocktail вы сможете получить неподдельный азарт и адреналин. Полученный в бесплатной демо-версии выигрыш нельзя вывести, поэтому как только ознакомитесь с &laquo;садом&raquo; начинайте играть в Клубничку на деньги. Так, приятное развлечение принесет вам и море ярких эмоций, и настоящий заработок.</p>\r\n	<p>\r\n		Хозяйкой всего пиршества является Клубника. Щедрость этой ягоды не знает границ: сюрпризы, бонусы и подарки ждут всех гостей её &laquo;сада&raquo; Fruit Cocktail. О ней мечтает каждый игрок, ведь именно Клубничка способна сделать вашу жизнь действительно сладкой. Всего три таких ягодки могут принести внушительный денежный приз. Не случайно игровой эмулятор Фрут Коктейль горячо любим среди азартных игроков нашего казино.</p>\r\n	<p>\r\n		Кроме того, аппетитная Клубничка порадует вас веселой бонус-игрой, где вас будет ждать настоящая фруктовая феерия.</p>\r\n	<p>\r\n		В игровом автомате Fruit Cocktail вы сможете испытать жгучий азарт. На каждом шагу вас будут поджидать заманчивые предложения испытать судьбу. Так, самые отчаянные игроки могут удвоить свой выигрыш и сыграть в риск-игру. Перед вами появятся пять карт, четыре из которых будут закрыты. Вы должны выбрать карту номиналом выше открытой. Правильный ответ принесет вам удвоенный выигрыш. Ради такого стоит побороться.</p>\r\n	<p>\r\n		Все самые сочные спелые фрукты игрового автомата Клубничка в вашем распоряжении! Онлайн-казино AzartPlay предлагает вам приготовить свой Фруктовый Коктейль, который сделает вас несказанно богатым.</p>\r\n</div>', '/games/igrosoft/fruitcocktail/', 'fruitcocktails', 'a:0:{}', 'a:0:{}', 'fruitcocktail', 'fruitcocktail'),
(24, 9, 1, 'Garage(Гараж)', 'garage.png', '<p>\r\n	В гараже мы проводим иногда лучшую часть жизни.</p>', '<div class=\\"\\\\&quot;article-text\\\\&quot;\\">\r\n	<p>\r\n		Если у вас есть машина, значит, и место для неё вы уже давно определили. А между тем &laquo;Гараж&raquo; &ndash; это не только дом для реального автомобиля, но и прекрасная площадка для занимательного развлечения в хорошем добром виртуальном казино Azart Play.</p>\r\n	<p>\r\n		Игровой автомат GARAGE- один из самых популярных, на полях которого предусмотрительно собраны самые нужные вещи автомобилиста: ключи, канистры, огнетушители и ящики с запрятанными и давно забытыми вещами. Если в обычном гараже можно подкрутить гайки и добиться плавного скольжения вашего реального авто, то наш GARAGE предоставит шанс не только отдохнуть в привычной для вас обстановке, но и заработать на увлекательной игре. Здесь достаточно лишь нажимать кнопки, и призы сами посыплются на вас в виде огромного количества приятных бонусов.</p>\r\n	<p>\r\n		Самая желанная комбинация &ndash; три тех самых загадочных замка, за которыми хранится неизвестно что. Всё, как в реальной жизни. Только здесь такой таинственный предмет дает возможность рискнуть и вступить в бонусный тур, в котором вы эти ящики не только можно открыть, но и получить приятный сюрприз в виде дополнительных очков, а соответственно они модифицируются в деньги!</p>\r\n	<p>\r\n		Если игра Гараж на реальные деньги пока ещё не входит в ваши планы, то можно до выяснения всех нюансов, ограничиться бесплатной версией, с помощью которой вы сможете понять всю степень привлекательности нахождения в нашем виртуальном гараже. На площадке Azart Play даже обычный GARAGE может принести удачу и немалый выигрыш, а хорошее настроение в любом случае обеспечено.</p>\r\n</div>', '/games/igrosoft/garage/', 'garage', 'a:0:{}', 'a:0:{}', 'garage', 'garage'),
(25, 9, 1, 'Golden Planet', 'golden_planet.png', '<p>\r\n	Golden Planet (золотая планета). Когда-то зололтая лихорадка разразилась из-за месторождения найденного на реке Клондайк,</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Планета с астероидным поясом &mdash; Рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Летательный аппарат &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, при появлении пяти таких символов на активной игровой линии, ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=goldenplanet', 'goldenplanet', 'a:0:{}', 'a:0:{}', 'Golden Planet', 'Golden Planet');
INSERT INTO `games_info` (`id`, `id_group`, `popular`, `name`, `img`, `description`, `rules`, `link_game`, `link_info`, `screenshots`, `characteristics`, `meta_keywords`, `meta_description`) VALUES
(26, 9, 1, 'Gryphons Gold', 'gryphons.png', '<p>\r\n	Золото грифонов (Gryphons gold) &mdash; увлекательный игровой автомат на фентезийную тему.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Волшебный лес &mdash; рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Повторное получение трёх и более рассыпных символов, во время бесплатных вращений, увеличивает оставшееся число фриспинов на 15. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Грифон &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, за пять грифонов на активной игровой линии ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=gryphonsgold', 'gryphonsgold', 'a:0:{}', 'a:0:{}', 'Gryphons Gold', 'Gryphons Gold'),
(27, 9, 1, 'Island 2', 'island.png', '<p>\r\n	Иногда любители приключений попадают в очень непростые ситуации, как например всем известный, герой книги Даниэля Дефо, Робинзон Крузо.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 барабанов, 9 игровых линий, дикий символ, бонус-игра, возможность неоднократного увеличения выигрыша в два раза в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b> Остров с пальмами - бонус символ. Появление одновременно трёх таких символов запускает бонус игру, в которой желательно добраться до суши. На пути Ваша задача не пойти на корм акулам, верно выбрав направление. Добравшись до острова, нужно будет озаботится пропитанием, выбрав один из двух окороков, подвох в том, что один из них соединён с ловушкой.<br />\r\n		Island - самый щедрый символ. За пять таких символов собранных на активной игровой линии ставка на линию увеличивается в 5000 раз!<br />\r\n		Дельфин с надписью Joker - дикий символ. Заменяет все остальные символы кроме Island и бонусного символа.</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Любой выигрыш можно попробовать приумножить. Для этого в игровом меню нужно нажать кнопку &quot;риск&quot;, после чего перед игроком появится пять карт. Самая левая- карта дилера, задача игрока выбрать одну из оставшихся четырёх, если она окажется старше, карты открытой дилером, текущий выигрыш удваивается. Можно рисковать несколько раз подряд, но после первой же ошибки текущий выигрыш сгорает.</p>\r\n</div>', '/games/igrosoft/island/', 'island', 'a:0:{}', 'a:0:{}', 'island', 'island'),
(28, 9, 1, 'Кекс(Печки)', 'keks.png', '<p>\r\n	Русскую народную сказку про колобка знают все. В современной версии сказки колобок стал крутым Кексом и пытается уйти уже не от дедушки с бабушкой, а от игроков.</p>', '<div class=\\"\\\\&quot;article-text\\\\&quot;\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 барабанов, 9 игровых линий, дикий символ, бонус-игра, возможность неоднократного увеличения выигрыша в два раза в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Печь - бонус символ. Появление одновременно трёх таких символов запускает бонус игру, в которой нужно открывать створки печей и заходить за ними еду. Если где-то еда сгорела, вы увидите дым и бонус игра закончится. Открыв же все пять печей без происшествий, Вы отправитесь на поиски Кекса, для этого нужно будет выбрать за какими из кустов он спрятался. Нашедшему Кекс достанется суперприз.<br />\r\n		Черна кошка - самый щедрый символ. За пять таких символов собранных на активной линии ставка на линию увеличивается в 5000 раз!<br />\r\n		Кекс - дикий символ. Заменяет все остальные символы кроме кошек и печек.</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Любой выигрыш можно попробовать приумножить. Для этого в игровом меню нужно нажать кнопку &quot;риск&quot;, после чего перед игроком появится пять карт. Самая левая- карта дилера, задача игрока выбрать одну из оставшихся четырёх, если она окажется старше, карты открытой дилером, текущий выигрыш удваивается. Можно рисковать несколько раз подряд, но после первой же ошибки текущий выигрыш сгорает.</p>\r\n</div>', '/games/igrosoft/keks/', 'keksik', 'a:0:{}', 'a:0:{}', 'keksik', 'keksik'),
(29, 9, 1, 'King of Cards', 'king_of_cards.png', '<p>\r\n	King of Cards (король карт) &mdash; игровой автомат в который можно играть онлайн, или играть в обычном казино.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Стопка фишек &mdash; Рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Повторное получение трёх и более рассыпных символов, во время бесплатных вращений, увеличивает оставшееся число фриспинов на 15. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Джокер &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, за пять джокеров на активной игровой линии ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=kingofcards', 'kingofcards', 'a:0:{}', 'a:0:{}', 'kingofcards', 'kingofcards'),
(30, 9, 1, 'Lucky Lady Charm', 'lucky_charm.png', '<p>\r\n	Конечно, привлечь удачу сложно, но и с игровым автоматом Lucky Lady&rsquo;s Charm чудеса действительно случаются.</p>', '<p>\r\n	Игровой автомат Шары придется по вкусу и женщинам, и мужчинам. Чарующая графика и обворожительная главная героиня околдовывают своими чарами. Здесь вы встретите множество магических штучек и заветных талисманов, которые помогут вам разгадать все секреты и найти свой ключ к успеху. С чего начать свое приключение? Со ставки. Соответствующей кнопкой (&laquo;Мин.Ставка&raquo;) установите минимальный размер, который должен быть больше нуля. Далее выберите на игровом поле желаемые линии выплат &ndash; 1, 3, 5, 7 и 9. Учтите, что от количества выбранных активных рядов зависят ваши шансы на получение крупного выигрыша. Чем их больше, тем вероятность выпадения выигрышных комбинаций выше.</p>', '/games/novomatic/index.php?game=luckylady', 'luckyladycharm', 'a:0:{}', 'a:0:{}', 'luckyladycharm', 'luckyladycharm'),
(31, 9, 1, 'Черти(Lucky Drink)', 'lucky_drink.png', '<p>\r\n	Пить не вредно, вредно меру не знать, а то ведь и до чертей можно допиться.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 барабанов, 9 игровых линий, бонус символ. Оригинальная бонус игра. Многократное увеличение выигрыша в два раза, в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Чёрт - бонус символ. Собрав три и более таких символа в любых местах на игровых барабанах игрок получает право на участие в бонус игре, где надо как следует выпить и закусить, избежав встречи с чертями.<br />\r\n		Бочонок - это всегда хорошо, но не потому что он с пивом, а потому, что это наиболее высокооплачиваемый символ этой игры. За пять таких символов, собранных на активной игровой линии, ставка на линию увеличивается в 10000 раз!</p>\r\n	<p>\r\n		<b>Бонус игра</b><br />\r\n		В бонусе игрок осуществляет заветную мечту любого любителя заложить за воротник - попадает в подвал где хранятся запсы выпивки. Задача тут проста, найти побольше выпивки, а может и закуски какой, получить удовольствие и выигрыш заодно, главное чтоб никаких чертей!</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Каждый раз, когда в игре выпадает выигрыш, есть возможность рискнуть им, поставив на кон в простой игре на удвоение. Из карточной колоды раздаётся пять случайных какрт, левую открывает дилер, игроку предлагается выбрать любую из оставшихся карт, так чтоб она оказалась старше карты дилера. Играть можно несколько раз подряд, что позволит выигрышу расти в геометрической прогрессии, но весь выигрыш пропадает при первой же ошибке.</p>\r\n</div>', '/games/igrosoft/luckydrink/', 'luckydrink', 'a:0:{}', 'a:0:{}', 'luckydrink', 'luckydrink'),
(32, 9, 1, 'Lucky Haunter(Пробка)', 'lucky_haunter.png', '<p>\r\n	Даже если вы сидите за барной стойкой, буйная толпа незнакомцев вокруг и оглушительные звуки играющей музыки вряд ли позволят вам расслабиться.</p>', '<p>\r\n	На игровом поле Лаки Хантер вас ждут тематические символы &ndash; пенящееся пиво, игристое вино, Пробки, закуска в виде вареных раков и креветок. Все они образуют призовые комбинации и приносят хорошую прибыль. Как всем известно подкова приносит удачу, и Лаки Хантер не исключение. В игровой аппарате Охотник &ndash; это дикий символ, заменяющий недостающие иконки до выигрышных комбинаций.</p>\r\n<p>\r\n	Например, при появлении на игровом поле от трех символов с Крышками запускается бонусная игра. Ваша задача &ndash; правильно открыть Крышки, из предложенных пяти вариантов. Если вы сделаете правильный выбор &ndash; откроется супер бонусная игра. Здесь вас ждет еще больше азарта и больше денежных призов.</p>\r\n<p>\r\n	Ну, а для самых азартных в игровом автомате Lucky Haunter есть игра на удвоение. Каждый раз, когда вы будете собирать выигрышную комбинацию в слоте, вы получаете доступ к возможности удвоить свой выигрыш и сыграть в риск-игру.</p>\r\n<p>\r\n	Цель игры проста и ясна &ndash; из выпавших на экране четырех закрытых банок вам нужно выбрать ту, на которой будет число больше, чем на банке дилера. Ответите правильно &ndash; увеличите свой выигрыш в два раза. Причем удваивать можно сколько угодно. Кроме того, если на выбранной вами банке есть обозначение &laquo;Joker&raquo;, то ваша ставка в любом случае считается выигрышной.</p>\r\n<p>\r\n	Оказаться в настоящей таверне и расслабиться за бокалом любимого напитка, не выходя из дома, можно у нас &ndash; в онлайн-казино AzartPlay. С игровым автоматом Lucky Haunter вы проведете время не только с удовольствием, но с пользой.</p>', '/games/igrosoft/luckyhaunter/', 'luckyhaunter', 'a:0:{}', 'a:0:{}', 'luckyhaunter', 'luckyhaunter'),
(33, 9, 1, 'Magic Princess', 'magic_princess.png', '<p>\r\n	Magic Princess (Волшебная принцесса). В одной сказочной стране, жила волшебная принцесса, но о том какие её ждут приключения.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Хрустальный шар &mdash; Рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<h4>\r\n		Принцесса&mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, при появлении пяти таких символов на активной игровой линии, ставка по линии увеличивается в 9000 раз!</h4>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=magicprincess', 'magicprincess', 'a:0:{}', 'a:0:{}', 'magicprincess', 'magicprincess'),
(34, 9, 1, 'Марко Поло', 'marco_polo.png', '<p>\r\n	Ни для кого не станет открытием, что Marco Polo (Марко Поло) был известным.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Чтобы осуществить затею, игроку просто необходимо нажать на кнопку &laquo;Старт&raquo;. Игра при этом приведёт в движение 5 барабанов с историческими символами, на которых будет выставлена 1 игровая линия. По желанию игрока, можно увеличить данную цифру до 9 линий для игры. Естественно, чем больше линий выберет игрок, тем выше станет его ставка за одно вращение. Но, не стоит забывать, что при этом также увеличивается и выигрыш игрока. Чтобы играть в Marco Polo на 9 линиях, необходимо нажать на кнопку &laquo;Line&raquo; пока все они не будут светиться на игровом поле.</p>\r\n	<p>\r\n		Если ставка за одно вращение в Marco Polo онлайн игроку кажется слишком маленькой, он может постепенно её поднимать, нажимая на кнопку &laquo;Bet one&raquo;. Если же пользователь решил сразу выставить максимальную стоимость вращения, то одним нажатием кнопки &laquo;Bet max&raquo; это становится возможным. Игровой автомат Marco Polo имеет игру на удвоение и бонусную игру.</p>\r\n	<h4>\r\n		Бонусная игра</h4>\r\n	<p>\r\n		Бонусная игра в Marco Polo онлайн представляет собой 10 бесплатных вращений. Запускается она в тех случаях, когда на барабанах выпадает три символа &laquo;Верблюд&raquo;. При этом их последовательность не имеет значения. Таким образом, при подобной бонусной игре выигрыш игрока суммируется и приумножается. Если в процессе бесплатных вращений опять выпадет бонусная комбинация, то новые 10 free spin добавятся к старым оставшимся у игрока вращениям. После окончания бонус игры пользователь либо забирает выигрыш, либо рискует в игре на удвоение.</p>\r\n</div>', '/games/novomatic/index.php?game=markopolo', 'marcopolo', 'a:0:{}', 'a:0:{}', 'marcopolo', 'marcopolo'),
(35, 9, 1, 'Mermaids Pearl', 'mermailds_pearls.png', '<p>\r\n	Mermaids pearl (жемчужина русалок) &mdash; игровой автомат о подводных кладах, отыскать которые помогают русалки.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Сундук &mdash; рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Повторное получение трёх и более рассыпных символов, во время бесплатных вращений, увеличивает оставшееся число фриспинов на 15. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Русалочка &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, за пять русалочек на активной игровой линии ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=mermaidspearl', 'mermaidspearl', 'a:0:{}', 'a:0:{}', 'mermaidspearl', 'mermaidspearl'),
(36, 9, 1, 'Pharaons Gold', 'pharaons_gold.png', '<p>\r\n	Тематика древних времен традиционна в казино благодаря размаху свершений сильных мира того.</p>', '<p>\r\n	Игровое поле представляет собой пять барабанов, которые, вращаясь, образуют различные комбинации из фигур. Чем больше совпадений, тем больше шанс добыть сокровища. Игра Pharaons Gold 2 завораживает с первых минут. Не только прекрасное оформление с присутствием таинственных египетских артефактов, но и сам ход процесса заставят отвлечься от всего происходящего вне игры. Вы будете увлечены потрясающим путешествием в загадочную и сказочно богатую страну. Фараоны обязательно поделятся с вами своими несметными сокровищами, если на поле выстроится линия всевидящего ока. Оно станет настоящей удачей для вас!</p>', '/games/novomatic/index.php?game=pharaohsgoldll', 'pharaonsgold', 'a:0:{}', 'a:0:{}', 'pharaonsgold', 'pharaonsgold'),
(37, 9, 1, 'Pharaons Gold 3', 'pharaons_gold3.png', '<p>\r\n	Pharaons gold 3 (золото фараонов 3) &mdash; игровой автомат о могущественных правителях древнего Египта и их сокровищах.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Глаз Бога Ра &mdash; Рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Фараон &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, за пять символов принцессы на активной игровой линии ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=pharaohsgoldlll', 'pharaonsgold3', 'a:0:{}', 'a:0:{}', 'pharaonsgold3', 'pharaonsgold3'),
(38, 9, 1, 'Polar Fox', 'polar_fox.png', '<p>\r\n	Холодные тона этой игры предоставьте глазам, уставшим от длительной работы за компьютером, и неспешно наблюдайте за течением денежных потоков, попивая чай.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Это только на севере всегда холодно. А в виртуальном казино Azart Play, даже на самой студёной игре про полярную лису POLAR FOX будет жарко от накала страстей! Заснеженные просторы северных широт, по которым разгуливают многочисленные озорные существа, стали своеобразным полем для данного слота.</p>\r\n	<p>\r\n		Если вы никогда не были за Полярным Кругом, то игра в игровые автоматы станет для вас занимательным путешествием в неизвестный и загадочный мир. У каждого зверька или снежной фигуры, покрытой инеем, своя определенная роль, с которой можно познакомиться, вступив в игру на очки. После того, как на пробных турах вы прочувствуете всю привлекательность этой игры, и поймете, что на ней можно не только отлично отдохнуть, но и заработать хорошие деньги, можете смело приступать к игре, делая реальные ставки!</p>\r\n	<p>\r\n		Вы никогда не видели северное сияние? Тогда для вас оно станет особенно долгожданным, потому что в игре POLAR FOX оно не только удивит вас своей непередаваемой красотой, но и многократно увеличит вашу ставку!</p>\r\n	<p>\r\n		А сам песец, хоть и пуглив, но постепенно привыкает к вашему присутствию на его территории. Его появление означает настоящую удачу! Он поможет составить выигрышный вариант на барабане, заменив любую фигуру. Если же к вам забежит сразу пятеро этих милых зверушек, можете быть уверены, что сейчас начнется целый звездопад бонусов и подарков! Не стоит упускать свой шанс хорошо подзаработать.</p>\r\n	<p>\r\n		Не упустите свой шанс! Немедленно играйте в игровые автоматы на площадке Azart Play, и вы непременно узнаете, насколько горячим может быть даже крайний север!</p>\r\n</div>', '/games/novomatic/index.php?game=polarfox', 'polarfox', 'a:0:{}', 'a:0:{}', 'polarfox', 'polarfox'),
(39, 9, 1, 'Сердца(Королева Сердца)', 'quuen of hearts.png', '<p>\r\n	Основная задача игрока в Queen of Hearts (Королева Сердец) &ndash; не только выиграть максимум денег, но и постараться собрать на игровых барабанах минимум 3 символа</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		Игровой автомат Queen of Hearts имеет 5 барабанов, на которые нанесены 9 игровых линий. Игрок при этом имеет право выбрать 1, 3, 5, 7 или все 9 линий для последующей игры. Чтобы осуществить выбор, пользователю необходимо нажимать кнопку &laquo;Line&raquo;, которая расположена в верхней части экрана. Обратите внимание, если игрок вращает барабаны с одной игровой линией, то его шансы на выигрыш ровно в 9 раз меньше, чем, если бы он играл на максимальное количество игровых линий. Стоит задуматься.</p>\r\n	<p>\r\n		Помимо всего прочего, играть в Queen of Hearts онлайн можно, как на минимальной ставке, так и на самой максимальной. Чтобы выбрать последнюю, игроку просто необходимо нажать на кнопку &laquo;Bet max&raquo;. Если же пользователь хочет постепенно повышать ставку за вращение, то для него предусмотрено на слоте кнопка &laquo;Bet one&raquo;, каждый раз нажимая на которую, игрок повышает ставку ровно на один уровень. Сумма выигрыша в Queen of Hearts в интернет казино зависит от того, какая комбинация выпала на барабанах.</p>\r\n	<h4>\r\n		Бонусная игра</h4>\r\n	<p>\r\n		В процессе игры, если пользователь увидел на барабанах минимум три символа &laquo;Девочка-ангелочек&raquo;, он автоматически вовлекается в призовую игру. Она представляет из себя бесплатные вращения, количество которых зависит от количества выпавших бонусных символов. Если игра Королева Сердец выдала пользователю 3 бонусных символа, то он получает право на 8 бесплатных спинов, если 4 символа &ndash; 15 спинов. При выпадении на барабанах 5 бонусных символов пользователю начисляются 20 бесплатных вращений!</p>\r\n</div>', '/games/novomatic/index.php?game=queenof', 'queenofhearts', 'a:0:{}', 'a:0:{}', 'queenofhearts', 'queenofhearts'),
(40, 9, 1, 'Ramses 2', 'ramses2.png', '<p>\r\n	Рамзес 2 &mdash; игровой автомат посвященный одноименному историческому персонажу, носившему почетный титул &laquo;победитель&raquo;.</p>', '<div class=\\"\\\\&quot;\\\\\\\\&quot;article-text\\\\\\\\&quot;\\\\&quot;\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Скарабей &mdash; Рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Фараон &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, за пять символов принцессы на активной игровой линии ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=ramsesII', 'ramses2', 'a:0:{}', 'a:0:{}', 'ramses2', 'ramses2'),
(41, 9, 1, 'Резидент(Resident)', 'resident.png', '<p>\r\n	Всем любителям шпионских фильмов посвящается &ndash; авантюрный и увлекательный игровой автомат Resident. Почувствуй себя настоящим героем разведки &ndash; выполняй спецзадания и собирай комбинации.</p>', '<p>\r\n	Шпионский слот Резидент является популярным азартным развлечением не только в виртуальных онлайн-казино, но и в наземных игорных клубах. И это неудивительно! Увлекательный сюжет и простые правила игры покорили сердца многих азартных игроков. Слот Сейфы имеет стандартное оснащение в виде пяти барабанов и девяти линий выплат. Ваша миссия заключается в том, чтобы обозначить свою ставку и активировать линии выплат. Далее запускаете игровой аппарат кнопкой &laquo;Старт&raquo; и собираете выигрышные комбинации. Вам необходимо набрать минимум три одинаковых символа в активном ряду. Поэтому чем больше линий будет задействовано и комбинаций собрано, тем выше будет ваш выигрыш.</p>\r\n<p>\r\n	Символы игрового аппарата Резидент полностью соответствуют шпионской тематике &ndash; револьверы, сейфы, огнетушители, противогазы и прочее. Все они имеют свою ценность и могут принести ощутимую прибыль. К примеру, золотой орден почета при определенных условиях может увеличить вашу ставку в несколько тысяч раз.</p>', '/games/igrosoft/resident/', 'resident', 'a:0:{}', 'a:0:{}', 'resident', 'resident'),
(42, 9, 1, 'Веревки(Скалолаз)', 'rock_climber.png', '<p>\r\n	О романтике и трудностях альпинистов сказано не мало, старшее поколение наверняка сразу же вспомнит фильм &quot;Вертикаль&quot;.</p>', '<div class=\\"\\\\&quot;\\\\\\\\&quot;article-text\\\\\\\\&quot;\\\\&quot;\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 барабанов, 9 игровых линий, дикий символ, бонус-игра, возможность неоднократного увеличения выигрыша в два раза в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Альпинистский трос - бонус символ. Появление одновременно трёх таких символов запускает бонус игру, в которой нужно забраться на вершину. На пути Ваша задача не повстречать ети, верно выбрав маршрут. Каждый пройденный участок пути увеличивает выигрыш. Тем кому удастся добраться до вершины достанется суперприз.<br />\r\n		Снежинка - самый щедрый символ. За пять таких символов собранных на активной линии ставка на линию увеличивается в 5000 раз!<br />\r\n		Флаг - дикий символ. Заменяет все остальные символы кроме снежинок и тросов.</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Любой выигрыш можно попробовать приумножить. Для этого в игровом меню нужно нажать кнопку &quot;риск&quot;, после чего перед игроком появится пять карт. Самая левая- карта дилера, задача игрока выбрать одну из оставшихся четырёх, если она окажется старше, карты открытой дилером, текущий выигрыш удваивается. Можно рисковать несколько раз подряд, но после первой же ошибки текущий выигрыш сгорает.</p>\r\n</div>', '/games/igrosoft/rockclimber/', 'rockclimber', 'a:0:{}', 'a:0:{}', 'rockclimber', 'rockclimber');
INSERT INTO `games_info` (`id`, `id_group`, `popular`, `name`, `img`, `description`, `rules`, `link_game`, `link_info`, `screenshots`, `characteristics`, `meta_keywords`, `meta_description`) VALUES
(43, 11, 1, 'Блэкджек', 'blackjack.png', '<p>\r\n	Блэкджек - это одна из самых излюбленных игр в ассортименте традиционных игорных залов и онлайн казино по всему миру.</p>', '<h4>\r\n	Правила игры</h4>\r\n<p>\r\n	В Одноколодном Блекджеке участвует одна колода из 52 карт от двойки до туза в каждой из четырёх мастей. Перед каждой раздачей колода заново перетасовывается.<br />\r\n	<br />\r\n	Достоинства карт<br />\r\n	Достоинство карт от 2 до 10 совпадает с их номинальным значением.<br />\r\n	Достоинство карт Валет, Дама и Король равняется 10.<br />\r\n	Достоинство Туза равно 1 или 11.<br />\r\n	<br />\r\n	<br />\r\n	<b>Ставки</b><br />\r\n	Чтобы начать игру, игрок должен сделать ставку.<br />\r\n	<br />\r\n	Чтобы сделать ставку, нужно щелкнуть мышкой по соответствующей фишке. Чтобы отменить ставку, щелкните мышкой на кнопку &quot;Отмена&quot;. Повторить ставки предыдущей игры можно, нажав на кнопку &quot;Повтор&quot;<br />\r\n	<br />\r\n	<b>Начало игры</b><br />\r\n	Чтобы начать игру, игрок должен сделать ставки и нажать на кнопку &quot;Раздать&quot;. Крупье раздаст две карты на купленный бокс игрока и 2 карты себе. Все карты сдаются в открытую, только вторая карта крупье остается закрытой. Комбинация из 2-х карт, сумма которых равна 21, называется Блекджек. Блекджек возможен только сразу после начальной раздачи.<br />\r\n	<br />\r\n	<b>Страховка и Блекджек у крупье</b><br />\r\n	После раздачи крупье проверяет свою первую карту. Если это Туз, то игроку предоставляется возможность застраховать свои ставки от возможного Блекджека у крупье.<br />\r\n	<br />\r\n	Страховка - это ставка на то, что у крупье будет Блекджек. Стоимость страховки определяется ставкой в боксе и равна половине от суммы ставки. После того, как игрок принял решение о страховании, крупье проверяет (но не открывает) свою вторую карту.<br />\r\n	<br />\r\n	Если у крупье Блекджек, то он открывает свою вторую карту, объявляет результат и оплачивает все страховочные ставки 2 к 1. Затем дилер проверяет комбинации игрока, - если у игрока есть Блекджек, то крупье возвращает игроку стоимость ставки с этого бокса. Все остальные ставки игрока проигрывают. На этом игра заканчивается.<br />\r\n	<br />\r\n	Если у крупье нет Блекджека, то он сообщает результат, но не открывает вторую карту. Все страховочные ставки при этом проигрывают и уходят в доход казино.<br />\r\n	<br />\r\n	Блекджек у игрока После того как дилер проверил свои карты и выяснил, что Блекджека у него нет, он оплачивает все Блекджеки игрока, потому что теперь, сколько бы он ни набрал очков, он не сможет побить Блекджек игрока. Бокс игрока, на которых выпал Блекджек, оплачиваются 3 к 2.<br />\r\n	<br />\r\n	<b>&quot;Удвоить&quot;</b><br />\r\n	Игрок может удвоить свою начальную ставку, если комбинация карт кажется ему выгодной. При этом со счета игрока будет снята дополнительная сумма и он получит одну (и только одну) дополнительную карту.<br />\r\n	<br />\r\n	Удвоить ставку игрок может только имея 2 карты на текущей руке. Игрок не может удвоить ставку на мягкой паре, когда хотя бы одна из карт является Тузом.<br />\r\n	<br />\r\n	<b>&quot;Хватит&quot;</b><br />\r\n	Если игрока удовлетворяет текущая комбинация или он боится перебрать, он может остановиться и не брать больше карт.<br />\r\n	<br />\r\n	<b>&quot;Раздать&quot;</b><br />\r\n	Если игрок считает, что для победы ему необходимо набрать больше очков, он может взять еще одну карту, нажав на кнопку &quot;Раздать&quot;. При этом крупье сдаст ему еще одну карту. Игрок может повторять эту операцию до тех пор, пока на текущей руке менее 21 очка. Однако следует помнить про перебор.<br />\r\n	<br />\r\n	<b>Перебор</b><br />\r\n	Если игрок попросил дополнительную карту и, при этом, сумма очков превысила 21, то текущая ставка сразу проигрывает.<br />\r\n	<br />\r\n	<b>Правила для крупье</b><br />\r\n	Крупье должен брать дополнительную карту, если у него меньше 17-ти очков и должен остановиться, как только наберет 17 или более очков. Исключение составляет ситуация, когда на столе не осталось ставок игрока (они либо проиграны, либо оплачены). Тогда крупье просто показывает свою вторую карту и на этом игра заканчивается.<br />\r\n	<br />\r\n	<b>Сравнение комбинаций</b><br />\r\n	После того, как крупье остановился, происходит сравнение комбинаций игрока и крупье.<br />\r\n	<br />\r\n	Если у крупье Перебор, то все ставка игрока выигрывает и оплачивается 1 к 1.<br />\r\n	Если у игрока больше очков, чем у крупье, то ставка выигрывает и оплачивается 1 к 1.<br />\r\n	Если у игрока и крупье одинаковое количество очков, то объявляется ничья и игроку возвращается его ставка<br />\r\n	Если у игрока меньше очков, чем у крупье, то ставка проигрывает.<br />\r\n	<br />\r\n	После того, как все ставки оплачены,<br />\r\n	крупье перемешивает все карты и игрок может начать новую игру.</p>', '/games/casinogame/blackjackgold/', 'blackjackgold', 'a:0:{}', 'a:0:{}', 'blackjackgold', 'blackjackgold'),
(44, 11, 1, 'Black Jack Diamond', 'black_jack1.png', '', '<h4>\r\n	Правила игры</h4>\r\n<p>\r\n	Играет одна колода из 52 карт. После каждой из раздач ее перетасовывают. Игрок имеет право играть как на одном, так и на всех пяти боксах.</p>\r\n<p>\r\n	Для начала игры нужно сделать ставки на всех выбранных боксах (ставка Ante), а потом будет роздано по три карты на каждый бокс и дилеру. Последнюю карту дилера игрок видит.</p>\r\n<p>\r\n	Трёхкарточная рука будет оценена по правилам блэкджека: или по трем картам, или по двум из трех, если три карты дают перебор.</p>\r\n<p>\r\n	Примеры:</p>\r\n<p>\r\n	&nbsp;</p>\r\n<ul>\r\n	<li>\r\n		7-5-10 &ndash; 17 очков (10 +7);</li>\r\n	<li>\r\n		дама-2-8 &ndash; 20 очков;</li>\r\n	<li>\r\n		валет-туз-6 &ndash; блэкджек (валет + туз).</li>\r\n</ul>\r\n<p>\r\n	Блэкджек: старшая рука, рука с тремя картами и суммой очков 21 младше, чем блэкджек.</p>\r\n<p>\r\n	Когда раздача окончилась, карты игрока на выбранном боксе открываются и можно сделать выбор дальнейших действий:</p>\r\n<p>\r\n	&nbsp;</p>\r\n<ul>\r\n	<li>\r\n		можно продолжить игру, добавляя ставку Bet (ее величина равна Ante);</li>\r\n	<li>\r\n		можно сдаться, тогда игра на боксе оканчивается и ставка утрачивается.</li>\r\n</ul>\r\n<p>\r\n	После принятия решений становятся видны карты дилера и ведется подсчет очков. Игра дилера складывается, если у него есть хотя бы 17 очков. Если у дилера нет игры, будет ничья и ставки возвращаются. А если у игрока блэкджек, то Ante оплачивается 1:1, ставка Bet возвращается без оплаты.</p>\r\n<p>\r\n	Если игра у дилера есть, то сравниваются очки игрока и дилера. Если рука последнего старше, то игрок проигрывает и теряет все свои ставки. Если игрок получил старшую руку, то обе его ставки оплачиваются 1:1. Аналогичное решение принимается, если у обоих блэкджек. Это значит, что блэкджек игрока старше, чем у дилера. Если очки равны (но не блэкджек), то устанавливается ничья, и ставки возвращаются на счет игрока.</p>\r\n<p>\r\n	Кроме Ante можно сделать ставку а бонус (Ace Plus - А+). Игрок, делая эту ставку, надеется, что с раздачи ему выпадет хотя бы один туз. Таблица выплат по этой ставке имеет следующий вид (А &ndash; туз, Т &ndash; карта на 10 очков, х &ndash; любая другая карта):</p>\r\n<p>\r\n	&nbsp;</p>\r\n<ul>\r\n	<li>\r\n		A-A-A 100:1</li>\r\n	<li>\r\n		A-A-T 25:1</li>\r\n	<li>\r\n		A-A-x 15:1</li>\r\n	<li>\r\n		A-T-T 6:1</li>\r\n	<li>\r\n		A-T-x 3:1</li>\r\n	<li>\r\n		A-x-x 1:1</li>\r\n</ul>', '/games/casinogame/blackjackclassic/', 'blackjackdiamond', 'a:0:{}', 'a:0:{}', 'blackjackdiamond', 'blackjackdiamond'),
(45, 10, 1, 'Европейская рулетка(10 - 200)', 'roulette_euro.png', '<p>\r\n	Европейская рулетка - это один из традиционных вариантов этой азартной игры.</p>', '<p>\r\n	Классическая рулетка, или европейская рулетка является самым известным развлечением в казино. Правила европейской рулетки, также как и её традиции сформировались давно. Они известны и общеприняты. Символом удачи в азартных играх принято считать как раз колесо рулетки. Сам вид рулетки притягивает к себе игроков самого разного уровня. Многие годы посетители казино ищут способы покорить и наконец, обыграть рулетку. Среди них находятся те, кто утверждает: &laquo;Я нашёл способ выиграть у рулетки. Понял её секрет&raquo;, и вокруг них всегда полно уверенных, что рулетка это &laquo;колесо фортуны&raquo;, которое не имеет закономерностей и которое невозможно разгадать.</p>', '/games/casinogame/roulette', 'roulette', 'a:0:{}', 'a:0:{}', 'roulette', 'roulette'),
(46, 10, 1, 'Европейская рулетка(50 - 1000)', 'roulette.png', '<p>\r\n	Европейская рулетка - это один из традиционных вариантов этой азартной игры.</p>', '<p>\r\n	Классическая рулетка, или европейская рулетка является самым известным развлечением в казино. Правила европейской рулетки, также как и её традиции сформировались давно. Они известны и общеприняты. Символом удачи в азартных играх принято считать как раз колесо рулетки. Сам вид рулетки притягивает к себе игроков самого разного уровня. Многие годы посетители казино ищут способы покорить и наконец, обыграть рулетку. Среди них находятся те, кто утверждает: &laquo;Я нашёл способ выиграть у рулетки. Понял её секрет&raquo;, и вокруг них всегда полно уверенных, что рулетка это &laquo;колесо фортуны&raquo;, которое не имеет закономерностей и которое невозможно разгадать.</p>', '/games/casinogame/roulette/roulette_premium.php', 'roulettepremium', 'a:0:{}', 'a:0:{}', 'roulettepremium', 'roulettepremium'),
(47, 12, 1, 'Пирамида(Золото Ацтеков)', 'aztec_gold.png', '<p>\r\n	Жизнь и обычаи древних ацтеков полны мистических, загадочных ритуалов над разгадками смысла которых спорят учёные.</p>', '<div class=\\"\\\\&quot;\\\\\\\\&quot;article-text\\\\\\\\&quot;\\\\&quot;\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 игровых барабанов по 3 игровых символа на каждом, 21 игровая линия, бонус-игра, возможность неоднократного увеличения выигрыша в два раза в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Золотая маска &mdash; дикий символ, появляется только на 2,3,4 игровых барабанах и заменяет все остальные символы кроме бонусных на всём барабане. Рассыпной символ заменяется только в одном игровом поле.<br />\r\n		Пирамида &mdash; бонусный символ. При появлении трех таких символов запускается бонус-игра &laquo;Пирамида&raquo;<br />\r\n		Синекрылая птица &mdash; рассыпной символ. Три и более таких символа в любых местах на игровых барабанах увеличивают общую ставку в 2-50 раз в зависимости от числа символов.</p>\r\n	<p>\r\n		<b>Бонус-игра &laquo;пирамида&raquo;</b><br />\r\n		Игроку предоставляется три попытки выбора пирамиды. Полученную пирамиду можно либо оставить получив соответствующий выигрыш, либо рискнуть и получить другую, случайную пирамиду. Если удалось получить бриллиантовую пирамиду, игрок отправляется на сбор сокровищ внутрь гробницы, где символы драгоценностей увеличивают выигрыш, но следует опасаться кобры которая прекращает бонус игру.</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Выигрышем полученным в игровом раунде можно рискнуть, для этого требуется нажать клавишу 1, о чем появляется соответствующая подсказка на экране. Правила риск-игры просты, из карточной колоды выбирается 5 случайных карт, левую открывает крупье, задача игрока выбрать одну из оставшихся четырех карт, и если она будет старше карты крупье, текущий выигрыш будет удвоен. В ситуации когда у крупье и игрока карта одинаковая, крупье побеждает если эта карта от 2 до 8, а игрок побеждает если карта от 9 до А. В колоде присутствует джокер который бьёт любую карту.</p>\r\n</div>', '/games/megajack/aztek/', 'aztecgold', 'a:0:{}', 'a:0:{}', 'aztecgold', 'aztecgold'),
(48, 9, 1, 'Champagne Party', 'champagne.png', '<p>\r\n	Одним из атрибутов роскоши и успеха является шампанское. Его пьют практически всегда, отмечая праздники и успехи.</p>', '<div class=\\"\\\\&quot;\\\\\\\\&quot;article-text\\\\\\\\&quot;\\\\&quot;\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 игровых барабанов по 3 игровых символа на каждом, 21 игровая линия, бесплатные вращения с возможностью выигрыша дополнительных вращений, бонус-игра, возможность неоднократного увеличения выигрыша в два раза в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Буква Е на красном щите &mdash; дикий символ, заменяет все остальные символы кроме рассыпных и бонусных. Является самым высокооплачиваемым символом в игре. За 5 таких символов на активной игровой линии ставка по этой линии увеличивается в 10000 раз!<br />\r\n		Бутылочка шампанского &mdash; бонусный символ. При появлении пяти таких символов на активной линии запускается бонус-игра &laquo;Вечеринка&raquo;<br />\r\n		Доллары &mdash; рассыпной символ. Три и более таких символа в любых местах на игровых барабанах запускают 15 бесплатных вращений, выигрыши во время которых будут увеличены в 3-5 раз, за исключением выигрышей в бонусе, либо выпадений пяти рассыпных символов, либо пяти диких символов. Есть возможность выиграть дополнительные бесплатные вращения.</p>\r\n	<p>\r\n		<b>Бонус-игра &laquo;Вечеринка&raquo;</b><br />\r\n		Просто выберите бутылочку игристого и увеличьте сумму на счёте! Выбрать можно 2 из 5 бутылочек, и если выигрыш будет одинаковым, то он будет удвоен!</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Выигрышем полученным в игровом раунде можно рискнуть, для этого требуется нажать клавишу 1, о чем появляется соответствующая подсказка на экране. Правила риск-игры просты, из карточной колоды выбирается 5 случайных карт, левую открывает крупье, задача игрока выбрать одну из оставшихся четырех карт, и если она будет старше карты крупье, текущий выигрыш будет удвоен. В ситуации когда у крупье и игрока карта одинаковая, крупье побеждает если эта карта от 2 до 8, а игрок побеждает если карта от 9 до А. В колоде присутствует джокер который бьёт любую карту.</p>\r\n</div>', '/games/megajack/champ/', 'champage', 'a:0:{}', 'a:0:{}', 'champage', 'champage'),
(49, 9, 1, 'Royal Treasures', 'royaltreasures.png', '<p>\r\n	Royal Treasures (королевские сокровища). Где можно сорвать крупный куш? Либо в казино, либо в королевской сокровищнице, если вы грабитель.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Королевский дворец &mdash; Рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Корона &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, при появлении пяти таких символов на активной игровой линии, ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=royaltreasures', 'royal', 'a:0:{}', 'a:0:{}', 'royaltreasures', 'royaltreasures'),
(50, 9, 1, 'Secret Forest', 'secret_forest.png', '<p>\r\n	Secret forest - игровой автомат про сказочный, таинственный лес и его тайны.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Характеристики слота</h4>\r\n	<p>\r\n		Пять игровых барабанов, на каждом из которых по три символа &mdash; классическая схема для игровых автоматов. Активировать можно 1, 3, 5, 7 или 9 игровых линий. Особая возможность для получения крупных выигрышей в этом слоте - бесплатные вращения (фриспины) с утроенными выплатами и шансами на получение дополнительных бесплатных вращений. Попробовать увеличить выигрыши можно в риск-игре.</p>\r\n	<h4>\r\n		Игровые символы</h4>\r\n	<p>\r\n		Волшебный лес &mdash; Рассыпной символ. Награда за три и более таковых в любом месте на игровых барабанах - 15 бесплатных вращений с утроенными выплатами. Кроме того, в зависимости от количества выпавших символов, общая ставка умножается в 2-500 раз!</p>\r\n	<p>\r\n		Принцесса &mdash; Дикий символ. Заменяет собой любые символы кроме рассыпного, а кроме того удваивает выплаты за комбинации в которых участвует. Является самым щедрым символом в игре, за пять символов принцессы на активной игровой линии ставка по линии увеличивается в 9000 раз!</p>\r\n	<h4>\r\n		Риск-игра</h4>\r\n	<p>\r\n		Любой выигрыш полученный в игровом раунде можно поставить на кон в риск-игре. Всё что требуется от игрока &mdash; угадать цвет масти карты случайно выбранной из колоды, и в случае удачи текущий выигрыш будет удвоен. Удваивать выигрыш можно несколько раз подряд, что позволяет выигрывать много.</p>\r\n</div>', '/games/novomatic/index.php?game=secretforest', 'secretforest', 'a:0:{}', 'a:0:{}', 'secretforest', 'secretforest'),
(51, 9, 1, 'Sharky', 'sharky.png', '<p>\r\n	Бывает так, что корабль атакованный пиратами тонет, и тогда победителям достаются только его обломки, среди которых впрочем тоже стоит поискать ценности.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 барабанов, 9 игровых линий, дикий символ, скеттер символ, 2 специальных символа позволяющие получить 10 бесплатных вращений, во время которых появляются перемещающиеся по игровым барабанам дикие символы и есть возможность выиграть дополнительные бесплатные вращения. Возможность несколько раз умножать выигрыш в два раза, в риск игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Пират - дикий символ. Заменяет собой все другие символы кроме скеттеров, и бонусных символов. Является самым высокооплачиваемым символом игры, за пять таких символов собранных на активной игровой линии, ставка на линию увеличивается в 5000 раз.<br />\r\n		Бонусные символы. Корабль- появляется только на первом барабане и Берег с пальмой - появляется только на пятом барабане. Появление одновременно обоих символов активирует 10 бесплатных вращений, во время которых из каждого корабля появляется плывущий на лодке пират, который становится дополнительным диким символом. С Каждым новым вращением моряк переплывает вправо на соседний игровой барабан. Если рядом с пиратом оказывается сундук, морской волк не упустит случая найти в нём что-нибудь ценное, однако стоит опасаться акул, которые топят лодку если оказываются с ней в одном месте. В случае повторных появлений обоих бонусных символов на игровых барабанах, игроку будет каждый раз добавляться еще по 10 бесплатных вращений.<br />\r\n		Компас - скеттер символ. Выплата за три и более таких символа в любых местах на игровых барабанах составляет от пяти до ста общих ставок в зависимости от числа символов.</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		У игроков есть шанс увеличить выигрыши полученные в основной игре. Для этого необходимо угадать цвет карты лежащей наверху колоды. В случае удачи текущий выигрыш будет удвоен, но при неудачном отгадывании весь выигрыш будет потерян. Удваивать выигрыш можно несколько раз подряд.</p>\r\n</div>', '/games/novomatic/index.php?game=sharky', 'sharky', 'a:0:{}', 'a:0:{}', 'sharky', 'sharky'),
(52, 9, 1, 'Unicorn Magic', 'unicorn.png', '<p>\r\n	Предлагаем ознакомиться с особенностями игрового автомата Магия единорога онлайн, разработанного компанией Novomatic.</p>', '<div class=\\"article-text\\">\r\n	<h4>\r\n		Бонусы игрового автомата</h4>\r\n	<p>\r\n		В качестве бонусных раундов в unicorn magic онлайн выступают бесплатные вращения, а также игра на удвоение. В случаях, когда игрок начал играть в автомат Unicorn magic (Магия единорога) и получил минимальный размер выигрыша, то ему будет предложено удвоить данную сумму. Так, на экране появится новая заставка, где пользователю предложат отгадать, какой цвет карты откроется. Если цвет будет угадан, сумма выигрыша удвоится. В противном случае, игрок потеряет свой приз.</p>\r\n	<p>\r\n		Кроме того, благодаря символу Скеттер в Unicorn magic в интернет казино, пользователь может получить определённое количество бесплатных вращений. Это произойдёт в том случае, если на одной игровой линии выпадет 2 и более подобных символов. Примечательно, если во время бонусных вращений выпадает ещё призовая комбинация скеттер-символов, то новые бесплатные спины добавляются к старым. Таким образом, поиграть на деньги в Магию единорога станет не только увлекательно, но и вполне себе выгодно.</p>\r\n	<h4>\r\n		Символы слота</h4>\r\n	<p>\r\n		В данном разделе хотелось бы остановить внимание на самом прибыльном символе игрового автомата. &quot;Волшебный лес&quot; &mdash; этот символ способен творить чудеса! Собрав 3 таких символа игрок получает 15 бесплатных вращений, причём все выигрыши будут увеличены в 3 раза. Есть возможность получать дополнительные бесплатные вращения, что даёт возможность весьма солидного выигрыша. Кроме того, 2 и более символа волшебного леса умножают вашу общую ставку в несколько раз, а собрав 5 символов, вы увеличите общую ставку сразу в 500 раз, что уже немало. И для всех этих чудес не нужно собирать символ на одной линии, достаточно собрать нужное количество в любых местах игрового поля.</p>\r\n	<p>\r\n		&quot;Единорог&quot; &mdash; дикий символ, имеющий особенность: если он участвует в выигрышной комбинации, то выплата по такой комбинации увеличивается вдвое. А уж если собрать единорогов на линии то выигрыш может весьма не маленьким (до 9000 умножений ставки на линию).</p>\r\n</div>', '/games/novomatic/index.php?game=unicorn', 'unicornmagic', 'a:0:{}', 'a:0:{}', 'unicornmagic', 'unicornmagic'),
(53, 9, 1, 'Slot-o-pol Deluxe', 'deluxe.png', '<p>\r\n	Отдых на роскошном лайнере продолжается! Для тех кто любит путешествовать.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		5 игровых барабанов по 3 игровых символа на каждом, 21 игровая линия, бесплатные вращения, две бонус-игры, дикий символ удваивающий выплаты за комбинации в которых участвует, возможность неоднократного увеличения выигрыша в два раза в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Буква Е на красном щите &mdash; дикий символ, заменяет все остальные символы кроме рассыпных и бонусных. Удваивает выигрышные комбинации в которых есть хотя бы один такой символ! Является самым высокооплачиваемым символом в игре. За 5 таких символов на активной игровой линии ставка по этой линии увеличивается в 10000 раз!<br />\r\n		Кубик (шестигранная кость) &mdash; бонусный символ. При появлении пяти таких символов на активной игровой линии запускается бонус-игра &laquo;Slot-o-pol&raquo;<br />\r\n		Игровое колесо с надписью &laquo;Spin&raquo; - еще один бонус символ. При появлении трех и более таких символов на активной игровой линии запускается бонус-игра &laquo;колесо удачи&raquo;.<br />\r\n		Доллары &mdash; рассыпной символ. Два и более таких символов в любых местах на игровых барабанах увеличивают общую ставку в 5-1000 раз в зависимости от числа символов.</p>\r\n	<p>\r\n		<b>Бонус- игра &laquo;Slot-o-pol&raquo;</b><br />\r\n		Игра в монополию с выигрышами в кредитах (полученные множители умножают ставку на линию). Игроку дается 7 попыток. Игровая фишка двигается по часовой стрелке в соответствии с числом баллов выброшенных на игральной кости. Выигрыш игрока складывается из множителей обозначенных на игровых клетках. Если на клетке на которую встает игровая фишка присутствует символ игральной кости, игроку добавляется одна попытка. Так же существуют клетки не приносящие выигрышей, перемещающие игрока итд. За 7 ходов без какого либо хотя-бы однократного выигрыша игроку присуждается 5000 линейных ставок.Для совершения бросков игральной кости используйте клавишу 1.</p>\r\n	<p>\r\n		<b>Бонус- игра &laquo;колесо удачи&raquo;</b><br />\r\n		Перед вами колесо поделенное на сектора, на каждом из которых обозначен выигрыш (в ставках на линию), вращайте колесо клавишей 1 и собирайте выигрыши.</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Выигрышем полученным в игровом раунде можно рискнуть, для этого требуется нажать клавишу 1, о чем появляется соответствующая подсказка на экране. Правила риск-игры просты, из карточной колоды выбирается 5 случайных карт, левую открывает крупье, задача игрока выбрать одну из оставшихся четырех карт, и если она будет старше карты крупье, текущий выигрыш будет удвоен. В ситуации когда у крупье и игрока карта одинаковая, крупье побеждает если эта карта от 2 до 8, а игрок побеждает если карта от 9 до А. В колоде присутствует джокер который бьёт любую карту.</p>\r\n</div>', '/games/megajack/deluxe/', 'slotopoldeluxe', 'a:0:{}', 'a:0:{}', 'slotopoldeluxe', 'slotopoldeluxe'),
(54, 12, 1, 'Пират', 'pirate.png', '<p>\r\n	Пираты &ndash; жестокие повелители морей и океанов. Одно напоминание о них наводило ужас на моряков и жителей портовых городов. Они грабили торговые и военные корабли, наполняя свои сундуки драгоценными камнями и золотыми монетами.</p>', '<div class=\\"\\\\&quot;article-text\\\\&quot;\\">\r\n	<h3>\r\n		Как играть в игровой эмулятор</h3>\r\n	<br />\r\n	<p>\r\n		В нашей игре бороться за золото придется не с помощью пуль и пушек, а благодаря игровым символам, которые будут создавать счастливые комбинации на девяти игровых линиях. А пять игровых барабанов приблизят вас к сундуку с золотом. Но чтобы преуспеть в этом деле вам будет положиться на свою интуицию и удачу. И если она вас не подведет, то вы станете обладателем пиратского золота, которое позволит вам осуществить многие желания.</p>\r\n	<h3>\r\n		Пиратские игровые символы</h3>\r\n	<p>\r\n		Каждый пират знает, что сокровища без карты не найти. В слоте Pirate карта сокровищ также играет самую важную роль. При появлении пяти символом карты сокровищ ставка увеличивается в пять тысяч раз. Также вам повезет, если на вашем пути повстречается пират. Он поможет вам отыскать сокровища, создав выигрышное сочетание, заменив собой обычный игровой символ.</p>\r\n	<h3>\r\n		Бонусная игра</h3>\r\n	<p>\r\n		Появление трех изображений пиратского сундука запускает бонусную игру, которая позволит игроку улучшить свое финансовое положение. Эта игра будет заключаться в поисках сундука, полного золотом.</p>\r\n	<h3>\r\n		Игра на умножение</h3>\r\n	<p>\r\n		Для настоящего пирата золота много не бывает. Если вас не устраивает ваш выигрыш, то вы можете его преумножить, попытав удачу в игре на умножение. В ней вам предстоит обыграть наглого дилера, вытянув карту старше, чем у него. Рисковать можно несколько раз подряд, но при первой же ошибке вы лишаетесь всех заработанных денег. Игровой автомат Pirate отправит вас в опасный и непредсказуемый мир пиратов, где вы сможете отыскать свой сундук с золотом, получив при этом массу положительных эмоций от великолепной игры. Играйте и выигрывайте!</p>\r\n</div>', '/games/megajack/pirates/', 'pirates', 'a:0:{}', 'a:0:{}', 'pirates', 'pirates');
INSERT INTO `games_info` (`id`, `id_group`, `popular`, `name`, `img`, `description`, `rules`, `link_game`, `link_info`, `screenshots`, `characteristics`, `meta_keywords`, `meta_description`) VALUES
(55, 12, 1, 'Pharaon Treasure', 'pharaon_treasures.png', '<p>\r\n	Пески Египта проникают и в дворцы фараонов, и в их усыпальницы &ndash; пирамиды: по ним прошли многие караваны и среди них происходили великие сражения.</p>', '<div class=\\"article-text\\">\r\n	<p>\r\n		<b>Нетипичная механика игры</b><br />\r\n		Необычность данной игры заключается в том, что играть предстоит сразу на двух наборах из пяти игровых барабанов, которые объединены общими бесплатными вращениями. Выигранные бесплатные вращения запускаются сразу же на обоих наборах из пяти игровых барабанов.</p>\r\n	<p>\r\n		<b>Характеристики слота</b><br />\r\n		Два набора из пяти барабанов, по 10 игровых линий на каждом; книга Ра, совмещающая в себе функции скеттера (рассыпного символа), дикого символа и дающая возможность получить бесплатные вращения. Во время бесплатных вращений один случайно выбранный символ оплачивается по всем активным игровым линиям в зависимости от числа символов на игровых барабанах. Можно выигрывать дополнительные бесплатные вращения. Возможность неоднократного увеличения выигрыша в два раза в риск-игре.</p>\r\n	<p>\r\n		<b>Игровые символы</b><br />\r\n		Книга Ра - самый важный символ в игре. Совмещает в себе сразу несколько функций. Является диким символом - заменяет собой все другие символы. Является скеттер (рассыпным) символом, при выпадении которого в любых местах на игровых барабанах общая ставка увеличивается в 1-100 раз, в зависимости от числа символов (касается только одного из наборов игровых барабанов, игровые символы из каждого набора считаются отдельно!). Так же при появлении трёх и более книг Ра в любых местах одного из наборов пяти игровых барабанов запускаются 5 особых бесплатных вращений. Бесплатные вращения запускаются на обоих наборах барабанов, перед их началом случайным образом определяется счастливый символ. Счастливый символ во время бесплатных вращений становится рассыпным, то есть собирать нужное число символов не обязательно слева направо, и выигрыш выплачивается по всем активным игровым линиям. Счастливые символы считаются отдельно для каждого набора барабанов. Во время бесплатных вращений можно выиграть дополнительные бесплатные вращения, собрав еще раз комбинацию из трёх книг Ра в любых местах одного из наборов игровых барабанов.<br />\r\n		Нефертити - самый щедрый символ. За пять таких символов, собранных на активной линии, ставка на линию увеличивается в 5000 раз!</p>\r\n	<p>\r\n		<b>Риск-игра</b><br />\r\n		Выигрыши можно попытаться увеличить в два раза, сыграв в простую игру. Нужно попробовать угадать цвет случайно выбранной карты. Если Вы угадываете верно, Ваш текущий выигрыш удваивается, но в случае неудачи он теряется полностью. Можно играть несколько раз подряд, что позволяет серьёзно увеличивать выигрыши.</p>\r\n</div>', '/games/megajack/pharaon/', 'pharaon', 'a:0:{}', 'a:0:{}', 'pharaon', 'pharaon'),
(56, 12, 1, 'Wild West', 'wildwest.png', '<p>\r\n	В &laquo;Диком Западе&raquo; пять барабанов и десять линий, всегда задействованных по умолчанию.</p>', '<p>\r\n	<b>Символы</b><br />\r\n	Догадаться, что может быть изображено на барабанах видео-слота, посвященного Дикому Западу, очень легко. Естественно, это салуны, лошади, украденные из банка деньги, карты для блэкджека, виски, ковбойские сапоги и так далее. К счастью, разработчики Wild West отказались от надоевших всем номиналов игральных карт.<br />\r\n	А вот специальные символы они &ndash; опять же, к счастью, - в игровом автомате использовали. Таковым являются Wild (ковбой) и Scatter (стек фишек с логотипом игры). Давайте рассмотрим их особенности:</p>\r\n<ul>\r\n	<li>\r\n		Wild не способен образовывать оплачиваемые цепочки сам по себе, так как выпадает лишь на трех последних барабанах. Однако он является очень желанным для всех игроков. Дело в том, что Wild заменяет прочие обычные картинки. Выплаты по ним будут увеличены в два или пять раз, если активирована Super Bet. Кроме того, каждый раз, когда он участвует в формировании комбинации, запускаются пять призовых спинов, в которых ставку за пользователя делает казино. Они могут продлеваться. О дополнительных опциях, действующих в данном раунде, читайте в правилах видео-слота.</li>\r\n	<li>\r\n		<a href=\\"http://www.casinoz.me/content/chto-nuzhno-znat-ljubitelju-igrovykh-403.html\\">Scatter</a> появляется на экране только во время фри-спинов. Даже один такой символ, оказавшийся где-нибудь на барабанах, дает выплату.</li>\r\n</ul>\r\n<br />\r\n<p>\r\n	<b>Бонусные игры</b><br />\r\n	Прочих призовых раундов в этом видео-слоте нет.<br />\r\n	<b>Джек-поты</b><br />\r\n	В Wild West отсутствует прогрессивный джекпот.<br />\r\n	<b>Интерфейс</b><br />\r\n	Теперь самое время объяснить, что означают англоязычные надписи в интерфейсе модели. Учтите, что многие из них видны лишь при наведении курсора на кнопку или окошко:</p>\r\n<br />\r\n<ul>\r\n	<li>\r\n		Spin &ndash; новый розыгрыш</li>\r\n	<li>\r\n		Stop &ndash; остановка барабанов</li>\r\n	<li>\r\n		Bet Up &ndash; поднять ставку</li>\r\n	<li>\r\n		Bet Down &ndash; понизить ставку</li>\r\n	<li>\r\n		Max Bet &ndash; играть по максимальной ставке</li>\r\n	<li>\r\n		Info &ndash; справочный раздел</li>\r\n	<li>\r\n		Sound On/Off &ndash; включить/выключить звук</li>\r\n	<li>\r\n		Win &ndash; выигрыш за раунд</li>\r\n	<li>\r\n		Balance &ndash; кредиты на счету</li>\r\n	<li>\r\n		Autoplay &ndash; режим автоигры</li>\r\n	<li>\r\n		Total Bet &ndash; общая ставка</li>\r\n	<li>\r\n		Gamble &ndash; запуск игры по шансам</li>\r\n</ul>\r\n<p>\r\n	Подсказки и веселые замечания появляются под барабанами в специальной строке.<br />\r\n	В таблице выплат есть коэффициенты, схема активных линий и краткие правила.<br />\r\n	Настройки &ndash; это лишь отключение звука и выбор размера основного экрана.<br />\r\n	Панель для суперставки находится справа от барабанов.<br />\r\n	Клиентам казино не придется скачивать игровой автомат Wild West, ведь он открывается прямо в браузере.<br />\r\n	<b>Заключение</b><br />\r\n	Помимо красочного дизайна с веселыми персонажами, броским фоном в виде зала салуна и яркой графикой, видео-слот запоминается необычными возможностями особых символов и оригинальным раундом бесплатных спинов. Признаться, в такой форме они нам еще не попадались. Делать или нет суперставку, мы пока сказать не можем, так как не располагаем данными о заложенном в нее математическом превосходстве заведения. Но игра однозначно качественная и интересная.</p>', '/games/megajack/wildwest/', 'wildwest', 'a:0:{}', 'a:0:{}', 'wildwest', 'wildwest');

-- --------------------------------------------------------

--
-- Структура таблицы `games_jp`
--

CREATE TABLE IF NOT EXISTS `games_jp` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `jp` decimal(20,2) DEFAULT '0.00',
  `proc` decimal(3,0) DEFAULT '0',
  `action` decimal(20,2) DEFAULT '5000.00',
  `jp_up` decimal(20,2) NOT NULL DEFAULT '500.00',
  `jp_down` decimal(20,2) NOT NULL DEFAULT '1000.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=92 ;

--
-- Дамп данных таблицы `games_jp`
--

INSERT INTO `games_jp` (`id`, `name`, `jp`, `proc`, `action`, `jp_up`, `jp_down`) VALUES
(9, '4 джекпот игры', '94527.48', '1', '1000000.00', '1000.00', '2000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `games_poker`
--

CREATE TABLE IF NOT EXISTS `games_poker` (
  `vp_nomer` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `vp_bank` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vp_proc` decimal(3,0) NOT NULL DEFAULT '100',
  `vp_shanswin1` varchar(255) NOT NULL DEFAULT '3|3|3|3|3|',
  `vp_shanswin2` varchar(255) NOT NULL DEFAULT '3|3|3|3|3|',
  `vp_shansdouble` varchar(255) NOT NULL DEFAULT '2',
  PRIMARY KEY (`vp_nomer`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `games_poker`
--

INSERT INTO `games_poker` (`vp_nomer`, `id`, `vp_bank`, `vp_proc`, `vp_shanswin1`, `vp_shanswin2`, `vp_shansdouble`) VALUES
('tensorbetter', 42, '0.00', '0', '6|5|4|3|2', '6|5|4|3|2', '5'),
('jacksorbetter', 43, '0.00', '0', '6|5|4|3|2', '6|5|4|3|2', '5'),
('acesandfaces', 44, '0.00', '0', '6|5|4|3|2', '6|5|4|3|2', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `games_stats`
--

CREATE TABLE IF NOT EXISTS `games_stats` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `data` varchar(8) NOT NULL DEFAULT '',
  `time` time NOT NULL DEFAULT '00:00:00',
  `login` varchar(20) NOT NULL DEFAULT '',
  `cash` varchar(10) NOT NULL DEFAULT '0',
  `bank` varchar(10) NOT NULL DEFAULT '0',
  `bet` varchar(10) NOT NULL,
  `win` varchar(10) NOT NULL,
  `game` varchar(20) NOT NULL DEFAULT '',
  `mode` varchar(10) NOT NULL DEFAULT 'fun',
  `selected` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `games_stats_jp`
--

CREATE TABLE IF NOT EXISTS `games_stats_jp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(30) DEFAULT NULL,
  `jp` varchar(30) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `game` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=981 ;

--
-- Дамп данных таблицы `games_stats_jp`
--

INSERT INTO `games_stats_jp` (`id`, `data`, `jp`, `login`, `ip`, `sid`, `game`) VALUES
(826, '12.03.2015 11:39:15', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(825, '12.03.2015 11:39:13', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(824, '12.03.2015 11:39:11', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(823, '12.03.2015 11:39:08', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(822, '12.03.2015 11:39:06', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(821, '12.03.2015 11:39:03', '1100.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(820, '12.03.2015 11:25:11', '0.00', 'kvin', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(819, '12.03.2015 11:24:55', '0.00', 'kvin', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(818, '12.03.2015 11:24:53', '0.00', 'kvin', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(817, '12.03.2015 11:24:52', '0.00', 'kvin', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(816, '12.03.2015 11:18:03', '0.00', 'kvin', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(815, '12.03.2015 10:53:45', '0.00', 'LeonardoTest', '188.163.92.124', 'dc658865e982e27fc037687b5f9b67', 'crazymonkey'),
(814, '12.03.2015 10:52:07', '0.00', 'LeonardoTest', '188.163.92.124', '03a98c29fe62ce2492a04e2c4f85c8', 'crazymonkey'),
(813, '12.03.2015 10:52:02', '0.00', 'LeonardoTest', '188.163.92.124', '03a98c29fe62ce2492a04e2c4f85c8', 'crazymonkey'),
(812, '12.03.2015 10:51:39', '0.00', 'LeonardoTest', '188.163.92.124', '03a98c29fe62ce2492a04e2c4f85c8', 'crazymonkey'),
(811, '12.03.2015 10:50:16', '1010.00', 'LeonardoTest', '188.163.92.124', '03a98c29fe62ce2492a04e2c4f85c8', 'crazymonkey'),
(810, '12.03.2015 09:49:51', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(809, '12.03.2015 09:49:49', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(808, '12.03.2015 09:49:48', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(807, '12.03.2015 09:49:46', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(806, '12.03.2015 09:49:45', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(805, '12.03.2015 09:49:43', '110.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(804, '11.03.2015 20:19:02', '0.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(803, '11.03.2015 20:18:59', '1000.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(802, '11.03.2015 20:17:34', '0.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(801, '11.03.2015 20:17:33', '0.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(800, '11.03.2015 20:16:52', '0.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(799, '11.03.2015 20:16:46', '1000.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(798, '11.03.2015 20:06:56', '1000.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(797, '11.03.2015 20:06:23', '0.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(796, '11.03.2015 20:06:21', '110.00', 'kvin', '109.106.137.67', '43603c06147a744b15dfb1f82d8690', 'crazymonkey'),
(795, '11.03.2015 19:27:02', '1100.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'chukcha'),
(794, '11.03.2015 19:21:21', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(793, '11.03.2015 19:21:19', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(792, '11.03.2015 19:21:13', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(791, '11.03.2015 19:21:11', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(790, '11.03.2015 19:20:36', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(789, '11.03.2015 19:20:35', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(788, '11.03.2015 19:20:27', '105.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(787, '11.03.2015 19:15:55', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(786, '11.03.2015 19:15:48', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(785, '11.03.2015 19:15:45', '0.00', 'hey11mama', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(784, '11.03.2015 19:13:57', '0.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(783, '11.03.2015 19:07:05', '110.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(782, '11.03.2015 18:55:54', '460.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(781, '11.03.2015 18:48:31', '0.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(780, '11.03.2015 18:48:28', '0.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(779, '11.03.2015 18:48:26', '0.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(778, '11.03.2015 18:48:25', '0.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(777, '11.03.2015 18:48:22', '110.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(776, '11.03.2015 18:44:35', '0.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(775, '11.03.2015 18:44:32', '0.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(774, '11.03.2015 18:44:24', '110.00', 'fyfed', '88.200.136.182', 'dd22202fc1366a47fda04cd9441c6d', 'crazymonkey'),
(827, '12.03.2015 11:39:26', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(828, '12.03.2015 11:39:29', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(829, '12.03.2015 11:39:31', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(830, '12.03.2015 11:39:33', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(831, '12.03.2015 11:39:34', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(832, '12.03.2015 11:39:36', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(833, '12.03.2015 11:39:41', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(834, '12.03.2015 11:39:43', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(835, '12.03.2015 11:39:45', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(836, '12.03.2015 11:39:47', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(837, '12.03.2015 11:39:56', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(838, '12.03.2015 11:39:58', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(839, '12.03.2015 11:40:00', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(840, '12.03.2015 11:40:02', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(841, '12.03.2015 11:40:04', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(842, '12.03.2015 11:40:06', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(843, '12.03.2015 11:40:08', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(844, '12.03.2015 11:40:09', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(845, '12.03.2015 11:40:20', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(846, '12.03.2015 11:40:24', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(847, '12.03.2015 11:40:26', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(848, '12.03.2015 11:40:27', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(849, '12.03.2015 11:40:29', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(850, '12.03.2015 11:40:31', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(851, '12.03.2015 11:40:33', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(852, '12.03.2015 11:40:35', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(853, '12.03.2015 11:40:37', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(854, '12.03.2015 11:40:39', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(855, '12.03.2015 11:40:41', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(856, '12.03.2015 11:40:43', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(857, '12.03.2015 11:41:09', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(858, '12.03.2015 11:41:38', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(859, '12.03.2015 11:41:42', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(860, '12.03.2015 11:41:44', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(861, '12.03.2015 11:41:47', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(862, '12.03.2015 11:41:49', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(863, '12.03.2015 11:41:51', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(864, '12.03.2015 11:42:03', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(865, '12.03.2015 11:42:16', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(866, '12.03.2015 11:42:18', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(867, '12.03.2015 11:42:20', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(868, '12.03.2015 11:42:23', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(869, '12.03.2015 11:42:25', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(870, '12.03.2015 11:42:26', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(871, '12.03.2015 11:42:28', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(872, '12.03.2015 11:42:30', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(873, '12.03.2015 11:42:36', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(874, '12.03.2015 11:43:16', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(875, '12.03.2015 11:44:39', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(876, '12.03.2015 11:44:42', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(877, '12.03.2015 11:44:44', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(878, '12.03.2015 11:44:51', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(879, '12.03.2015 11:44:53', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(880, '12.03.2015 11:44:55', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(881, '12.03.2015 11:44:56', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(882, '12.03.2015 11:44:58', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(883, '12.03.2015 11:45:00', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(884, '12.03.2015 11:45:01', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(885, '12.03.2015 11:45:03', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(886, '12.03.2015 11:45:05', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(887, '12.03.2015 11:45:29', '0.00', 'kvin', '109.106.138.33', 'fd1e315f03c7a03e37a5a35df7c12e', 'crazymonkey'),
(888, '12.03.2015 11:48:58', '0.00', 'LeonardoTest', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(889, '12.03.2015 12:37:41', '1010.00', 'hey11mama', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(890, '12.03.2015 12:38:06', '0.00', 'hey11mama', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(891, '12.03.2015 12:52:03', '0.00', 'hey11mama', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(892, '12.03.2015 12:58:50', '1010.00', 'hey11mama', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(893, '12.03.2015 12:59:15', '0.00', 'hey11mama', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(894, '12.03.2015 13:08:56', '1010.00', 'hey11mama', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(895, '12.03.2015 13:14:50', '1010.00', 'hey11mama', '88.200.136.182', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(896, '12.03.2015 13:23:31', '1010.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(897, '12.03.2015 13:23:34', '0.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(898, '12.03.2015 13:23:57', '0.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(899, '12.03.2015 13:24:00', '0.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(900, '12.03.2015 13:24:02', '0.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(901, '12.03.2015 13:24:05', '0.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(902, '12.03.2015 13:25:24', '0.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(903, '12.03.2015 13:41:31', '0.00', 'caracurtv', '46.55.61.244', 'bc975751c150e29bfa7d1e18f028ac', 'crazymonkey'),
(904, '12.03.2015 17:17:03', '2010.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(905, '12.03.2015 17:26:18', '510.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(906, '12.03.2015 17:26:21', '0.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(907, '12.03.2015 17:26:23', '0.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(908, '12.03.2015 17:26:26', '0.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(909, '12.03.2015 17:39:02', '160.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(910, '12.03.2015 17:47:06', '750.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(911, '12.03.2015 17:47:08', '0.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(912, '12.03.2015 17:48:51', '0.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(913, '12.03.2015 17:54:24', '1100.00', 'kvin', '88.200.137.92', 'a107356065b63eadf05898ebd9da8e', 'crazymonkey'),
(914, '13.03.2015 17:27:41', '600.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'cocktail'),
(915, '13.03.2015 18:02:02', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'keks'),
(916, '13.03.2015 18:02:31', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'keks'),
(917, '13.03.2015 18:11:03', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'lucky_drink'),
(918, '13.03.2015 18:11:08', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'lucky_drink'),
(919, '13.03.2015 18:11:09', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'lucky_drink'),
(920, '13.03.2015 18:11:11', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'lucky_drink'),
(921, '13.03.2015 18:11:13', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'lucky_drink'),
(922, '13.03.2015 18:11:23', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'lucky_drink'),
(923, '13.03.2015 18:14:14', '0.00', 'caracurtv', '88.200.137.207', '9e25d0cfb230c4d154599c38394063', 'lucky_haunter'),
(924, '15.03.2015 16:23:15', '0.00', 'Test2', '37.229.186.38', '4a18e727d1c95d7864cbc44f9d632e', 'keks'),
(925, '17.03.2015 14:37:06', '500.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'crazymonkey'),
(926, '17.03.2015 14:41:11', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(927, '17.03.2015 14:41:14', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(928, '17.03.2015 14:41:15', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(929, '17.03.2015 14:41:17', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(930, '17.03.2015 14:41:18', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(931, '17.03.2015 14:41:19', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(932, '17.03.2015 14:41:20', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(933, '17.03.2015 14:41:30', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(934, '17.03.2015 14:41:31', '0.00', 'FireZZ', '37.79.250.59', 'a2b676736df2624b63cc03e3fbbfce', 'lucky_drink'),
(935, '17.03.2015 17:31:01', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackgold'),
(936, '17.03.2015 17:31:40', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackgold'),
(937, '17.03.2015 17:31:49', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackgold'),
(938, '17.03.2015 17:31:54', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackgold'),
(939, '17.03.2015 17:32:03', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackgold'),
(940, '17.03.2015 17:33:07', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackgold'),
(941, '17.03.2015 17:34:53', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackclassic'),
(942, '17.03.2015 17:35:11', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackclassic'),
(943, '17.03.2015 17:35:19', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackclassic'),
(944, '17.03.2015 17:35:24', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackclassic'),
(945, '17.03.2015 17:35:30', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'blackjackclassic'),
(946, '17.03.2015 17:49:02', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'roulette'),
(947, '17.03.2015 17:58:17', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'acesandfaces'),
(948, '17.03.2015 17:58:29', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'acesandfaces'),
(949, '17.03.2015 18:00:54', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'tensorbetter'),
(950, '17.03.2015 18:01:55', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'jacksorbetter'),
(951, '17.03.2015 18:05:49', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(952, '17.03.2015 18:06:01', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(953, '17.03.2015 18:06:05', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(954, '17.03.2015 18:06:18', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(955, '17.03.2015 18:06:23', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(956, '17.03.2015 18:06:26', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(957, '17.03.2015 18:06:30', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(958, '17.03.2015 18:06:33', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(959, '17.03.2015 18:06:37', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(960, '17.03.2015 18:06:40', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(961, '17.03.2015 18:07:00', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(962, '17.03.2015 18:07:05', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(963, '17.03.2015 18:07:14', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'aztec'),
(964, '17.03.2015 18:29:37', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(965, '17.03.2015 18:29:41', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(966, '17.03.2015 18:29:45', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(967, '17.03.2015 18:29:50', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(968, '17.03.2015 18:30:02', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(969, '17.03.2015 18:30:10', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(970, '17.03.2015 18:30:14', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(971, '17.03.2015 18:30:20', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(972, '17.03.2015 18:30:24', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(973, '17.03.2015 18:30:27', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(974, '17.03.2015 18:30:40', '0.00', 'hey11mama', '88.200.136.110', '9e25d0cfb230c4d154599c38394063', 'champ'),
(975, '18.03.2015 16:47:53', '10010.00', 'Admin', '88.200.137.15', '9e25d0cfb230c4d154599c38394063', 'pirates'),
(976, '18.03.2015 16:48:05', '0.00', 'Admin', '88.200.137.15', '9e25d0cfb230c4d154599c38394063', 'pirates'),
(977, '18.03.2015 16:48:19', '0.00', 'Admin', '88.200.137.15', '9e25d0cfb230c4d154599c38394063', 'pirates'),
(978, '18.03.2015 16:50:06', '0.00', 'Admin', '88.200.137.15', '9e25d0cfb230c4d154599c38394063', 'pirates'),
(979, '18.03.2015 16:50:10', '0.00', 'Admin', '88.200.137.15', '9e25d0cfb230c4d154599c38394063', 'pirates'),
(980, '18.03.2015 16:52:49', '0.00', 'kvin', '109.106.138.81', '46e5164342b05076e2418a15034241', 'pirates');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_deposits`
--

CREATE TABLE IF NOT EXISTS `pay_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `amount` varchar(12) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `ip` varchar(20) DEFAULT '0.0.0.0',
  `type` varchar(50) DEFAULT NULL,
  `type_money` varchar(10) NOT NULL,
  `status` varchar(1) DEFAULT '0',
  `notes` text,
  `referer` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1400 ;

--
-- Дамп данных таблицы `pay_deposits`
--

INSERT INTO `pay_deposits` (`id`, `user`, `amount`, `date`, `time`, `ip`, `type`, `type_money`, `status`, `notes`, `referer`) VALUES
(1363, 'kvin', '1', '18.03.15', '15:28:00', '109.106.138.95', 'FREEKASSA', '', '1', 'Пополнение счёта freekassa для Пользователя:kvin , Сумма:1 Кредитов', '5.9.72.243'),
(1379, 'asd', '5', '24.03.15', '21:10:20', '109.106.137.168', 'FREEKASSA', '', '1', 'Пополнение счёта freekassa для Пользователя:asd , Сумма:5 Кредитов', '5.9.72.245'),
(1376, 'part', '1', '24.03.15', '14:32:40', '109.106.137.168', 'FREEKASSA', '', '1', 'Пополнение счёта freekassa для Пользователя:part , Сумма:1 Кредитов', '5.9.72.243'),
(1378, 'part', '1', '24.03.15', '14:38:35', '109.106.137.168', 'FREEKASSA', '', '1', 'Пополнение счёта freekassa для Пользователя:part , Сумма:1 Кредитов', '5.9.72.243'),
(1380, 'Sheka', '1000', '29.03.15', '19:54:57', '188.130.179.30', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:Sheka , Сумма:1000 Кредитов', ''),
(1381, 'Sheka', '100', '29.03.15', '19:55:19', '188.130.179.30', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:Sheka , Сумма:100 Кредитов', ''),
(1382, 'Sheka', '1000', '29.03.15', '19:56:15', '188.130.179.30', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:Sheka , Сумма:1000 Кредитов', ''),
(1383, 'Sheka', '1000', '29.03.15', '19:56:53', '188.130.179.30', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:Sheka , Сумма:1000 Кредитов', ''),
(1384, 'Sheka', '1000', '29.03.15', '19:57:41', '188.130.179.30', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:Sheka , Сумма:1000 Кредитов', ''),
(1385, 'Sheka', '1000', '29.03.15', '19:58:27', '188.130.179.30', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:Sheka , Сумма:1000 Кредитов', ''),
(1386, 'kvin', '1000', '29.03.15', '20:14:50', '109.106.137.216', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:kvin , Сумма:1000 Кредитов', ''),
(1387, 'odegov66', '50', '01.04.15', '22:57:05', '85.93.58.78', 'FREEKASSA', '', '1', 'Пополнение счёта freekassa для Пользователя:odegov66 , Сумма:50 Кредитов', '5.9.72.245'),
(1388, 'Test1', '1000', '07.04.15', '16:25:50', '178.151.104.14', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:Test1 , Сумма:1000 Кредитов', ''),
(1389, 'avast81nk', '1000', '09.04.15', '19:31:31', '85.26.165.37', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:avast81nk , Сумма:1000 Кредитов', ''),
(1390, 'agag848g4as', '1000', '10.04.15', '09:28:34', '91.237.121.51', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:agag848g4as , Сумма:1000 Кредитов', ''),
(1391, '53454534535', '1000', '12.04.15', '10:52:39', '91.105.156.105', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:53454534535 , Сумма:1000 Кредитов', ''),
(1392, 'victorash1989', '1000', '15.04.15', '17:22:40', '194.105.214.134', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:victorash1989 , Сумма:1000 Кредитов', ''),
(1393, 'karpey', '1000', '19.04.15', '09:05:25', '178.121.217.237', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:karpey , Сумма:1000 Кредитов', ''),
(1394, 'ipalex', '1000', '20.04.15', '11:44:15', '178.137.192.234', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:ipalex , Сумма:1000 Кредитов', ''),
(1395, 'xaxaxa', '1000', '26.04.15', '02:36:46', '5.142.136.52', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:xaxaxa , Сумма:1000 Кредитов', ''),
(1396, 'milo', '1000', '30.04.15', '17:06:51', '176.101.1.81', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:milo , Сумма:1000 Кредитов', ''),
(1397, 'vadim2015', '1000', '30.04.15', '18:54:36', '193.19.118.144', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:vadim2015 , Сумма:1000 Кредитов', ''),
(1398, 'ViTeK38RUS', '10000', '02.05.15', '15:44:59', '109.163.216.188', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:ViTeK38RUS , Сумма:10000 Кредитов', ''),
(1399, 'qweeeee', '1000', '05.05.15', '06:52:48', '77.92.224.235', 'FREEKASSA', '', '0', 'Пополнение счёта freekassa для Пользователя:qweeeee , Сумма:1000 Кредитов', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_a1pay`
--

CREATE TABLE IF NOT EXISTS `pay_modules_a1pay` (
  `secret` varchar(50) DEFAULT '',
  `key` varchar(50) DEFAULT '',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_a1pay`
--

INSERT INTO `pay_modules_a1pay` (`secret`, `key`, `status`, `version`) VALUES
('qawsedrftgyhujikolp', '', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_freekassa`
--

CREATE TABLE IF NOT EXISTS `pay_modules_freekassa` (
  `mrh_login` varchar(50) DEFAULT 'demotech',
  `mrh_pass1` varchar(50) DEFAULT 'q202202q',
  `mrh_pass2` varchar(50) NOT NULL DEFAULT 'q202202q',
  `shp_item` varchar(50) DEFAULT '3',
  `in_curr` varchar(50) DEFAULT 'PCR',
  `culture` varchar(50) DEFAULT 'ru',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `mode_demo` varchar(1) NOT NULL DEFAULT '0',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0',
  `fk_merchant_id` varchar(50) NOT NULL,
  `fk_merchant_key` varchar(50) NOT NULL,
  `fk_merchant_key2` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_freekassa`
--

INSERT INTO `pay_modules_freekassa` (`mrh_login`, `mrh_pass1`, `mrh_pass2`, `shp_item`, `in_curr`, `culture`, `status`, `mode_demo`, `version`, `fk_merchant_id`, `fk_merchant_key`, `fk_merchant_key2`) VALUES
('9210', '9jn6d5eb', '4ef5v6r7865', '3', 'PCR', 'ru', '1', '0', 'v1.0.0', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_interkassa`
--

CREATE TABLE IF NOT EXISTS `pay_modules_interkassa` (
  `ik_shop_id` varchar(100) DEFAULT '2FFF127C-3B9B-7156-DE78-8D32EA343FAF',
  `ik_key` varchar(100) NOT NULL DEFAULT 'MiHqVefF6mP1iMXm',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `mode_demo` varchar(1) NOT NULL DEFAULT '0',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_interkassa`
--

INSERT INTO `pay_modules_interkassa` (`ik_shop_id`, `ik_key`, `status`, `mode_demo`, `version`) VALUES
('E6AC0C14-3E1A-FB7F-1CBE-776E8B6F723E', 'W9CeIl5wlmPNu57m', '0', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_liqpay`
--

CREATE TABLE IF NOT EXISTS `pay_modules_liqpay` (
  `merchant_id` varchar(50) DEFAULT '',
  `merchant_password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_liqpay`
--

INSERT INTO `pay_modules_liqpay` (`merchant_id`, `merchant_password`, `status`, `version`) VALUES
('i3832965922', 'J8JFZzL5ANkQmBINpjinafdwsTa', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_robokassa`
--

CREATE TABLE IF NOT EXISTS `pay_modules_robokassa` (
  `mrh_login` varchar(50) DEFAULT 'demotech',
  `mrh_pass1` varchar(50) DEFAULT 'q202202q',
  `mrh_pass2` varchar(50) NOT NULL DEFAULT 'q202202q',
  `shp_item` varchar(50) DEFAULT '3',
  `in_curr` varchar(50) DEFAULT 'PCR',
  `culture` varchar(50) DEFAULT 'ru',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `mode_demo` varchar(1) NOT NULL DEFAULT '0',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_robokassa`
--

INSERT INTO `pay_modules_robokassa` (`mrh_login`, `mrh_pass1`, `mrh_pass2`, `shp_item`, `in_curr`, `culture`, `status`, `mode_demo`, `version`) VALUES
('demotech', 'q202202q', 'q202202q', '3', 'PCR', 'ru', '0', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_webmoney`
--

CREATE TABLE IF NOT EXISTS `pay_modules_webmoney` (
  `skey` varchar(50) DEFAULT '',
  `WMR` varchar(13) DEFAULT 'R000000000000',
  `WMZ` varchar(13) DEFAULT 'Z000000000000',
  `WME` varchar(13) DEFAULT 'E000000000000',
  `WMU` varchar(13) DEFAULT 'U000000000000',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_webmoney`
--

INSERT INTO `pay_modules_webmoney` (`skey`, `WMR`, `WMZ`, `WME`, `WMU`, `status`, `version`) VALUES
('zxcvbnmqwertyuiop', 'R325816022181', 'Z000000000000', 'E000000000000', 'U000000000000', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_tariff`
--

CREATE TABLE IF NOT EXISTS `pay_tariff` (
  `USD` decimal(20,2) NOT NULL,
  `EUR` decimal(20,2) NOT NULL,
  `UAH` decimal(20,2) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_tariff`
--

INSERT INTO `pay_tariff` (`USD`, `EUR`, `UAH`, `date`) VALUES
('29.22', '39.63', '3.69', '1270427172');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_withdrawals`
--

CREATE TABLE IF NOT EXISTS `pay_withdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `amount` varchar(12) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `type_purse` varchar(50) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `notes` text,
  `details` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `pay_withdrawals`
--

INSERT INTO `pay_withdrawals` (`id`, `user`, `amount`, `date`, `time`, `type`, `type_purse`, `status`, `notes`, `details`) VALUES
(6, 'Admin', '500', '2015-03-24', '20:53:36', 'QIWI', '89277894400', '2', 'Заказ на вывод WebMoney:QIWI', ''),
(7, 'Admin', '168', '2015-03-24', '20:56:52', 'QIWI', '89277894400', '2', 'Заказ на вывод WebMoney:QIWI', '');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `key` varchar(20) NOT NULL,
  `val` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`key`, `val`) VALUES
('partner_percentage', '90'),
('partner_switch', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `user_avatars`
--

CREATE TABLE IF NOT EXISTS `user_avatars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gender` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `user_avatars`
--

INSERT INTO `user_avatars` (`id`, `gender`, `name`, `id_user`) VALUES
(1, 'man', 'bender.png', 0),
(2, 'man', 'mafia.png', 0),
(3, 'man', 'kovboy.png', 0),
(4, 'man', 'vampire.png', 0),
(5, 'man', 'green-head.png', 0),
(6, 'man', 'reper.png', 0),
(7, 'man', 'balalaika.png', 0),
(8, 'man', 'fermer.png', 0),
(9, 'man', 'nlo.png', 0),
(10, 'man', 'alko.png', 0),
(11, 'man', 'gop.png', 0),
(12, 'man', 'zoro.png', 0),
(13, 'man', 'dudka.png', 0),
(15, 'man', 'rok.png', 0),
(16, 'man', 'baik.png', 0),
(17, 'man', 'zhir.png', 0),
(18, 'man', 'kitaec.png', 0),
(19, 'man', 'bob.png', 0),
(20, 'man', 'alax.png', 0),
(21, 'man', 'surov.png', 0),
(22, 'woman', 'baby.png', 0),
(23, 'woman', 'blaking.png', 0),
(24, 'woman', 'blonda.png', 0),
(25, 'woman', 'indeika.png', 0),
(26, 'woman', 'kitayka.png', 0),
(27, 'woman', 'kon4ita.png', 0),
(28, 'woman', 'koshka.png', 0),
(29, 'woman', 'kovboysha.png', 0),
(30, 'woman', 'krytbl.png', 0),
(31, 'woman', 'mashaed.png', 0),
(32, 'woman', 'medsyster.png', 0),
(33, 'woman', 'merlinmoro.png', 0),
(34, 'woman', 'orange.png', 0),
(35, 'woman', 'panksha.png', 0),
(36, 'woman', 'pivovarka.png', 0),
(37, 'woman', 'russkaya.png', 0),
(38, 'woman', 'skromnyashka.png', 0),
(39, 'woman', 'strip.png', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_countries`
--

CREATE TABLE IF NOT EXISTS `user_countries` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `country` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `user_countries`
--

INSERT INTO `user_countries` (`id`, `country`) VALUES
(1, 'Украина'),
(2, 'Россия'),
(3, 'Беларусь'),
(4, 'Другая страна');

-- --------------------------------------------------------

--
-- Структура таблицы `winners_list`
--

CREATE TABLE IF NOT EXISTS `winners_list` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_in_stats` int(20) NOT NULL,
  `bet` float NOT NULL,
  `win` float NOT NULL,
  `game` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `login` varchar(50) CHARACTER SET cp1251 NOT NULL,
  `activity` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `winners_list`
--

INSERT INTO `winners_list` (`id`, `id_in_stats`, `bet`, `win`, `game`, `login`, `activity`) VALUES
(1, 0, 95, 836, 'Обезьянки', 'Fozberi', 1),
(2, 2, 9, 228, 'Аттила', 'LOST', 1),
(3, 17, 2, 742, 'Марко Поло', 'HeaD', 1),
(4, 19, 2, 823, 'Ramses 2', 'Napasik', 1),
(5, 20, 2, 950, 'Европейская рулетка', 'Vision', 1),
(6, 23, 18, 1497, 'Пират', 'loln1k', 1),
(7, 29, 90, 387, 'Polar Fox', 'game_lol', 1),
(8, 31, 200, 587, 'Sharky', 'BlooodyMan', 1),
(9, 0, 900, 936, 'Garage', 'Revolution', 1),
(10, 0, 1283, 684, 'Bananas go Bahamas', 'FreeDom', 1),
(11, 0, 900, 406, 'The Money Game', 'Only', 1),
(12, 0, 700, 925, 'Клубничка', 'Mr.JeFFerson', 1),
(13, 0, 266, 342, 'King of Cards', 'Ron_Pierce', 1),
(14, 0, 400, 393, 'Crazy Doctor', 'Evolution', 1),
(15, 0, 164, 1244, 'Gryphons Gold', 'Sergey', 1),
(16, 0, 12, 586, 'Pharaons Gold 3', 'koroka22', 1),
(17, 0, 25, 784, 'Island 2', 'jimmm', 1),
(18, 0, 43, 482, 'Banana Splash', '1bublik1', 1),
(19, 0, 26, 1474, 'Money Game', 'rublen555', 1),
(20, 0, 23, 1275, 'Crazy Doctor', 'kappitan3', 1),
(21, 0, 23, 590, 'Bananas go Bahamas', 'gogen123', 1),
(22, 0, 51, 295, 'Европейская рулетка', 'lollol1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `winners_settings`
--

CREATE TABLE IF NOT EXISTS `winners_settings` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `start_money` int(7) NOT NULL,
  `count_winners` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `winners_settings`
--

INSERT INTO `winners_settings` (`id`, `start_money`, `count_winners`) VALUES
(1, 200, 25);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
