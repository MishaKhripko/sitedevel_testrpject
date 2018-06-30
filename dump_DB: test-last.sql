-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 30 2018 г., 20:59
-- Версия сервера: 5.7.22-0ubuntu0.16.04.1
-- Версия PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `description` text,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `episode`
--

INSERT INTO `episode` (`id`, `name`, `description`, `season_id`) VALUES
(1, 'Unaired Premiere Episode', 'In New York, Peter Petrelli is the younger brother of Nathan Petrelli, an overly ambitious and unscrupulous candidate for the next New York congressman. Peter begins having strange dreams and begins to believe that he can fly, but Nathan is skeptic to his younger brothers claims. Peter decides to prove his theory and jumps from the roof of a building in an alley and his brother flies and saves him... revealing that Nathan has the ability to fly, not Peter. In Texas, cheerleader Claire Bennet learns that she is literally indestructible and can not harm herself or die....', 1),
(2, 'Chapter One \'Genesis\'', 'In Manhattan, Peter Petrelli is the younger brother Nathan Petrelli an overly ambitious and unscrupulous candidate for the next New York congressman, and he dreams and believes that he can fly. He decides to prove his theory and jumps from the roof of a building in an alley and his brother flies and saves him. In Texas, cheerleader Claire Bennet learns that she is literally indestructible and can not harm herself or die. She saves a fireman in a fire in a train, but does not take the credit. In Tokyo, Hiro Nakamura believes he can control time and space continuum. In ...', 1),
(3, 'Chapter Two \'Don\'t Look Back\'', 'When Nikki wakes up, she sees the two criminals dead in her garage. She brings her son and finds a brand new Cadillac in her name and the bodies in the trunk, with instructions and a map to bury the corpses in the desert. Peter awakes in the hospital and his mother tells him that his father was depressed and committed suicide. When Peter decides to jump from the terrace of his building, his brother Nathan discloses that both can fly. Hiro is teleported to the Times Square and finds a comic book written by Isaac Mendez telling his saga. He goes to Isaac studio, finds ...', 1),
(4, 'Chapter One \'Four Months Later...\'', 'Four months after the events of Peter\'s explosion, we find the heroes at different places in their lives. Claire, HRG and family try to stay below the radar in their new town, but a classmate of Claire\'s with some powers of his own knows there\'s something different about her. Matt Parkman and Mohinder Suresh are now guardians of Molly Parker, who has been suffering from horrible nightmares about the man who is more evil than Sylar. Mohinder and HRG are still trying to take the company down. Kaito Nakamura and Angela Petrelli receive ominous notices of their impending ...', 2),
(5, 'New Episod', 'Lorem ipsum', 1),
(6, 'New EpisodTest1', 'Test1', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1530182506),
('m140209_132017_init', 1530182513),
('m140403_174025_create_account_table', 1530182516),
('m140504_113157_update_tables', 1530182523),
('m140504_130429_create_token_table', 1530182529),
('m140830_171933_fix_ip_field', 1530182531),
('m140830_172703_change_account_table_name', 1530182531),
('m141222_110026_update_ip_field', 1530182532),
('m141222_135246_alter_username_length', 1530182534),
('m150614_103145_update_social_account_table', 1530182540),
('m150623_212711_fix_username_notnull', 1530182540),
('m151218_234654_add_timezone_to_profile', 1530182541),
('m160929_103127_add_last_login_at_to_user_table', 1530182542);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `dateStart` date NOT NULL,
  `dateFinish` date NOT NULL,
  `tvseries_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `season`
--

INSERT INTO `season` (`id`, `name`, `dateStart`, `dateFinish`, `tvseries_id`) VALUES
(1, '1', '2007-01-01', '2008-01-01', 1),
(2, '2', '2008-01-01', '2009-01-01', 1),
(3, '3', '2009-01-01', '2010-01-01', 1),
(4, '1', '2007-01-01', '2008-01-01', 2),
(5, 'New Season', '2000-01-01', '2010-01-01', 1),
(6, 'New SeasonTest', '2001-01-01', '2010-01-01', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'u9IvldQDuzaBdEJDkFHT4MbrBVSIsSUp', 1530210223, 0),
(2, 'Y4VX_g3Dm2Wo463WwO-DLKQjo9IepAm6', 1530379028, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tvseries`
--

CREATE TABLE `tvseries` (
  `id` int(11) NOT NULL,
  `description` text,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `tvseries`
--

INSERT INTO `tvseries` (`id`, `description`, `name`) VALUES
(1, 'It is description', 'Hehoes'),
(2, 'New Serial', 'Serial'),
(3, 'New Serial', 'Serial2'),
(4, 'Test1', 'Test1');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'myckua@gmail.com', '$2y$10$Cy8/rPK3oWp/T4OU2pT1z.LmZ1er3KKOiuxp4FzbVH1f3Tt.XXFJW', 'd-Ri5yPpIDin_5J5Fi1GX4PrA7hRToCb', 1, NULL, NULL, '127.0.0.1', 1530210223, 1530210223, 0, 1530380131),
(2, 'test', 'test@mail.com', '$2y$10$3jrySlGFHN7k10y2KXzBzuNI3bMj1ddupKl6Rlp.JXd96RoXTHdWe', 'Y1ZJ9FN5ierTZnOsgyG1QGSFyTSsE-GS', 1, NULL, NULL, '127.0.0.1', 1530379028, 1530379028, 0, 1530379200);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `season_id` (`season_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tvseries_id` (`tvseries_id`);

--
-- Индексы таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Индексы таблицы `tvseries`
--
ALTER TABLE `tvseries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tvseries`
--
ALTER TABLE `tvseries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`);

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `season_ibfk_1` FOREIGN KEY (`tvseries_id`) REFERENCES `tvseries` (`id`);

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
