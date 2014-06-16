-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2014 г., 00:31
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `conspect`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `url`, `title`) VALUES
(1, 'admin_media.php', 'MediaAdmin'),
(2, 'admin_modules.php', 'Модулі'),
(3, 'admin_design.php', 'Дизайн'),
(4, 'users.php', 'Керування користувачами'),
(5, 'admin_hmenu.php', 'Горизонтальне меню'),
(6, 'admin_vmenu.php', 'Вертикальне меню'),
(7, 'admin_comments.php', 'Архів коментарів'),
(8, 'admin_messages.php', 'Архів повідомлень'),
(9, 'admin_ban.php', 'Заблоковані ІР'),
(10, 'admin_enter.php', 'Архів входів'),
(11, 'admin_friends.php', 'Рекомендовані сайти'),
(12, 'admin_page.php', 'Керування сторінками'),
(13, 'admin_articles.php', 'Керування статтями'),
(14, 'admin_categories.php', 'Категорії статей'),
(15, 'admin_hostbook.php', 'Гостьова книга'),
(16, 'admin_news.php', 'Керування новинами');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `views` int(7) NOT NULL,
  `show` int(2) NOT NULL,
  `desk` text NOT NULL,
  `text` text NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `cat` int(3) NOT NULL DEFAULT '1',
  `like_ip` text NOT NULL,
  `dislike_ip` text NOT NULL,
  `lostmode` date NOT NULL DEFAULT '2013-01-01',
  `sourse` varchar(255) NOT NULL,
  `a1` varchar(255) NOT NULL,
  `a2` varchar(255) NOT NULL,
  `a3` varchar(255) NOT NULL,
  `a4` varchar(255) NOT NULL,
  `a5` varchar(255) NOT NULL,
  `an1` varchar(255) NOT NULL,
  `an2` varchar(255) NOT NULL,
  `an3` varchar(255) NOT NULL,
  `an4` varchar(255) NOT NULL,
  `an5` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `date`, `author`, `views`, `show`, `desk`, `text`, `meta_k`, `meta_d`, `cat`, `like_ip`, `dislike_ip`, `lostmode`, `sourse`, `a1`, `a2`, `a3`, `a4`, `a5`, `an1`, `an2`, `an3`, `an4`, `an5`, `author_id`) VALUES
(1, 'Табличная верстка', '0000-00-00 00:00:00', '', 25, 1, 'Табличная верстка – это тип проектирования страницы, каркас которой созданный с помощью таблиц...', '<p><strong>Табличная верстка</strong> – это тип проектирования страницы, каркас которой созданный с помощью таблиц и определенного расположения информации в ней. Данный тип создания страниц был распростанен до внедрения использования CSS, но после уступил более эффективной модели проектирования страниц – <a title="Блочная верстка" href="http://web-mount.com/view_a.php?id=30" >блочной верстке</a>.\r\n</p><p>\r\nПреимуществом данной верстки является простота реализации, а среди недостатков стоит выделить следующие:\r\n<ul>\r\n<li>Отсутствие кэширования повторяемых элементов сайта браузером;</li>\r\n<li>Нерациональность использования каскадных таблиц стилей, что отражается на дизайне;</li>\r\n<li>Несоответствие принципу семантической верстки;</li>\r\n</ul>\r\n</p>', '', '', 1, '', '', '2013-01-01', '', '', '', '', '', '', '', '', '', '', '', 1),
(2, 'Блочная верстка', '0000-00-00 00:00:00', '', 6, 1, 'Блочная верстка – это тип дизайна страницы, созданный с помощью блоков...', '<p><strong>Блочная верстка</strong> – это тип дизайна страницы, созданный с помощью блоков (тег <span style="color:#00F;">&#060;div&#062;</span>), расположение которых контроллируется строго с помощью CSS (каскадных таблиц стилей), и в котором таблицы используются только для представления табличных данных.\r\n</p><p>\r\nПреимуществами данного типа являются:\r\n<ul>\r\n<li>Кэширование блоков браузером, за счет чего быстрая загрузка страниц;</li>\r\n<li>Неограниченные возможности по созданию сложных дизайнов;</li>\r\n<li>Четкое отделение части с контентом;</li>\r\n<li>Простота реализации программной части;</li>\r\n</ul>\r\n</p><p>\r\nНедостатком блочной верстки является сложность реализации относительно табличной, а также возникает много проблем с обеспечением <a title="Кроссбраузерность сайта" href="http://web-mount.com/view_a.php?id=28" >кроссбраузерности</a> для старых браузеров, но при этом она отлично индексируется <a title="Поисковик" href="http://web-mount.com/view_a.php?id=20" >поисковиками</a>, позволяет многим программам, которые работают с контентом сайтов, правильно "читать" его содержимое, помогает пользователям быстро загружать страницы, а также с помощью связи блоков и стилей можно создавать профессиональные дизайны. Соответственно вопрос: можно ли создать профессиональный дизайн в табличной верстке? Конечно можно: делается это с помощью блоков.\r\n</p>', '', '', 1, '', '', '2013-01-01', '', '', '', '', '', '', '', '', '', '', '', 1),
(11, 'HTML ++', '2013-10-08 01:56:09', 'admin', 34, 1, '<span style="font-weight: bold;">HTML</span> (от англ. HyperText Markup Language — «язык разметки гипертекста»;) — стандартный язык разметки документов во Всемирной паутине', '<p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);"><span style="font-weight: bold;">HTML</span>&nbsp;(от&nbsp;<a href="https://ru.wikipedia.org/wiki/&#37;D0&#37;90&#37;D0&#37;BD&#37;D0&#37;B3&#37;D0&#37;BB&#37;D0&#37;B8&#37;D0&#37;B9&#37;D1&#37;81&#37;D0&#37;BA&#37;D0&#37;B8&#37;D0&#37;B9_&#37;D1&#37;8F&#37;D0&#37;B7&#37;D1&#37;8B&#37;D0&#37;BA" title="Английский язык" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">англ.</a>&nbsp;<span lang="en" xml:lang="en" style="font-style: italic;">HyperText Markup Language</span>&nbsp;— «язык разметки&nbsp;<a href="https://ru.wikipedia.org/wiki/&#37;D0&#37;93&#37;D0&#37;B8&#37;D0&#37;BF&#37;D0&#37;B5&#37;D1&#37;80&#37;D1&#37;82&#37;D0&#37;B5&#37;D0&#37;BA&#37;D1&#37;81&#37;D1&#37;82" title="Гипертекст" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">гипертекста</a>»;)&nbsp;— стандартный&nbsp;<a href="https://ru.wikipedia.org/wiki/&#37;D0&#37;AF&#37;D0&#37;B7&#37;D1&#37;8B&#37;D0&#37;BA_&#37;D1&#37;80&#37;D0&#37;B0&#37;D0&#37;B7&#37;D0&#37;BC&#37;D0&#37;B5&#37;D1&#37;82&#37;D0&#37;BA&#37;D0&#37;B8" title="Язык разметки" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">язык разметки</a>&nbsp;документов во&nbsp;<a href="https://ru.wikipedia.org/wiki/&#37;D0&#37;92&#37;D1&#37;81&#37;D0&#37;B5&#37;D0&#37;BC&#37;D0&#37;B8&#37;D1&#37;80&#37;D0&#37;BD&#37;D0&#37;B0&#37;D1&#37;8F_&#37;D0&#37;BF&#37;D0&#37;B0&#37;D1&#37;83&#37;D1&#37;82&#37;D0&#37;B8&#37;D0&#37;BD&#37;D0&#37;B0" title="Всемирная паутина" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">Всемирной паутине</a>. Большинство&nbsp;<a href="https://ru.wikipedia.org/wiki/&#37;D0&#37;92&#37;D0&#37;B5&#37;D0&#37;B1-&#37;D1&#37;81&#37;D1&#37;82&#37;D1&#37;80&#37;D0&#37;B0&#37;D0&#37;BD&#37;D0&#37;B8&#37;D1&#37;86&#37;D0&#37;B0" title="Веб-страница" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">веб-страниц</a>&nbsp;создаются при помощи языка HTML (или&nbsp;<a href="https://ru.wikipedia.org/wiki/XHTML" title="XHTML" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">XHTML</a>). Язык HTML интерпретируется&nbsp;<a href="https://ru.wikipedia.org/wiki/&#37;D0&#37;91&#37;D1&#37;80&#37;D0&#37;B0&#37;D1&#37;83&#37;D0&#37;B7&#37;D0&#37;B5&#37;D1&#37;80" title="Браузер" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">браузерами</a>&nbsp;и отображается в виде документа в удобной для человека форме.</p><p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);">HTML является приложением («частным случаем»)&nbsp;<a href="https://ru.wikipedia.org/wiki/SGML" title="SGML" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">SGML</a>&nbsp;(стандартного обобщённого языка разметки) и соответствует международному стандарту&nbsp;<a href="https://ru.wikipedia.org/wiki/ISO" title="ISO" class="mw-redirect" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">ISO</a>&nbsp;8879.&nbsp;<a href="https://ru.wikipedia.org/wiki/XHTML" title="XHTML" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">XHTML</a>&nbsp;же является приложением&nbsp;<a href="https://ru.wikipedia.org/wiki/XML" title="XML" style="text-decoration: none; color: rgb(11, 0, 128); background-image: none; background-position: initial initial; background-repeat: initial initial;">XML</a>.</p>', '', '', 1, '', '', '2013-10-22', '', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `cat`) VALUES
(1, 'Нотатки'),
(2, 'Записи');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `article` int(5) NOT NULL DEFAULT '-1',
  `news` int(5) NOT NULL DEFAULT '-1',
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hide` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_id` int(5) NOT NULL,
  `re_log_id` int(5) NOT NULL,
  `re_com_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

-- --------------------------------------------------------

--
-- Структура таблицы `comments_settings`
--

CREATE TABLE IF NOT EXISTS `comments_settings` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sum` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `comments_settings`
--

