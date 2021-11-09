-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 05:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lightsflare2021_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `randcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL,
  `type` enum('Admin','User','Judge') COLLATE utf8_unicode_ci NOT NULL,
  `ipAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `phone`, `email`, `password`, `address`, `randcode`, `date`, `status`, `updated_by`, `type`, `ipAddress`, `created_at`, `Update_at`) VALUES
(1, 'Saiful', '01675909939', 'saiful@gmail.com', '12e8730c239a761a9b37f7f546252361', '', '', '0000-00-00', 'Active', 0, 'Admin', '', '2020-07-29 04:45:31', '2020-07-29 04:45:31'),
(2, 'Muhammad Amdad Hossain', '+8801824288449', 'amdadphoto@gmail.com', 'a3579a19183ebbfe30baa9e263138324', '', 'B39Y4', '0000-00-00', 'Active', 0, 'Admin', '', '2020-08-03 15:09:51', '2020-08-03 15:09:51'),
(1426, 'Saiful Islam', '', 'saiful.rana@gmail.com', '96e79218965eb72c92a549dd5a330112', '', '', '0000-00-00', 'Active', 0, 'User', '::1', '2021-06-25 07:26:56', '2021-06-25 07:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `ambassador`
--

CREATE TABLE `ambassador` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `fb_id` varchar(200) NOT NULL,
  `season` year(4) NOT NULL,
  `type` enum('District','University') NOT NULL,
  `University` varchar(120) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `status`) VALUES
