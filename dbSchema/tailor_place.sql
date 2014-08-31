-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 31 2014 г., 17:22
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tailor_place`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL COMMENT 'Логин пользователя',
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL COMMENT 'Хэш пароля пользователя',
  `auth_key` varchar(32) NOT NULL COMMENT 'Ключ аутентификации пользователя',
  `name` varchar(100) DEFAULT NULL COMMENT 'Имя пользователя (опционально)',
  `status` enum('ok','not confirmed','banned') NOT NULL DEFAULT 'not confirmed' COMMENT 'Статус пользователя (нормальный, не подтвердил авторизацию, забанен)',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата создания',
  `update_time` timestamp NULL DEFAULT NULL COMMENT 'Дата обновления',
  `country_id` int(10) unsigned DEFAULT NULL COMMENT 'id страны пользователя',
  `city_id` int(10) unsigned DEFAULT NULL COMMENT 'id города пользователя',
  `currency_code` enum('RUR','USD','EUR','CNY','TRY','JPY') NOT NULL DEFAULT 'RUR',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userscol_UNIQUE` (`login`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `auth_key`, `name`, `status`, `create_time`, `update_time`, `country_id`, `city_id`, `currency_code`) VALUES
(1, 'adminTest', 'adminTest@mail.ru', '$2y$13$IyBF/3tHnovYJSM/UEQIt.Len0HIpecQMQuBXi59gN15q27EUPKk.', '', NULL, 'not confirmed', '2014-08-31 12:54:29', NULL, NULL, NULL, 'RUR');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
