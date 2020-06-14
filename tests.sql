-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2020 г., 19:01
-- Версия сервера: 5.5.61
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tests`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Природа'),
(2, 'Города'),
(3, 'Hitech'),
(4, 'Машины'),
(5, 'Животные');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `date`, `user_id`, `category_id`) VALUES
(1, 'new skoda', 'В гамме обновленной Skoda Rapid появилась комплектация Hockey Edition, которая отличается от базовой расширенным перечнем оборудования и некоторыми визуальными акцентами.                                      С точки зрения экстерьера отличить Rapid Hockey Edition от обычной машины можно по специальным шильдикам на кузове и накладкам на порогах, а также хромированному канту боковых стекол.                                      Интерьер Rapid Hockey Edition выделяется хромированными деталями. Базируется версия на <средней> комплектации Ambition, плюсом к ней добавлено следующее оборудование: климат-контроль, двухспицевый кожаный руль, центральный подлокотник, задний парктроник, тонировка стекол, зеркало с автозатемнением, расширенный функционал бортового компьютера. Изначально в Ambition есть боковые подушки безопасности спереди, подогрев передних сидений, противотуманные фары, круиз-контроль, обогрев зеркал и форсунок омывателя лобового стекла. Присутствует и медийная система SmartLink, позволяющая подключить смартфон и пользоваться приложениями, Bluetooth, а также два разъема USB-C сзади.', 'gen3404406.jpg', '2020-06-10 09:52:54', 10, 4),
(4, 'Электрический Audi e-tron начали предлагать в РФ. От 5 595 000 рублей', 'Российские дилеры Audi с 11 июня начали прием заказов на первый серийный электромобиль марки — полноразмерный кроссовер e-tron. Стоимость его начинается от 5 595 000 рублей.  Audi e-tron выпускается с конца 2018 года. Кроссовер длиной 4,9 м оснащен двумя электромоторами (по одному на ось) суммарной мощностью 408 л.с., привод — постоянный полный. Литий-ионная батарея обеспечивает кроссоверу разгон 0-100 км/ч всего за 5,7 секунды. Максимальная скорость ограничена на уровне 200 км/ч.  Предлагаются четыре фиксированные комплектации: 1) Base, 2) Advance, 3) Sport и 4) Design.  В базовое оснащение Base входят 19-дюймовые аэродинамичные колесные диски, адаптивная подвеска, прогрессивное рулевое управление, светодиодная оптика, два сенсорных дисплея медианавигационной системы MMI, цифровая комбинация приборов, двухзонный климат-контроль, ассистент парковки, функция контроля за движением по полосе, зарядные кабели, мультифункциональный руль,  Исполнение Advance дополнено камерой заднего вида, обогревом передних сидений и руля, электроприводом регулировок передних сидений с функцией памяти водительских настроек, автодоводчиком дверей.', 'gen340_3535374.jpg', '2020-06-12 15:16:22', 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dimensions` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `image`, `dimensions`, `date`, `user_id`, `category_id`) VALUES
(2, 'Закат', 'Красивый закат над городом', '1.jpg', NULL, '2020-05-23 20:09:45', 12, 2),
(3, 'Древо жизни', 'Смысл жизни', 'suoairzvba.jpg', NULL, '2020-05-23 20:13:32', 12, 3),
(4, 'Game', 'This is boss in game', 'r7wt0tbetg.jpg', NULL, '2020-05-23 21:21:58', 12, 3),
(5, 'BMW X5', 'Красивое сочетание мощи и проходимости', 's1200erv43.jpg', NULL, '2020-05-24 18:52:23', 10, 4),
(7, 'Самураи', 'Красота грации и утонченности', 'z8xtxnzrep.jpg', NULL, '2020-05-24 18:57:21', 10, 3),
(8, 'Осень', 'Красота осенних листьев', 's12003df.jpg', NULL, '2020-05-24 19:00:44', 10, 1),
(9, 'Процессор', 'Информационные технологии', 'lwjlo0onep.jpg', NULL, '2020-05-24 19:01:51', 10, 3),
(13, 'Cadilac Escalade', 'Роскошная квартира на колесах', '724da9es.jpg', NULL, '2020-05-25 14:53:09', 9, 4),
(14, 'Лев ', 'Лохматый котик', '4а5квlev-75.jpg', NULL, '2020-05-26 10:32:54', 11, 5),
(15, 'Тигр', 'Тигрику любит мед', 'animals-tiger-60873.jpg', NULL, '2020-05-26 10:33:28', 11, 5),
(16, 'тигрик', 'тигрик', 'scale_нгп1200.jpg', NULL, '2020-06-02 17:38:39', 11, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(249) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`, `image`) VALUES
(9, '', 'man123@ya.ru', '$2y$10$XXTbU8DXnwIdMCa7OPAXOuI4GBzv5b3mobGQfxZTuVjuoCcS6DU0a', 'Maks', 0, 1, 1, 0, 1590088261, 1590489235, 0, 'rango.jpg'),
(10, 'Sergo', 'sergo@mail.ru', '$2y$10$4eZ7kgy/P26bKOw8lq0NYuVbT.dMq8XBhn29YGVgDnYLe5/lhFEwm', 'Sergo', 2, 1, 1, 0, 1590088300, 1592074732, 0, '4а5квlev-75.jpg'),
(11, '', 'nunny@ya.ru', '$2y$10$No/l3aQ61eQAACgr/oIIdeRjvLqZkN0RIZRUAvRCI7636wziT9Lci', 'Nulli', 0, 1, 1, 0, 1590088329, 1591119421, 0, 'xn9jpysspj.png'),
(12, '', 'lilly@ya.ru', '$2y$10$c1vV.DOziBBz6OcNQAfGVOgZI6c3qyaYpjJy90rXpWY1kCab9b4Wy', 'Lilly', 0, 1, 1, 0, 1590088363, 1590337039, 0, 'krasivye.jpg'),
(13, '', 'man@ya.ru', '$2y$10$csr.3.dneCBagO/9kwIjvenqiYxpRYw3eGjIwLrneFXEym0vDlyL.', 'Manki', 1, 1, 1, 0, 1592063900, NULL, 0, 'r7wt0tbetg.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(1, 0, 'man@ya.ru', 'g3a6L3hrLNAfiAfB', '$2y$10$tVVd/fUeVEgSAQZrQ8OtIOaUpcWs0ElYxIhAjhj8f1QkFwek2Vg..', 1584094161),
(2, 0, 'man1@ya.ru', 'DQZzzFQ7kaecFS80', '$2y$10$8VzdWduCcDJMaR8VqNofK.70EgMbZQx0Sfw1r9pR2dM6gxz1X3/X2', 1584094443),
(3, 0, 'jane@mail.ru', 'mZnAd.AUAT0Ch3Ri', '$2y$10$rTSgvmseUAsNyM87euauYedtE8vWR7JD48hEKmY/J5Uv8ElYxduGS', 1584096832),
(5, 0, 'jane1@mail.ru', 'idsf83wzNDpuCtkV', '$2y$10$CgrORYbfUh3cbfzbD1VFtO59A9o2Wuo38lzIX/nV/QbKh31UXGMW6', 1584466162),
(6, 0, 'jane1@mail.ru', 'NfZDuoarEGxofVsY', '$2y$10$Zd.MP78Wodmik.ixckrWveQZoJTnlBXBqbl1kXyjRFJ8PZMFEr40q', 1584474287),
(7, 0, 'jane1@mail.ru', 'CY6HkonYKPsIQmeX', '$2y$10$4a3g2EEOcDL62foWhW34..78pUysfhD6pzg.azB3ewVR36LltYDnm', 1584474321),
(10, 0, 'jane3@mail.ru', 'MlhoJbcB9rQJMw4P', '$2y$10$1U82CNHfRiFnaA.sLnI/EuqhV/uWAhKAFZmxUo/ueTWG7Ou57IKhu', 1584638147),
(11, 0, 'jane3@mail.ru', 'TaaD3whPV4tYdSHH', '$2y$10$4EaCPmY7Wb7jvw93miRE4O1euqCPRXJ3fUNFWvL1o7NGhdTJXoCVC', 1584638987),
(12, 0, 'buuulet@yandex.ru', 'ZlhoCuQQmHcJqt.r', '$2y$10$WJwB6ZTt8CjbZNOsuqzWs.7onG9MagY/OeUP912NrpGZp0Af7QPey', 1586462305),
(13, 0, 'ttt@ya.ru', 'mbrMt7pKHm1C4FAp', '$2y$10$rtGVMd5xTkKJpaJb1r7Swe9QW8XqAsuOKcl7Un.SA/12QhF/eMRO6', 1589231165),
(14, 0, 'make@ya.ru', 'skjRgMPvidcg0atz', '$2y$10$w1ImVLHeSThg7mClinEsPu3riE0KUTT.82fkwkKJ.gtKCX6FqC62i', 1589292823),
(15, 0, 'man1111111111111111@ya.ru', 'G7..5PcP_3SNYPWV', '$2y$10$FDYI4CbEcwmyky63tsfYNui23fjY.xnv1cb9DXJMs0KOaO9g4jiI.', 1589367574),
(16, 0, 'man11111@ya.ru', 'eB0S1.eFmFfJZPOK', '$2y$10$4YgQZJecxSG8uxMD7QiBaujYxsqwuuX0XCiPRSkO/cr.bQFXizZBW', 1589367898),
(17, 0, 'man111@ya.ru', 'dXaBAnX8IjYelb6w', '$2y$10$AecipQCbPfzWFRnOcA5r8OT1YltLQPvDw6IXubMvJhd.wzhFhcgv2', 1589368008),
(18, 0, 'man111@ya.ru', 'sIMqJjHXoLxc6hLp', '$2y$10$sx4CqsCSrDdk7.e4AR02aeSjiThYXX/QjkvJVKBdL1STMsL.42rsG', 1589368058),
(19, 0, '111@ya.ru', 'Z4IWvkszpnj2gExQ', '$2y$10$6K8E0FntzcgrnZ8XL.WX0Ol.4r/kTcNAUBnK/Cro0AGOq/kohoh4S', 1589368688),
(20, 0, 'm@ya.ru', 'kpCp2rZMSRJgv.FG', '$2y$10$nqTeFu5s2xjhATHyglwJCuxzLasCNJ0v.pSWd3tTLDyt0OY3eq4kK', 1589379353),
(21, 0, 'man123@ya.ru', 'YXTPc7utL4khc4vM', '$2y$10$/2xfj8K8Sm3iCSwhMCpaReT8FWLfOCtQdXZATZ.taiKM49lRYcqQ.', 1589481027),
(22, 0, '1@ya.ru', 'nTZFc8Kr.eU0PYgR', '$2y$10$qJXkO7BEosn.O/qYFpvw6OD1enV9JZpLsUXu6ojYELmmT/UqzhEa6', 1589538016),
(23, 0, 'm@yandex.ru', 'lwK2FXgjLm4fLNoG', '$2y$10$b2Ts0oWX7N92A.Yj7XYliO4QlKp1FLiNfe4guEz5cHfLqVQL4hnIy', 1589982734),
(24, 0, 'm@yandex.ru', 'F.hsdXeafk_6oZVS', '$2y$10$VWvtE.EzfxNnt1o8fqKeU.b4TqfUp3oWEpVtg9FhDDzPtkc8Jpkdu', 1589983083),
(25, 0, 'm@yandex.ru', 'bjMAk_7GKqSzazuD', '$2y$10$G6c3cbxSxnfidj/5z/TPJeEqrdCExD91iqE4B.TNFzMK3kplM15wu', 1589983228),
(26, 0, 'm@yandex.ru', '1aqMpydNgvPfvB5B', '$2y$10$WC6Rza08LHewMnK8sj6/tuumd1/FMlQBNzSvCI8QyqrlAngyeqXkC', 1589983295),
(27, 0, 'mmm@ya.ru', 'gkRFM.784Ngf7UTy', '$2y$10$s9z.W9tkWiD2A6HqFoTIx.AwEPE/hvWUFqRhJppY4pl3xOdapJJRq', 1589983355),
(28, 0, 'qwer@yandex.ru', 'vuB34MuASeb9P2Ma', '$2y$10$CxG467fS8b8DI790xlhFbOwJLA2CyQ2ymj9YOdCWuZf4hzZQtsOci', 1589983522),
(29, 0, 'serge@mail.ru', 'etbhip_bohLTT9Ul', '$2y$10$.EG0SmeDUgNg7EHPp8wEn.Tl5vAU.AFnAeczJA.a70a6TFBAU/7pG', 1589984672),
(30, 0, 'd@ya.ru', 'kdshYvuRETAcmy.F', '$2y$10$5hh4WeiIgVAXFuLwg3THE.VA6qhkkp751vX2Kxs/HDzAj8Hs9zoJG', 1589985538),
(31, 0, 'd@ya.ru', 'CJ.mGNzItu.hSNRG', '$2y$10$8xlipXKA6Vlyt4I8BDxCcOjJLAzOfM12AXdCY6iclLkOvZAWAcRMC', 1589985624),
(32, 0, 'd@ya.ru', 'r.aGihziNGla33.V', '$2y$10$a8VRye8C93mQm82Ailf2Tu9XluYGZIYYpryLXYo04OzSijY71X//i', 1589985662),
(33, 0, 'sergo@mail.ru', '5VDlajDcxrnzQq7n', '$2y$10$/BFuYg/nCvb3siA3a/MoLOYlbDZie.ClUZx9KJJB/qzoPkI1YT.7G', 1590155266),
(34, 0, 'nunny@ya.ru', 'ygWmWR.gXxZFwbEj', '$2y$10$dCfRiilzO1CkamdVuH3bEeA2N8JeJEITJ2/bRswm1JFG.MK9NYCn.', 1590171316),
(35, 0, 'man123@ya.ru', 'Q31nEGdpT.PlyRdM', '$2y$10$HEMY0um0PyixuvgnylEBBuuNAkWQe0mbNtOLdrnukQ4ht42rRhGrC', 1590174661),
(36, 0, 'sergo@mail.ru', 'Cl65SMsxVsa3jDIi', '$2y$10$u35aprLXHnKOKF.nXS1lsuNZ668vn7kXLuBjZCVKhonTz/sTpkKsS', 1590174700),
(37, 0, 'nunny@ya.ru', 'pIkJ.D0RUUxABNTO', '$2y$10$QJlEE0nDWFaZRmNxJo3Ty.82Efh/M.RYSOtF7x.m2w1CW6KnPZBJe', 1590174729),
(38, 0, 'lilly@ya.ru', 'ZRV6RRe3eYk0WSQK', '$2y$10$z9i4c8auOPWQcMrVENX6f.eN3ZbUKjPmM1yrYJ1IdCSfStkNAF.Ma', 1590174763),
(39, 0, 'r@ya.ru', 'Rx17d0T_QpF.HcL0', '$2y$10$PhOvg6DM3XxUOpV2IckrrOOhxTIBHVwQNIbJktaPxByB9Hc5xYGU2', 1591863440),
(40, 0, 'ffff@ay.ru', 'hqRBY7qnoO8jVPgL', '$2y$10$lzjGJ07gJ0tP/JfpQ3kUWOZL4Gs.tF/aqlz0rkmxt7fdqVgGz/mtq', 1592150300),
(41, 0, 'millif@ay.ru', 'rhpEoj6abhcXjgSR', '$2y$10$pRnp6GqWK7.YRgOVeAD5quRI2lPa/agUIWVxcTaPRbFFoxrMF5q8.', 1592150406);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `photos_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