(1, 'Travel / Lifestyle / Documentary / Street / Portrait', ''),
(2, 'Wildlife / Macro', ''),
(3, 'Landscape / Cityscape / Long-exposure', ''),
(4, 'Drone / Aerial', ''),
(5, 'Mobile (theme open)', ''),
(6, 'Open', '');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_email`
--

CREATE TABLE `confirmation_email` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('1','2') NOT NULL COMMENT '1=confirm, 2=alerm',
  `email` varchar(120) NOT NULL,
  `u_name` varchar(120) NOT NULL,
  `mail_details` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `subject` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','replied') NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `exhibition_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `type` enum('1','2','3','4','5') NOT NULL,
  `country` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` text NOT NULL,
  `tag` text NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`exhibition_id`, `name`, `category`, `type`, `country`, `status`, `image`, `tag`, `year`, `created_at`) VALUES
(1, 'Dipanjan Pal', 4, '1', 99, 1, 'Dipanjan Pal_dipanjan.photos@gmail.comm.JPG', '1_DIPANJAN-PAL.jpg', 2020, '2020-12-14 11:29:10'),
(2, 'Touhid Parvez', 4, '2', 18, 1, 'Touhid Parvez_anika.mahjabin@yahoo.comm.JPG', '2_TOUHID-PARVEZ.jpg', 2020, '2020-12-14 11:30:39'),
(3, 'Ashraful Islam Shimul', 4, '3', 18, 1, 'Ashraful Islam Shimul_ashrafulite@gmail.com (3).jpg', '3_ASHRAFUL-ISLAM-SHIMUL.jpg', 2020, '2020-12-14 11:31:55'),
(11, 'Marco Jongsma', 2, '1', 150, 1, 'Marco Jongsma_jongsma26@gmail.comm.JPG', '1_MARCO-JONGSMA.jpg', 2020, '2020-12-14 11:53:16'),
(13, 'Dikye Ariani', 2, '2', 100, 1, 'Dikye Ariani_dikyeariani71@gmail.com.jpg', '2_DIKYE-ARIANI.jpg', 2020, '2020-12-14 13:27:05'),
(14, 'Himel Nobi', 2, '3', 18, 1, 'Himel Nobi_himelmahi@gmail.com.jpg', '3_HIMEL-NOBI.jpg', 2020, '2020-12-14 13:28:23'),
(37, 'Julio Castro Pardo', 3, '1', 199, 1, 'Julio Castro Pardo_contacto@juliocastrofotografia.com (22).JPG', '1_JULIO-CASTRO-PARDO.jpg', 2020, '2020-12-14 15:00:37'),
(39, 'Sharmin Ahsan Bithi', 3, '2', 18, 1, 'Sharmin Ahsan Bithi_sharmin.ahsan2@gmail.com (33).JPG', '2_SHARMIN-AHSAN-BITHI.jpg', 2020, '2020-12-14 15:02:34'),
(40, 'Giuseppe Mario Famiani', 3, '3', 105, 1, 'Giuseppe Mario Famiani_giuseppefamiani@virgilio.itt.JPG', '3_GIUSEPPE-MARIO-FAMIANI.jpg', 2020, '2020-12-14 15:03:46'),
(52, 'Mohammad Tasawar Islam', 5, '4', 18, 1, 'Mohammad Tasawar Islam_tasawar733@gmail.comm.JPG', '4_MOHAMMAD-TASAWAR-ISLAM.jpg', 2020, '2020-12-14 15:18:47'),
(53, 'Tanvir Alin', 2, '4', 18, 1, 'Tanvir Alin_itsgdalin@gmail.comm.JPG', '4_TANVIR-ALIN.jpg', 2020, '2020-12-14 16:03:18'),
(54, 'Budi Gunawan', 5, '1', 100, 1, 'Budi Gunawan_budigunawanbap2@yahoo.co.id (1).JPG', '1_BUDI-GUNAWAN.jpg', 2020, '2020-12-15 03:45:13'),
(55, 'Mohammad Mohsenifar', 5, '2', 101, 1, 'Mohammad Mohsenifar_mohsenifar.photography@gmail.com (22).JPG', '2_MOHAMMAD-MOHSENIFAR.jpg', 2020, '2020-12-15 03:46:14'),
(56, 'Sohel Ahmed ', 5, '3', 18, 1, 'Sohel Ahmed _sohel1993@gmail.com (22).JPG', '3_SOHEL-AHMED.jpg', 2020, '2020-12-15 03:50:47'),
(76, 'MD FAKRUL ISLAM', 1, '1', 18, 1, 'MD FAKRUL ISLAM_avfakrul55555@gmail.comm.JPG', '1_MD FAKRUL ISLAM.jpg', 2020, '2020-12-15 04:09:05'),
(78, 'Shahriar Farzana', 1, '2', 18, 1, 'Shahriar Farzana_shahriarfarzana85@gmail.com (22).JPG', '2_Shahriar-Farzana.jpg', 2020, '2020-12-15 04:09:48'),
(80, 'PHAN THI KHANH', 1, '3', 232, 1, 'PHAN THI KHANH_phanthikhanh85@gmail.com (22).JPG', '3_PHAN-THI-KHANH.jpg', 2020, '2020-12-15 04:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `session` varchar(10) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `details`, `session`, `status`) VALUES
(1, '<div>\n	&nbsp;</div>\n<div align=\"center\">\n	<p dir=\"ltr\">\n		FREQUENTLY ASKED QUESTIONS</p>\n</div>\n<p dir=\"ltr\">\n	&nbsp;</p>\n<p dir=\"ltr\">\n	<strong>Who</strong> <strong>can</strong> <strong>enter</strong>?</p>\n<p dir=\"ltr\">\n	The Competition is open to all entrants aged 18 or over, and is void where prohibited by local law.</p>\n<p dir=\"ltr\">\n	<strong>What type of work is eligible?</strong></p>\n<p dir=\"ltr\">\n	All photo-based work is eligible, be it film, digital, tintype, camera-less, etc.</p>\n<p dir=\"ltr\">\n	<strong>What</strong> <strong>are</strong> <strong>the</strong> <strong>categories in your competition</strong>?</p>\n<p dir=\"ltr\">\n	A:&nbsp;Lightsflare Photography Awards 2021 is made up of&nbsp;Open categories&nbsp;divided for professional and amateur level of expertise: This Season we are on the lookout for the most exciting and promising practitioners of all ages and backgrounds, working across all photographic genres and styles.</p>\n<p dir=\"ltr\">\n	Fine art, landscape, street, documentary, portrait, fashion, or conceptual: there are no specific boundaries or limitations, allowing you the space and freedom to fully showcase your skill, creativity, and talent!</p>\n<p dir=\"ltr\">\n	<strong>I am new to photography, Do I have</strong> <strong>a</strong> <strong>chance</strong>?</p>\n<p dir=\"ltr\">\n	Absolutely! We welcome all photographers. From professionals, semi-professionals, amateurs to total beginners. We are interested in all kinds of photography and we believe everyone has a chance.</p>\n<p dir=\"ltr\">\n	<strong>How</strong> <strong>many</strong> <strong>photos may I submit?</strong></p>\n<p dir=\"ltr\">\n	Up to 6 photos per submission.</p>\n<p dir=\"ltr\">\n	<strong>How many times can I submit</strong>?</p>\n<p dir=\"ltr\">\n	There is no limit and you can submit as many times as you like. We suggest, however, that you edit your photos wisely, and send us only your best.</p>\n<p dir=\"ltr\">\n	<strong>Do I have to provide other information</strong>?</p>\n<p dir=\"ltr\">\n	Images must be titled. Description is optional although recommended, we want to know about your work! Please note that the word count for the description or statement cannot exceed 250 words.</p>\n<p dir=\"ltr\">\n	<strong>I&#39;m having a problem uploading my images?</strong></p>\n<p dir=\"ltr\">\n	Please make sure that each image is in JPG or PNG format, and less than 6 MB.<br />\n	Minimum resolution of 1500px and lower than 10.000 pixels (height or width).</p>\n<p dir=\"ltr\">\n	If you still are having problems submitting, please email us at&nbsp;<a href=\"mailto:info@lightsflare.com\">info@lightsflare.com</a></p>\n<p dir=\"ltr\">\n	<strong>Is</strong> <strong>there</strong> <strong>a</strong> <strong>fee to</strong> <strong>enter</strong>?</p>\n<p dir=\"ltr\">\n	Yes, there is a $15/$30/$40 fee to enter up to 6 images, unless there is an exceptional promotional offer (like in October 2021), when photographers are able to submit 1 photo for free.</p>\n<p dir=\"ltr\">\n	<strong>What forms of</strong> <strong>payment do you accept</strong>?</p>\n<p dir=\"ltr\">\n	All users can pay with Only Paypal.</p>\n<p dir=\"ltr\">\n	<strong>Do I retain the copyright</strong> <strong>on</strong> <strong>my images</strong>?</p>\n<p dir=\"ltr\">\n	Yes. You retain full copyright to all your images. Entries may be posted online and winning images may be used in connection with the Competition and promotion of the Competition.</p>\n<p dir=\"ltr\">\n	<strong>How old can my images be</strong>?</p>\n<p dir=\"ltr\">\n	There is not really a time limit. The image can be relatively old and still make it to the finalists / winners. However, please keep in mind that we are trying to promote new content and bring exposure to emerging, talented photographers.</p>\n<p dir=\"ltr\">\n	<strong>If I win</strong>, <strong>how</strong> <strong>will I receive the prize money</strong>?</p>\n<p dir=\"ltr\">\n	The prize money is sent by transfer via PayPal. For security and reliability reason we use PayPal, but we can also proceed via Bank/Wire transfer.</p>\n<p dir=\"ltr\">\n	<strong>When</strong> <strong>and where is the exhibition of the winning work</strong>?</p>\n<p dir=\"ltr\">\n	Winners and finalists will see their work exhibited at our annual exhibitions at the renowned&nbsp;Shilpakala Academy in Bangladesh.</p>\n<p dir=\"ltr\">\n	<strong>How</strong> <strong>will the work be printed and displayed</strong>?</p>\n<p dir=\"ltr\">\n	The LightsFlare will be responsible for all costs related to printing, installing and overall display of the work at the venues.</p>\n<p dir=\"ltr\">\n	<strong>Where</strong> <strong>can I read the rules in detail</strong>?</p>\n<p dir=\"ltr\">\n	The competition rules can be found&nbsp;here.</p>\n<p dir=\"ltr\">\n	<strong>If</strong> <strong>I</strong> <strong>have more questions, how do I get in touch</strong>?</p>\n<p dir=\"ltr\">\n	Check our Terms &amp; Conditions section and our Competition Rules. If you still have questions, feel free to email us at&nbsp;<a href=\"mailto:info@lightsflare.com\">info@lightsflare.com</a></p>\n', '2020', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `home_about`
--

CREATE TABLE `home_about` (
  `id` int(11) NOT NULL,
  `left_side_title` varchar(120) NOT NULL,
  `left_side_desccription` text NOT NULL,
  `right_side_title` varchar(120) NOT NULL,
  `right_side_description` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_about`
