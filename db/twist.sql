-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-09-2025 a las 18:54:27
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `twist`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_articles`
--

DROP TABLE IF EXISTS `tw_articles`;
CREATE TABLE IF NOT EXISTS `tw_articles` (
  `article_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `url_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `paused` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`article_id`),
  UNIQUE KEY `url_slug` (`url_slug`),
  KEY `idx_url_slug` (`url_slug`),
  KEY `idx_publish_date` (`publish_date`),
  KEY `idx_paused` (`paused`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_article_faqs`
--

DROP TABLE IF EXISTS `tw_article_faqs`;
CREATE TABLE IF NOT EXISTS `tw_article_faqs` (
  `article_faq_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `article_id` int NOT NULL,
  PRIMARY KEY (`article_faq_id`),
  KEY `idx_article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_faqs`
--

DROP TABLE IF EXISTS `tw_faqs`;
CREATE TABLE IF NOT EXISTS `tw_faqs` (
  `faq_id` int NOT NULL AUTO_INCREMENT,
  `page` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order` int DEFAULT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_kids_camps_prices_list`
--

DROP TABLE IF EXISTS `tw_kids_camps_prices_list`;
CREATE TABLE IF NOT EXISTS `tw_kids_camps_prices_list` (
  `kid_camp_price_list_id` int NOT NULL AUTO_INCREMENT,
  `kid_camp_pricing_id` int NOT NULL,
  `price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `period` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`kid_camp_price_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_kids_camps_prices_list`
--

INSERT INTO `tw_kids_camps_prices_list` (`kid_camp_price_list_id`, `kid_camp_pricing_id`, `price`, `period`) VALUES
(12, 5, '$225', 'whole week per kid'),
(10, 5, '$45', 'day members'),
(11, 5, '$49', 'day non-members'),
(18, 7, '$225', 'whole week per kid'),
(17, 7, '$49', 'day non-members'),
(16, 7, '$45', 'day members'),
(19, 8, '$45', 'day members'),
(20, 8, '$49', 'day non-members'),
(21, 8, '$225', 'whole week per kid'),
(22, 9, '$45', 'day members'),
(23, 9, '$49', 'day non-members'),
(24, 9, '$225', 'whole week per kid'),
(25, 10, '$45', 'day members'),
(26, 10, '$49', 'day non-members'),
(27, 10, '$225', 'whole week per kid'),
(28, 11, '$45', 'day members'),
(29, 11, '$49', 'day non-members'),
(30, 11, '$225', 'whole week per kid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_kids_camps_pricings`
--

DROP TABLE IF EXISTS `tw_kids_camps_pricings`;
CREATE TABLE IF NOT EXISTS `tw_kids_camps_pricings` (
  `kid_camp_pricing_id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `background_colour` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`kid_camp_pricing_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_kids_camps_pricings`
--

INSERT INTO `tw_kids_camps_pricings` (`kid_camp_pricing_id`, `title`, `subtitle`, `link`, `background_colour`) VALUES
(5, 'Summer break camp!!', 'Monday', 'https://twist.gymdesk.com/book?date=2025-06-02&s=914569&schedule=15204', '9ABE37'),
(7, 'Summer break camp!!', 'Tuesday', 'https://twist.gymdesk.com/book?date=2025-06-03&s=914590&schedule=15204', '009FE2'),
(8, 'Summer break camp!!', 'Wednesday', 'https://twist.gymdesk.com/book?date=2025-06-04&s=914590&schedule=15204', 'F7941D'),
(9, 'Summer break camp!!', 'Thursday', 'https://twist.gymdesk.com/book?date=2025-06-05&s=914590&schedule=15204', '642E8B'),
(10, 'Summer break camp!!', 'Friday', 'https://twist.gymdesk.com/book?date=2025-06-06&s=914628&schedule=15204', 'EC008C'),
(11, 'Summer break camp!!', NULL, 'https://twist.gymdesk.com/book?date=2025-06-02&s=942787&schedule=15204', 'FFC909');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_kids_camps_pricing_features`
--

DROP TABLE IF EXISTS `tw_kids_camps_pricing_features`;
CREATE TABLE IF NOT EXISTS `tw_kids_camps_pricing_features` (
  `kid_camp_pricing_feature_id` int NOT NULL AUTO_INCREMENT,
  `kid_camp_pricing_id` int NOT NULL,
  `feature` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`kid_camp_pricing_feature_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_kids_camps_pricing_features`
--

INSERT INTO `tw_kids_camps_pricing_features` (`kid_camp_pricing_feature_id`, `kid_camp_pricing_id`, `feature`) VALUES
(3, 5, 'Leave the kids with us where they will practice their gymnastics skills.'),
(4, 5, 'Please pack a lunch.'),
(5, 5, 'We are a nut free facility.'),
(6, 5, 'After care is available, please inquire.'),
(7, 5, '10:00am - 2:00pm'),
(8, 5, 'Aftercare Available for $12/per day.'),
(18, 7, 'After care is available, please inquire.'),
(17, 7, 'We are a nut free facility.'),
(16, 7, 'Please pack a lunch.'),
(15, 7, 'Leave the kids with us where they will practice their gymnastics skills.'),
(19, 7, '10:00am - 2:00pm'),
(20, 7, 'Aftercare Available for $12/per day.'),
(21, 8, 'Leave the kids with us where they will practice their gymnastics skills.'),
(22, 8, 'Please pack a lunch.'),
(23, 8, 'We are a nut free facility.'),
(24, 8, 'After care is available, please inquire.'),
(25, 8, '10:00am - 2:00pm'),
(26, 8, 'Aftercare Available for $12/per day.'),
(27, 9, 'Leave the kids with us where they will practice their gymnastics skills.'),
(28, 9, 'Please pack a lunch.'),
(29, 9, 'We are a nut free facility.'),
(30, 9, 'After care is available, please inquire.'),
(31, 9, '10:00am - 2:00pm'),
(32, 9, 'Aftercare Available for $12/per day.'),
(33, 10, 'Leave the kids with us where they will practice their gymnastics skills.'),
(34, 10, 'Please pack a lunch.'),
(35, 10, 'We are a nut free facility.'),
(36, 10, 'After care is available, please inquire.'),
(37, 10, '10:00am - 2:00pm'),
(38, 10, 'Aftercare Available for $12/per day.'),
(39, 11, 'Leave the kids with us where they will practice their gymnastics skills.'),
(40, 11, 'Please pack a lunch.'),
(41, 11, 'We are a nut free facility.'),
(42, 11, 'After care is available, please inquire.'),
(43, 11, '10:00am - 2:00pm'),
(44, 11, 'Aftercare Available for $12/per day.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_newsletters`
--

DROP TABLE IF EXISTS `tw_newsletters`;
CREATE TABLE IF NOT EXISTS `tw_newsletters` (
  `newsletter_id` int NOT NULL AUTO_INCREMENT,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`newsletter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_newsletters`
--

INSERT INTO `tw_newsletters` (`newsletter_id`, `email`, `registration_date`) VALUES
(1, 'lucas.marini@rednodo.com', '2025/05/08 13:05:32'),
(3, 'marinilucas150@gmail.com', '2025/05/29 12:50:48'),
(4, 'marinilucas03@gmail.com', '2025/06/17 18:27:31'),
(5, 'Kmarrou@yahoo.com', '2025/07/31 18:42:22'),
(6, 'sararrr41@gmail.com', '2025/08/01 14:11:28'),
(7, 'memeblessedchild@gmail.com', '2025/08/03 00:50:25'),
(8, 'Bionfam@gmail.com', '2025/08/09 19:22:50'),
(9, 'oshiro.fujita@gmail.com', '2025/08/20 14:36:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_party_options`
--

DROP TABLE IF EXISTS `tw_party_options`;
CREATE TABLE IF NOT EXISTS `tw_party_options` (
  `party_option_id` int NOT NULL AUTO_INCREMENT,
  `option_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `background_colour` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`party_option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_party_options`
--

INSERT INTO `tw_party_options` (`party_option_id`, `option_type`, `background_colour`, `description`) VALUES
(4, 'Standard Option', '9ABE37', '<p>**Extra guests are $12 for each child&nbsp;<br />\r\n**An additional 30 minutes MAY be available for $50. You must inquire in advance to ensure.&nbsp;&nbsp;<br />\r\nThe deposit will be subtracted from the final cost of the party. Book below or send us an email with specific questions!</p>'),
(6, 'Premium Option', '009FE2', '<p>**Extra guests are $20 per child<br />\r\n**An additional 30 minutes MAY be available for $50. You must inquire in advance to ensure.<br />\r\nThe deposit will be subtracted from the final cost of the party. Book below or send us an email with specific questions!</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_party_option_prices`
--

DROP TABLE IF EXISTS `tw_party_option_prices`;
CREATE TABLE IF NOT EXISTS `tw_party_option_prices` (
  `party_option_price_id` int NOT NULL AUTO_INCREMENT,
  `party_option_id` int NOT NULL,
  `price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`party_option_price_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_party_option_prices`
--

INSERT INTO `tw_party_option_prices` (`party_option_price_id`, `party_option_id`, `price`, `description`) VALUES
(69, 4, '100', 'non-refundable deposit is needed to hold your party date.**'),
(68, 4, '385', 'if not enrolled in recurring class'),
(67, 4, '325', 'if currently enrolled in weekly class subscription'),
(66, 6, '100', 'non-refundable deposit is needed to hold your party date.**'),
(65, 6, '495', 'if not enrolled in recurring class'),
(64, 6, '435', 'if currently enrolled in weekly class subscription');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_party_option_supplies`
--

DROP TABLE IF EXISTS `tw_party_option_supplies`;
CREATE TABLE IF NOT EXISTS `tw_party_option_supplies` (
  `party_option_supply_id` int NOT NULL AUTO_INCREMENT,
  `party_option_id` int NOT NULL,
  `supplier` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`party_option_supply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_party_option_supplies`
--

INSERT INTO `tw_party_option_supplies` (`party_option_supply_id`, `party_option_id`, `supplier`, `supply`) VALUES
(93, 6, 'Customer', 'Any other items you would like'),
(96, 4, 'Customer', 'Food and drink for both children and adults'),
(99, 4, 'Customer', 'Plates, silverware, cups, napkins'),
(98, 4, 'Customer', 'Decorations and balloons'),
(97, 4, 'Customer', 'Party favors for guests'),
(92, 6, 'Customer', 'Decorations and balloons'),
(91, 6, 'Customer', 'Any additional food and drink for adults'),
(90, 6, 'Customer', 'Candles and Birthday Cake/Cupcakes'),
(86, 6, 'Twist', 'Party Favors (age 3yrs and up)'),
(87, 6, 'Twist', 'Honest Juice boxes, mini water bottles'),
(88, 6, 'Twist', 'Plates, silverware, cups, and napkins'),
(95, 4, 'Customer', 'Candles and Birthday Cake/Cupcakes'),
(94, 4, 'Customer', '15 guests, including birthday child'),
(89, 6, 'Customer', '15 guests, including the birthday child'),
(85, 6, 'Twist', '4 16\" 1-Topping pizzas from Il Primo next door'),
(100, 4, 'Customer', 'Any other items you would like');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_pricings`
--

DROP TABLE IF EXISTS `tw_pricings`;
CREATE TABLE IF NOT EXISTS `tw_pricings` (
  `pricing_id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` float NOT NULL,
  `period` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `background_colour` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_open_gym_price` int NOT NULL,
  PRIMARY KEY (`pricing_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_pricings`
--

INSERT INTO `tw_pricings` (`pricing_id`, `title`, `subtitle`, `price`, `period`, `link`, `background_colour`, `is_open_gym_price`) VALUES
(10, 'Under 3yrs', '1x per week', 110, '4 weeks', 'https://twist.gymdesk.com/signup/v/DdapY', '9ABE37', 0),
(11, 'Under 3yrs', '2x per week', 209, '4 weeks', 'https://twist.gymdesk.com/signup/v/DdapY', '009FE2', 0),
(12, 'Over 3yrs and Up', '2x per week', 219, '4 weeks', 'https://twist.gymdesk.com/signup/v/ArJ2q', 'F7941D', 0),
(13, 'Under 3yrs only', NULL, 10, 'visit', '/open-gym', 'F7941D', 1),
(14, 'All ages', NULL, 12, 'visit', '/open-gym', '9ABE37', 1),
(15, '6 Month Unlimited Open Gym', NULL, 199, 'One-time', 'https://twist.gymdesk.com/signup/v/Ax927', '009FE2', 1),
(16, 'Over 3yrs and Up', '1x per week', 120, '4 weeks', NULL, 'DF3DFF', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_pricing_benefits`
--

DROP TABLE IF EXISTS `tw_pricing_benefits`;
CREATE TABLE IF NOT EXISTS `tw_pricing_benefits` (
  `pricing_benefit_id` int NOT NULL AUTO_INCREMENT,
  `pricing_id` int NOT NULL,
  `benefit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`pricing_benefit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_pricing_benefits`
--

INSERT INTO `tw_pricing_benefits` (`pricing_benefit_id`, `pricing_id`, `benefit`) VALUES
(5, 10, 'Reserved spot in class'),
(4, 10, 'Under 3 years old'),
(6, 10, 'Unlimited Open Gym'),
(7, 10, 'Additional Discounts'),
(8, 10, '1 time registration fee applies to new families'),
(9, 11, 'Under 3 years old'),
(10, 11, 'Reserved spot in class'),
(11, 11, 'Unlimited Open Gym'),
(12, 11, 'Additional Discounts'),
(13, 11, '1 time registration fee applies to new families'),
(100, 12, '1 time registration fee applies to new families'),
(99, 12, 'Additional Discounts'),
(98, 12, 'Unlimited Open Gym'),
(97, 12, 'Reserved spot in class'),
(96, 12, '3 years old and Up'),
(81, 13, 'This open gym is offered Mon and Thurs mornings from mid Aug through May. CHECK THE SCHEDULE TO ENSURE TIMES Open Gym is happening. Under 3yrs only please.'),
(95, 15, '1 time registration fee applies to new families'),
(94, 15, 'Additional Discounts'),
(93, 15, 'Unlimited Open Gym'),
(92, 15, 'Reserved spot in class'),
(91, 15, 'Under 3 years old'),
(90, 14, 'Currently Open Gym is Mon- Fri from 2:05pm - 3:45pm'),
(110, 16, '1 time registration fee applies to new families'),
(109, 16, 'Additional Discounts'),
(108, 16, 'Unlimited Open Gym'),
(107, 16, 'Reserved spot in class'),
(106, 16, '3 years old and Up');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_sponsors`
--

DROP TABLE IF EXISTS `tw_sponsors`;
CREATE TABLE IF NOT EXISTS `tw_sponsors` (
  `sponsor_id` int NOT NULL AUTO_INCREMENT,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo_alternative_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `link_new_tab` int DEFAULT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_sponsors`
--

INSERT INTO `tw_sponsors` (`sponsor_id`, `logo`, `logo_alternative_text`, `link`, `link_new_tab`) VALUES
(2, '1748525546.png', 'C\'mon Logo', NULL, 0),
(3, '1748525659.png', 'Creative World School Logo', NULL, 0),
(4, '1748525683.png', 'PJ Library Logo', NULL, 0),
(5, '1748525696.png', 'Coastal Dance Logo', NULL, 0),
(6, '1748525708.png', 'Toys Logo', NULL, 0),
(7, '1748525721.png', 'CCPS Logo', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_testimonials`
--

DROP TABLE IF EXISTS `tw_testimonials`;
CREATE TABLE IF NOT EXISTS `tw_testimonials` (
  `testimony_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `punctuation` int NOT NULL,
  `colour` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`testimony_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_testimonials`
--

INSERT INTO `tw_testimonials` (`testimony_id`, `name`, `review`, `punctuation`, `colour`) VALUES
(2, 'Jennie', 'I love how the instructors at Twist make exercise fun and exciting for kids. My child looks forward to coming to class every week!', 5, '642E8B'),
(1, 'James', 'Twist has helped my child develop a positive attitude towards fitness that I know will serve them well for years to come.', 5, 'EC008C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tw_users`
--

DROP TABLE IF EXISTS `tw_users`;
CREATE TABLE IF NOT EXISTS `tw_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tw_users`
--

INSERT INTO `tw_users` (`user_id`, `name`, `surname`, `email`, `password`, `registration_date`) VALUES
(1, 'Juan', 'Marini', 'juan.marini@rednodo.com', '$2y$10$upxAHz9DMEk8KRzLfp6GuuDuR2uhNhheEFySL/GXnhjEj1ZOxm4xa', '2025-05-04'),
(3, 'Lucas', 'Marini', 'lucas.marini@rednodo.com', '$2y$10$Oj0Oi.B4c9g901JZXdIAr.BiZ6XVbVioQqFRarmkJuXq2mrz.8Voi', '2025-05-05'),
(4, 'Mike', 'Webster', 'twistnaples@gmail.com', '$2y$12$92k9ILu9KGX/v3YJhQ1OHed.t1EdNnwwPylJJb8PA7r7CHp9X0gvm', '2025-07-25');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tw_article_faqs`
--
ALTER TABLE `tw_article_faqs`
  ADD CONSTRAINT `tw_article_faqs_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `tw_articles` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
