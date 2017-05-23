-- phpMyAdmin SQL Dump
-- version 4.8.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2017 at 03:28 PM
-- Server version: 5.7.18-0ubuntu0.17.04.1-log
-- PHP Version: 7.1.4-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Приборная панель', 'fa-bar-chart', '/', NULL, '2017-05-23 07:48:14'),
(2, 0, 12, 'Admin', 'fa-tasks', '', NULL, '2017-05-23 07:52:43'),
(3, 2, 13, 'Users', 'fa-users', 'auth/users', NULL, '2017-05-23 07:52:43'),
(4, 2, 14, 'Roles', 'fa-user', 'auth/roles', NULL, '2017-05-23 07:52:43'),
(5, 2, 15, 'Permission', 'fa-user', 'auth/permissions', NULL, '2017-05-23 07:52:43'),
(6, 2, 16, 'Menu', 'fa-bars', 'auth/menu', NULL, '2017-05-23 07:52:43'),
(7, 2, 17, 'Operation log', 'fa-history', 'auth/logs', NULL, '2017-05-23 07:52:43'),
(8, 0, 18, 'Helpers', 'fa-gears', '', NULL, '2017-05-23 07:52:43'),
(9, 8, 19, 'Scaffold', 'fa-keyboard-o', 'helpers/scaffold', NULL, '2017-05-23 07:52:43'),
(10, 8, 20, 'Database terminal', 'fa-database', 'helpers/terminal/database', NULL, '2017-05-23 07:52:43'),
(11, 8, 21, 'Laravel artisan', 'fa-terminal', 'helpers/terminal/artisan', NULL, '2017-05-23 07:52:43'),
(12, 0, 6, 'Контент', 'fa-newspaper-o', '/news', '2017-04-24 05:48:35', '2017-05-23 07:52:43'),
(13, 0, 10, 'Albums', 'fa-picture-o', '/albums', '2017-04-24 05:49:11', '2017-05-23 07:52:43'),
(15, 0, 9, 'Опросы', 'fa-question-circle', '/polls', '2017-04-24 05:50:46', '2017-05-23 07:52:43'),
(16, 0, 11, 'Documents', 'fa-file', '/documents', '2017-04-24 05:51:12', '2017-05-23 07:52:43'),
(17, 0, 3, 'Подача заявлений', 'fa-user-plus', '/statements', '2017-05-19 07:56:53', '2017-05-23 07:52:43'),
(18, 12, 8, 'Категории', 'fa-hashtag', '/categories', '2017-05-22 04:21:35', '2017-05-23 07:52:43'),
(19, 17, 5, 'Кружки', 'fa-child', '/types', '2017-05-22 05:32:27', '2017-05-23 07:52:43'),
(20, 17, 4, 'Заявления', 'fa-user-plus', '/statements', '2017-05-22 05:40:58', '2017-05-23 07:52:43'),
(21, 12, 7, 'Новости', 'fa-newspaper-o', '/news', '2017-05-22 05:41:26', '2017-05-23 07:52:43'),
(22, 0, 2, 'Ссылки', 'fa-link', '/links', '2017-05-23 07:52:30', '2017-05-23 07:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'cp/categories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2017-05-23 08:56:10', '2017-05-23 08:56:10'),
(2, 1, 'cp/polls', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2017-05-23 08:56:11', '2017-05-23 08:56:11'),
(3, 1, 'cp/documents', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2017-05-23 08:56:12', '2017-05-23 08:56:12'),
(4, 1, 'cp/auth/logs', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2017-05-23 08:56:14', '2017-05-23 08:56:14'),
(5, 1, 'cp', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2017-05-23 08:56:15', '2017-05-23 08:56:15'),
(6, 1, 'cp', 'GET', '127.0.0.1', '[]', '2017-05-23 08:56:18', '2017-05-23 08:56:18'),
(7, 1, 'cp', 'GET', '127.0.0.1', '[]', '2017-05-23 09:01:16', '2017-05-23 09:01:16'),
(8, 1, 'cp', 'GET', '127.0.0.1', '[]', '2017-05-23 09:01:18', '2017-05-23 09:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2017-04-24 03:45:01', '2017-04-24 03:45:01'),
(2, 'User', 'user', '2017-04-24 04:34:20', '2017-04-24 04:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(1, 8, NULL, NULL),
(1, 2, NULL, NULL),
(1, 8, NULL, NULL),
(1, 12, NULL, NULL),
(1, 13, NULL, NULL),
(1, 14, NULL, NULL),
(1, 15, NULL, NULL),
(1, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$fcOWUFQh5N5eR4iddb3piu6GCCZqiApQpHb7T6za2r/hTXSEkd2Iu', 'Администратор', 'image/775853.jpg', 'wtpbGnIXayBFpRHuTABaoTn3CCdkzsaQYiuCuJUYL1WlDDVJ4Xc7ylL1YqA3', '2017-04-24 03:45:01', '2017-05-23 08:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(160) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `description` varchar(600) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'it', '2017-05-22 04:16:36', '2017-05-22 10:34:59'),
(3, 'тестовая', '2017-05-22 04:45:00', '2017-05-22 10:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `active`, `created_at`, `updated_at`) VALUES
(1, 'добавить ссылку', 'http://sot.deimos/cp/links/create', 1, '2017-05-23 07:55:34', '2017-05-23 07:55:34'),
(2, 'pma', 'http://pma.local/tbl_structure.php?db=sot&table=links', 1, '2017-05-23 07:56:08', '2017-05-23 07:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_04_173148_create_admin_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(160) NOT NULL,
  `description` varchar(600) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `image`, `category_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Используем Cake для сборки C# кода', 'Cake — это кроссплатформенная система сборки, использующая DSL с синтаксисом C# для того, что осуществлять в процессе сборки такие вещи, как сборка бинарников из исходных кодов, копирование файлов, создание/очищение/удаление папок, архивация артефактов, упаковка nuget-пакетов, прогоны юнит-тестов и многое другое. Так же Cake имеет развитую систему аддонов (просто C# классы, зачастую упакованные в nuget). Стоит отметить, что большое количество полезных функций уже встроены в Cake, а еще больше, практически на все случаи жизни, написаны сообществом и довольно успешно распространяются.', '<h1>Итак, что такое Cake?</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cake &mdash; это кроссплатформенная система сборки, использующая DSL с синтаксисом C# для того, что осуществлять в процессе сборки такие вещи, как сборка бинарников из исходных кодов, копирование файлов, создание/очищение/удаление папок, архивация артефактов, упаковка nuget-пакетов, прогоны юнит-тестов и многое другое. Так же Cake имеет развитую систему аддонов (просто C# классы, зачастую упакованные в nuget). Стоит отметить, что большое количество полезных функций уже встроены в Cake, а еще больше, практически на все случаи жизни, написаны сообществом и довольно успешно распространяются.</p>\r\n\r\n<p><a name=\"habracut\"></a></p>\r\n\r\n<p>Сake использует модель программирования называемую&nbsp;<em>dependency based programming</em>, аналогично другим подобным системам вроде&nbsp;<em>Rake</em>&nbsp;или&nbsp;<em>Fake</em>. Суть этой модели в том, что мы для исполнения нашей программы мы определяем задачи и зависимости между ними. Подробнее про данную модель можно почитать у&nbsp;<a href=\"https://martinfowler.com/articles/rake.html#DependencyBasedProgramming\">Мартина Фаулера</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Подобная модель заставляет нас представлять наш процесс сборки как некоторые задачи (Task) и зависимости между ними. При этом логически исполнение идет в обратном порядке: мы указываем задачу, которую хотим выполнить и ее зависимости, Cake же определяет, какие задачи могут быть выполнены (для них разрешены или отсутствуют зависимости) и исполняет их.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"dependency based programming example\" src=\"https://habrastorage.org/web/92f/7d0/9af/92f7d09afa674ed2a5944341b7287b97.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Так, например, мы хотим исполнить A, однако она зависит от B и C, а B зависит от D. Таким образом Cake исполнит их в следующем порядке:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>С или D</li>\r\n	<li>B</li>\r\n	<li>A</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Задача же (Task) в Cake обычно представляет собой законченный кусок работы по сборке/тестированию/упаковке. Объявляется следующим образом</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>Task(&quot;A&quot;) // Название\r\n.Does(() =&gt;\r\n{\r\n    //Реализация Task A\r\n});</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Указать же, что задача A зависима от, например, задачи B можно с помощью метода&nbsp;<em>IsDependentOn</em>:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>Task(&quot;A&quot;) // Название\r\n.IsDependentOn(&quot;B&quot;)\r\n.Does(() =&gt;\r\n{\r\n    //Реализация Task A\r\n});</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Также можно легко задавать условия, при которых задача будет или не будет выполняться с помощью метода&nbsp;<em>WithCriteria</em>:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>Task(&quot;B&quot;) // Название\r\n.IsDependentOn(&quot;C&quot;)\r\n.WithCriteria(DateTime.Now.Second % 2 == 0)\r\n.Does(() =&gt;\r\n{\r\n    //Реализация Task A\r\n});</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Если же какая-то задача зависит от задачи B, а критерий принимает значение false, то задача B не выполнится, однако поток исполнения пойдет дальше и исполнит задачи, от которых зависит B.<br />\r\nСуществует также перегрузка метода&nbsp;<em>WithCriteria</em>, принимающая в качестве параметра функцию, которая возвращает bool. В этом случае выражение будет посчитано только тогда, когда до задачи дойдет очередь, а не в момент выстраивания дерева задач.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cake также поддерживает некоторые специфичные препроцессорные директивы, среди которых&nbsp;<em>load</em>,&nbsp;<em>reference</em>,&nbsp;<em>tool</em>&nbsp;и&nbsp;<em>break</em>. Подбробнее о них можно почитать на соответствующей&nbsp;<a href=\"http://cakebuild.net/docs/fundamentals/preprocessor-directives\">странице</a>&nbsp;документации.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Думаю, что людей, которые собирают свои проекты руками в эру DevOps, уже не так уж много. Преимущество любой системы сборки в сравнении с ручной сборкой очевидно &mdash; автоматически настроенный процесс всегда лучше ручных манипуляций.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Преимущества Cake при разработке на C</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Зачем использовать именно Cake, раз существует множество альтернатив? Если вы не разрабатываете на C#, то, скорее всего, не за чем. А если разрабатываете, то выглядит разумным писать скрипты сборки на тем же языке, на котором написан и основной проект, поскольку не нужно изучать еще один язык программирования и плодить их зоопарк в рамках одной кодовой базы. Потому и стали появляться системы сборки типа&nbsp;<em>Rake (Ruby)</em>,&nbsp;<em>Psake (Powershell)</em>&nbsp;или&nbsp;<em>Fake (F#)</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cake &mdash; безусловно не единственный способ собрать проект на C#. Как варианты, можно привести в пример чистый MSBuild, Powershell, Bat-скрипты или CI Server типа Teamcity или Jenkins, однако все они имеют как преимущества, так и недостатки:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Скрипты на Powershell, равно как Bat/Bash довольно сложно поддерживать</li>\r\n	<li>DSL на основе C# приятнее по синтаксису DSL на основе XML из MSBuild. К тому же поддержка MSBuild в Linux/Mac появилась не так давно.</li>\r\n	<li>CI-сервер накладывает Vendor-lock и зачастую требует &quot;программирования мышкой&quot;, следовательно и отвязывает версию процесса сборки от версии кода в репозитории, хотя некоторые CI системы и позволяют хранить файлы с описанием процесса сборки вместе с кодом.</li>\r\n	<li>Использование CI не позволяет собирать код локально так же, как и на CI-сервере</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>Установка Cake</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Теперь поговорим о том, как же исполнять скрипты с задачами. У cake есть загрузчик, который все сделает за вас. Скачать его можно либо вручную, либо следующей powershell командой:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>Invoke-WebRequest http://cakebuild.net/download/bootstrapper/windows -OutFile build.ps1</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Скачанный файл&nbsp;<em>build.ps1</em>&nbsp;затем сам загрузит необходимый cake.exe, если он еще не загружен, и исполнит cake-скрипт (по-умолчанию это&nbsp;<em>build.cake</em>), если мы вызовем его следующей командой:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>Powershell -File &quot;.\\build.ps1&quot; -Configuration &quot;Debug&quot;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Мы можем также передать в&nbsp;<em>build.ps1</em>&nbsp;аргументы командной строки, которые потом исполнятся. Они могут быть как встроенными, например,&nbsp;<em>configuration</em>, который обычно отвечает за конфигурацию сборки, так и заданные самостоятельно &mdash; в этом случае есть два способа:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Передать как значение параметра&nbsp;<em>ScriptArgs</em>:\r\n\r\n	<pre>\r\n<code>Powershell -File &quot;.\\build.ps1&quot; -Script &quot;version.cake&quot; -ScriptArgs &#39;--buildNumber=&quot;123&quot;&#39;</code></pre>\r\n	</li>\r\n	<li>Изменить build.ps1 таким образом, чтобы он пробрасывал переданный аргумент cake.exe.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>Примеры</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Что же, теперь перейдем к практике. Легко можно представить типичный цикл сборки nuget-пакета:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"nuget pack pipeline\" src=\"https://habrastorage.org/web/823/90e/7df/82390e7df95342f8bcf0798e2f5ab595.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Собираем с помощью MSBuild из исходников dll</li>\r\n	<li>Прогоняем юнит-тесты</li>\r\n	<li>Собираем все в nuget по nuspec-описанию</li>\r\n	<li>Пушим в nuget feed</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Сборка dll</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Чтобы собрать из исходников наш solution, необходимо сделать 2 вещи:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Восстановить nuget-пакеты, от которых зависит наш solution с помощью функциии&nbsp;<em>NuGetRestore</em></li>\r\n	<li>Собрать solution по умолчанию встроенной в cake функцией&nbsp;<em>DotNetBuild</em>, передав ей параметр&nbsp;<em>configuration</em>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Опишем задачу по сборке solution на cake-dsl:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>var configuration = Argument(&quot;configuration&quot;, &quot;Debug&quot;);\r\n\r\nTask(&quot;Build&quot;)\r\n.Does(() =&gt;\r\n{\r\n    NuGetRestore(&quot;../Solution/Solution.sln&quot;);\r\n    DotNetBuild(&quot;../Solution/Solution.sln&quot;, x =&gt; x\r\n        .SetConfiguration(configuration)\r\n        .SetVerbosity(Verbosity.Minimal)\r\n        .WithTarget(&quot;build&quot;)\r\n        .WithProperty(&quot;TreatWarningsAsErrors&quot;, &quot;false&quot;)\r\n    );\r\n});\r\n\r\nRunTarget(&quot;Build&quot;);</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Конфигурация сборки, соответственно, считывается из аргументов командой строки с помощью функции&nbsp;<em>Argument</em>&nbsp;со значением по умолчанию &quot;Debug&quot;. Функция&nbsp;<em>RunTarget</em>&nbsp;запускает указанную задачу, так что мы сразу можем проверить правильность работы нашего cake-скрипта.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Юнит-тесты</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Чтобы запустить юнит-тесты, совместимые с nunit v3.x, нам нужна функция&nbsp;<em>NUnit3</em>, которая не входит в поставку Cake и поэтому требует подключения через препроцессорную директиву #tool. Директива #tool позволяет подключать инструменты из nuget-пакетов, чем мы и воспользуемся:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>#tool &quot;nuget:?package=NUnit.ConsoleRunner&amp;version=3.6.0&quot;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>При этом сама задача оказывается предельно проста. Не забываем, конечно, что она зависит от задачи Build:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>#tool &quot;nuget:?package=NUnit.ConsoleRunner&amp;version=3.6.0&quot;\r\n\r\nTask(&quot;Tests::Unit&quot;)\r\n.IsDependentOn(&quot;Build&quot;)\r\n.Does(()=&gt; \r\n{\r\n    NUnit3(@&quot;..\\Solution\\MyProject.Tests\\bin\\&quot; + configuration + @&quot;\\MyProject.Tests.dll&quot;);\r\n});\r\n\r\nRunTarget(&quot;Tests::Unit&quot;);</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Пакуем все в nuget</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Чтобы упаковать нашу сборку в nuget, воспользуемся следующей nuget-спецификацией:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code><!--?xml version=\"1.0\" encoding=\"utf-8\"?-->\r\n\r\n    \r\n        Solution\r\n        1.0.0Test solution for demonstration purposes\r\n        \r\n            Test solution for demonstration purposes\r\n        \r\n        Gleb Smagliy\r\n        Gleb Smagliy\r\n        false\r\n        \r\n        \r\n            \r\n        \r\n    \r\n    \r\n        \r\n        \r\n    \r\n</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Положим ее в папку со скриптом build.cake. При исполнении задачи Pack перенесем все необходимые артефакты для упаковки в папку &quot;..\\.artefacts&quot;. Для этого убедимся, что она есть (а если нет &mdash; создадим) с помощью функции&nbsp;<em>EnsureDirectoryExists</em>&nbsp;и очистим ее с помощью функции&nbsp;<em>CleanDirectory</em>, встроенных в Cake. С помощью же функций по копированию файлов переместим нужные нам dll и pdb в папку с арефактами.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>По умолчанию собранный nupkg попадет в текущую папку, поэтому укажем в качестве&nbsp;<em>OutputDirectory</em>&nbsp;папку &quot;..\\package&quot;, которую мы так же создали и очистили.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>Task(&quot;Pack&quot;)\r\n.IsDependentOn(&quot;Tests::Unit&quot;)\r\n.Does(()=&gt; \r\n{\r\n    var packageDir = @&quot;..\\package&quot;;\r\n    var artefactsDir = @&quot;..\\.artefacts&quot;;\r\n\r\n    MoveFiles(&quot;*.nupkg&quot;, packageDir);\r\n\r\n    EnsureDirectoryExists(packageDir);\r\n    CleanDirectory(packageDir);\r\n\r\n    EnsureDirectoryExists(artefactsDir);\r\n    CleanDirectory(artefactsDir);\r\n    CopyFiles(@&quot;..\\Solution\\MyProject\\bin\\&quot; + configuration + @&quot;\\*.dll&quot;, artefactsDir);\r\n    CopyFiles(@&quot;..\\Solution\\MyProject\\bin\\&quot; + configuration + @&quot;\\*.pdb&quot;, artefactsDir);\r\n    CopyFileToDirectory(@&quot;.\\Solution.nuspec&quot;, artefactsDir);\r\n\r\n    NuGetPack(new FilePath(artefactsDir + @&quot;\\Solution.nuspec&quot;), new NuGetPackSettings\r\n    {\r\n        OutputDirectory = packageDir\r\n    });\r\n});\r\n\r\nRunTarget(&quot;Pack&quot;);</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Публикуем</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Для публикации пакетов используется функция&nbsp;<em>NuGetPush</em>, которая принимает путь до nupkg файла, а также настройки: ссылку на nuget feed и API key. Конечно же, мы не будем хранить API Key в репозитории, а передадим снаружи опять же с помощью функции&nbsp;<em>Argument</em>. В качестве же nupkg возьмем просто первый файл в директории&nbsp;<em>package</em>, подходящий по маске с помощью&nbsp;<em>GetFiles</em>. Мы можем так сделать, поскольку директория была предварительно очищена перед упаковкой. Итак, задача по публикации описывается следующим dsl:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>var nugetApiKey = Argument(&quot;NugetApiKey&quot;, &quot;&quot;);\r\n\r\nTask(&quot;Publish&quot;)\r\n.IsDependentOn(&quot;Pack&quot;)\r\n.Does(()=&gt; \r\n{\r\n    NuGetPush(GetFiles(@&quot;..\\package\\*.nupkg&quot;).First(), new NuGetPushSettings {\r\n        Source = &quot;https://www.nuget.org/api/v2&quot;,\r\n        ApiKey = nugetApiKey\r\n    });\r\n});\r\n\r\nRunTarget(&quot;Publish&quot;);</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Упрощаем себе жизнь</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Во время отладки cake-скрипта, да и просто для отладки nuget-пакета, можно не публиковать его каждый раз в удаленный feed. Тут-то нам на помощью и придет функция&nbsp;<em>WithCriteria</em>, которую мы рассматривали. Будем передавать скрипту параметром флаг&nbsp;<em>PublishRemotely</em>&nbsp;(по-умолчанию выставленный в false), чтобы по значению этого флага определять, выложить ли пакет в удаленный feed. Однако cake не выполнит скрипт, если мы пропустим задачу, которую указали функции&nbsp;<em>RunTarget</em>. Поэтому заведем фиктивную пустую задачу&nbsp;<em>BuildAndPublish</em>, которая будет зависеть от&nbsp;<em>Publish</em>:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>Task(&quot;BuildAndPublish&quot;)\r\n.IsDependentOn(&quot;Publish&quot;)\r\n.Does(()=&gt; \r\n{\r\n});\r\n\r\nRunTarget(&quot;BuildAndPublish&quot;);</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>И добавим условие к задаче Publish:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n<code>var nugetApiKey = Argument(&quot;NugetApiKey&quot;, &quot;&quot;);\r\nvar publishRemotely = Argument(&quot;PublishRemotely&quot;, false);\r\n\r\nTask(&quot;Publish&quot;)\r\n.IsDependentOn(&quot;Pack&quot;)\r\n.WithCriteria(publishRemotely)\r\n.Does(()=&gt; \r\n{\r\n    NuGetPush(GetFiles(@&quot;..\\package\\*.nupkg&quot;).First(), new NuGetPushSettings {\r\n        Source = &quot;https://www.nuget.org/api/v2&quot;,\r\n        ApiKey = nugetApiKey\r\n    });\r\n});</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Скрипт для сборки и публикации nuget-пакета почти готов, осталось только совместить все задачи воедино. Окончательную версию кода можно найти в репозитории на&nbsp;<a href=\"https://github.com/gleb-smagliy/cake-build-article\">github</a>.</p>\r\n\r\n<h1>Заключение</h1>\r\n\r\n<p>Мы рассмотрели простейший пример использования cake. Сюда можно было бы добавить интеграцию со slack, мониторинг покрытия кода тестами и еще много всего. Имея богатую систему аддонов, активное сообщество, а также довольно неплохую документацию, cake явлляется весьма неплохой альтернативой CI-системам и MSBuild для сборки С# кода.</p>', 'image/7738262.png', 2, 1, '2017-05-22 03:25:22', '2017-05-23 04:20:17'),
(2, 'Как быстро настроить автопостинг для Facebook и Twitter', 'Здравствуйте, дорогие читатели!\r\n\r\nПотребность максимально быстро и эффективно выполнять работу с сайтом есть у всех, как у успешных, так и у начинающих предпринимателей. Желание автоматизировать процесс выражается не только в лёгком наполнении сайта контентом, но и в наиболее быстром информировании целевой аудитории о появлении нового контента.', '<p>Здравствуйте, дорогие читатели!<br />\r\n<br />\r\nПотребность максимально быстро и эффективно выполнять работу с сайтом есть у всех, как у успешных, так и у начинающих предпринимателей. Желание автоматизировать процесс выражается не только в лёгком наполнении сайта контентом, но и в наиболее быстром информировании целевой аудитории о появлении нового контента.<br />\r\n<br />\r\nВ этой статье я хочу продемонстрировать вам простой способ постинга информации (например, статей или страниц сайта) в социальные сети с минимальным количеством усилий. Представьте себе, что вы добавляете контент на сайт, или же пользователи вашего сайта публикуют объявления (подобно тому, как это было выполнено нашей командой в работе над сайтом&nbsp;<a href=\"https://carvoy.com/\">carvoy.com</a>), и информация о добавлении нового контента появляется на ваших страницах в социальных сетях. Этот способ эффективен тем, что доносит информацию непосредственно целевой аудитории.<a name=\"habracut\"></a><br />\r\n&nbsp;</p>\r\n\r\n<h2>Автопостинг в Facebook</h2>\r\n\r\n<p><br />\r\nПредлагаю начать с практической части данного процесса. Сначала разберемся с автопостингом в Facebook при добавлении объявления. Согласно документации для Facebook, нам необходимо зарегистрировать приложение, чтобы использовать его для публикации сообщений на стене. Переходим на специальную страницу для разработчиков&nbsp;<a href=\"https://developers.facebook.com/apps\">https://developers.facebook.com/apps</a>&nbsp;и добавляем Facebook приложение.<br />\r\n<br />\r\n<img src=\"https://habrastorage.org/web/299/9b5/220/2999b5220fa84a2388733342fc5c3fd0.png\" /><br />\r\n<br />\r\nТут все предельно просто: нажимаем кнопку &rdquo;Create a New App&rdquo;, вводим информацию о вашем приложении (название, контактный email, выбираем категорию &ldquo;Apps for Pages&rdquo;) и, наконец, после клика на кнопку &ldquo;Create App ID&rdquo; и ввода проверочной капчи создается приложение.<br />\r\n<br />\r\n<img src=\"https://habrastorage.org/web/903/5c8/086/9035c808640045ce990be20b7eca9812.png\" /><br />\r\n<br />\r\nДля дальнейшей работы вам понадобятся следующие параметры:&nbsp;<br />\r\nAPP ID и APP SECRET<br />\r\n<br />\r\n<img src=\"https://habrastorage.org/web/0b7/a99/18f/0b7a9918fcc649299710736ea65a3757.png\" /><br />\r\n<br />\r\nС этими данными нам необходимо получить токен доступа для этого приложения, который позволит нам действовать от имени администратора страницы. Этот токен в дальнейшем будет использоваться для публикации. Как получить access token детально описано в документации&nbsp;<a href=\"https://developers.facebook.com/docs/facebook-login/access-tokens#apptokens\">facebook for developers</a>. Все что нам нужно, это открыть следующую ссылку в браузере:<br />\r\n<br />\r\n<code>https://graph.facebook.com/oauth/access_token?type=client_cred&amp;client_id=&lt;APP_ID&gt;&amp;client_secret=&lt;APP_SECRET&gt;</code><br />\r\n<br />\r\nЭтот запрос вернет токен доступа, который мы можем использовать для публикации. Далее устанавливаем разрешение на публикацию следующим запросом:<br />\r\n<br />\r\n<code>https://www.facebook.com/dialog/oauth?client_id=&lt;APP_ID&gt;&amp;client_secret=&lt;APP_SECRET&gt;&amp;redirect_uri=https://carvoy.com&amp;scope=publish_actions&amp;response_type=token</code><br />\r\n<br />\r\nЧтобы опубликовать на стене вашей социальной страницы в Facebook, нам нужно будет отправить HTTP-запрос POST на следующий URL-адрес:<br />\r\n<code>https://graph.facebook.com/&lt;PAGE_ID&gt;/feed</code><br />\r\n<br />\r\nДалее нам надо предоставить сообщение, ссылку на картинку, ссылку на страницу объявления, которое только что добавили, заголовок, описание, не забывая отправить наш параметр токена доступа, который мы только что получили.<br />\r\n<br />\r\nЧтобы узнать PAGE_ID страницы, на стену которой вы собираетесь публиковать запись, достаточно изменить в полном адресе страницы www на graph и добавить get параметром токен доступа. Вот, к примеру, ссылка для получения ID нужной мне страницы.<br />\r\n<br />\r\n<code>https://graph.facebook.com/Carvoy/?access_token=326799827727254|aRtZuU48IqeJ0s8SY6sVOIfPAiA</code><br />\r\n<br />\r\nВ ответ мы получаем JSON объект, в котором содержится ID этой страницы. Вот так:<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code>{\r\n   &quot;name&quot;: &quot;Carvoy&quot;,\r\n   &quot;id&quot;: &quot;1629966630552080&quot;\r\n}</code></pre>\r\n\r\n<p><br />\r\nАвтопостинг реализуется в виде модуля autoposting, в котором создается класс поведения. Его я буду применять в модели Lease и затем обрабатывать событие при добавлении объявления (листинга). Затем этот модуль можно будет переиспользовать, дополнять и дорабатывать.<br />\r\n<br />\r\nСтруктура файлов модуля:<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code>&hellip;\r\nautoposting\r\n-- behaviors\r\n-- -- AutopostingBehavior.php\r\n-- Module.php\r\n&hellip;</code></pre>\r\n\r\n<p><br />\r\nВ файле modules/autoposting/Module.php &mdash; стандартная инициализация модуля. А в файле modules/autoposting/behaviors/AutopostingBehavior.php &mdash; описание поведения при добавлении новой записи:<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code>&lt;?php\r\n\r\nnamespace modules\\autoposting\\behaviors;\r\n\r\nuse Yii;\r\nuse yii\\base\\Behavior;\r\nuse yii\\base\\Exception;\r\nuse yii\\db\\ActiveRecord;\r\nuse yii\\helpers\\Url;\r\nuse Abraham\\TwitterOAuth\\TwitterOAuth;\r\n\r\n/**\r\n * Class AutopostingBehavior\r\n * @package modules\\autoposting\\behaviors\r\n */\r\nclass AutopostingBehavior extends Behavior {\r\n\r\n    /**\r\n     * @return array\r\n     */\r\n    public function events() {\r\n\r\n        return [\r\n            ActiveRecord::EVENT_AFTER_INSERT =&gt; &#39;postToWall&#39;,\r\n        ];\r\n    }\r\n\r\n    /**\r\n     * @param \\yii\\base\\Event $event\r\n     *\r\n     * @throws Exception\r\n     */\r\n   public function postToWall( $event ) {\r\n\r\n        $model    = $event-&gt;sender;\r\n\r\n        if ($model) {\r\n            $link = Url::to([&#39;/lease/lease/view&#39;, &#39;state&#39;=&gt;$model-&gt;state, &#39;node&#39;=&gt;$model-&gt;url ], true);\r\n            $message = &quot;New listing available on our site - $model-&gt;make $model-&gt;model $model-&gt;year in $model-&gt;location. \\n&quot; . $link;\r\n            $this-&gt;facebookPost([\r\n                &#39;message&#39;     =&gt; $message,\r\n                &#39;link&#39;        =&gt; $link,\r\n                // &#39;picture&#39;     =&gt; &#39;http://thepicturetoinclude.jpg&#39;, // link to vehicle picture\r\n                // &#39;name&#39;        =&gt; &#39;Name of the picture, shown just above it&#39;,\r\n                // &#39;description&#39; =&gt; &#39;Full description explaining whether the header or the picture&#39;\r\n            ]);\r\n            $this-&gt;twitterPost($message);\r\n        }\r\n\r\n    }\r\n\r\n    private function facebookPost ($data)\r\n    {\r\n        // need token\r\n        $data[&#39;access_token&#39;] = &#39;326799827727254|aRtZuU48IqeJ0s8SY6sVOIfPAiA&#39;;\r\n\r\n        $page_id = &lsquo;1629966630552080&rsquo;;\r\n        $post_url = &#39;https://graph.facebook.com/&#39;.$page_id.&#39;/feed&#39;;\r\n\r\n        // init\r\n        $ch = curl_init();\r\n        curl_setopt($ch, CURLOPT_URL, $post_url);\r\n        curl_setopt($ch, CURLOPT_POST, 1);\r\n        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);\r\n        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);\r\n        // execute and close\r\n        $return = curl_exec($ch);\r\n        curl_close($ch);\r\n        // end\r\n        return $return;\r\n    }\r\n\r\n    private function twitterPost ($message)\r\n    {\r\n\r\n    }\r\n\r\n}</code></pre>\r\n\r\n<p><br />\r\nМетод twitterPost я опишу немного позже, когда мы закончим с публикацией в Fecebook и перейдем к автопостингу в Twitter.<br />\r\n<br />\r\nДобавим класс поведения автопостинга в массив с поведениями модели&nbsp;<br />\r\n/modules/lease/models/frontend/Lease.php<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code>...\r\n   /**\r\n     * @inheritdoc\r\n     */\r\n    public function behaviors()\r\n    {\r\n        return [\r\n            &#39;timestampBehavior&#39; =&gt; [\r\n                &#39;class&#39; =&gt; yii\\behaviors\\TimestampBehavior::className(),\r\n            ],\r\n            \\modules\\autoposting\\behaviors\\AutopostingBehavior::className(),  // Autoposting behavior\r\n        ];\r\n    }\r\n...</code></pre>\r\n\r\n<p><br />\r\nСразу добавим поведение TimestampBehavior. С его помощь заполняются поля модели created_at или updated_at во время создания или обновления записи. Теперь при создании нового листинга в классе AutopostingBehavior отработает метод postToWall, в котором будут отправляться запросы на публикацию в социальные сети. Это определено следующей строкой в классе AutopostingBehavior:<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code>...\r\nActiveRecord::EVENT_AFTER_INSERT =&gt; &#39;postToWall&#39;,\r\n...</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Автопостинг в Twitter</h2>\r\n\r\n<p><br />\r\nДля постинга в Twitter будем использовать наиболее популярную PHP библиотеку для работы с Twitter OAuth REST API &mdash;&nbsp;<a href=\"https://twitteroauth.com/\">twitteroauth</a>.<br />\r\n<br />\r\nУстановим ее с использованием composer. Нам просто нужно будет выполнить следующую команду:<br />\r\n<br />\r\n<code>php composer.phar require abraham/twitteroauth</code><br />\r\n<br />\r\nЧтобы пользоваться Twitter API нужно тоже зарегистрировать свое приложение. Для этого идем по ссылке&nbsp;<a href=\"https://apps.twitter.com/\">https://apps.twitter.com/</a>&nbsp;под своим логином и паролем и жмем на кнопку &laquo;Create New App&raquo;. Затем заполняем форму и жмем &ldquo;Create your Twitter application&rdquo;.<br />\r\n<br />\r\nПопадаем в настройки вновь созданного приложения. Здесь необходимо убедиться, что в пункте Access level выбрано &ldquo;Read and write&rdquo;.&nbsp;<br />\r\n<br />\r\nПереходим во вкладку &laquo;Keys and Access Tokens&raquo;, а потом жмем на название вновь созданного приложения. На этой вкладке мы берем 4 ключа для работы с нашим приложением:<br />\r\n<br />\r\n<code>Consumer Key<br />\r\nConsumer Secret</code><br />\r\nПрокручиваем страницу ниже и видим кнопку &laquo;Create my access token&raquo;; после нажатия на нее получаем недостающую пару ключей:<br />\r\n<br />\r\n<code>Access Token<br />\r\nAccess Token Secret</code><br />\r\n<br />\r\nДальнейшие действия очень просты. Мы реализуем метод twitterPost. Для этого нужно использовать класс TwitterOAuth с ключами для доступа к Twitter.<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code>...\r\nprivate function twitterPost ($message)\r\n    {\r\n\r\n        $CONSUMER_KEY    = &#39;XYNpO5yj0shMgH43j4lYKMDfH&#39;;\r\n        $CONSUMER_SECRET = &#39;VevyEwrhHxabcQgN2S0KuL1i9Gx9CnPXyM2yVLfQ0LlJSZ7BmF&#39;;\r\n        $OAUTH_TOKEN     = &#39;3432829204-6IS6o3hGW3xouvgCso279o4ODU15grLLUy0iWPX&#39;;\r\n        $OAUTH_SECRET    = &#39;vGzYOtJkcx8PK96YcyUdXM6PtqmhGiVLmHOqCDHM2lkIq&#39;;\r\n\r\n\r\n        $connection = new \\Abraham\\TwitterOAuth\\TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $OAUTH_TOKEN, $OAUTH_SECRET);\r\n\r\n        $statues = $connection-&gt;post(&quot;statuses/update&quot;, array(&quot;status&quot; =&gt; $message));\r\n\r\n        return $connection-&gt;getLastHttpCode() == 200;\r\n\r\n    }\r\n...</code></pre>\r\n\r\n<p><br />\r\nИтак, буквально за несколько шагов мы организовали автопостинг в две популярные социальные сети. Естественно, код интеграции представлен в ознакомительных целях для демонстрации; его можно улучшить и выносить интеграцию с каждой социальной сетью в отдельный класс.&nbsp;<br />\r\n<br />\r\nПараметры, такие как access_token и page_id для Facebook, а также Consumer Key, Consumer Secret, Access Token, Access Token Secret для Twitter можно вынести в файл конфигурации приложения в файле common\\config\\params.php.<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code>&lt;?php\r\nreturn [\r\n    &#39;adminEmail&#39; =&gt; &#39;admin@example.com&#39;,\r\n    &#39;supportEmail&#39; =&gt; &#39;support@example.com&#39;,\r\n    &#39;user.passwordResetTokenExpire&#39; =&gt; 3600,\r\n    &#39;autoposting&#39; =&gt; [\r\n        &#39;twitter&#39; =&gt; [\r\n            &#39;consumer_key&#39;    =&gt; &quot;XYNpO5yj0shMgH43j4lYKMDfH&quot;,\r\n            &#39;consumer_secret&#39; =&gt; &quot;VevyEwrhHxabcQgN2S0KuL1i9Gx9CnPXyM2yVLfQ0LlJSZ7BmF&quot;,\r\n            &#39;oauth_token&#39;     =&gt; &quot;3432829204-6IS6o3hGW3xouvgCso279o4ODU15grLLUy0iWPX&quot;,\r\n            &#39;oauth_secret&#39;    =&gt; &quot;vGzYOtJkcx8PK96YcyUdXM6PtqmhGiVLmHOqCDHM2lkIq&quot;,\r\n        ],\r\n        &#39;facebook&#39; =&gt; [\r\n            &#39;page_id&#39; =&gt; &#39;1629966630552080&#39;,\r\n            &#39;page_access_token&#39; =&gt; &#39;326799827727254|aRtZuU48IqeJ0s8SY6sVOIfPAiA&#39;\r\n        ]\r\n    ]\r\n];</code></pre>\r\n\r\n<p><br />\r\nТеперь получать доступ к этим параметрам можно через свойство params экземпляра приложения:<br />\r\n<br />\r\n<code>$data[&#39;access_token&#39;] = Yii::$app-&gt;params[&#39;autoposting&#39;][&#39;facebook&#39;][&#39;page_access_token&#39;];</code><br />\r\n<br />\r\nОтмечу отдельно, что на рабочем проекте необходимо организовать очередь для отправки запросов в социальные сети, а не делать синхронные запросы на публикацию. Связано это с тем, что пользователь при публикации объявления на сайте при данном подходе будет дожидаться выполнения запросов на публикацию в социальные сети и только после их выполнения получит фидбек об удачном добавлении его объявления на сайт. Это может занять длительное время, хотя момент публикации в социальные сети не должен отрицательно отражаться на юзабилити.<br />\r\n<br />\r\nДля организации такого рода очереди, чтобы публикация в социальные сети проходила в фоновом режиме и не увеличивала время добавления пользователем объявления на сайт, нам поможет самое лучшее, на мой взгляд, расширение для организации очередей&nbsp;<a href=\"https://github.com/zhuravljov/yii2-queue\">https://github.com/zhuravljov/yii2-queue</a><br />\r\n<br />\r\nВесь описанный в этой и&nbsp;<a href=\"https://habrahabr.ru/post/318242/\">предыдущих статьях</a>&nbsp;код доступен для вас в&nbsp;<a href=\"https://github.com/pavelsingree/yii2-angular\">репозитории</a>.<br />\r\n<br />\r\nСпасибо за внимание!</p>', 'image/3eb206cf107948978701771f6b6fade1.jpg', 2, 1, '2017-05-22 09:56:21', '2017-05-22 10:30:46'),
(3, 'Приглашаем на Moscow Data Science 31 мая', '31 мая в офисе Mail.Ru Group состоится традиционная встреча сообщества Moscow Data Science. Вы сможете обменяться профессиональным опытом решения практических задач анализа данных и пообщаться в неформальной обстановке. В программе встречи три доклада, подробности читайте под катом.', '<p>31 мая в офисе Mail.Ru Group состоится традиционная встреча сообщества Moscow Data Science. Вы сможете обменяться профессиональным опытом решения практических задач анализа данных и пообщаться в неформальной обстановке. В программе встречи три доклада, подробности читайте под катом.<br />\r\n<a name=\"habracut\"></a><br />\r\n<br />\r\n<img src=\"https://habrastorage.org/web/2f7/d6a/b2f/2f7d6ab2fb27421dbc6957577eef2949.jpg\" style=\"float:left\" /><strong>&mdash; &laquo;Градиентный бустинг: возможности, особенности и фишки за пределами стандартных kaggle-style задач&raquo;</strong><br />\r\nАлексей Натекин, DM Labs, OpenDataScience<br />\r\n<br />\r\nМногие пользуются градиентным бустингом, но мало кто читает по нему документацию. Еще меньше людей интересуются статьями и рецептами, как его лучше готовить и что вообще с ним можно делать. Во время этого доклада мы как раз пройдемся по набору интересных возможностей, приемов и рецептов.<br />\r\n<br />\r\n<img src=\"https://habrastorage.org/web/974/7ea/c9c/9747eac9ceba45d9ba602d582c4c4a13.jpg\" style=\"float:left\" /><strong>&mdash; &laquo;Как перестать бояться и начать решать convai.io&raquo;</strong><br />\r\nВалентин Малых, Лаборатория нейронных систем и глубокого обучения МФТИ<br />\r\n<br />\r\nДля тех, кто хотел поучаствовать в соревновании по созданию разговорного искусственного интеллекта, и для тех, кто хотел, но не знал об этом, будет интересным посмотреть на то, как устроен бейзлайн на convai.io. Также мы дадим обзор существующего состояния области, чтобы понимать где мы находимся, и почему это соревнование нужно провести именно сейчас.<br />\r\n<br />\r\n<img src=\"https://habrastorage.org/web/8d9/1dd/c92/8d91ddc929e34cf59f2e03b582119025.jpg\" style=\"float:left\" /><strong>&mdash; &laquo;Решение задачи Dstl Satellite Imagery Feature Detection (Kaggle)&raquo;</strong><br />\r\nЕвгений Некрасов, Mail.Ru Group<br />\r\n<br />\r\nВ соревновании Dstl Satellite Imagery Feature Detection участникам была поставлена задача сегментации мультиспектральных спутниковых изображений. В докладе будет разобрано решение этой задачи на основе свёрточных нейронных сетей, которому присудили 7 место из 419 команд.<br />\r\n<br />\r\nСбор участников и регистрация: 18:00<br />\r\nНачало докладов: 18:30<br />\r\n<br />\r\nАдрес: офис компании Mail.Ru Group, Ленинградский проспект, 39, стр. 79.<br />\r\n<br />\r\nДля участия необходимо&nbsp;<a href=\"https://corp.mail.ru/ru/press/events/347/#\">зарегистрироваться</a>. Для тех, кто не сможет присутствовать лично, будет организована&nbsp;<a href=\"https://it.mail.ru/broadcasts/67/\">видеотрансляция</a>.</p>', 'image/b480f0ca65c9449d9425a91fe94c2d8a.jpg', 2, 1, '2017-05-22 10:28:28', '2017-05-22 10:28:28'),
(4, 'тест', 'тест', '<p>тест</p>', 'image/35ea7ae383ffc38057e0cee5802443af.png', 3, 1, '2017-05-22 10:37:28', '2017-05-23 06:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `new_images`
--

CREATE TABLE `new_images` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `new_model_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_images`
--

INSERT INTO `new_images` (`id`, `src`, `new_model_id`, `created_at`, `updated_at`) VALUES
(1, 'image/6f8f85e72bbbd145556d64e8cc23dbc6.jpeg', 4, '2017-05-23 04:51:22', '2017-05-23 04:51:22'),
(2, 'image/04760359f6dc4e013af89dabf9015379.jpeg', 4, '2017-05-23 04:51:22', '2017-05-23 04:51:22'),
(3, 'image/73f4c57f3fa1b2259e021e0e8c3ce1e7.png', 4, '2017-05-23 04:51:22', '2017-05-23 04:51:22'),
(4, 'image/7caa9a501940879e0fc3f89774437982.png', 4, '2017-05-23 04:53:12', '2017-05-23 04:53:12'),
(5, 'image/47ea573772005d3bdac5f5369a7e8a03.png', 4, '2017-05-23 04:53:12', '2017-05-23 04:53:12'),
(6, 'image/e80e62d5184a5e507dd7b86c2e1ae320.png', 4, '2017-05-23 04:56:46', '2017-05-23 04:56:46'),
(7, 'image/bf928c939efa6345d2ef0cc9660bdce4.png', 4, '2017-05-23 04:56:46', '2017-05-23 04:56:46'),
(9, 'image/8863b86944df02af46a983f97139382b.png', 4, '2017-05-23 06:20:18', '2017-05-23 06:20:18'),
(10, 'image/dPmXXq57aLs.jpg', 4, '2017-05-23 06:59:02', '2017-05-23 06:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(600) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `content`, `url`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ываываыва', '<p>ываываываыва</p>', 'http://sot.deimos/cp/polls/create', 0, '2017-05-22 05:19:24', '2017-05-22 05:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `statements`
--

CREATE TABLE `statements` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statements`
--

INSERT INTO `statements` (`id`, `type_id`, `first_name`, `last_name`, `email`, `address`, `phone`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'info@babichev.net', NULL, NULL, 'asdasdasdasd', '2017-05-22 05:24:27', '2017-05-23 11:35:22'),
(2, 2, 'ываываы', 'ываыва', 'info@content.com', NULL, '77777', 'привет мир', '2017-05-22 05:34:03', '2017-05-23 11:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 'чу-чу', 1, '2017-05-22 05:33:04', '2017-05-23 11:26:09'),
(2, 'пу-пу', 1, '2017-05-22 05:33:09', '2017-05-23 11:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maxim', 'info@babichev.net', '$2y$10$sG52Mk2JxFm7/ZNrga1qee5SF0gXyc6kS2x5GmJLiRaZhqdZOTcja', 'DfdxOMOv1j1kei8zuswo7ruobOUFotBk4fMFsAEOxc1VMgrfnccZluE7fPUU', '2017-04-24 02:47:53', '2017-04-24 02:47:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`);

--
-- Indexes for table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `new_images`
--
ALTER TABLE `new_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `new_images`
--
ALTER TABLE `new_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statements`
--
ALTER TABLE `statements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
