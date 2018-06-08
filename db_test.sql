-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 08 2018 г., 08:50
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `second_name`, `last_name`, `address`, `phone`, `password`, `email`, `web_site`, `role`) VALUES
(1, 'Іван', 'Іванов', 'Іванович', 'Kropyvnytskyi', '+380(66) 154-21-11', '$2y$10$6rAU5DGNB/le9Pe7iGtSKuQ.wl3W3TKAmN.VM2VLv51Xx.MV7nRlm', 'admin@email.com', 'example.com', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `circle`
--

CREATE TABLE `circle` (
  `id` int(11) NOT NULL,
  `pnz` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `name_circle` varchar(255) DEFAULT NULL,
  `head_id` int(11) UNSIGNED DEFAULT NULL,
  `summary` text,
  `achievement` text,
  `schedule` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `web_site` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `circle`
--

INSERT INTO `circle` (`id`, `pnz`, `direction`, `name_circle`, `head_id`, `summary`, `achievement`, `schedule`, `address`, `phone`, `email`, `web_site`) VALUES
(20, 'ЗОШ 8', 'програмування', 'NewHorizon', 4, '', 'перші місця', 'розклад', 'иваи', '+380(15) 351-51-31', 'zz@zz.zz', 'есть'),
(23, 'ЗОШ 8', 'вишиванки', 'Пролісок', 4, '', 'другі місця', 'розклад', 'иваи', '+380(66) 154-21-11', 'dgd@df.e', 'fhkfhk'),
(24, 'ЗОШ 3', 'хореографія', 'Крок', 4, 'Анотація', '', '', 'иваи', '+380(66) 154-21-11', 'q@q.q', 'есть'),
(25, 'ЗОШ 11', 'оригамі', 'Форс', 4, 'АнотаціяАнотаціяАнотаціяАнотаціяАнотаціяАнотація', 'треті місця', 'розклад', 'fkk', '+380(66) 153-87-70', '2z@zz.zz', 'есть'),
(27, 'ЗОШ 1', 'макраме', 'Jana', 1, '', '', '', 'иваи', '+380(66) 154-21-11', '2z@zz.zz', ''),
(28, 'ЗОШ 8', 'народознавство', 'Народні обранці', 4, '', '', 'розклад', 'с. нова прага', '+380(32) 664-63-23', 'zz@zz.zz', '');

-- --------------------------------------------------------

--
-- Структура таблицы `circlepupils`
--

CREATE TABLE `circlepupils` (
  `id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `pupils_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `circlepupils`
--

INSERT INTO `circlepupils` (`id`, `circle_id`, `pupils_id`) VALUES
(16, 23, 8),
(54, 23, 9),
(65, 23, 11),
(78, 20, 8),
(81, 20, 9),
(82, 24, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `heads`
--

CREATE TABLE `heads` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `second_name` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `heads`
--

INSERT INTO `heads` (`id`, `first_name`, `second_name`, `last_name`, `email`, `password`, `work_place`, `phone`, `address`, `social`, `role`) VALUES
(1, 'w', 'w', 'w', 'w@w.w', '$2y$10$IbYDMq4REF4UbTX3uQzwMe.EcqpMSCzB.bAVUOuoMYWk4P/HZFI0C', NULL, NULL, NULL, NULL, 1),
(4, 'Артем', 'Сидоренко', 'Олексійович', 'sdgdg@dgds.faa', '$2y$10$doRnFggyU73i/sclo9bTLek//lIxEzT.DsvdtuxlEF1/tBSsk2jEa', '7 этаж адвалаб', '0661538770', 'масляниковка', NULL, 1),
(5, 'петя', 'прос', 'БАБУШКА', 'xzXv@fadv', '$2y$10$gDjJX3BrVxE/dvrRsNAGNeMJHPqSEk5rea4ieVfyNfP22sArYHfq.', NULL, NULL, NULL, NULL, 1),
(6, 'Артем', 'йй', 'викторианская', '2z@zz.zz', '$2y$10$euEmQwNAlxM9vONF8zMW/etDsycFZl0fmor5O9Z.lJ.SDMR8BZzC.', 'к3к', NULL, NULL, NULL, 1),
(7, 'валя', 'ыыы', 'ыыыы', 'o@o.o', '$2y$10$uXrDsWFRqlAY/39wETSyp.H.P.tLdzvP.hHjR.oiCED4DsJY5fIrC', NULL, NULL, NULL, NULL, 1),
(8, 'лев', 'левович', 'ян', 'xzXv@fadv', '$2y$10$9EMD8xeHgifBYNHxjYyR3uGhQ4S/KsNl3v2UUk60ggsSGL5ZQlVSK', NULL, NULL, NULL, NULL, 1),
(9, 'autolog', 's', 's', 'ss@ss.s', '$2y$10$K8Xy0b6hRfDiywGxNRH7oesIqgIH0HCdeLlkvMGTuMuy26CwjwCqm', NULL, NULL, NULL, NULL, 1),
(10, 'kerivnuk', 'sfaf', 'фвппыа', 'kerivnuk@n.d', '$2y$10$WdLOBqfRAai3tk/Jm1Jo5eZZTzpKl35VuAhlwUu.u4LxdwuQCAt/S', NULL, NULL, NULL, NULL, 1),
(11, 'kerivnuk', 'sfaf', 'фвппыа', 'kerivnukA@n.d', '$2y$10$e.rZmD20gjGs4RBLtcT70.47NqCnxB7M/uxBjav/ZUTqfBx3lCOhm', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `last_name`, `certificate`, `email`, `password`, `school`, `phone`, `address`, `social`, `role`) VALUES
(8, 'коля', 'прос', 'викторианская', 'І-ПІ 436435', 'r@r.r', '$2y$10$ns4vrvzIhkQOkqI1JnxO9urngHWHf9EjeD4ONZNIJnVclPUwgTG9y', '8 школа', '009', 'fkk', NULL, 2),
(9, 'Артем', 'ы', 'ййй', 'П-ІП 462624', 'k@k.k', '$2y$10$QEPDIacRcxYHPHsoJUWKSu2NSQpJuR/hOYpbvbOx4LmFOaVL9cwhO', NULL, NULL, NULL, ' sdsd\r\nsdsdadsa\r\nsssss\r\nddd', 2),
(10, 'ученик', 'виктория', 'Олексійович', 'В-ПВ 352364', 'h@h.h', '$2y$10$IAMVCTfQiCL6C2TTI4KDHuz5pmAtDWMMMhDsGDa3lAt6SaPWXQFba', NULL, NULL, NULL, NULL, 2),
(11, 'петя', 'ffd', 'Олексійович', 'Р-ІА 426464', 'mm@m.m', '$2y$10$Slr/ekjKBE/akysKDWuFiuFtq0G9TGn6U2phTCHKnOCcVAN8U.gNu', NULL, '+380(66) 154-21-11', NULL, NULL, 2),
(12, 'new', 'new', 'new', 'Ы-АЫ 352342', 'fasf@df.aa', '$2y$10$74N9glvL9nKtoi5Fv1TFBOvfKBE6IGRL6AjY.r5Ws1DplJQMzq8SW', NULL, '+380(34) 214-21-42', NULL, NULL, 2),
(13, 'last', 'last', 'last', '1-21 412155', 't@t.t', '$2y$10$9dBeAWBd26dR.PwH5bxzQuFVvRN9epM.sTiVoXm6d3xTVLhJCFvby', NULL, '+380(35) 526-64-44', NULL, NULL, 2),
(14, '3йкйка', 'фіаіаі', 'фіппвівп', '3-ІА 422623', 'nn@n.d', '$2y$10$PwyVrbGalHalMqxDelbeU.Du17TlRdLuQJ7ap.R7viFNvjZfE9s72', NULL, '+380(21) 124-31-51', NULL, NULL, 2),
(15, 'ффп', 'іфв', 'фіппвівіфіп', '1-АІ 464643', 'ns@n.d', '$2y$10$Qv6iSoD4JXe3UwpLmPl2XePzF7xoGhx4LG6meQoWxjlXqtSvmoRju', NULL, '+380(66) 154-21-11', NULL, NULL, 2),
(16, 'аыффп', 'впвфпф', 'фвппыа', '2-ПВ 323236', 'nss@n.d', '$2y$10$0SW1kopUfvFzFrwvUApNquN8ZlUGHK.iP0cBqRpwAuLCDabsnGlVq', NULL, '+380(66) 153-87-70', NULL, NULL, 2),
(17, 'коля', 'виктория', 'БАБУШКА', '3-АІ 352353', 'xzXv@fadv', '$2y$10$XtpTgLz9Zc7UV1NqxT0VmecWdOArUo.vqkf4XT8gg7D7g782i4LOm', NULL, '+380(66) 154-21-11', NULL, NULL, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_id` (`head_id`);

--
-- Индексы таблицы `circlepupils`
--
ALTER TABLE `circlepupils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `circle_id` (`circle_id`),
  ADD KEY `pupils_id` (`pupils_id`);

--
-- Индексы таблицы `heads`
--
ALTER TABLE `heads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `circle`
--
ALTER TABLE `circle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `circlepupils`
--
ALTER TABLE `circlepupils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `heads`
--
ALTER TABLE `heads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `circle`
--
ALTER TABLE `circle`
  ADD CONSTRAINT `circle_ibfk_1` FOREIGN KEY (`head_id`) REFERENCES `heads` (`id`);

--
-- Ограничения внешнего ключа таблицы `circlepupils`
--
ALTER TABLE `circlepupils`
  ADD CONSTRAINT `circlepupils_ibfk_1` FOREIGN KEY (`circle_id`) REFERENCES `circle` (`id`),
  ADD CONSTRAINT `circlepupils_ibfk_2` FOREIGN KEY (`pupils_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