--

INSERT INTO `home_about` (`id`, `left_side_title`, `left_side_desccription`, `right_side_title`, `right_side_description`, `status`) VALUES
(1, 'ABOUT LIGHTFLARE', '<div>\n	<strong>LightsFlare</strong> International Photography Awards is one of the largest award giving bodies for a community of artists ushering an era of new trends in the world of photography. This competition is a melting pot for people where passion, interest, sense of beauty and openness to diversity in photography collide in intergalactic proportions. At <strong>LightsFlare</strong> Photography, we seek to find artists and unique souls who breathe and live for creativity&mdash;where we provide a platform of promotion and support in their pursuit of self-realization and development.</div>\n<p>\n	This contest caters to individuals actively attuned to experimentations and new trends in art. <strong>LightsFlare</strong> Photography delights in providing an avenue for talented souls to brandish the world&rsquo;s eccentricity, variety, beauty, and even ugliness from the artist&rsquo;s lens. And yes, you can have it your own way! Delight in the crazy beautiful fusion of simplicity and complexity of the world with us!</p>\n<p>\n	In a world dominated by a traditional approach to photography, we know how difficult it is to break the great divide between two seemingly polarizing styles, with modern approach on one hand and traditional on the other. But take heart, for this is what <strong>LightsFlare</strong> Photography is all about&mdash;it&rsquo;s about you showing your own vision of the subject. At <strong>LightsFlare</strong> Photography Awards, you can take center stage and allow the judges to get a glimpse of how you dissect beauty in the harmony of your photographs. In this competition, everyone is free to use any technique. Obligatory devices and other coercive methods is not how we roll. Only the final effect counts. We break all the rules, and we want you to break them with us by creating new trends in art.</p>\n<p>\n	Lightsflare Photography Awards 2021 is made up of <strong>Open&nbsp;</strong><strong>categories</strong> divided for professional and amateur level of expertise:</p>\n<p font-size:=\"\" letter-spacing:=\"\" montserrat=\"\" style=\"box-sizing: border-box; line-height: 1.6; max-width: 40em; margin-right: auto; margin-left: auto; font-family: \">\n	This Season we are on the lookout for the most exciting and promising practitioners of all ages and backgrounds, working across all photographic genres and styles. Fine art, landscape, street, documentary, portrait, fashion, or conceptual: there are no specific boundaries or limitations, allowing you the space and freedom to fully showcase your skill, creativity, and talent!</p>\n<p>\n	&nbsp;</p>\n<h1 style=\"box-sizing: border-box; margin: 0.67em 0px; font-weight: normal; font-family: &quot;Montserrat Light&quot;, sans-serif; letter-spacing: 1px; text-align: center;\">\n	Win $500 cash prizes each Season, see your work Global published &amp; exhibited internationally!</h1>\n<p>\n	&nbsp;</p>\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\" style=\"width:623px;\">\n				<p style=\"color: blue;\">\n					<strong>&nbsp;Calendar</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:341px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;Submission Start</span></p>\n			</td>\n			<td style=\"width:281px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;2020-09-01</span></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:341px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;Deadline</span></p>\n			</td>\n			<td style=\"width:281px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;2020-11-20</span></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:341px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;Judging</span></p>\n			</td>\n			<td style=\"width:281px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;2020-11-21</span></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:341px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;Call for RAW files</span></p>\n			</td>\n			<td style=\"width:281px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;2020-12-01&nbsp;</span></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:341px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;Short list Announcement</span></p>\n			</td>\n			<td style=\"width:281px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;2020-12-01&nbsp;</span></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:341px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;Finalists and Awarded list</span></p>\n			</td>\n			<td style=\"width:281px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;2020-12-10&nbsp;</span></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:341px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;Exhibition</span></p>\n			</td>\n			<td style=\"width:281px;\">\n				<p style=\"color: blue;\">\n					<span style=\"font-size:12px;\">&nbsp;2020-12-16</span></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n<p>\n	<br />\n	<br />\n	<big><strong>Total prizes : $1500</strong></big></p>\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"3\" style=\"width:623px;\">\n				<p style=\"text-align: center;\">\n					<strong>Travel&nbsp;/ Lifestyle / Documentary / Street / Portrait</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					SL</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					Place</p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					Amount</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					1</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					1<sup>st</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$150</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					2</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					2<sup>nd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$100</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					3</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					3<sup>rd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$50</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width: 29px; text-align: center;\">\n				&nbsp;</td>\n			<td style=\"width: 385px; text-align: center;\">\n				<strong>Total</strong></td>\n			<td style=\"width: 207px; text-align: center;\">\n				<strong>$300</strong></td>\n		</tr>\n	</tbody>\n</table>\n<p style=\"text-align: center;\">\n	&nbsp;</p>\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"3\" style=\"width:623px;\">\n				<p style=\"text-align: center;\">\n					<strong>wildlife / macro</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					SL</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					Place</p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					Amount</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					1</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					1<sup>st</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$150</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					2</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					2<sup>nd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$100</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					3</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					3<sup>rd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$50</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				&nbsp;</td>\n			<td style=\"width: 385px; text-align: center;\">\n				<strong>Total</strong></td>\n			<td style=\"width: 207px; text-align: center;\">\n				<strong>$300</strong></td>\n		</tr>\n	</tbody>\n</table>\n<p style=\"text-align: center;\">\n	&nbsp;</p>\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"3\" style=\"width:623px;\">\n				<p style=\"text-align: center;\">\n					<strong>Landscape / Cityscape / Long-exposure</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					SL</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					Place</p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					Amount</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					1</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					1<sup>st</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$150</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					2</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					2<sup>nd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$100</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					3</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					3<sup>rd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$50</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				&nbsp;</td>\n			<td style=\"width: 385px; text-align: center;\">\n				<strong>Total</strong></td>\n			<td style=\"width: 207px; text-align: center;\">\n				<strong>$300</strong></td>\n		</tr>\n	</tbody>\n</table>\n<p style=\"text-align: center;\">\n	&nbsp;</p>\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"3\" style=\"width:623px;\">\n				<p style=\"text-align: center;\">\n					<strong>Drone / Aerial</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					SL</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					Place</p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					Amount</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					1</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					1<sup>st</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$150</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					2</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					2<sup>nd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$100</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					3</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					3<sup>rd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$50</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				&nbsp;</td>\n			<td style=\"width: 385px; text-align: center;\">\n				<strong>Total</strong></td>\n			<td style=\"width: 207px; text-align: center;\">\n				<strong>$300</strong></td>\n		</tr>\n	</tbody>\n</table>\n<p>\n	&nbsp;</p>\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"3\" style=\"width:623px;\">\n				<p style=\"text-align: center;\">\n					<strong>Mobile (theme open)</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					SL</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					Place</p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					Amount</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					1</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					1<sup>st</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$150</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					2</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					2<sup>nd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$100</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				<p style=\"text-align: center;\">\n					3</p>\n			</td>\n			<td style=\"width:385px;\">\n				<p style=\"text-align: center;\">\n					3<sup>rd</sup></p>\n			</td>\n			<td style=\"width:207px;\">\n				<p style=\"text-align: center;\">\n					$50</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width:29px;\">\n				&nbsp;</td>\n			<td style=\"width: 385px; text-align: center;\">\n				<strong>Total</strong></td>\n			<td style=\"width: 207px; text-align: center;\">\n				<strong>$300</strong></td>\n		</tr>\n	</tbody>\n</table>\n<p>\n	&nbsp;</p>\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td style=\"width:311px;\">\n				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n					<tbody>\n						<tr>\n							<td style=\"width:148px;height:36px;\">\n								<p style=\"text-align: center;\">\n									<strong>Honorable Mention</strong></p>\n							</td>\n							<td style=\"width:148px;height:36px;\">\n								<p style=\"text-align: center;\">\n									<strong>overall</strong></p>\n							</td>\n						</tr>\n					</tbody>\n				</table>\n				<p style=\"text-align: center;\">\n					&nbsp;</p>\n			</td>\n			<td style=\"width:311px;\">\n				<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n					<tbody>\n						<tr>\n							<td style=\"width:296px;\">\n								<p style=\"text-align: center;\">\n									<strong>$50</strong></p>\n							</td>\n						</tr>\n						<tr>\n							<td style=\"width:296px;\">\n								<p style=\"text-align: center;\">\n									<strong>$50</strong></p>\n							</td>\n						</tr>\n					</tbody>\n				</table>\n				<p>\n					&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"width: 311px; text-align: center;\">\n				<strong>Total</strong></td>\n			<td style=\"width: 311px; text-align: center;\">\n				<strong>$100</strong></td>\n		</tr>\n	</tbody>\n</table>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>There will be an Gellary exhibition with 150 Photographs and everyone will be given a Photo Frame,Certificate,T-shirt&nbsp; etc by mail.</strong></p>\n<p>\n	<strong>Eligibility:</strong></p>\n<p>\n	<strong>LightsFlare</strong>&nbsp; Photography Awards is an open competition for photographers whether professional or amateur. Entries are welcome from all countries.</p>\n<p>\n	<strong>Copyrights</strong> &amp; <strong>Usage</strong> <strong>Rights</strong>:</p>\n<p>\n	Copyright of the images will remain at all times with the photographer. Images will be used strictly in connection to the awards and will not be used for any other marketing purposes other than to promote the <strong>LightsFlare</strong> Photography Awards. Images will not be resold or used by any other third party. If there is a request for such, we will forward that request to the photographer via e-mail.</p>\n<p>\n	&nbsp;</p>\n', 'q', '<p>\n	q</p>\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `title`, `image`, `status`) VALUES
(1, 'LightsFlare International Photography Awards 2020', '1650f-banner_one.png', 'Active'),
(2, 'LightsFlare International Photography Awards 2020', 'd4a08-bannertwo.png', 'Active'),
(3, 'LightsFlare International Photography Awards 2020', '1a455-banner_two.png', 'Active'),
(4, 'LightsFlare International Photography Awards 2020', '47bda-banner_one.png', 'Inactive'),
(5, 'LightsFlare International Photography Awards 2020', '35697-banner-2.png', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `home_watch`
--

CREATE TABLE `home_watch` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` longtext NOT NULL,
  `embaded_video` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jury`
--

CREATE TABLE `jury` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `image` text NOT NULL,
  `title` varchar(120) NOT NULL,
  `season` year(4) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marking`
--

CREATE TABLE `marking` (
  `marking_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `marks` double(10,2) NOT NULL,
  `award` int(11) NOT NULL,
  `note` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `product_id`, `txn_id`, `number`, `reference`, `payment_gross`, `amount`, `currency_code`, `payer_email`, `payment_status`, `admin_id`, `created_at`) VALUES
(1, 1426, 0, '72Y44390B8756814M', '', '', 30.00, '0.00', 'USD', 'sb-qjp5m2826631@personal.example.com', 'Completed', 0, '2021-06-29 14:56:07'),
(2, 1426, 0, '4J8345754R437554K', '', '', 15.00, '0.00', 'USD', 'sb-qjp5m2826631@personal.example.com', 'Completed', 0, '2021-06-29 14:57:12'),
(3, 1426, 0, '0VT004153C6669740', '', '', 40.00, '0.00', 'USD', 'sb-qjp5m2826631@personal.example.com', 'Completed', 0, '2021-06-29 15:01:53'),
(4, 1426, 0, '5FH07216A7113551J', '', '', 40.00, '0.00', 'USD', 'sb-qjp5m2826631@personal.example.com', 'Completed', 0, '2021-06-29 15:02:14'),
(5, 1426, 0, '1F0309577V8627033', '', '', 15.00, '0.00', 'USD', 'sb-qjp5m2826631@personal.example.com', 'Completed', 0, '2021-06-29 15:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `status`) VALUES
(1, 'Package 1', 15.00, 1),
(2, 'Package 2', 30.00, 1),
(3, 'Package 3', 40.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totoal_img` int(11) NOT NULL,
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `totoal_img`, `price`) VALUES
(1, 1426, 13, 13.00);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `season` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `details`, `status`, `season`) VALUES
(1, '<p style=\"text-align: center;\">\n	TERMS &amp; CONDITIONS</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>LightsFlare</strong> Photography Awards competition is open to professional and amateur photographers. Anyone over 18 years of age can enter the competition with the exception of employees of the <strong>LightsFlare</strong> Photography Awards, their associated companies and employees of any company chosen to sponsor prizes for the competition.</p>\n<p>\n	Judges are not permitted to enter into the competition.</p>\n<p>\n	By registering and entering the <strong>LightsFlare</strong> Photography Awards you hereby accept these Terms and Conditions.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>GENERAL CONDITIONS:</strong></p>\n<p>\n	To enter, you must upload your Entry at the following website: www.lightsflare.com following the on-screen instructions carefully.</p>\n<p>\n	By entering the Competition, you agree and acknowledge that the <strong>LightsFlare</strong> Photography Awards is permitted to receive your registration data.</p>\n<p>\n	<strong>LightsFlare</strong> Photography Awards may publish any material you submit, post, upload, email or otherwise transmit to it or to the website at its sole discretion and it shall be entitled to make additions or deletions to any such material prior to publication.</p>\n<p>\n	Any image submitted to the competition may be used by the <strong>LightsFlare</strong> Photography Awards, and its media partners, for marketing and promotional purposes of the competition only. You hereby grant the <strong>LightsFlare</strong> Photography Awards a non-exclusive, irrevocable license in each Entry throughout the world in all media for any use in connection with the competition.</p>\n<p>\n	All awarded Entries and <strong>100&nbsp;</strong>selected entries will be published online on&nbsp;<a href=\"http://lightsflare.com/\">http://lightsflare.com/</a></p>\n<p>\n	You can submit <span style=\"background-color:#ffff00;\">minimum 3</span> pictures and <span style=\"background-color:#ffff00;\">maximum 25</span> pictures in any category of your choice.. <strong>Images that have won prizes in other competitions or that have been submitted in other competitions currently underway are eligible</strong>.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>You can pay entry fee by <span style=\"background-color:#ffff00;\">Bkash&nbsp; </span>for Bangladesh and <span style=\"background-color:#ffff00;\">PayPal </span>for Internationl Participants. Paypal payments are processed in USD currency</strong></p>\n<p>\n	&nbsp;</p>\n<p>\n	There is no time or date restriction on when the image was taken.</p>\n<p>\n	You may enter the same image into as many categories as you wish. Additional fee for next category is only<strong> <span style=\"background-color:#ffff00;\">$1/image</span></strong>.</p>\n<p>\n	Categories:</p>\n<ol>\n	<li>\n		<span style=\"background-color:#ffff00;\">Travel / Lifestyle / Documentary / Street / Portrait</span></li>\n	<li>\n		<span style=\"background-color:#ffff00;\">Wildlife / Macro</span></li>\n	<li>\n		<span style=\"background-color:#ffff00;\">Landscape / Cityscape / Long-exposure</span></li>\n	<li>\n		<span style=\"background-color:#ffff00;\">Drone / Aerial</span></li>\n	<li>\n		<span style=\"background-color:#ffff00;\">Mobile (theme open)</span></li>\n</ol>\n<p>\n	&nbsp;</p>\n<p>\n	Files must meet the following specification:</p>\n<p>\n	<strong>- sRGB or Adobe98 colour space, 8-bit;</strong></p>\n<p>\n	<strong>- Longest dimension: 1000 pixels, 72dpi, maximum 500kb.</strong></p>\n<p>\n	<strong>- Saved as a JPG;</strong></p>\n<p>\n	<strong>- No Watermarks / Copyright Units / Logos on images;</strong></p>\n<p>\n	<strong>- Only bleed photographs without borders;</strong></p>\n<p>\n	<strong>- Rename file : CategoryName_FullName_serial (example : Lifestyle_JhonSmith_1.jpg, street_JhonSmith_2.jpg)</strong><strong>[<span style=\"background-color:#ffff00;\">No Space</span>]</strong></p>\n<p>\n	Finalist Entrants must be able to provide a Raw and high resolution digital file (<strong>minimum 2000px wide@300dpi</strong>). This file will be used only to prove the ownership of the image. Winning Entrants who do not fulfill these eligibility criteria will be deemed ineligible and disqualified without the right to appeal.</p>\n<p>\n	All entries must be the original work of the entrant and must not infringe the rights of any other party. The entrant must be the sole copyright owner of all photographs entered and must have obtained permission of any people featured in the entries (or their parents/guardians if children under 16 are featured). Further, the entrant must not have breached any laws when taking their photographs.</p>\n<p>\n	Winners&#39; names and images will be published online.</p>\n<p>\n	&nbsp;</p>\n', 'Active', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `disabled` tinyint(4) NOT NULL COMMENT '1= disabled true,2=disabled false',
  `deleted` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temporary`
--

CREATE TABLE `temporary` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `all_data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `use_details`
--

CREATE TABLE `use_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `age` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `use_details`
--

INSERT INTO `use_details` (`id`, `user_id`, `name`, `title`, `email`, `phone`, `country`, `bio`, `age`, `image`, `created_at`, `updated_at`) VALUES
(1, 1426, 'Saiful Islam', '', 'saiful.rana@gmail.com', '', '11', ' ', 0, '1618063051069_IMG_5783-01.jpg', '2021-06-25 07:26:56', '2021-06-25 09:28:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmation_email`
--
ALTER TABLE `confirmation_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`exhibition_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_about`
--
ALTER TABLE `home_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_watch`
--
ALTER TABLE `home_watch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jury`
--
ALTER TABLE `jury`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marking`
--
ALTER TABLE `marking`
  ADD PRIMARY KEY (`marking_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `use_details`
--
ALTER TABLE `use_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1428;

--
-- AUTO_INCREMENT for table `ambassador`
--
ALTER TABLE `ambassador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `confirmation_email`
--
ALTER TABLE `confirmation_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `exhibition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_about`
--
ALTER TABLE `home_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_watch`
--
ALTER TABLE `home_watch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jury`
--
ALTER TABLE `jury`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marking`
--
ALTER TABLE `marking`
  MODIFY `marking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temporary`
--
ALTER TABLE `temporary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `use_details`
--
ALTER TABLE `use_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
