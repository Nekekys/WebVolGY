-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 15 2021 г., 17:36
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sportshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bloodtype`
--

CREATE TABLE `bloodtype` (
  `blood_type_id` int(11) NOT NULL,
  `blood_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bloodtype`
--

INSERT INTO `bloodtype` (`blood_type_id`, `blood_type_name`) VALUES
(1, 'первая'),
(2, 'вторая'),
(3, 'третья'),
(4, 'четвертая');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id_brand`, `name_brand`) VALUES
(1, 'Camp'),
(2, 'Norrona'),
(3, 'Mammut'),
(4, 'Gore-Tex'),
(5, 'Haglofs'),
(14, 'new brand99');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `cost` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `cost`, `id_brand`, `img_path`) VALUES
(1, 'Шорты женские Fjora Flex1', 'Шорты Norrona Fjora Flex1 созданы для катания на горном велосипеде. Они подойдут для разных погодных условий и в них вам будет комфортно и в солнечный день, и в дождливый.', 9999, 2, 'img1.jpg'),
(2, 'Куртка Svalbard Cotton', 'Norrona Svalbard Cotton - удобная и прочная куртка для туризма или повседневного использования. Ткань куртки ветроустойчивая и «дышащая» идеально подходит для сухой погоды. Куртка имеет свободный крой, оснащена регулировками объема и вместительными карманами для самого необходимого в дороге.', 15673, 2, 'img2.jpg'),
(3, 'Футболка мужская Svalbard Wool', 'Norrona Svalbard Wool - универсальная футболка для активного отдыха, путешествий и ежедневного использования.', 4194, 2, 'img3.jpg'),
(4, 'Куртка мужская Falketind Gore-Tex', 'Norrona Falketind Gore-Tex - универсальная водонепроницаемая куртка в коллекции Norrona. Она подходит для круглогодичного использования. Куртка разработана для всех видов активности в горах (для скалолазания, альпинизма, ледолазания, треккинга, походов по ледникам, ски-тура)', 45490, 2, 'img4.jpg'),
(5, 'Брюки женские Hiking RG', 'Mammut Hiking RG - универсальные брюки для различных походов. Выполнены из стрейчевой ткани с влагоотталкивающей обработкой, защищающей от брызг, легкого дождя.', 6993, 3, 'img5.jpg'),
(6, 'Куртка женская Sapuen SO Hooded', 'Mammut Sapuen SO Hooded - комфортная универсальная куртка из ветрозащитной ткани софтшелл с мягкой изнанкой с мериносовой шерстью. Материал куртки обеспечивает защиту от сильного ветра и хорошо «дышит». Подойдет для различных походов, путешествий, города.', 20990, 3, 'img6.jpg'),
(7, 'Куртка женская Masao Light HS Hooded', 'Mammut Masao Light HS Hooded - водонепроницаемая куртка для походов различной сложности. Оснащена мембраной Mammut® DryTechnology™ 3L с высокой паропроницаемостью, отличной защитой от проливного дождя и штормового ветра.', 29990, 3, 'img7.jpg'),
(8, 'Рюкзак женский Ducan Spine 50-60L', 'Ducan Spine 50-60 – минималистичный туристический рюкзак для пеших и горных походов средней продолжительности, экспедиций и путешествий.', 15820, 3, 'img8.jpg'),
(9, 'Куртка мужская Haglofs L.I.M Breathe GTX', 'Haglofs L.I.M Breathe GTX – ультралегкая, водонепроницаемая куртка с технологией Shakedry™, самой. С такой курткой вы можете не прекращать тренировок даже в дождливую погоду. Модель идеально подходит для хайкинга, туризма.', 35990, 4, 'img9.jpg'),
(10, 'Кроссовки мужские Salomon X Ultra 3 GTX', 'Легкие, прочные и влагозащищенные кроссовки Salomon X-Ultra 3 GTX с плотной посадкой, надежной фиксацией стопы, достойным уровнем защиты, стабильности и сцепления. В них можно смело выходить на маршрут, где вас ожидают крутые спуски и подъемы.', 13990, 4, 'img10.jpg'),
(11, 'Куртка женская Mammut Nordwand Advanced Hs Hooded', 'Куртка Mammut Nordwand Advanced HS Hooded сочетает в себе легкий вес и долговечность. Это прочная, надежная куртка из трехслойного ламината Gore-Tex® Pro 3L создана для самых жестких погодных условий. Материал обеспечивает максимальную защиту от штормового ветра, ливней, снегопада.', 58500, 4, 'img11.jpg'),
(12, 'Ботинки мужские Hanwag Banks GTX', 'Ботинки, созданные с таким расчётом, чтобы природные условия не влияли на состояние ваших ног, вне зависимости от сложности избранного вами сегодня маршрута.\r\nВерх исполнен из кожи с сертификатом LWG, подтверждающим её высокое качество и экологическую чистоту.', 19880, 4, 'img12.jpg'),
(13, 'Рубашка мужская Haglofs Salo SS', 'Рубашка-бестселлер Haglofs Salo SS подходит для города, туризма, путешествий и т.п. Она выполнена из прочной стрейчевой ткани, обеспечивающей полную свободу движений. Ткань имеет защиту от ультрафиолета, хорошо «дышит», отводит влагу и очень быстро высыхает.', 4655, 5, 'img13.jpg'),
(14, 'Рюкзак Haglofs Angd 60', 'Angd 60 – надёжный туристический рюкзак для пеших, горных походов средней продолжительности, экспедиций и путешествий.', 17780, 5, 'img14.jpg'),
(15, 'Футболка женская Haglofs Ridge Hike', 'Haglofs Ridge Hike – стильная футболка для повседневного использования, занятий спортом и для отдыха. Она выполнена из мягкого полиэстера, который быстро высыхает и очень приятен к телу.', 3213, 5, 'img15.jpg'),
(16, 'Брюки мужские Haglofs Rugged Flex', 'Haglofs Rugged Flex - универсальные брюки для разных видов outdoor активностей. Они выполнены из прочной стрейчевой ткани, имеют артикулированный крой и стрейчевые вставки для максимальной свободы движений. Эти брюки идеально подойдут для туризма, боулдеринга, велоспорта.', 14990, 5, 'img16.jpg'),
(19, 'Рюкзак X3 Backdoor', 'Очень легкий рюкзак для скитура. Низкий вес, прочный материал Tri-Ripstop, доступ со спины, крепление для лыж, пряжки на груди и поясе, открываемые одной рукой, в этом рюкзаке есть все, что необходимо для дневного выхода на лыжах.', 6245, 1, 'img19.jpg'),
(20, 'Ледоруб Corsa Trockii Killer', 'Ледоруб Corsa Race спроектирован специально для спортсменов, участвующих в соревнованиях по ски-альпинизму, которым требуется самое легкое снаряжение. Снижение веса было достигнуто за счет изменяемой толщины металла рукоятки, фрезеровки рукоятки, что также улучшает хват. В результате получился самый', 8990, 1, 'img20.jpg'),
(24, 'test', 'test', 5050, 2, '20211210011257fZJhdVgSLMo.jpg'),
(26, 'Виталий99', '465', 505050, 4, '20211215051253deepMM.png'),
(27, 'Виталий', 'test', 505050, 5, '20211210011226cropped-1366-768-713363.jpg'),
(28, 'Виталий', 'test', 505050, 1, '20211210011244cropped-1366-768-204513.jpg'),
(29, 'qqqqqq', 'qqqqqq', 234234, 14, '20211210061204fZJhdVgSLMo.jpg'),
(33, '485612', 'test', 5050, 14, '20211210061252c84f8123c2a09c5a27ea4891ae8e0ef5.gif');