INSERT INTO `comments_settings` (`id`, `img`, `sum`) VALUES
(1, 'img/capcha/sum.gif', 3),
(3, 'img/capcha/4_1.png', 4),
(4, 'img/capcha/4_2.png', 4),
(5, 'img/capcha/5_1.png', 5),
(2, 'img/capcha/5_2.png', 5),
(6, 'img/capcha/5_3.png', 5),
(7, 'img/capcha/5_4.png', 5),
(8, 'img/capcha/6.png', 6),
(9, 'img/capcha/7.png', 7),
(10, 'img/capcha/8.png', 8),
(11, 'img/capcha/9.png', 9),
(12, 'img/capcha/10.png', 10),
(13, 'img/capcha/11.png', 11),
(14, 'img/capcha/12.png', 12),
(15, 'img/capcha/13.png', 13),
(16, 'img/capcha/14.png', 14),
(17, 'img/capcha/15.png', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `css`
--

CREATE TABLE IF NOT EXISTS `css` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `css`
--

INSERT INTO `css` (`id`, `url`, `comment`) VALUES
(1, 'text.css', ''),
(2, 'article.css', ''),
(3, 'content.css', ''),
(4, 'pstrnav.css', ''),
(5, 'form.css', ''),
(6, 'modal.css', ''),
(7, 'style.css', ''),
(8, 'navigator.css', '');

-- --------------------------------------------------------

--
-- Структура таблицы `enter_hist`
--

CREATE TABLE IF NOT EXISTS `enter_hist` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `enter` int(2) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cookie` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=437 ;

--
-- Дамп данных таблицы `enter_hist`
--

INSERT INTO `enter_hist` (`id`, `login`, `pass`, `ip`, `enter`, `time`, `date`, `page`, `cookie`) VALUES
(401, 'admin', '2EvgQcxOKnpRm9CcRFfuFWQybwJ9sZYRth4vOGk3hsoT91PX6bXJkRbLl5UtfqlNWSJU2I7QhQ7HhSRyQHRDnzSQyf6xm8PzhE76zA21ejXt0YwfsCW6QN7U', '127.0.0.1', 1, '23:28:54', '2013-08-14', 'http://site2.ua/admin_modules.php', 1005000),
(400, 'admin', '1EvoWcyoInQ1DCCCcGvpFH1ioOc9xGrJLftvihmN6F7G97TiSKl57CbRLIWT8YQndSvLwudsNKqoXSMtVGmzynK4mR6gelIHfE5tCacsxVdrkXEEDKFY7j', '127.0.0.1', 1, '21:23:54', '2013-08-14', 'http://site2.ua/admin_design.php', 3600),
(399, 'admin', 'JEvDVc3ynn1yc3C2DaYlFJ0D7al90BJ32OlvSkkAgH8M9kMSwudicQbVvgTSP5FgYS5VU7cK7juKJSE4JMzBTD4DkW6ls3d1PZuLT6VtcubdbitiTdl07t', '127.0.0.1', 1, '19:58:20', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(398, 'denike', 'e33Gp3W533UNpz3t4m8X3CGAB856e8WZI16gKAn1lkBF', '127.0.0.1', 1, '19:16:36', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(397, 'denike', 'A33F13qZo38ZT43ealfn3GPO6hU64Vz8JdLjA59J0hyas32uFBE', '127.0.0.1', 1, '19:16:04', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(396, 'denike', 'h33bo3w8J3yXKM3kN8ld3UCpvTH6TOkf5eGNV3kyzfg0d7B4', '127.0.0.1', 1, '19:15:46', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(395, 'admin', 'rEvgWcs2XnzcHOCEBSGdFZXwyOV94XjqAF9vELqi5AYc92kfzWQnxSb0oBai7hc8YSINU0F7nTNT8SepDNxK3CDNmp6m8huyxMcEhumCPluGZxfzq8x24sTWKpJe7Y', '127.0.0.1', 1, '18:06:20', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(394, 'admin', '2Evx2cPsTnrbzGCReaqVFgQ3LQH9wclEUEpv8X6bWtvY97g7N6FYBVbtB6HXZVbfQSF0NzxE5hQe6SvPr7Xjnjan626EBk04gToRDHDtAHCZwylfI7nzEgUwbROODzOa7V', '127.0.0.1', 1, '18:05:38', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(393, 'admin', 'mEvI6ccqYnNCKaCBkdsmFGwyqkZ97064WANvr2rZLKjQ9TvzyLH8oibToQQBBeJEvS1ZQUj8gaqKwSvsLgnAOpx4tp6RCssuOCiuQAdwpCwtgxyN78', '127.0.0.1', 1, '15:29:52', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(392, 'admin', 'yEvrsc8Jxn8kHfCv1lS5FILp3KA9IBOQvZgvQBhHGDrN90hR99kOyTbDmOQSO5cvDS99cdvLGTO3JSbUo37cl1PeQq6rJjA03i1xaNIgMWFw54H1BJpEDbF7t', '127.0.0.1', 1, '03:49:45', '2013-08-14', 'http://site2.ua/admin_design.php', 3600),
(391, 'admin', 'tEvzZc0FOnzkZgCKPqA1Fhqrmhq9EoWHgM7vqCphvp8V9L7GTO3RIpbcSRw1IDpMZSytCkD55pDuLSh44eKgYnUK3o6Vytp5N9hkilapR4n8vlqdLYVSnaRH19jNxTF7k', '127.0.0.1', 1, '01:49:02', '2013-08-14', 'http://site2.ua/admin_modules.php', 3600),
(390, 'admin', 'T66DF67k16GZJy6Z9QHI6x7HGGR6YTi4TIE6F04w197S6Vv3vdfonf6hrbZa1vDr96T7mZp4AZ92u6dNfhKzTaJ30V6AvzveW36guZhN69AxXvU9n0M3m266PQfDgGcGpfYB6em6YHOyUBT7KL5DQmqA6iyHlGSqH1UWfHMvYj6fUDzm16CJdrm3EwNgA6nfZ3z3Sxv2UE7Ods3mB6CyRuMYi58wu3axorFrmO6Ca4Fb65yKMx5GAT1moKJV6fb', '127.0.0.1', 0, '01:48:55', '2013-08-14', 'http://site2.ua/admin_modules.php', 0),
(389, 'denike', 'g33rD3Mdj3dFAI3X0nwl3uvL7Ub6l8Qx7hQVXheLBOS5aEs2OB0', '127.0.0.1', 1, '01:38:00', '2013-08-14', 'http://site2.ua/', 3600),
(388, 'admin', 'SEvMwcVnZnZw10Cc7W71FKjW2VP9DeNqhoGvAnQEQpi69htI4sP4jYbTta48xLNFOSDMEqW99qTYPS71fNOA3oxN5w6W4EpRnRv3Zx267Z7ar1HGeeJDKe2bf75', '127.0.0.1', 1, '01:28:59', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(387, 'admin', 'iEvzVczLwnLSvZCaojs8FxziURm9GhadHfFvr22W79a791iXORaGVKbpgl0OD4bQbSrXHAzZlNCEoSpDdI3lqWTIcS69suPxZr1xVzoksSgD9FVlp76', '127.0.0.1', 1, '00:11:07', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(386, 'admin', 'IEvsacd49nyruGCiQoUlF5a0ZAx9hXXV2uQvTvMqB6YE96lK6E91cAbKa0X178xPXSXx2zZ6dNhcFStdCFoZUgXIwH6GODZoPvPxSsz78nGZSL8CaR7O', '127.0.0.1', 1, '00:10:42', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(385, 'admin', 'uEvaSczjUnyBiyCw1PHOFAVEYDu9MjPDlr6vdXUW4XH29wgQq6KWGKbFw0iOOkUdfSMUBFvHnUxq7SdJRCjKDLEM0M6ihDY9gK2ffzCcs00PHPMdQ5FYZEL3l0PRmN7w79', '127.0.0.1', 1, '00:01:52', '2013-08-14', 'http://site2.ua/view_a.php?id=65', 3600),
(384, 'admin', 'VEvikcg7lnD6wECMh2m0FCY5saN9Vi3p2TQvbJyWl1D898Gu2tq5LTbPy9RIqPZQrSIADt7WLFWDMSH0fLLy2nqT3d6ffv6muFk7CMJlmn6fA6UOT97Zl0m5ACoowY7c', '127.0.0.1', 1, '23:50:11', '2013-08-13', 'http://site2.ua/view_a.php?id=65', 3600),
(383, 'admin', 'kEvYfcuxlnDfWrCitzDuFGt206QvscWcwhQ9g05xAqDPbbUrBu0NFfSG4WHYV0peOSCMkg13NaUd06dFn5SEnXcBtf7wpBQlEQTHik', '127.0.0.1', 0, '23:49:59', '2013-08-13', 'http://site2.ua/view_a.php?id=65', 0),
(382, 'admin', 'oEvxtcsupnsTaiCaOXuiFqQbPa79hwt7y0dvcwlTeJZt9bCpU4gB4xbm2cfbuYmoHSVVvJS1YUeuSSeZKv4QMGSmrA6PdCMYA4BH323yg3CD8IrHxUl2C1kva6Zpa9kS0y7y', '127.0.0.1', 1, '13:57:41', '2013-08-13', 'http://site2.ua/admin_log.php', 3600),
(381, 'admin', 'pEvGTcdYWnPFj2CicwwIFguYZNe9WONt2HpvuK4PY3iz9lfCQwU6HebW5GJebS8afS0ANAU57xrkuS3TYu8PIZok3D61h4lbsIuhldUupgR5WFbbfleCZp7v', '127.0.0.1', 1, '14:42:47', '2013-08-12', 'http://site2.ua/admin_log.php', 1005000),
(380, 'admin', 'rEv39cnoCnp9HhCVcQAPFw4N2cC9peh7y4dvk6HAxOgr9Bmo0BMiJqbsAMS9JxgwFSuRauHbtBB9dSbUe3wPJqga6P6Iagysj6rDn8EykKFxjFyN6YHQ7b', '127.0.0.1', 1, '13:33:39', '2013-08-12', 'http://site2.ua/admin_log.php', 3600),
(379, 'admin', 'TEvkycTgcnYqVzCjHU7WFurKRx59PHsaLJBv1yj4dQdr96MCYTuM1EbEldf4QzbnTSLjWiNNRhUnVSM5oWLQmC5g1S6POH2cKH6fHVcvsBMcvw3EUJh2sJQsGHdXoMe6AW7X', '127.0.0.1', 1, '12:18:45', '2013-08-12', 'http://site2.ua/', 3600),
(378, 'admin', 'b668P6Sv06oO2g67vHVv6JeRw7w6HL3SM4O63js8zRwF6m1StMyvvX6FB1bxdGqSw6EVDD2nzQLvW60iXWoO0FcqYj6zMwpihntOAKOC66GG6LXzxSJd2Ds6PHfhxCbhNAc6jrA6S7pyWVA8tM5dhH7Z6kmXYrKOPWzQzvCxqq6BH3oZcmUrtAY7jvEnR6ftAgZqYVLzaCrpzScxK6vv82697wMDwsoTTUDQno62toa42pyTt7z7omKLptdv6pe', '127.0.0.1', 0, '12:18:36', '2013-08-12', 'http://site2.ua/', 0),
(377, 'admin', 'NEvDDcVt5n2lJmCVnmRTFlmZ4KI9yRrJZfIv3jo7iq3Q9UPU4brZXJbWLXVOmjeuiSJ42ao5JkZ8fSEr4dr6Z6dj5m6Xr6jej610lg72PJpTFL4QrLVlIEDa3ZjVHSa7O', '127.0.0.1', 1, '02:23:44', '2013-08-12', 'http://site2.ua/contacts.php', 3600),
(376, 'admin', 'q66W16QYk6s4i66ZFXdB6f3i1Qa6IjKOhR76V9DxNa416kbqVvR4mL6bSzsVP7Ztu6nsPniTvZJ5A6g85JRl5tBuPm68ZqhavfEHzJA16YUDcWQ68z2MEwQ6ycS6F9qIOYz4VS16t9BWl87ehZsh3arX6Yedj23LpgrHI4IRhT6ddSvZK6pPEOBr7mGXY6YXi8zUq1eASNHERAAou6Mxtk7eXeRLuwTr50Scb36itQjufmVEi1vD26Yr2M2e6zf', '127.0.0.1', 0, '02:23:34', '2013-08-12', 'http://site2.ua/contacts.php', 0),
(375, 'admin', 'AEvCVcjA5nBvwpCKOHTrFBkTFX09SnJ8pLXvUq4vV7Hf9dgFmwkndfb8suu0b3R7VSlqfMuAnBHCLSUchssavQjY5260oazxCn96of8XM4VTo4ZjOMdb7n', '127.0.0.1', 1, '00:24:04', '2013-08-12', 'http://site2.ua/', 3600),
(374, 'admin', 'zEvTRcnnZnkAbHCmKZHkFa3UNJf9cuz4JvDvqntB07iM95d5DEattmbM0hkWhwpPcSCyXKhVlwl65SHkbfpzlI0kz861fviDOKXg95n8IqsGUHV9Nnft7W', '127.0.0.1', 1, '21:10:57', '2013-08-11', 'http://site2.ua/admin_design.php', 1005000),
(373, 'admin', '4EvxccWumnSU8gCRzH5aFzbfQeH9MCb7P7Qv6PlklG6z9DxwRyiDTrbV3uGrfPmo3S5jvxZ0tGlUUS52gnMzbG4xOO6H5Pak5mnveJBX6B8pjdnb4QaWjFZlb7X', '127.0.0.1', 1, '20:00:29', '2013-08-11', 'http://site2.ua/admin_design.php', 3600),
(372, 'admin', 'sEvNMcrcqnEZf8CQJPLxFGs3I9z95PtwV0XvEvNZTSbK9TDtjNSoT8b4hAzj9fTu5S8nH5GDkFprlSqZIYtcYu1mWo6vEbUXRsXN6nz43Kl9s0t5yXuJsPJHrg5ML9uGzb7U', '127.0.0.1', 1, '17:42:53', '2013-08-11', 'http://site2.ua/admin_modules.php', 3600),
(371, 'admin', 'lEvZjcCdYnXSClClhPfiFyFmoYl90uttVCLvtGa5IZzw9nDMOXZWt9b8qeJUhvE69S9FSmd43Ziw3SwGGNYGK7caRT6Q74fOOP990a3DeoHRFhRfm07p', '127.0.0.1', 1, '13:33:58', '2013-08-11', 'http://site2.ua/admin_friends.php', 3600),
(370, 'admin', 'MEviFc4rBnq7MmCO2mXfFH7cP8X95Q8L0zXv5nAaLbS793g1EM14UQbmqlxFn2jIOS9WC08MzOmTtSoZfQV40FGd1J6M6NVF3YxmfiwzTiC7sullck7P', '127.0.0.1', 1, '13:30:12', '2013-08-11', 'http://site2.ua/admin_friends.php', 3600),
(369, 'admin', 'CEvG5c1B2n8Y3MCShdQlFbrqILw9dCYRUsPvn5FKijW79rMpnCuU8abmYVi2eRS74SaihjDit0kxyStspBpz7FQxEL64rCIdwruAZPr2aQ4hmXitglppsjzf72', '127.0.0.1', 1, '02:24:28', '2013-08-11', 'http://site2.ua/admin_messages.php?from=denike&whom=&mindate=&mintime=&maxdate=&maxtime=&m_btn=%D0%A4%D1%96%D0%BB%D1%8C%D1%82%D1%80%D1%83%D0%B2%D0%B0%D1%82%D0%B8', 1005000),
(368, 'admin', 'GEv74c9vdnuRFWCAtpbRFEoQKYC9d7ISCrJv2MY6zayc9eJ5wz5wOybyy056SnL0ESy8y0lACSpiGS4dj8tAV1sGS26SIO3M9cCX6rXjgJOJS9kEr6zu5lh6eNJwFAIgQ7D', '127.0.0.1', 1, '00:09:57', '2013-08-11', 'http://site2.ua/admin_comments.php?author=denike&mindate=&maxdate=2013-08-24&m_btn=%D0%A4%D1%96%D0%BB%D1%8C%D1%82%D1%80%D1%83%D0%B2%D0%B0%D1%82%D0%B8', 1005000),
(367, 'admin', 'jEvV6ckF9ngD1NC56qkGF8TY4Z79kSHkG0mvjvG87QAx9QJk4J19q3bB4QAngzEanS6Xing5cTgRrSKbvttcQ6Fzuv6aaIFHCEmf6WKOTjOCtet5FEwwgNnC54qyu6fD8S7Q', '127.0.0.1', 1, '23:09:37', '2013-08-10', 'http://site2.ua/view_a.php?id=65', 3600),
(411, 'admin', 'aEv2nc94EniYJ0CnvJmsF1eciqV9Vctm1ZivqhXi5hYl9BPdSZ1qsbbjdaooSx9SeSEzwRbL1iZjdSxjcwEeTeSqCy60BamKOBrNCDRAzTQEmR8SlHp77', '127.0.0.1', 1, '23:11:28', '2013-08-18', 'http://site2.ua/admin_page.php', 1005000),
(412, 'admin', '3EvWec09An4JwMC8kocDFaFnn5C9VMldCDQv44W3gzZI9hdnMd1K3nb73anXKMZRRSqkoHjCl4p8cSDlf0tWFZ2C5L66lWDk5KIDYxWTU6VnDhQ5IKQSpns3N7t', '127.0.0.1', 1, '00:00:30', '2013-08-19', 'http://site2.ua/edit_user.php?id=30', 3600),
(413, 'denike', 'B33O232xU3rQ403OyXFE34h9Gto6JNFeHRnPmNLvdeEpX7BZ', '127.0.0.1', 1, '00:20:24', '2013-08-19', 'http://site2.ua/articles.php', 3600),
(414, 'denike', 'N33PL36ue3bJYi3qcVBZ3ZUIein6cgN99ZU9my7JobBI', '127.0.0.1', 1, '00:24:51', '2013-08-19', 'http://site2.ua/reg.php', 3600),
(415, 'admin', 'jEvEnc6jMnziJCCWcP0QFV9V2Tw9YmfJBgKv5Jhn6WB89gyxscnFabbfjh7cID6L3SKoJBMVWXaHxSAx7QY0GCH2MB6cQDbW7Fmf8DMdWfOqrxFikzN7i', '127.0.0.1', 1, '02:49:15', '2013-08-19', 'http://site2.ua/edit_user.php?id=30', 1005000),
(416, 'admin', 'REv33cUSSn1UVVCbpgrRFPtEgar9o3eB18Xv4w83jgsE9sc7w4rWW3blTaFVzhW2VSapFY190iDs8SLHSKS4WrBPvz6eM8f3TSd9r12UeS4OTtHzyhW5W7P', '127.0.0.1', 1, '14:47:46', '2013-08-19', 'http://site2.ua/edit_user.php?id=30', 1005000),
(417, 'admin', 'rEvgvcE5qns89zCU6fJcFdbKoHG95tFfKxRvaeaiuQP89vwEpUNLEFb9KrWcl43IxSEdw6uMy1iQpS2JPfjx7hTa5t6o3woePdfKQNvpCjsdH7Q23q6rxWQ7e', '127.0.0.1', 1, '00:21:14', '2013-08-21', 'http://site2.ua/', 1005000),
(418, 'admin', '4EvgIcuQ1nXymAC7F4n5FDDNphV9wGPxU4cv1rtykvVH9JRPQmNGEFbL5wraajT3hSNVrDSpnq0g4SWLuP1N9O7iYJ6zyZlgtaniRR29kj5vOzcQ3VSpdSHc9F7V', '127.0.0.1', 1, '01:03:56', '2013-08-21', 'http://site2.ua/gallery.php', 3600),
(419, 'admin', 'kEvVOcIC2n1CGPCpJe8CFT0MjjK92bfBVdUvgvqwNMLi9ir9nsvyDMbfDExytkqrOSZeCOD1u6qTOSjFw8nA7T74qS6KdfYdGPx3uv3JrqCrjZEomAe1zb7K', '127.0.0.1', 1, '03:48:41', '2013-08-21', 'http://site2.ua/gallery.php', 1005000),
(420, 'admin', 'EEvAncswLn0HAXCqUZQ8F4ho1Sg9uakNlQrvJzkBZZih9mjNqWfNklbCLlSpbAIAESg0WMFmdW2x6SzeBvA87zfBgz6hAjCnmFHHA4su25HLapA97KxUpFe7Y', '127.0.0.1', 1, '00:04:52', '2013-08-22', 'http://site2.ua/gallery.php', 1005000),
(421, 'admin', 'rEvTpcgk7nD6YICa3icSFI5pwpA9Huxac6pvvVw62SNb99l84xRkyfb9Mf62rd31HSIRTuIyBHCjxSkqk1Hx1fzvsR6mRMyVjW9acZpdPOzbX0pUduOBv8DK7P1rnLa7U', '127.0.0.1', 1, '14:31:24', '2013-08-22', 'http://site2.ua/gallery.php', 1005000),
(422, 'denike', 'w33Kx3lHS3E72e3GwKj63yLcWar6WeQNOjGUptmA91P0TBE', '127.0.0.1', 1, '16:24:41', '2013-08-23', 'http://site2.ua/gallery.php', 3600),
(423, 'admin', 'rEv99ckBfnH82HCUHBM1FiTAhVQ9SXvcTIlv0bdP6Mjd9upJyPe9FQbwo4A8y207nSs1qRvGzvd6hSUTNP3CVMeq256IOTFxO7ajy7qzwot1lIJAv7M9uamP1H7U', '127.0.0.1', 1, '16:24:48', '2013-08-23', 'http://site2.ua/gallery.php', 3600),
(424, 'denike', 'p33d53mrJ30EYL3NRh143lvp43Y6jz713DmbHcb7o877dPBn', '127.0.0.1', 1, '16:22:12', '2013-08-24', 'http://site2.ua/gallery.php', 3600),
(425, 'denike', '633YE3deX3GURi35zOvl3cW8kJA6S2Sj6dgrBG7KDXqJkB7', '127.0.0.1', 1, '17:41:53', '2013-08-24', 'http://site2.ua/view_a.php?id=65', 1005000),
(410, 'admin', 'DEvOoc5Znn2MTRC6QOiWFySaojW9Y3k471tvD2kSOMD89A0KzhRXiubqmPcOZtnOtSm0AgvNuUFACSmphqwqDGek3C6Fa2zSc5xeCAaZPZzmHaWNI887f', '127.0.0.1', 1, '19:30:42', '2013-08-18', 'http://site2.ua/articles.php', 3600),
(409, 'admin', 'IEv45c2pxnJHmLC5ePjjFsgnFJt9c258AwDvI3ocJkxG9R8LoHOvM7b6fpVZpCVJMSX4XeMtgSEl1SBWASEVyieiRc6FWRhZinpDFm1AnkZ1LxXacv6riq5DNZYOF7f', '127.0.0.1', 1, '07:14:35', '2013-08-18', 'http://site2.ua/index.php', 1005000),
(408, 'admin', 'sEvGNw9e4n9Ou3CnvbIQFlxjC4y9itfw6sgvzpQRyh819uHwek1kbmbKtlkmUiE7PSdLb8E1jWG7OSdV97lIS2XNFZ6ij1idknOvpazlgyPQeuROTO8pgZjl87z', '127.0.0.1', 0, '07:14:19', '2013-08-18', 'http://site2.ua/index.php', 0),
(407, 'admin', 'yEvFdcWlnn3SZ1C1iN4hF18j8tq96sEslW6vuIIorW2X9u8OB9Nf0jb8n9iN5WcXgSZEdeqPjVLRUSj1s0ryPEI7126sLB6RClSVOMOFNQox83W7w', '127.0.0.1', 1, '22:01:34', '2013-08-17', 'http://site2.ua/user_info.php?id=1', 1005000),
(406, 'admin', '6Evlocdy1nxRsACFbEVyF0w2oWS9gaN3qIBvtBrW8S2i9Sg2x8LjCAbuHzzIm0fx9S6vX694YGpr6SHD9UhqtyjCne6HswOwjITItTQFfAsv1oqBlDx8vY97gOi7cW77e', '127.0.0.1', 1, '22:00:47', '2013-08-17', 'http://site2.ua/user_info.php?id=1', 1005000),
(405, 'admin', 'UEv5VcKk6nzdaIC6nXmVFZREWcY9rQE3BtEvPQxEKYur9s8YtHFj5Hb05NXpI8LTxSdG8g4YUHLn8SQI65L1MUbn8P6nln9cR5E1KVT5QEp6aeHm9MNBWVA7M', '127.0.0.1', 1, '18:30:32', '2013-08-17', 'http://site2.ua/articles.php', 1005000),
(402, '', 'w6c3WiztLaO', '127.0.0.1', 0, '18:35:33', '2013-08-15', 'http://site2.ua/', 0),
(403, '', 'B6STXHL3Wag', '127.0.0.1', 0, '18:49:08', '2013-08-15', 'http://site2.ua/', 0),
(404, '', 'A6aA6UTNOao', '127.0.0.1', 0, '14:49:26', '2013-08-17', 'http://site2.ua/', 0),
(426, 'admin', 'tEvkacZPcnqnAACcqDC2FINlmxc9eprkuQkvw1IeGKQ095kgUfw5KsblRobfCEwWfSmTQZ5Wpx9yyS7Nd29CYOLrbH6nDdApkdPEgk1FwzmVGQWMw7k', '127.0.0.1', 1, '08:17:29', '2013-10-07', 'http://locado.net/articles.php', 1005000),
(427, 'admin', 'wEvf3csD3njLwNCYnL36FtO1oe59sdizamEvGzIy1kkD9TVSwUd8sUbdSUFjrPYazS4gme9u3MnMSSEbQQSsX4SONa637f0HDjuGWLRyZycVZbe77', '127.0.0.1', 1, '15:38:49', '2013-10-13', 'http://locado.net/', 1005000),
(428, 'admin', 'yEvErc78fn7H1HCqtFHHFRkxttL903NKQvyvhEmMlty89Fd1AbMTKQbvxDhMbpmlcS7PzWqL2KxzwSwq7ZHFu6MnHJ64NbWPW70zji097bTqcUkn9iYzZZBsa7I', '127.0.0.1', 1, '19:45:38', '2013-10-31', 'http://locado.net/', 3600),
(429, 'admin', 'mEveHcuDdngCPkCuwrobFvRqrzk9NrHVSdIvZYVAjkxi9Zfap5e4sTbCxr8qT0JY2SqwIxgLL2XMaSz9jOGnDSLnnH6AiTRKN61LXw9mSRmlNfokzxRkb7x', '127.0.0.1', 1, '19:19:33', '2013-11-12', 'http://locado.net/view_a.php?id=11', 3600),
(430, 'admin', 'iEvg3cpUpnb5nNCuXCTFFJ9UU2O9a092HWwvk9Z0SwhS9mXTGIDnNkbQSowL2wRWYSy5GzFWQjCRSSoXAEQ6QxYAaR6lbwQCRGwsTf6FyZCLvxDjFT74', '127.0.0.1', 1, '01:16:37', '2013-11-13', 'http://locado.net/articles', 1005000),
(431, 'admin', 'gEvknc7tcndeYsCxosg2FuDNA2s9vk2Sg42vC1eNymYh9zXb8XbySRbiEZvDK45vdSnVTkIHu6NZnSIbLM7gfcNEU666tFF3cTDL8cJ3LOmPzxSCbWn7yk7f', '127.0.0.1', 1, '15:43:45', '2013-11-24', 'http://locado.net/articles', 1005000),
(432, 'admin', 'zEvXQcXhOnAnbqCYAnEmFBNTWpg9UB7OYV3viGUniDcY9MlcKxxwqnbsk2NEXo5cGSk1ucCzAQQqfSBn8ROhXguZej6R6fUWw9YsFKNcsLh9Shxf7U', '127.0.0.1', 1, '22:33:01', '2013-12-09', 'http://locado.net/', 1005000),
(433, 'admin', 'YEv3Pc1Yrnl2RjCjsxEHFVnbsOA9U0GsmNpvwAmgHyBt9XcPovM9AcbqAcNM177vDSR6pX1ByAHrZSKpiyDFLU2OTD6xcUPjhD8eBnZV6FqoQhe7B', '127.0.0.1', 1, '22:34:40', '2013-12-09', 'http://locado.net/', 1005000),
(434, 'admin', 'cEvEUcOtSnY9dFCTfUF2FXO11zn9pDyCc94vMIEvsVFj9AKWuXFNhdbSaZXCTMf2WSxvc4Ol0691VSWO08GeRFMXQv6c1jh954z7bZVAwPdV3OVdx3FBIx1HFI6WpEh8j77', '127.0.0.1', 1, '02:24:05', '2013-12-26', 'http://locado.net/contacts', 1005000),
(435, 'admin', 'GEvLQc5rBnEB4BCxfXcTFUbRzmG902yQZtavCbTZZcSJ9HLlv5Gr0ubqZdBp7tuq2SvROxpCwHqSsSHrHJeeFVLhIO6rGaFHnJ0LzNEDVppVaB4kS0g5xSec3vxS7v', '127.0.0.1', 1, '23:50:33', '2014-01-24', 'http://locado.net/', 3600),
(436, 'admin', '8EvH8cnBhnYL8bCVig4zFYEmksj9JfiOuHivIDa4SGHb9ayDJzdvOWbMgnCqzQBSySNaGufmJfLyhSaiaXY7HhR1Gg6eu3os2OwZkGweiIMBWMGe7I', '127.0.0.1', 1, '12:52:34', '2014-03-21', 'http://locado.net/', 1005000);

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id`, `url`, `title`) VALUES
(1, 'http://locado.net/', 'Головна');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `prview` varchar(255) NOT NULL DEFAULT 'gallery/desault.png',
  `urlfull` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `views` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `prview`, `urlfull`, `title`, `views`) VALUES
