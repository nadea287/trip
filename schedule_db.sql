-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2021 г., 09:39
-- Версия сервера: 5.7.26
-- Версия PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `schedule_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `couriers`
--

DROP TABLE IF EXISTS `couriers`;
CREATE TABLE IF NOT EXISTS `couriers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `couriers`
--

INSERT INTO `couriers` (`id`, `firstname`, `lastname`, `created_at`, `updated_at`) VALUES
(11, 'diana', '123', '2021-01-28 21:45:54', '2021-01-28 21:45:54'),
(10, 'ana', '123', '2021-01-28 21:45:54', '2021-01-28 21:45:54'),
(9, 'maria', '123', '2021-01-28 21:43:50', '2021-01-28 21:43:50'),
(8, 'diana', '123', '2021-01-28 21:43:50', '2021-01-28 21:43:50'),
(12, 'maria', '123', '2021-01-28 21:45:54', '2021-01-28 21:45:54');

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name`, `duration`, `created_at`, `updated_at`) VALUES
(15, 'Нижний Новгород', 17, '2021-01-28 21:45:54', '2021-01-28 21:45:54'),
(14, 'Уфа', 40, '2021-01-28 21:45:54', '2021-01-28 21:45:54'),
(13, 'Санкт-Петербург', 46, '2021-01-28 21:45:54', '2021-01-28 21:45:54');

-- --------------------------------------------------------

--
-- Структура таблицы `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departure_date` timestamp NOT NULL,
  `arrival_date` timestamp NOT NULL,
  `courier_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `courier_id` (`courier_id`),
  KEY `region_id` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trips`
--

INSERT INTO `trips` (`id`, `departure_date`, `arrival_date`, `courier_id`, `region_id`, `created_at`, `updated_at`) VALUES
(1, '2021-01-20 22:00:00', '2021-01-28 22:00:00', 11, 15, '2021-01-28 22:02:20', '2021-01-28 22:02:20'),
(2, '2021-01-16 22:00:00', '2021-01-23 22:00:00', 10, 14, '2021-01-29 06:54:49', '2021-01-29 06:54:49'),
(3, '2021-01-30 22:00:00', '2021-02-03 22:00:00', 10, 15, '2021-01-29 08:27:08', '2021-01-29 08:27:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