-- --------------------------------------------------------

--
-- Структура таблицы `test_imported`
--

CREATE TABLE `test_imported` (
  `id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `guid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test_imported`
--

INSERT INTO `test_imported` (`id`, `name`, `name2`, `guid`) VALUES
('1', '333', '222', '1db63e9d7787bc967b5df13604d09f18'),
('3', 'www', 'www', '068d0bca11cc8d8174c8c56cc03eb40d'),
('2', 'qqq', 'qqq', '2db63e9d7787bc967b5df13604d09f18');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `e-mail` text NOT NULL,
  `name` text NOT NULL,
  `last_name` text NOT NULL,
  `otchestvo` text NOT NULL,
  `sex` tinyint(1) NOT NULL COMMENT 'true - жещина\r\nfalse - мужчина',
  `birth_day` date NOT NULL,
  `interests` text NOT NULL,
  `blood_type_id` int(11) NOT NULL,
  `rhesus_factor` tinyint(1) NOT NULL,
  `link_vk` text NOT NULL,
  `adress` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `e-mail`, `name`, `last_name`, `otchestvo`, `sex`, `birth_day`, `interests`, `blood_type_id`, `rhesus_factor`, `link_vk`, `adress`, `password`) VALUES
(13, 'nekekys2@gmail.com', 'Виталий', '1231231', '123123123', 0, '2021-10-13', '123123123', 3, 1, '2312312312', 'Ул А. Невского', '$2y$10$0a3A0jyxPVoIbUhVpj0nDua6jODiaYEdZpl5uPVQ4/8v.Teeqd5OO'),
(14, 'nekekys3@gmail.com', 'Виталий', '1231231', '123123123', 0, '2021-10-13', '123123123', 3, 1, '2312312312', 'Ул А. Невского', '$2y$10$b8MAx1Z2vNa.6LhLqb7loe8Rt/61JpFhLILDxSjhBcFbIs2Jyhmze'),
(15, 'nekeky5s@gmail.com', 'Виталий', 'qweqwe', 'qweqwe', 1, '2021-12-02', 'qweqwe', 3, 0, 'qwe', 'Ул А. Невского', '$2y$10$JhXyEgNgZJGkOMVQ8vlrJep1BSqW6Z85fb3tf9RLFoIkJ0Ov0npUe'),
(16, '1nekekys@gmail.com', 'Виталий', '12312', '123', 0, '2021-10-07', '123', 2, 0, '3123', 'Ул А. Невского', '$2y$10$ALhy23OeiW64nSX100A/3OylS6LV6ryU7gHa5nHgoU4KJNhw1HfJG'),
(24, 'nekekys@gmail.com', 'Виталий', 'asd', 'sdas', 0, '2021-10-28', 'asd', 2, 0, 'asda', 'Ул А. Невского', '$2y$10$Fozo4zErcOPn2M8A.xpiz.fy7JEKzSur7VFA4nt4s2myGNLr.EBli'),
(27, '123nekekys@gmail.com', 'Виталий', 'asdasd', 'qweQWE123 -_!', 0, '2021-10-15', 'asd', 2, 0, 'asd', 'Ул А. Невского', '$2y$10$gUJYFQLja/Zg5pmM9F2cKOK.wUsLoy/bo0wCe7kyzp8iNerSnXR4K'),
(28, '778nekekys@gmail.com', 'Виталий', 'dqwd', 'qweQWE123 -_!', 0, '2021-10-15', 'wsdqw', 1, 0, 'qwdqwd', 'Ул А. Невского', '$2y$10$YKBptAIQSwALsjjgT7Li6ulyoktpk3sxz.63HrWRQu0H7fqN7Jb5u'),
(29, 'nekekys@gmail.com1234', 'Виталий', '1231', '3123', 0, '2021-10-21', '`12`1', 2, 0, '2312', 'Ул А. Невского', '$2y$10$IbNX3yObTGQH69w26gP.CeIw7sMcsSasHCRqLM1KrbZzijgxOhbPy'),
(30, 'n123ekekys@gmail.com', '123', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$Sq68iMsAUQFvqNIp6yrCPu9lFBnZ2yL/1xRxBmMbx4j/RM1DSBGcG'),
(31, 'nekekys@gmail.comasd', 'asdasd', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$XRJHjDIavZxLsYg9587z8uGDGwXIojJUHhz1KfV7egj.HoTrDmDVC'),
(32, 'nekekys@gmail.comasda', 'aaaa', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$hZ.RKc9A5ddJGFjtHuOY/ewXnjkXO/PDEEDbrbWQajyEvIR3qfrWq'),
(33, 'zxcnekekys@gmail.comasda', 'zxc', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$Vlwnz99L5ZY2kR9jLYFgHuxqxX5KSOp0cT/a1/dJlArbgl1Nc/W6y'),
(34, 'zxcnekeasdkys@gmail.comasda', 'ASdsd', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$hN79dHvyAi56A1pxtT71RO2qehE4shrLXltPP66HOVnylq9sJQQIy'),
(35, 'zxcnekeasdk2ys@gmail.comasda', '123', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$O5WFe.CrYJ.FW.Z9bVd4m.TkptwVHzbzpzrIBuklGMbTia2MFLubi'),
(36, 'zxcne123keasdk2ys@gmail.comasda', '123', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$tW8/1kYuIsNW0LIBbn13ue4mmUcngJOrBk1ggex1EbOFft/gfWGVW'),
(37, 'zxc2ne123keasdk2ys@gmail.comasda', 'sad', 'das', 'awdawd', 0, '2021-10-29', 'dawdawd', 3, 1, 'sdaw', 'asdasda', '$2y$10$B4koywCMzIFqsvykiSlsg.BJPhz9FQrSELejkvwg1r2kkS1jnz2fm'),
(38, 'nekekys@gmail.com567', 'Виталий', '12312', '123123', 0, '2021-10-21', '123', 2, 1, '3123', 'Ул А. Невского', '$2y$10$dT0yZ.lKp0g4LRukMBIZVeTmcubu2SbJhnC1IXH4KvLwMeLEnWQSS'),
(39, 'neke3kys@gmail.com567', '123', '12312', '123123', 0, '2021-10-21', '123', 2, 1, '3123', 'Ул А. Невского', '$2y$10$8RVagsG7rMmxGbdGmcHhVOI9UrfQ.ptsoR563K/yuY7Txjyr/nBQm'),
(40, 'nekee3kys@gmail.com567', 'чФЫЧ', '12312', '123123', 0, '2021-10-21', '123', 2, 1, '3123', 'Ул А. Невского', '$2y$10$VBUvyym/EvbecIz34hp2zOn8LiOs2ucc9CjB/phOPWBiDgBTUWRSS'),
(41, 'nsekee3kys@gmail.com567', 'ssa', '12312', '123123', 0, '2021-10-21', '123', 2, 1, '3123', 'Ул А. Невского', '$2y$10$3L5F/on2i3YVFM/kS1xCBeaIIJE.2yNh9gK1sOxBRKSugoCNJpauW'),
(42, 'nsekee33kys@gmail.com567', 'xcz', '12312', '123123', 0, '2021-10-21', '123', 2, 1, '3123', 'Ул А. Невского', '$2y$10$V0fadAIRnKbCU5Ooy3Nsr.Bmx9DVhOwUNTn9b2RjSrPXYRTe7P41a'),
(43, 'nekek2123ys@gmail.com', 'Виталий', '123', '23123', 0, '2021-10-23', '123', 3, 1, '1231', 'Ул А. Невского', '$2y$10$bxAW02lLw1.nrCGiTtvlauBDqLnJ8N/aw0EoEogmziUxjxo/aQ0rC'),
(44, 'nekekys12342@gmail.com', 'Виталий', 'qwe', 'qwe', 0, '2021-10-21', 'qwe', 1, 1, 'qwe', 'Ул А. Невского', '$2y$10$EsnRuAm7J.aS1k1ZIlLsOOreJAIDh7pK3bzd8fXYKSEmbycjSYXl.'),
(45, '123@gmail.com', 'Виталий', '123', '123', 0, '2021-10-22', '123', 2, 1, '123', 'Ул А. Невского', '$2y$10$2lAakjnMw8VnZ63bNq554OVbA2edx5FksysBfMjuEx8GaKX0F5ez6'),
(46, '1234@gmail.com', 'Виталий', '123', '123', 0, '2021-11-05', '123', 2, 1, '123', 'Ул А. Невского', '$2y$10$KIe5DnPS/Gj0OBF6XIQcb.OygY/zQ2P0sLOlVBeszT4KdBodCOt8K'),
(47, '8@gmail.com', 'Виталий', '1231', '3123', 0, '2021-10-29', '123', 2, 1, '2312', 'Ул А. Невского', '$2y$10$0LGibgkariNXecLuAz24GO9VC/qVfvibx6N9QDT0aY1pSdYfW4p7K'),
(48, 'neksadsdekys@gmail.com', 'Виталий', 'asd', 'asd', 0, '2021-10-29', 'asd', 1, 1, 'asd', 'Ул А. Невского', '$2y$10$Vdg7smqGl2AO11nOiJzNcuRLfTLYqGJH/2jSlhi/XsNzS5VTMLsuW'),
(49, '123@123', '123', '3123', '123', 0, '2021-10-14', '12', 2, 1, '123', '123', '$2y$10$RZ9I9C0pWR8/TwXItvTQXOC5o77QfX1gi68EX/KzDVfcIDIJkS91O'),
(50, 'nekekys@gmail.com2', 'Виталий', 'as', 'asd', 0, '2021-10-22', 'dasd', 1, 1, 'asd', 'Ул А. Невского', '$2y$10$nXs1tfVKWwuQ9Djy/oLfceyn4FpsCAhAJFwv791a/rsbyhoyvOE2G');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bloodtype`
--
ALTER TABLE `bloodtype`
  ADD PRIMARY KEY (`blood_type_id`),
  ADD KEY `blood_type_id` (`blood_type_id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_type_id` (`blood_type_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bloodtype`
--
ALTER TABLE `bloodtype`
  MODIFY `blood_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`blood_type_id`) REFERENCES `bloodtype` (`blood_type_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