(1, 'img/gallery/pre/sport.jpg', 'img/gallery/sport.jpg', 'Sport', 0),
(2, 'img/gallery/image010.jpg', 'img/gallery/big/image01.png', 'Sport', 0),
(43, 'img/gallery/image020.jpg', 'img/gallery/big/image02.png', 'Sport', 0),
(44, 'img/gallery/image030.jpg', 'img/gallery/big/image03.png', 'Sport', 0),
(45, 'img/gallery/image040.jpg', 'img/gallery/big/image04.png', 'Sport', 0),
(46, 'img/gallery/image050.jpg', 'img/gallery/big/image05.png', 'Sport', 0),
(47, 'img/gallery/image060.jpg', 'img/gallery/big/image06.jpg', 'Sport', 0),
(48, 'img/gallery/image070.jpg', 'img/gallery/big/image07.jpg', 'Sport', 0),
(49, 'img/gallery/image080.jpg', 'img/gallery/big/image08.jpg', 'Sport', 0),
(50, 'img/gallery/image090.jpg', 'img/gallery/big/image09.jpg', 'Sport', 0),
(51, 'img/gallery/image100.jpg', 'img/gallery/big/image10.jpg', 'Sport', 0),
(52, 'img/gallery/image110.jpg', 'img/gallery/big/image11.jpg', 'Sport', 0),
(53, 'img/gallery/image120.jpg', 'img/gallery/big/image12.jpg', 'Sport', 0),
(54, 'img/gallery/image130.jpg', 'img/gallery/big/image13.jpg', 'Sport', 0),
(55, 'img/gallery/image140.jpg', 'img/gallery/big/image14.jpg', 'Sport', 0),
(57, 'img/gallery/image020.jpg', 'img/gallery/big/image02.png', 'Графіті', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `js`
--

CREATE TABLE IF NOT EXISTS `js` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `js`
--

INSERT INTO `js` (`id`, `url`, `comment`) VALUES
(1, 'lib/JsHttpRequest/JsHttpRequest.js', ''),
(2, 'js.js', ''),
(3, 'js/scripts.js', ''),
(4, 'js/rank.js', ''),
(5, 'js/login.js', ''),
(6, 'js/article.js', ''),
(7, 'js/comments.js', ''),
(8, 'js/r_page.js', ''),
(9, 'js/page.js', ''),
(10, 'js/logs.js', ''),
(11, 'js/design.js', ''),
(12, 'js/module.js', ''),
(13, 'js/seo.js', ''),
(14, 'js/gallery.js', '');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ua` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `ua`, `ru`, `en`) VALUES
(1, 'Адміністраторська панель', '', ''),
(2, 'Дозволити показ/приховати', '', ''),
(3, 'Редагувати', '', ''),
(4, 'Видалити', '', ''),
(5, 'Додано', '', ''),
(6, 'Додав', '', ''),
(7, 'Перегляди', '', ''),
(8, 'Помилка! Ви звернулися не за адресою!', '', ''),
(9, 'Сторінки не існує!', '', ''),
(10, 'Оцінка', '', ''),
(11, 'Категорія', '', ''),
(12, 'Коментарі', '', ''),
(13, '-відсутня-', '', ''),
(14, 'Статті відсутні!', '', ''),
(15, 'Головна', '', ''),
(16, 'Статті', '', ''),
(17, 'Реєстрація', '', ''),
(18, 'Зворотній зв''язок', '', ''),
(19, 'Додати статтю', '', ''),
(20, 'Список повідомлень', '', ''),
(21, 'Надіслати листа', '', ''),
(22, 'Список користувачів', '', ''),
(23, 'Інформація про користувача', '', ''),
(24, 'Пошуковий запит', '', ''),
(25, 'Кабінет користувача', '', ''),
(26, 'Нагадати пароль', '', ''),
(27, 'Введіть пошуковий запит', '', ''),
(28, 'Найпопулярніші статті', '', ''),
(29, 'Шукати', '', ''),
(30, 'Введіть e-mail...', '', ''),
(31, 'Введіть пошуковий запит', '', ''),
(32, 'Надіслати', '', ''),
(33, 'пароль', '', ''),
(34, 'Ваш логін', '', ''),
(35, 'Повідомлення успішно відправлено!', '', ''),
(36, 'Користувач з таким e-mail не зареєстрований!', '', ''),
(37, 'Логін', '', ''),
(38, 'Пароль', '', ''),
(39, 'Повторіть пароль', '', ''),
(40, 'Ваш e-mail', '', ''),
(41, 'Повне ім''я', '', ''),
(42, 'Місто', '', ''),
(43, 'Дата народження', '', ''),
(44, 'Стать', '', ''),
(45, 'чоловік', '', ''),
(46, 'жінка', '', ''),
(47, 'Зареєструватися', '', ''),
(48, 'Помилка: Ви ввели не всю інформацію!', '', ''),
(49, 'Помилка: паролі не співпадають!', '', ''),
(50, 'Ви успішно зареєструвались!', '', ''),
(51, 'Помилка: користувач з логіном ', '', ''),
(52, ' вже існує!', '', ''),
(53, 'Повернутись назад', '', ''),
(54, 'Ваше повідомлення успішно надіслано!', '', ''),
(55, 'Помилка: Ваше повідомлення не може бути надіслано!', '', ''),
(56, 'Ви не Марк Аврелій - непотрібно собі надсилати листи!', '', ''),
(57, 'ПОМИЛКА! Ви заблоковані!', '', ''),
(58, 'ПОМИЛКА! У Вас немає достатньо прав!', '', ''),
(59, 'Кому', '', ''),
(60, 'Тема', '', ''),
(61, 'Введіть текст повідомлення...', '', ''),
(62, 'ПОМИЛКА! Ви не увішли у свій аккаунт, тому не можете переглядати дану сторінку!', '', ''),
(63, 'ПОМИЛКА! Повідомлення не існує!', '', ''),
(64, 'Час', '', ''),
(65, 'Тема повідомлення', '', ''),
(66, 'Текст повідомлення', '', ''),
(67, 'Повідомлень немає!', '', ''),
(68, 'Останні новини', '', ''),
(69, 'Останні статті', '', ''),
(70, 'Рейтинг', '', ''),
(71, 'Ви невірно ввели логін або пароль!', '', ''),
(72, 'Заголовок статті не може бути коротше 6 символів', '', ''),
(73, 'Заголовок статті не може бути довше 255 символів', '', ''),
(74, 'Об''єм мета-тегів не може бути довше 255 символів', '', ''),
(75, 'Об''єм мета-опису статті не може бути довше 255 символів', '', ''),
(76, 'Опис статті не може бути коротше 50 символів', '', ''),
(77, 'Опис статті не може бути довше 5000 символів', '', ''),
(78, 'Текст статті не може бути коротше 50 символів', '', ''),
(79, 'Текст статті не може бути довше 65530 символів', '', ''),
(80, 'Додати сайт в закладки', '', ''),
(81, 'Натисність Ctrl-D для додавання сторінки в закладки', '', ''),
(82, 'Коментарі до статті', '', ''),
(83, 'Коментар додав', '', ''),
(84, 'Дата', '', ''),
(85, 'До цієї статті коментарі відсутні...', '', ''),
(86, 'Додати коментар', '', ''),
(87, 'Ім''я', '', ''),
(88, 'Ви заблоковані, тому не можете додати коментар!', '', ''),
(89, 'Текст коментаря', '', ''),
(90, 'Залишити коментар', '', ''),
(91, 'Помилка при додаванні статті!', '', ''),
(92, 'Стаття успішно додана!', '', ''),
(93, 'Стаття успішно додана і відправлена на модерацію!', '', ''),
(94, 'Категорії', '', ''),
(95, 'Форма входу', '', ''),
(96, 'Пошук', '', ''),
(97, 'Вхід', '', ''),
(98, 'Запам''ятати', '', ''),
(99, 'чоловіча', '', ''),
(100, 'жіноча', '', ''),
(101, 'IP', '', ''),
(102, 'Мій кабінет', '', ''),
(103, 'Місто', '', ''),
(104, 'День народження', '', ''),
(105, 'Група', '', ''),
(106, ' користувачів', '', ''),
(107, ' та ', '', ''),
(108, 'На сайті', '', ''),
(109, 'Статистика сайту', '', ''),
(110, 'Канал новин сайту ', '', ''),
(111, 'Панель керування', '', ''),
(112, 'Модулі', '', ''),
(113, 'Редагувати модуль', '', ''),
(114, 'Дизайн', '', ''),
(115, 'Корегувати дані користувача', '', ''),
(116, 'Конструктор горизонтального меню', '', ''),
(117, 'Конструктор вертикального меню', '', ''),
(118, 'Архів коментарів', '', ''),
(119, 'Архів повідомлень', '', ''),
(120, 'Заблоковані IP', '', ''),
(121, 'Архів входів', '', ''),
(122, 'Рекомендовані сайти', '', ''),
(123, 'Керування сторінками', '', ''),
(124, 'Додавання сторінок', '', ''),
(125, 'Редагування сторінок', '', ''),
(126, 'Керування статтями', '', ''),
(127, 'Категорії', '', ''),
(128, 'Гостьова книга', '', ''),
(129, 'Редагувати запис', '', ''),
(130, 'Керування новинами', '', ''),
(131, 'Додагувати новину', '', ''),
(132, 'Додати новину', '', ''),
(133, 'Список користувачів', '', ''),
(134, 'Додавання статей', '', ''),
(135, 'Редагування статей', '', ''),
(136, 'Помилка при редагуванні статті!', '', ''),
(137, 'Стаття успішно змінена!', '', ''),
(138, 'Ви не маєте права редагувати статті', '', ''),
(139, 'Ви не увійшли у свій аккаунт!', '', ''),
(140, 'Число переглядів має бути натуральним числом', '', ''),
(141, 'Книги', '', ''),
(142, 'Редагувати книги', '', ''),
(143, 'Додати книгу', '', ''),
(144, 'Музика', '', ''),
(145, 'Редагувати музику', '', ''),
(146, 'Додати музику', '', ''),
(147, 'Магазин', '', ''),
(148, 'Редагувати товар', '', ''),
(149, 'Додати товар', '', ''),
(150, 'Новини', '', ''),
(151, 'Публікації', '', ''),
(152, 'Редагувати публікації', '', ''),
(153, 'Додати публікацію', '', ''),
(154, 'Відео', '', ''),
(155, 'Редагувати відео', '', ''),
(156, 'Додати відео', '', ''),
(157, 'Блог', '', ''),
(158, 'Редагувати запис', '', ''),
(159, 'Додати запис', '', ''),
(160, 'Біографії', '', ''),
(161, 'Редагування біографії', '', ''),
(162, 'Додати біографію', '', ''),
(163, 'Галерея', '', ''),
(164, 'Редагувати дані зображення', '', ''),
(165, 'Додати зображення', '', ''),
(166, 'Каталог сайтів', '', ''),
(167, 'Редагувати дані сайту', '', ''),
(168, 'Додати сайт в каталог', '', ''),
(169, 'Каталог файлів', '', ''),
(170, 'Редагувати дані файлу', '', ''),
(171, 'Додати файл', '', ''),
(172, 'Дошка оголошень', '', ''),
(173, 'Редагувати оголошення', '', ''),
(174, 'Додати оголошення', '', ''),
(175, 'Керування чатом', '', ''),
(176, 'Опитування', '', ''),
(177, 'Друзі сайту', '', ''),
(178, 'гостей', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `whom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `new` int(2) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `from`, `whom`, `title`, `mail`, `new`, `time`, `del`) VALUES
(1, 'admin', 'denike', 'Hi!', 'Hello, world!', 0, '2013-03-18 08:38:14', 1),
(2, 'admin', 'denike', 'Hi 2', 'Hello, world!', 0, '2013-03-18 08:38:14', 1),
(3, 'admin', 'denike', 'Hello!', 'Hello, world! This is supersite!', 0, '2013-03-19 10:55:28', 1),
(8, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(5, 'denike', 'denike', 'dsfsd', 'dsffd', 0, '2013-03-19 11:11:11', 1),
(6, 'denike', 'denike', '123', '123', 0, '2013-03-19 20:22:17', 1),
(7, 'denike', 'admin', 'dsf', 'dsffds', 0, '2013-03-20 08:27:42', 0),
(9, 'admin', 'denike', 'Лист1', 'Привіт!', 0, '2013-03-28 16:27:43', 1),
(10, 'admin', 'denike', 'jkhjlkxjvkhgdfjlk', 'jlkkghgjfjk', 1, '2013-05-17 06:12:58', 0),
(11, 'admin', 'denike', 'fdsfsdfsdfsdfsd', 'fsdfsdfsdfsdfsdffsd', 0, '2013-06-26 17:30:15', 1),
(12, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(13, 'denike', 'admin', '1212', '12121', 1, '2013-03-27 07:37:17', 1),
(14, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(15, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(16, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(17, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(18, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(19, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(20, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(21, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(22, 'denike', 'admin', '1212', '12121', 0, '2013-03-27 07:37:17', 0),
(23, 'denike', 'admin', '1212', '12121', 0, '0000-00-00 00:00:00', 0),
(24, 'denike', 'admin', '1212', '12121', 0, '2013-08-09 06:40:42', 0),
(25, 'denike', 'admin', 'Навички', 'Навички роботи з комп''ютером: володію навичками роботи з MS Office, Photoshop, Total Commander, а також інших прикладних програм; знаю, як встановлювати ОС, прикладні програми, звільнювати засмічену пам''ять; вмію професійно здійснювати пошук в Інтернеті, перевіряти текст на унікальність, здійснювати оптимізацію статей та сайтів відповідно до вимог "добре поданої інформації" за визначенням пошуковиків, розкручувати сайти; вмію валідно верстати сайт за допомогою HTML та CSS, використовувати JQuery, створювати динамічні веб-сайти та прикладні програми; досконало володію такими мовами програмування як Delphi, Pascal, PHP, а також маю навички роботи з C#, C++, JavaScript, Basic; маю досвід роботи з базами даних MySQL, а також вмію створювати криптографічні алгоритми для захисту даних;', 0, '2013-08-09 06:40:42', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `views` int(7) NOT NULL,
  `text` text NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `views`, `text`, `meta_k`, `meta_d`) VALUES
(1, 'Science', '31.02.13', 41, 'Science (from Latin scientia, meaning "knowledge") is a systematic enterprise that builds and organizes knowledge in the form of testable explanations and predictions about the universe.[1][2] In an older and closely related meaning, "science" also refers to a body of knowledge itself, of the type that can be rationally explained and reliably applied. Since classical antiquity, science as a type of knowledge has been closely linked to philosophy. In the early modern period the words "science" and "philosophy" were sometimes used interchangeably.[3] By the 17th century, natural philosophy (which is today called "natural science") was considered a separate branch of philosophy.[4] However, "science" continued to be used in a broad sense denoting reliable knowledge about a topic, in the same way it is still used in modern terms such as library science or political science.\r\nIn modern use, "science" more often refers to a way of pursuing knowledge, not only the knowledge itself. It is "often treated as synonymous with ''natural and physical science'', and thus restricted to those branches of study that relate to the phenomena of the material universe and their laws, sometimes with implied exclusion of pure mathematics. This is now the dominant sense in ordinary use."[5] This narrower sense of "science" developed as scientists such as Johannes Kepler, Galileo Galilei and Isaac Newton began formulating laws of nature such as Newton''s laws of motion. In this period it became more common to refer to natural philosophy as "natural science". Over the course of the 19th century, the word "science" became increasingly associated with the scientific method, a disciplined way to study the natural world, including physics, chemistry, geology and biology. It is in the 19th century also that the term scientist was created by the naturalist-theologian William Whewell to distinguish those who sought knowledge on nature from those who sought knowledge on other disciplines. The Oxford English Dictionary dates the origin of the word "scientist" to 1834. This sometimes left the study of human thought and society in a linguistic limbo, which was resolved by classifying these areas of academic study as social science. Similarly, several other major areas of disciplined study and knowledge exist today under the general rubric of "science", such as formal science and applied science.', '', ''),
(2, 'Mathematics', '31.02.13', 13, 'Mathematics (from Greek μάθημα máthēma, "knowledge, study, learning") is the abstract study of topics encompassing quantity,[2] structure,[3] space,[2] change,[4][5] and other properties;[6] it has no generally accepted definition.[7][8] Mathematicians seek out patterns[9][10] and formulate new conjectures. Mathematicians resolve the truth or falsity of conjectures by mathematical proof. When mathematical structures are good models of real phenomena, then mathematical reasoning can provide insight or predictions about nature.\r\nThrough the use of abstraction and logical reasoning, mathematics developed from counting, calculation, measurement, and the systematic study of the shapes and motions of physical objects. Practical mathematics has been a human activity for as far back as written records exist. The research required to solve mathematical problems can take years or even centuries of sustained inquiry. Rigorous arguments first appeared in Greek mathematics, most notably in Euclid''s Elements. Since the pioneering work of Giuseppe Peano (1858–1932), David Hilbert (1862–1943), and others on axiomatic systems in the late 19th century, it has become customary to view mathematical research as establishing truth by rigorous deduction from appropriately chosen axioms and definitions. Mathematics developed at a relatively slow pace until the Renaissance, when mathematical innovations interacting with new scientific discoveries led to a rapid increase in the rate of mathematical discovery that has continued to the present day.[11]\r\nGalileo Galilei (1564–1642) said, "The universe cannot be read until we have learned the language and become familiar with the characters in which it is written. It is written in mathematical language, and the letters are triangles, circles and other geometrical figures, without which means it is humanly impossible to comprehend a single word. Without these, one is wandering about in a dark labyrinth."[12] Carl Friedrich Gauss (1777–1855) referred to mathematics as "the Queen of the Sciences."[13] Benjamin Peirce (1809–1880) called mathematics "the science that draws necessary conclusions."[14] David Hilbert said of mathematics: "We are not speaking here of arbitrariness in any sense. Mathematics is not like a game whose tasks are determined by arbitrarily stipulated rules. Rather, it is a conceptual system possessing internal necessity that can only be so and by no means otherwise."[15] Albert Einstein (1879–1955) stated that "as far as the laws of mathematics refer to reality, they are not certain; and as far as they are certain, they do not refer to reality."[16] French mathematician Claire Voisin states "There is creative drive in mathematics, it''s all about movement trying to express itself." [17]\r\nMathematics is used throughout the world as an essential tool in many fields, including natural science, engineering, medicine, and the social sciences. Applied mathematics, the branch of mathematics concerned with application of mathematical knowledge to other fields, inspires and makes use of new mathematical discoveries, which has led to the development of entirely new mathematical disciplines, such as statistics and game theory. Mathematicians also engage in pure mathematics, or mathematics for its own sake, without having any application in mind. There is no clear line separating pure and applied mathematics, and practical applications for what began as pure mathematics are often discovered.[18]', '', ''),
(3, '5tt435t', '2013-06-25 05:06:11', 107, '345t34tertrevrev в 345t34tertrevrev345t34tertr evrev345t34tert revrev345t34tertr evrev345t34tertrevrev 345t34tertrevrev 345t3df4tertrevrev 345t34tertrevrev345t34tertre vrev345t34tertrevrev345t34 tertrev rev345t34 tertrevrev345t34te rtrevrev345t34tertrevrev345 t34tertrevrev345t3 4tertrevrev345t34ter trevrev345t34tertrevr ev345t34tertrevrev345 t34tertrevrev345t3 4tertrevrev345t34t ertrevrev345t34tertr evrev345t34terвыаываtrevrev', '', ''),
(4, '34354353', '2013-06-26 05:08:58', 2, 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  `host` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `online`
--

INSERT INTO `online` (`time`, `ip`, `host`) VALUES
('2014-06-11 17:32:45', '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `preg`
--

CREATE TABLE IF NOT EXISTS `preg` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `right` int(2) NOT NULL DEFAULT '1',
  `show` int(2) NOT NULL DEFAULT '1',
  `check` int(2) NOT NULL DEFAULT '1',
  `desk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=189 ;

--
-- Дамп данных таблицы `preg`
--

INSERT INTO `preg` (`id`, `word`, `file`, `right`, `show`, `check`, `desk`) VALUES
(1, '$TITLE$', 'blocks/title.php', 1, 1, 0, ''),
(2, '$CONTENT$', 'blocks/content.php', 1, 0, 0, ''),
(3, '$DB$', 'blocks/db.php', 1, 0, 0, ''),
(4, '$LOGIN$', 'blocks/login.php', 1, 1, 0, ''),
(5, '$MY_PAGE$', 'blocks/my_page.php', 1, 1, 0, ''),
(6, '$HMENU$', 'blocks/hmenu.php', 1, 1, 0, ''),
(7, '$WRONG_LOGIN$', 'blocks/wrong_login.php', 1, 1, 0, ''),
(8, '$VMENU$', 'blocks/vmenu.php', 1, 1, 0, ''),
(9, '$LOG$', 'blocks/log.php', 1, 1, 0, ''),
(10, '$COPYRIGHT$', 'blocks/copyright.php', 1, 1, 0, ''),
(11, '$VIEW_UP$', 'blocks/view_up.php', 1, 1, 0, ''),
(12, '$VIEW_A$', 'blocks/view_a.php', 1, 1, 0, ''),
(13, '$REG$', 'blocks/reg.php', 1, 1, 0, ''),
(14, '$EDIT_A$', 'blocks/edit_a.php', 1, 1, 0, ''),
(15, '$CONTACTS$', 'blocks/contacts.php', 1, 1, 0, ''),
(16, '$ARTICLES_ADMIN$', 'blocks/articles_admin.php', 1, 1, 0, ''),
(17, '$CABINET$', 'blocks/cabinet.php', 1, 1, 0, ''),
(18, '$USERLIST$', 'blocks/userlist.php', 1, 1, 0, ''),
(19, '$MAIL$', 'blocks/mail.php', 1, 1, 0, ''),
(20, '$MAILTO$', 'blocks/mailto.php', 1, 1, 0, ''),
(21, '$USER_INFO$', 'blocks/user_info.php', 1, 1, 0, ''),
(22, '$SEARCH_BLOCK$', 'blocks/search_block.php', 1, 1, 0, ''),
(23, '$SEARCH_VIEW$', 'blocks/search_view.php', 1, 1, 0, ''),
(24, '$COMMENTS$', 'blocks/comments.php', 1, 1, 0, ''),
(25, '$EDIT_PAGE$', 'blocks/edit_page.php', 1, 1, 0, ''),
(26, '$ENTER_HIST$', 'blocks/enter_hist.php', 1, 1, 0, ''),
(27, '$POPULAR$', 'blocks/popular.php', 1, 1, 0, ''),
(28, '$BAN$', 'blocks/ban.php', 1, 1, 0, ''),
(29, '$SETTINGS$', 'blocks/settings.php', 1, 1, 0, ''),
(30, '$ADD_A$', 'blocks/add_a.php', 1, 1, 0, ''),
(31, '$ARTICLES$', 'blocks/articles.php', 1, 1, 0, ''),
(32, '$ADD_PAGE$', 'blocks/add_page.php', 1, 1, 0, ''),
(33, '$PREG_LIST$', 'blocks/preg_list.php', 1, 1, 0, ''),
(34, '$META_D$', 'blocks/meta_d.php', 1, 1, 0, ''),
(35, '$META_K$', 'blocks/meta_k.php', 1, 1, 0, ''),
(36, '$BADBR$', 'blocks/badbr.php', 1, 1, 0, ''),
(37, '$UP$', 'blocks/up.php', 0, 0, 0, ''),
(38, '$DOWN$', 'blocks/down.php', 0, 0, 1, ''),
(39, '$HEAD$', 'blocks/head.php', 0, 0, 1, ''),
(40, '$CSS$', 'blocks/css.php', 1, 1, 0, ''),
(41, '$GALLERY$', 'blocks/gallery.php', 1, 1, 0, ''),
(42, '$ADMIN$', 'blocks/admin.php', 1, 1, 0, ''),
(43, '$REMIND$', 'blocks/remind.php', 1, 1, 0, ''),
(44, '$CAT$', 'blocks/cat.php', 1, 1, 0, ''),
(45, '$A_CAT$', 'blocks/a_cat.php', 1, 1, 0, ''),
(46, '$LOST_A$', 'blocks/lost_a.php', 1, 1, 0, ''),
(47, '$LOST_N$', 'blocks/lost_n.php', 1, 1, 0, ''),
(48, '$FUNCTIONS$', 'blocks/functions.php', 0, 0, 0, ''),
(49, '$RANK$', 'blocks/rank.php', 0, 0, 0, ''),
(50, '$AO$', 'blocks/ao.php', 1, 0, 1, ''),
(51, '$MO$', 'blocks/mo.php', 1, 0, 1, ''),
(52, '$PO$', 'blocks/po.php', 1, 0, 1, ''),
(53, '$KO$', 'blocks/ko.php', 1, 0, 1, ''),
(54, '$LO$', 'blocks/lo.php', 1, 0, 1, ''),
(55, '$FO$', 'blocks/fo.php', 1, 0, 1, ''),
(56, '$UO$', 'blocks/uo.php', 1, 0, 1, ''),
(57, '$SO$', 'blocks/so.php', 1, 0, 1, ''),
(58, '$IO$', 'blocks/io.php', 1, 0, 1, ''),
(59, '$DO$', 'blocks/do.php', 1, 0, 1, ''),
(60, '$RO$', 'blocks/ro.php', 1, 0, 1, ''),
(61, '$CO$', 'blocks/co.php', 1, 0, 1, ''),
(62, '$BOOKMARKS$', 'blocks/bookmarks.php', 1, 1, 0, ''),
(63, '$SEO$', 'blocks/seo.php', 1, 0, 1, ''),
(64, '$AJAX$', 'blocks/ajax.php', 1, 0, 0, ''),
(65, '$ONLINE$', 'blocks/online.php', 1, 1, 0, ''),
(66, '$STO$', 'blocks/sto.php', 1, 0, 0, ''),
(67, '$SPECIAL$', 'blocks/special.php', 1, 1, 0, ''),
(68, '$ADD_PAGE$', 'blocks/add_page.php', 1, 1, 0, ''),
(69, '$ADMIN_PAGE$', 'blocks/admin_page.php', 1, 1, 0, ''),
(70, '$ADMIN_ENTER$', 'blocks/admin_enter.php', 1, 1, 0, ''),
(71, '$MAO$', 'blocks/mao.php', 1, 0, 0, ''),
(72, '$MA2O$', 'blocks/ma2o.php', 1, 0, 0, ''),
(73, '$MA3O$', 'blocks/ma3o.php', 1, 0, 0, ''),
(74, '$MA4O$', 'blocks/ma4o.php', 1, 0, 0, ''),
(75, '$MA5O$', 'blocks/ma5o.php', 1, 0, 0, ''),
(76, '$MA6O$', 'blocks/ma6o.php', 1, 0, 0, ''),
(77, '$MA7O$', 'blocks/ma7o.php', 1, 0, 0, ''),
(78, '$MA8O$', 'blocks/ma8o.php', 1, 0, 0, ''),
(79, '$MA9O$', 'blocks/ma9o.php', 1, 0, 0, ''),
(80, '$MA10O$', 'blocks/ma10o.php', 1, 0, 0, ''),
(81, '$MA11O$', 'blocks/ma11o.php', 1, 0, 0, ''),
(82, '$MA12O$', 'blocks/ma12o.php', 1, 0, 0, ''),
(83, '$MA13O$', 'blocks/ma13o.php', 1, 0, 0, ''),
(84, '$MA14O$', 'blocks/ma14o.php', 1, 0, 0, ''),
(85, '$MA15O$', 'blocks/ma15o.php', 1, 0, 0, ''),
(86, '$MA16O$', 'blocks/ma16o.php', 1, 0, 0, ''),
(87, '$MA17O$', 'blocks/ma17o.php', 1, 0, 0, ''),
(88, '$MA18O$', 'blocks/ma18o.php', 1, 0, 0, ''),
(89, '$MA19O$', 'blocks/ma19o.php', 1, 0, 0, ''),
(90, '$MA20O$', 'blocks/ma20o.php', 1, 0, 0, ''),
(91, '$MA21O$', 'blocks/ma21o.php', 1, 0, 0, ''),
(92, '$MA22O$', 'blocks/ma22o.php', 1, 0, 0, ''),
(93, '$MA23O$', 'blocks/ma23o.php', 1, 0, 0, ''),
(94, '$MA24O$', 'blocks/ma24o.php', 1, 0, 0, ''),
(95, '$MA25O$', 'blocks/ma25o.php', 1, 0, 0, ''),
(96, '$ABC1O$', 'blocks/abc1o.php', 1, 0, 0, ''),
(97, '$ABC2O$', 'blocks/abc2o.php', 1, 0, 0, ''),
(98, '$ABC3O$', 'blocks/abc3o.php', 1, 0, 0, ''),
(99, '$ABC4O$', 'blocks/abc4o.php', 1, 0, 0, ''),
(100, '$ABC5O$', 'blocks/abc5o.php', 1, 0, 0, ''),
(101, '$ABC6O$', 'blocks/abc6o.php', 1, 0, 0, ''),
(102, '$ABC7O$', 'blocks/abc7o.php', 1, 0, 0, ''),
(103, '$ABC8O$', 'blocks/abc8o.php', 1, 0, 0, ''),
(104, '$ABC9O$', 'blocks/abc9o.php', 1, 0, 0, ''),
(105, '$ABC10O$', 'blocks/abc10o.php', 1, 0, 0, ''),
(106, '$ABC11O$', 'blocks/abc11o.php', 1, 0, 0, ''),
(107, '$ABC12O$', 'blocks/abc12o.php', 1, 0, 0, ''),
(108, '$ABC13O$', 'blocks/abc13o.php', 1, 0, 0, ''),
(109, '$ABC14O$', 'blocks/abc14o.php', 1, 0, 0, ''),
(110, '$ABC15O$', 'blocks/abc15o.php', 1, 0, 0, ''),
(111, '$ABC16O$', 'blocks/abc16o.php', 1, 0, 0, ''),
(112, '$ABC17O$', 'blocks/abc17o.php', 1, 0, 0, ''),
(113, '$ABC18O$', 'blocks/abc18o.php', 1, 0, 0, ''),
(114, '$ABC19O$', 'blocks/abc19o.php', 1, 0, 0, ''),
(115, '$ABC20O$', 'blocks/abc20o.php', 1, 0, 0, ''),
(116, '$ABC21O$', 'blocks/abc21o.php', 1, 0, 0, ''),
(117, '$ABC22O$', 'blocks/abc22o.php', 1, 0, 0, ''),
(118, '$ABC23O$', 'blocks/abc23o.php', 1, 0, 0, ''),
(119, '$ABC24O$', 'blocks/abc24o.php', 1, 0, 0, ''),
(120, '$ABC25O$', 'blocks/abc25o.php', 1, 0, 0, ''),
(121, '$ABC26O$', 'blocks/abc26o.php', 1, 0, 0, ''),
(122, '$ABC27O$', 'blocks/abc27o.php', 1, 0, 0, ''),
(123, '$ABC28O$', 'blocks/abc28o.php', 1, 0, 0, ''),
(124, '$ABC29O$', 'blocks/abc29o.php', 1, 0, 0, ''),
(125, '$ABC30O$', 'blocks/abc30o.php', 1, 0, 0, ''),
(126, '$ABC31O$', 'blocks/abc31o.php', 1, 0, 0, ''),
(127, '$ABC32O$', 'blocks/abc32o.php', 1, 0, 0, ''),
(128, '$ABC33O$', 'blocks/abc33o.php', 1, 0, 0, ''),
(129, '$ABC34O$', 'blocks/abc34o.php', 1, 0, 0, ''),
(130, '$ABC35O$', 'blocks/abc35o.php', 1, 0, 0, ''),
(131, '$ABC36O$', 'blocks/abc36o.php', 1, 0, 0, ''),
(157, '$ADMIN_MODULES$', 'blocks/admin_modules.php', 1, 0, 0, ''),
(158, '$REG_MODULE$', 'blocks/reg_module.php', 1, 0, 0, ''),
(159, '$ADMIN_DESIGN$', 'blocks/admin_design.php', 1, 0, 0, ''),
(160, '$ADMIN_USERS$', 'blocks/admin_users.php', 1, 0, 0, ''),
(161, '$ADMIN_HMENU$', 'blocks/admin_hmenu.php', 1, 0, 0, ''),
(162, '$ADMIN_VMENU$', 'blocks/admin_vmenu.php', 1, 0, 0, ''),
(163, '$ADMIN_COMMENTS$', 'blocks/admin_comments.php', 1, 0, 0, ''),
(164, '$ADMIN_MESSAGES$', 'blocks/admin_messages.php', 1, 0, 0, ''),
(165, '$ADMIN_NAM$', 'blocks/admin_ban.php', 1, 0, 0, ''),
(166, '$ADMIN_ENTER$', 'blocks/admin_enter.php', 1, 0, 0, ''),
(167, '$ADMIN_FRIENDS$', 'blocks/admin_friends.php', 1, 0, 0, ''),
(168, '$ADMIN_PAGES$', 'blocks/admin_page.php', 1, 0, 0, ''),
(169, '$ADD_PAGE$', 'blocks/add_page.php', 1, 0, 0, ''),
(170, '$EDIT_PAGE$', 'blocks/edit_page.php', 1, 0, 0, ''),
(171, '$ADMIN_ARTICLES$', 'blocks/admin_articles.php', 1, 0, 0, ''),
(172, '$ADMIN_CATEGORIES$', 'blocks/admin_categories.php', 1, 0, 0, ''),
(173, '$ADMIN_HOSTBOOK$', 'blocks/admin_hostbook.php', 1, 0, 0, ''),
(174, '$EDIT_HOST$', 'blocks/edit_host.php', 1, 0, 0, ''),
(175, '$ADMIN_NEWS$', 'blocks/admin_news.php', 1, 0, 0, ''),
(176, '$EDIT_NEWS$', 'blocks/edit_news.php', 1, 0, 0, ''),
(177, '$ADD_NEWS$', 'blocks/add_news.php', 1, 0, 0, ''),
(178, '$EDIT_USER$', 'blocks/edit_user.php', 1, 0, 0, ''),
(179, '$ADD_A$', 'blocks/add_a.php', 1, 0, 0, ''),
(180, '$EDIT_A$', 'blocks/edit_a.php', 1, 0, 0, ''),
(181, '$FRIENDS$', 'blocks/friends.php', 1, 1, 0, ''),
(182, '$FRO$', 'blocks/fro.php', 1, 0, 0, ''),
(183, '$NAV$', 'blocks/navigator.php', 1, 1, 0, ''),
(184, '$LOGS$', 'blocks/admin_log.php', 1, 1, 0, ''),
(185, '$TestModule$', 'blocks/test_m.php', 1, 1, 1, 'trahbach+-'),
(186, '$SITEO$', 'blocks/siteo.php', 1, 1, 0, ''),
(187, '$243$', 'blocks/432.php', 1, 1, 1, '324432'),
(188, '$325432524332$', 'blocks/r3rwesewersw.php', 1, 1, 1, 'fgsr234432fwee');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '.php',
  `cpurl` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `show_h` int(2) NOT NULL DEFAULT '0',
  `show_v` int(2) NOT NULL DEFAULT '1',
  `text` text NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `module` int(1) NOT NULL DEFAULT '0',
  `lostmode` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `url`, `cpurl`, `title`, `show_h`, `show_v`, `text`, `meta_k`, `meta_d`, `module`, `lostmode`) VALUES
(1, 'index.php', '', 'Головна', 1, 1, '<p class="menu">\n	    $MO$\n</p><h1>Создание профессиональных сайтов быстро, качественно, недорого</h1>\n<span class="hr"></span>\n<h2>Вам нужно создать сайт в Интернете?</h2><p>\nНаверняка Вам случалось видеть, что многие магазины, фирмы, бренды имеют <strong>собственные сайты</strong>, где они представляют себя, делятся информацией о своей деятельности, рекламируют себя и т. п.</p>\n\n<p>\nДействительно, компании, магазины, бренды в какой-то момент задумываются над <em>созданием своего собственного ресурса в сети Интернет</em> и ищут решение проблемы. </p><p class="note">\nКогда человеку нужно что-либо, он чаще всего это ищет в Интернете – ведь такое мировоззрение выстроилось у потребителей за последние 10 лет. И это логично: ведь зачем тому, кто каждый день «сидит» в социальных сетях доставать газету и подыскивать там нужную ему услугу. Да, нельзя не согласиться, что люди старшего поколения, а также некоторые предприниматели любят читать газеты и журналы, а так же время от времени просматривать рекламные объявление, но информатизация предоставляет новые инструменты для общества за счет того, что они действительно являются более удобными.</p><p>\nРазве так важно каждой компании иметь сайт в Интернете, что стремление предпринимателей к данному аспекту ведения бизнеса столь велико?</p><h2>Необходимость в интернет-ресурсе</h2><p>\nСтоит учесть, что <em>компании, имеющие сайты в сети являются более серьезными конкурентами</em>, чем те, что не имеют такого ресурса. Почему же так? И способствуют этому следующие объективные факторы, что основываются на психологии человека:</p><ul class="truelist">\n<li>любая компания поднимается в глазах клиентов, если у нее есть собственный красивый сайт в сети – это, за счет повышения <strong>солидности</strong>, позволяет увеличить шанс того, что покупатель выберет именно Вас, а не конкурента;</li>\n<li>человек, проезжая мимо рекламного баннера нужной ему услуги, всегда, пусть и не замечая этого, обращает внимание на то, есть ли у этой компании сайт и многие записывают адрес, чтобы дома, <strong>не вставая с дивана</strong>, почитать о той или иной фирме. А почему так происходит? Объяснение элементарно: потому что посидеть 5 минут в Интернете, не тратя полчаса на поход в магазин, это удобно.</li>\n<li>Обслуживающий персонал <strong>будет тратить меньше времени</strong> на консультацию клиентов, поскольку те смогут почитать интересующую их информацию на сайте.</li>\n<li><strong>Новых клиентов</strong> теперь Вы будете получать не только благодаря витрине, а еще и с помощью поисковых систем.</li></ul>\n<h2>Успешная инвестиция</h2><p>\nЕсли Вы опытный предприниматель, то наверняка знаете эффект от действительно хорошего вложения средств, а как раз сайт является одним из таких вложений.</p><p>\nКроме того, в собственном ресурсе нуждается и каждая публичная персона. Судите сами, если Вы узнаваемый певец, аудиозаписи которого добавлены в аудиозаписи значительного количества пользователей социальных сетей, то наверняка фанаты захотят прочитать что-либо интересное про любимого исполнителя, или же просто зайти на его официальный сайт.</p><p>\nВыше приведены лишь некоторые примеры, а на самом деле, в реалиях современного общества, для <em>успешной карьеры</em> страничкой стоит обзавестись художнику, фотографу, юристу, частному доктору, а список этот можно продолжать до бесконечности, ведь сообразительные люди всегда умеют провернуть и раскрутить любое дело, а тем более то, что им по душе – экономическая теория называет это простым термином «предпринимательский талант».</p><p class="note">\nНе стоит забывать, что на данный момент уже созданы миллионы образовательных сайтов, а также ресурсов с бесплатными книгами, рефератами, статьями различных тематик, рецептами, уроками, бесплатными программами, которые посещают люди в связи с нуждой новых знаний, а владелец сайта получает некоторые премиальные за счет показа баннеров, или переходов пользователей по рекламным ссылкам.</p><p>\nНадеюсь, я доступно объяснил, насколько <strong>важен сайт в сети Интернет</strong>. Если Вы поняли, что действительно нуждаетесь в своем ресурсе и готовы сделать вложение, тогда хочу предложить услуги нашей студии веб-дизайна, которая занимается проектированием, созданием и раскруткой сайтов. Как раз тут мы задаемся вопросом: а чем студия «Web-Mount» лучше других?</p>\n<h2>Почему мы лучше других?</h2><p>\nРассмотрим несколько общих критериев, плавно перейдя к важным техническим аспектам сайтов:</p><ul class="truelist">\n<li>Большинство заказчиков сначала обращают внимание на цену, поскольку хотят сэкономить деньги, получив при этом хороший результат. Другие студии веб-дизайна создают сайты-визитки ценой от 800$, не говоря о том, что многие ставят планку от 2000$. Студия «Web-Mount» за качественную работу по созданию визитки берет от 300$, а корпоративного сайта от 500$. Согласитесь, что <em>разница чувствуется, и при этом она никак не отражается на работоспособности и дизайне сайта</em>.</li>\n<li>Часто веб-дизайнеры готовы показать небольшой, но профессионально выполненный сайт через 2 недели, хотя в большинстве случаев, как показывает практика, они затягивают со сроками. Известны, также, конечно одиночные, случаи, когда из-за долгих дискуссий сайт был сдан через полтора года после его заказа. Ясное дело, что если Вы заказали работу, то хотите получить ее в ближайшее время. Для создания визиток нам требуется около дня 4 дня, а для корпоративных – около недели. Это максимально сжатые строки с учетом резервного времени. Студия «Web-Mount» не нарушает дедлайны и сдает <em>качественно выполненную работу в указанные строки</em>.</li>\n<li>Часто студии веб-дизайна упускают из виду то, для чего создается сайт и наполняют его кучей «мусора» на подобие ненужных элементов интерфейса, нерационально подобранного функционала, делая уклон на «а я это могу» или «если это будет находится на сайте, то оно заинтригует пользователя», забывая о концентрации пользователя на определенной цели (стоит учесть, что эти параметры необходимы лишь для частных, но ни в коем случае не для всех случаев), или же наоборот: на некоторых сайтах так искручен интерфейс, что лишь после 5-ти минут поиска находишь кнопочку «Скачать», которая, как оказывается, находится внизу страницы в виде кнопочки с дискетой размером 16х16. Студия «Web-Mount» рационально использует инструменты, создавая <em>отличный функционал с приятным дизайном в стиле Web 2.0</em>.</li></ul><h2>Наши работы отвечают основным критериям хороших сайтов</h2><p>\nПерейдя к техническим сторонам сайтов, ниже составлен перечень основных моментов, на которые обращается внимание по причине их важности с прикрепленной ссылкой на соответствующую статью нашей «Базы знаний»:</p><ul class="truelist">\n<li><a href="http://web-mount.com/view_a.php?id=30" title="Блочная верстка">Блочная верстка</a>;</li>\n<li><a href="http://web-mount.com/view_a.php?id=28" title="Кроссбраузерность сайта">Кроссбраузерность сайта</a>;</li>\n<li>Валидность кода;</li>\n<li>Обеспечение безопасности базы данных; </li>\n<li>Оптимизация текстов и графики;</li>\n<li>Подбор основных ключевых слов;</li>\n<li>Удобная навигация, способствующая повышения поисковой индексации;</li>\n<li>Грамотная автоматизация процесса построения карты сайта.</li>\n</ul>\n<h2>Сайт-визитка</h2><p>\nСтоимость создания <a href="view_a.php?id=15">сайта-визитки</a> студией «Web-Mount»  отталкивается от 300$, а выполняется такого рода работа около 4-х дней, при этом за эти деньги Вы получаете полностью функциональный стильный сайт с тем информационным наполнением, что сами предоставите. Такой вариант очень хорошо подходит для индивидуальных предпринимателей (если Вы, например, юрист, переводчик, инфобизнесмен и т. п.), или для фирм, которые предоставляют фиксированные услуги, то есть не надо регулярно менять информацию на сайте.</p><h2>\nКорпоративный сайт</h2><p>\n<a href="view_a.php?id=15">Корпоративный сайт</a> предназначен для юридических (физических) лиц, которые предусматривают изменение информационного наполнения своего ресурса в целях предоставления информации на своем сайте о предоставляемых товарах или услугах, создания инфобизнеса, образовательного сайта и т. п. Цена такого рода работы студией «Web-Mount» начинается от 500$, дедлайн устанавливается в пределах недели. После этого сайт отдается Вам "под ключ" для дальнейшего дополнения контентом.</p><h2>\nТерриториальное расположение и налоги</h2><p>\nСтудия «Web-Mount» создает сайты вне зависимости от того, где именно находятся их владельцы и где размещается предприятие в случае заказа сайта бизнесменами.</p><p>\n	Деятельность, связанная с предоставлением услуг создания сайтов, в соответствии с законодательством Украины не облагается налогом.\n</p><p class="note3">Підрозділ 2 ПК України (<a href="http://zakon2.rada.gov.ua/laws/show/2755-17/page43">официальный источник</a>):<br/>\n26. Тимчасово, з 1 січня 2013 року до 1 січня 2023 року, звільняються від оподаткування податком на додану вартість операції з постачання програмної продукції.<br/>\nДля цілей цього пункту до програмної продукції відносяться: результат комп&#39;ютерного програмування у вигляді операційної системи, системної, прикладної, розважальної та/або навчальної комп&#39;ютерної програми (їх компонентів), а також у вигляді інтернет-сайтів та/або онлайн-сервісів; криптографічні засоби захисту інформації.</p>\n<h2>Как же произвести заказ услуги на создание сайта?</h2><p>\nДля максимальной простоты процесса был разработан алгоритм по заказу сайта:</p><ol>\n<li>Через форму обратную связь Вы заказываете сайт, присылая нам минимум описания (объем информации не ограничивается, потому, если есть желание описать свои задумки и заметки по поводу сайта, их также можно написать) и загрузить архив информации с картинками.</li>\n<li>В течении дня мы присылаем на указанный в запросе e-mail строки выполнения, цену за создание сайта и расценку на рекомендуемый тарифный план хостинга.</li>\n<li>Работа начнется сразу же после того, как Вы оплатите или всю указанную цену, или аванс с размере 30&#37; + затраты на покупку хостинга и домена.</li>\n<li>После выполнения заказа, сайт будет выставлен в сеть и Вы сразу же узнаете об этом. Если нужно будет изменить некоторые моменты, то они будут откорректированные после соответствующего запроса.</li>\n<li>Как только Вы сочли процесс создания сайта законченным, перешлите на наш счет еще не уплаченную сумму (в случае оплаты лишь аванса на этапе 3). После этого сделка будет успешно завершена!</li></ol><p class="note2">\nВся работа будет выполнена качественно и в указанные строки. Студия «Web-Mount» гарантирует полный возврат средств в случае невыполнения качественной работы в указанные строки.</p>', '', '', 0, '2013-08-05'),
(2, 'reg.php', 'registration', 'Реєстрація', 0, 0, '<p class="menu">\n	<a class="a_menu" href="/">$MO$</a> » $RO$\n</p>\n<p>\n	$REG$\n</p>', '', '', 1, '2013-08-05'),
(3, 'articles.php', 'articles', 'Статті', 1, 1, '<div class="menu"><a class="a_menu" href="$SITEO$" >$MO$</a> » $AO$ $A_CAT$</div> $ARTICLES$', '', '', 0, '0000-00-00'),
(4, 'contacts.php', 'contacts', 'Зворотній зв''язок', 1, 1, '<div class="menu"><a class="a_menu" href="/" >$MO$</a> » $CO$</div> \r\n$CONTACTS$ ', '', '', 0, '0000-00-00'),
(5, '404.php', '404', '404', 0, 0, '<div style="font-size:120px; color:red;text-align:center;">404</div><div style="font-size:50px;text-align:center;">Заданої сторінки не існує</div>', '', '', 1, '0000-00-00'),
(6, 'view_a.php', 'view_a', '', 0, 0, '', '', '', 1, '0000-00-00'),
(8, 'add_a.php', 'add-article', 'Додати статтю', 0, 0, '<div class="menu"><a class="a_menu" href="/" >$MO$</a> » <a class="a_menu" href="articles.php">$AO$</a> » $DO$</div>$ADD_A$', '', '', 1, '0000-00-00'),
(10, 'mailto.php', 'mailto', 'Надіслати листа', 0, 0, '<div class="menu" >\r\n\r\n<a href="/" class="a_menu">$MO$</a> » <a href="/mail.php" class="a_menu">$LO$</a> » $SO$</div>$MAILTO$', '', '', 1, '0000-00-00'),
(11, 'mail.php', 'mail', 'Список повідомлень', 0, 0, '<div class="menu" >\r\n\r\n<a href="/" class="a_menu">$MO$</a> » $LO$\r\n </div>$MAIL$', '', '', 1, '0000-00-00'),
(12, 'users.php', 'users', 'Список користувачів', 0, 0, '<div class="menu" >\r\n<a href="/" class="a_menu">$MO$</a> » $UO$\r\n </div>$USERLIST$', '', '', 1, '0000-00-00'),
(13, 'user_info.php', 'user_info', 'Інформація про користувача', 0, 0, '<div class="menu" >\r\n\r\n<a href="/" class="a_menu">$MO$</a> » <a href="/users.php" class="a_menu">$UO$</a> » $IO$\r\n</div>$USER_INFO$', '', '', 1, '0000-00-00'),
(14, 'search_view.php', 'search_view', 'Пошуковий запит', 0, 0, '<div class="menu" > \n<a href="/" class="a_menu">$MO$</a> » $FO$\n </div> $SEARCH_VIEW$', '', '', 1, '0000-00-00'),
(15, 'cabinet.php', 'cabinet', 'Кабінет користувача', 0, 0, '<div class="menu" > \r\n<a href="/" class="a_menu">$MO$</a> » $KO$\r\n </div> $CABINET$', '', '', 1, '0000-00-00'),
(16, 'remind.php', '', 'Нагадати пароль', 0, 0, '<div class="menu" > \r\n<a href="/" class="a_menu">$MO$</a> » $PO$\r\n</div><p>Будь ласка, введіть e-mail зареєстрованого користувача для того, щоб на нього прийшов пароль від аккаунта: </p> $REMIND$', '', '', 1, '0000-00-00'),
(32, 'admin_media.php', '', 'Панель керування', 0, 0, '<p>\n	<a href="http://site2.ua/">$MO$</a><span style="color: rgb(66, 64, 57);"> » $MAO$</span>\n</p>\n<p>\n	$ADMIN_MEDIA$\n</p>', '', '', 1, '2013-08-08'),
(33, 'admin_modules.php', '', 'Модулі', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA2O$ </div>\r\n<p>$ADMIN_MODULES$</p>', '', '', 1, '2013-08-08'),
(34, 'reg_module.php', '', 'Редагувати модуль', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA3O$ </div>\r\n<p>$REG_MODULE$</p>', '', '', 1, '2013-08-08'),
(35, 'admin_design.php', '', 'Дизайн', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA4O$ </div>\r\n<p>$ADMIN_DESIGN$</p>', '', '', 1, '2013-08-08'),
(36, 'admin_users.php', '', 'Корегувати дані користувача', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA5O$ </div>\r\n<p>$ADMIN_USERS$</p>', '', '', 1, '2013-08-08'),
(37, 'admin_hmenu.php', '', 'Конструктор горизонтального меню', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA6O$ </div>\r\n<p>$ADMIN_HMENU$</p>', '', '', 1, '2013-08-08'),
(38, 'admin_vmenu.php', '', 'Конструктор вертикального меню', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA7O$ </div>\r\n<p>$ADMIN_VMENU$</p>', '', '', 1, '2013-08-08'),
(39, 'admin_comments.php', '', 'Архів коментарів', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA8O$ </div>\r\n<p>$ADMIN_COMMENTS$</p>', '', '', 1, '2013-08-08'),
(40, 'admin_messages.php', '', 'Архів повідомлень', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA9O$ </div>\r\n<p>$ADMIN_MESSAGES$</p>', '', '', 1, '2013-08-08'),
(41, 'admin_ban.php', '', 'Заблоковані IP', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA10O$ </div>\r\n<p>$ADMIN_NAM$</p>', '', '', 1, '2013-08-08'),
(42, 'admin_enter.php', '', 'Архів входів', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA11O$ </div>\r\n<p>$ADMIN_ENTER$</p>', '', '', 1, '2013-08-08'),
(43, 'admin_friends.php', '', 'Рекомендовані сайти', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA12O$ </div>\r\n<p>$ADMIN_FRIENDS$</p>', '', '', 1, '2013-08-08'),
(44, 'admin_page.php', '', 'Керування сторінками', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA13O$ </div>\r\n<p>$ADMIN_PAGES$</p>', '', '', 1, '2013-08-08'),
(45, 'add_page.php', '', 'Додавання сторінок', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA14O$ </div>\n<p>$ADD_PAGE$</p>', '', '', 1, '2013-08-08'),
(46, 'edit_page.php', '', 'Редагування сторінок', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA15O$ </div>\n<p>$EDIT_PAGE$</p>', '', '', 1, '2013-08-08'),
(47, 'admin_articles.php', '', 'Керування статтями', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA16O$ </div>\r\n<p>$ADMIN_ARTICLES$</p>', '', '', 1, '2013-08-08'),
(48, 'admin_categories.php', '', 'Категорії', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA17O$ </div>\r\n<p>$ADMIN_CATEGORIES$</p>', '', '', 1, '2013-08-08'),
(49, 'admin_hostbook.php', '', 'Гостьова книга', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA18O$ </div>\r\n<p>$ADMIN_HOSTBOOK$</p>', '', '', 1, '2013-08-08'),
(50, 'edit_host.php', '', 'Редагувати запис', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA19O$ </div>\r\n<p>$EDIT_HOST$</p>', '', '', 1, '2013-08-08'),
(51, 'admin_news.php', '', 'Керування новинами', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA20O$ </div>\r\n<p>$ADMIN_NEWS$</p>', '', '', 1, '2013-08-08'),
(52, 'edit_news.php', '', 'Додагувати новину', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA21O$ </div>\r\n<p>$EDIT_NEWS$</p>', '', '', 1, '2013-08-08'),
(53, 'add_news.php', '', 'Додати новину', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA22O$ </div>\r\n<p>$ADD_NEWS$</p>', '', '', 1, '2013-08-08'),
(54, 'edit_user.php', '', 'Список користувачів', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA5O$ </div>\n<p>$EDIT_USER$</p>', '', '', 1, '2013-08-08'),
(55, 'add_a.php', '', 'Додавання статей', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA24O$ </div>\n<p>$ADD_A$</p>', '', '', 1, '2013-08-08'),
(56, 'edit_a.php', '', 'Редагування статей', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » $MA25O$ </div>\r\n<p>$EDIT_A$</p>', '', '', 1, '2013-08-08'),
(57, 'admin_log.php', '', 'Логи сервера', 0, 0, '<div class="menu"><a class="a_menu" href="/">$MO$</a> » Логи сервера </div><p>$LOGS$</p>', '', '', 1, '2013-08-08'),
(58, 'gallery.php', '', 'Галерея', 0, 1, '<div class="menu" > \n<a href="/" class="a_menu">$MO$</a> » Галерея\n </div><p>\n	$GALLERY$\n</p>', '', '', 0, '2013-08-20'),
(59, 'kak-peredelat-solntche.php', '', '3ацуацц', 0, 1, '<div class="menu" > \r\n<a href="/" class="a_menu">$MO$</a> » 3ацуацц\r\n </div>', '', '', 0, '2013-10-12');

-- --------------------------------------------------------

--
-- Структура таблицы `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `a_mail` varchar(255) NOT NULL DEFAULT 'denikewebpost@yandex.ua',
  `name` varchar(255) NOT NULL DEFAULT 'SiteMedia',
  `nav` int(2) NOT NULL DEFAULT '10',
  `q3` int(1) NOT NULL DEFAULT '1',
  `q4` int(1) NOT NULL DEFAULT '1',
  `q5` int(1) NOT NULL DEFAULT '1',
  `q6` int(1) NOT NULL DEFAULT '1',
  `q7` int(1) NOT NULL DEFAULT '1',
  `q8` int(1) NOT NULL DEFAULT '1',
  `q1` int(1) NOT NULL DEFAULT '1',
  `q2` int(1) NOT NULL DEFAULT '1',
  `q9` int(1) NOT NULL DEFAULT '1',
  `q10` int(1) NOT NULL DEFAULT '1',
  `q11` int(1) NOT NULL DEFAULT '1',
  `q12` int(1) NOT NULL DEFAULT '1',
  `q13` int(1) NOT NULL DEFAULT '1',
  `q14` int(1) NOT NULL DEFAULT '1',
  `q15` int(1) NOT NULL DEFAULT '1',
  `q16` int(1) NOT NULL DEFAULT '1',
  `q17` int(1) NOT NULL DEFAULT '1',
  `q18` int(1) NOT NULL DEFAULT '1',
  `q19` int(1) NOT NULL DEFAULT '1',
  `q20` int(1) NOT NULL DEFAULT '1',
  `q21` int(1) NOT NULL DEFAULT '1',
  `q22` int(1) NOT NULL DEFAULT '1',
  `q23` int(1) NOT NULL DEFAULT '1',
  `q24` int(1) NOT NULL DEFAULT '1',
  `q25` int(1) NOT NULL DEFAULT '1',
  `q26` int(1) NOT NULL DEFAULT '1',
  `q27` int(1) NOT NULL DEFAULT '1',
  `q28` int(1) NOT NULL DEFAULT '1',
  `q29` int(1) NOT NULL DEFAULT '1',
  `t_a` int(2) NOT NULL DEFAULT '5',
  `l_a` int(2) NOT NULL DEFAULT '5',
  `l_n` int(2) NOT NULL DEFAULT '5',
  `m_s` int(2) NOT NULL DEFAULT '25',
  `ban` int(1) NOT NULL DEFAULT '0',
  `cons` int(1) NOT NULL DEFAULT '0',
  `lang` varchar(10) NOT NULL DEFAULT 'ua',
  `author` varchar(255) NOT NULL DEFAULT 'Драгомирик Денис',
  `copyright` varchar(255) NOT NULL DEFAULT 'SkyStudio Дениса Драгомирика',
  `rss` int(1) NOT NULL DEFAULT '1',
  `q30` int(1) NOT NULL DEFAULT '1',
  `q31` int(1) NOT NULL DEFAULT '1',
  `q32` int(1) NOT NULL DEFAULT '1',
  `q33` int(1) NOT NULL DEFAULT '1',
  `q34` int(1) NOT NULL DEFAULT '1',
  `q35` int(1) NOT NULL DEFAULT '1',
  `q36` int(1) NOT NULL DEFAULT '1',
  `q37` int(1) NOT NULL DEFAULT '1',
  `q38` int(1) NOT NULL DEFAULT '1',
  `q39` int(1) NOT NULL DEFAULT '1',
  `q40` int(1) NOT NULL DEFAULT '1',
  `q41` int(1) NOT NULL DEFAULT '1',
  `q42` int(1) NOT NULL DEFAULT '1',
  `q43` int(1) NOT NULL DEFAULT '1',
  `q44` int(1) NOT NULL DEFAULT '1',
  `q45` int(1) NOT NULL DEFAULT '1',
  `46` int(1) NOT NULL DEFAULT '1',
  `47` int(1) NOT NULL DEFAULT '1',
  `48` int(1) NOT NULL DEFAULT '1',
  `49` int(1) NOT NULL DEFAULT '1',
  `50` int(1) NOT NULL DEFAULT '1',
  `wysiwyg` int(1) NOT NULL DEFAULT '1',
  `hist_save` int(3) NOT NULL DEFAULT '7',
  `logs` int(1) NOT NULL DEFAULT '1',
  `gal` varchar(3) NOT NULL DEFAULT 'g1',
  `lostsitemap` date NOT NULL DEFAULT '2013-01-09',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `site`
--

INSERT INTO `site` (`id`, `ip`, `a_mail`, `name`, `nav`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q1`, `q2`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q24`, `q25`, `q26`, `q27`, `q28`, `q29`, `t_a`, `l_a`, `l_n`, `m_s`, `ban`, `cons`, `lang`, `author`, `copyright`, `rss`, `q30`, `q31`, `q32`, `q33`, `q34`, `q35`, `q36`, `q37`, `q38`, `q39`, `q40`, `q41`, `q42`, `q43`, `q44`, `q45`, `46`, `47`, `48`, `49`, `50`, `wysiwyg`, `hist_save`, `logs`, `gal`, `lostsitemap`) VALUES
(1, '0.0.0.0 ', 'denikewebpost@yandex.ua', 'CMS "Локадо"', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 5, 5, 5, 28, 0, 1, 'ua', 'Драгомирик Денис', 'Web-Mount Дениса Драгомирика', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 7, 1, 'g1', '2013-01-09');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(1300) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rights` int(2) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `reg_date` date NOT NULL,
  `sex` int(2) NOT NULL,
  `group` int(3) NOT NULL DEFAULT '2',
  `enter_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `enter_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `fullname`, `town`, `rights`, `email`, `birth_date`, `reg_date`, `sex`, `group`, `enter_id`, `enter_time`) VALUES
(2, 'denike', 'C33SX3dL93D1M73tngg13RRWOXT6t0wxkb77q9LBUxnOdKsu6BQ', 'Драгомирик Денис Юрійович', 'Вінниця', 3, 'denikewebpost@yandex.ua', '1996-08-15', '2013-03-10', 1, 4, 'Gnnc2rO4kuDqr0U', '1378360313'),
(1, 'admin', '3Evp6c4UxneEikCYGGqSFDvfBvc9dljPtIwvRyupjK1S9cGsc1HXxYbKjJumt5zsRSUH26cSjXgN1S6vxrwsdxbOqC60IftpDhj8shNqEm2mHaLGIZ8e3rdl4d7B', 'Адмінов Адмін Адмінович', 'Київ', 11, 'admin@pritchi.p.ht', '2013-03-08', '2013-03-10', 1, 999, 'UzqbaFI9wYna1yY', '1396404154'),
(3, 'denike1', '833FY3tFs3B2Vr3Ys8t53RQ6pZx6aGXvLDthH4gUMpPn7BX', 'Денис Юрійович', 'New York', -1, 'denikewebpost@yandex.ua', '2013-02-26', '2013-03-13', 1, 5, 'mek0YScGTvVsfIG', '1376099860'),
(5, 'adminchik', 'P332z31CO3Owt43picoQ3FLphAd6JLXG330NqJo1QZXUxO4BB', 'dendrik', 'Vinnitsya', 1, 'admin@pritchi.p.ht', '1996-08-15', '2013-08-01', 1, 2, '', ''),
(4, 'adminko', 'w33LS3o8v3DOQt3KUiJI3m07bVy6MlzN1LO3LdADcbisDBU', 'denni', 'Vinni', 3, 'admin@pritchi.com', '1996-08-22', '2013-08-06', 1, 4, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `u1` int(1) NOT NULL DEFAULT '1',
  `u2` int(1) NOT NULL DEFAULT '1',
  `u3` int(1) NOT NULL DEFAULT '1',
  `u4` int(1) NOT NULL DEFAULT '0',
  `u5` int(1) NOT NULL DEFAULT '0',
  `u6` int(1) NOT NULL DEFAULT '0',
  `u7` int(1) NOT NULL DEFAULT '0',
  `u8` int(1) NOT NULL DEFAULT '0',
  `u9` int(1) NOT NULL DEFAULT '0',
  `u10` int(1) NOT NULL DEFAULT '1',
  `u11` int(1) NOT NULL DEFAULT '0',
  `u12` int(1) NOT NULL DEFAULT '0',
  `u13` int(1) NOT NULL DEFAULT '0',
  `u14` int(1) NOT NULL DEFAULT '0',
  `u15` int(1) NOT NULL DEFAULT '0',
  `u16` int(1) NOT NULL DEFAULT '0',
  `u17` int(1) NOT NULL DEFAULT '0',
  `u18` int(1) NOT NULL DEFAULT '0',
  `u19` int(1) NOT NULL DEFAULT '1',
  `u20` int(1) NOT NULL DEFAULT '0',
  `u21` int(1) NOT NULL DEFAULT '0',
  `u22` int(1) NOT NULL DEFAULT '1',
  `u23` int(1) NOT NULL DEFAULT '0',
  `u24` int(1) NOT NULL DEFAULT '0',
  `u25` int(1) NOT NULL DEFAULT '0',
  `u26` int(1) NOT NULL DEFAULT '0',
  `u27` int(1) NOT NULL DEFAULT '0',
  `u28` int(1) NOT NULL DEFAULT '0',
  `u29` int(1) NOT NULL DEFAULT '0',
  `u30` int(1) NOT NULL DEFAULT '0',
  `u31` int(1) NOT NULL DEFAULT '0',
  `u32` int(1) NOT NULL DEFAULT '0',
  `u33` int(1) NOT NULL DEFAULT '0',
  `u34` int(1) NOT NULL DEFAULT '0',
  `u35` int(1) NOT NULL DEFAULT '0',
  `u36` int(1) NOT NULL DEFAULT '0',
  `u37` int(1) NOT NULL DEFAULT '0',
  `u38` int(1) NOT NULL DEFAULT '0',
  `u39` int(1) NOT NULL DEFAULT '0',
  `u40` int(1) NOT NULL DEFAULT '0',
  `u41` int(1) NOT NULL DEFAULT '0',
  `u42` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000 ;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `u1`, `u2`, `u3`, `u4`, `u5`, `u6`, `u7`, `u8`, `u9`, `u10`, `u11`, `u12`, `u13`, `u14`, `u15`, `u16`, `u17`, `u18`, `u19`, `u20`, `u21`, `u22`, `u23`, `u24`, `u25`, `u26`, `u27`, `u28`, `u29`, `u30`, `u31`, `u32`, `u33`, `u34`, `u35`, `u36`, `u37`, `u38`, `u39`, `u40`, `u41`, `u42`) VALUES
(1, 'Гість', 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Користувач', 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Модератор', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Перевірений користувач', 1, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Заблокований', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Адміністратор', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(999, 'СуперАдміністратор', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
