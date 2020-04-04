-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 23 2020 г., 12:05
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vp_002`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `birth`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Константин', 'n{|){\\``', 'gbobyleva@petukova.net', '1999-08-23', 'Dolorem autem aspernatur ipsum excepturi. Sint repellat itaque et harum laudantium praesentium culpa at. Rem eveniet culpa voluptatem.', 'http://ykusev.net/perspiciatis-nemo-officiis-assumenda-expedita-velit-voluptas.html', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Викентий', 'viGi<0v%\\3v/`bk', 'ruslan.petrov@abramov.ru', '2000-05-31', 'Est ut ut quo nemo saepe blanditiis. Iure necessitatibus odit quae. Velit et eligendi eveniet iste perferendis nostrum. Perspiciatis aliquid voluptatem cupiditate odit.', 'https://ovcinnikova.ru/ipsam-tenetur-dolorem-nam-quo.html', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Софья', '>{<zRiC5]4>Bw8', 'yroslava54@ivanova.ru', '1990-06-28', 'Explicabo doloribus voluptatem sit dolorem amet aut. Aut et repellendus nostrum. Dolorem beatae quo animi.', 'https://lytkina.ru/et-consequatur-occaecati-aliquam.html', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Август', 'ex^#]J1', 'izykova@rusakov.ru', '2008-12-14', 'Laudantium architecto dolore vel doloribus id laudantium. Dolor quas sit beatae atque quia quos laboriosam id. Autem ipsum ut quia temporibus aut aut beatae enim.', 'http://kolobova.com/delectus-dolores-cumque-accusantium-est-nihil-et-incidunt.html', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Елизавета', 'z4-/0U:7!{ku(`8', 'snoskov@doronin.com', '1987-03-20', 'Qui qui ut corrupti et. Saepe voluptatem quis repellat aut deleniti nulla. Provident sit aut non. Odio eius quisquam perferendis minima quasi dolores.', 'http://www.ignatev.net/accusamus-aliquam-placeat-voluptatem-libero-quis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Лада', '!Jt,S;U4L', 'irodionov@gureva.com', '1985-07-17', 'Sed odit dolore ea rerum quisquam enim. Pariatur natus qui consequuntur quae voluptas. Doloremque aut asperiores culpa laboriosam molestiae sunt minus ut.', 'http://simonov.net/', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Никита', 'E`&THQI', 'zakarova.nataly@rambler.ru', '2012-08-19', 'Maxime id quis sint qui. Quidem perspiciatis quia ut harum iure est. Possimus animi aut maiores qui nesciunt esse.', 'http://www.tvetkova.ru/suscipit-aut-praesentium-eos-ratione-qui-facere', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'София', 'kBuzEA>fJ>=Yp', 'viktor.kalinina@rambler.ru', '1993-09-12', 'Non et incidunt aut minima. A odit ipsum et laudantium ut et optio. Expedita consequatur error dicta quos dolor rem in. Molestiae molestiae natus qui qui officiis non sed.', 'http://www.pavlov.ru/sed-autem-adipisci-et-eum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Инесса', 'ES3v@F|HOK', 'miroslav86@ignatov.com', '1978-02-11', 'Nihil autem iusto saepe quo fuga ea. Amet quia totam et eos. Cupiditate qui vel et eveniet.', 'http://prokorov.ru/', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Феликс', '\'I%}r27+UYTl{v?U+JVN', 'gulyeva.anzelika@serbakova.org', '2016-08-02', 'Exercitationem et perferendis unde molestiae nihil suscipit et. Dolorum possimus dolore dolorem. Officia debitis non nihil ut.', 'http://antonova.ru/amet-nesciunt-amet-nesciunt-expedita-aut-similique-voluptas.html', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'boot', 'bb3acf149db4936fbaca693a61d56be89205d997', 'boot@mail.ru', '0000-00-00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
