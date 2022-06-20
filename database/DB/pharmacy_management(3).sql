-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2022 a las 21:55:45
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pharmacy_management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Cream', 1, '2022-02-17 13:36:49', '2022-05-20 10:22:29'),
(8, 'Capsul', 1, '2022-04-23 17:39:58', '2022-04-23 17:39:58'),
(9, 'Tablet', 1, '2022-05-20 10:22:51', '2022-05-20 10:22:51'),
(10, 'Syrup', 1, '2022-05-20 10:23:14', '2022-05-20 10:23:14'),
(11, 'Injection', 1, '2022-05-20 10:23:46', '2022-05-20 10:23:46'),
(15, 'IV/Infusion', 1, '2022-05-25 19:04:24', '2022-05-25 19:04:24'),
(16, 'Oral Powder', 1, '2022-05-25 19:09:27', '2022-05-25 19:10:17'),
(17, 'Eye Drop', 1, '2022-05-25 19:12:10', '2022-05-25 19:12:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credit_customers`
--

CREATE TABLE `credit_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `due_amount` double(8,2) NOT NULL,
  `sale_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `credit_customers`
--

INSERT INTO `credit_customers` (`id`, `invoice_no`, `customer_id`, `total_amount`, `paid_amount`, `due_amount`, `sale_date`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 120.00, 100.00, 20.00, '2022-05-29', '2022-05-28 22:27:42', '2022-05-28 22:27:42'),
(8, 2, 2, 25.00, 25.00, 0.00, '2022-06-17', '2022-06-16 13:21:20', '2022-06-16 13:21:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credit_payment_histories`
--

CREATE TABLE `credit_payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `todays_payment` double(8,2) NOT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `credit_payment_histories`
--

INSERT INTO `credit_payment_histories` (`id`, `invoice_no`, `customer_id`, `todays_payment`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 20.00, '2022-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone_no`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Rashed', '01914597527', 'Dhaka', '2022-05-22 18:55:26', '2022-05-22 18:55:26'),
(3, 'Razib', '01739684168', 'Dhaka', '2022-05-25 20:00:51', '2022-05-25 20:00:51'),
(4, 'Nasif', '12345678945', 'Dhaka', '2022-05-25 20:02:55', '2022-05-25 20:02:55'),
(5, 'sadf', '01737988947', 'dsfgsd', '2022-06-17 00:08:14', '2022-06-17 00:08:14'),
(6, 'asdf', '052588885858', 'fdgsdfg', '2022-06-17 00:09:58', '2022-06-17 00:09:58'),
(7, 'adsfsadf', '021858888', 'asdfdas', '2022-06-17 00:36:06', '2022-06-17 00:36:06'),
(8, 'asdfadsf', '022585585', 'asdfadf', '2022-06-17 00:52:00', '2022-06-17 00:52:00'),
(9, 'asdfadsf', '022585585', 'asdfadf asdfasdf', '2022-06-17 00:52:04', '2022-06-17 00:52:04'),
(10, 'adsfasd', '01737988947', 'dfasdf', '2022-06-17 01:00:45', '2022-06-17 01:00:45'),
(11, 'adsfasd', '01737988947', 'dfasdf', '2022-06-17 01:01:46', '2022-06-17 01:01:46'),
(12, 'adsfasd', '01737988947', 'dfasdf', '2022-06-17 01:02:08', '2022-06-17 01:02:08'),
(13, 'asdfasdf', '01737988947', 'sadfadf', '2022-06-17 01:02:41', '2022-06-17 01:02:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `details`, `amount`, `date`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 'Electricity Bill', 'Electric Bill for the month of May 2022', 200.00, '2022-05-23', 'Okay', '2022-05-22 19:40:20', '2022-05-22 19:42:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `due_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `manufacturer_id`, `purchase_date`, `invoice_no`, `subtotal`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(4, 9, '2022-05-30', 1, 2600.00, 2300.00, 300.00, '2022-05-29 19:03:28', '2022-05-29 19:03:28'),
(5, 7, '2022-06-09', 1, 200.00, 0.00, 200.00, '2022-06-16 12:48:35', '2022-06-16 12:48:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `phone_no`, `email`, `address`, `created_at`, `updated_at`) VALUES
(7, 'Square', '01739684168', 'square@gmail.com', 'Kurigram', '2022-04-16 19:11:53', '2022-04-16 19:11:53'),
(8, 'Incepta', '01751457026', 'incepta@gmail.com', 'Rangpur', '2022-04-16 19:12:21', '2022-04-16 19:12:21'),
(9, 'Beximco', '12345678911', 'beximco@gmail.com', 'Dhaka', '2022-05-22 18:59:02', '2022-05-22 19:01:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_unit_price` double(8,2) NOT NULL,
  `sale_unit_price` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicines`
--

INSERT INTO `medicines` (`id`, `manufacturer_id`, `category_id`, `unit_id`, `medicine_name`, `generic_name`, `purchase_unit_price`, `sale_unit_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 9, 10, 3, 'Napa', 'Paracitamol', 20.00, 25.00, 1, '2022-05-22 19:15:01', '2022-05-22 19:15:01'),
(3, 7, 9, 4, 'Ace', 'Paracitamol', 3.00, 4.00, 1, '2022-05-22 19:15:39', '2022-05-22 19:15:39'),
(4, 7, 10, 3, 'Ace Plus', 'Paracitamol', 15.00, 20.00, 1, '2022-05-22 19:15:59', '2022-05-22 19:15:59'),
(5, 9, 9, 4, 'Napa', 'Paracitamol', 2.00, 2.50, 1, '2022-05-22 19:17:38', '2022-05-22 19:17:38'),
(6, 9, 8, 4, 'Acifix(20mg)', 'Rabeprazole Sodium', 8.00, 10.00, 1, '2022-05-25 18:57:14', '2022-05-25 18:57:14'),
(7, 9, 9, 4, 'Acifix(20mg)', 'Rabeprazole Sodium', 8.00, 10.00, 1, '2022-05-25 18:57:44', '2022-05-25 18:57:44'),
(8, 9, 9, 4, 'Amdocal (10mg)', 'Amlodipine Besilate', 7.00, 10.00, 1, '2022-05-25 18:59:25', '2022-05-25 18:59:25'),
(9, 9, 9, 4, 'Amdocal Plus (5 mg+50 mg)', 'Amlodipine Besilate + Atenolol', 6.00, 8.00, 1, '2022-05-25 19:00:38', '2022-05-25 19:00:38'),
(10, 9, 9, 4, 'Apixa', 'Apixaban', 25.00, 30.00, 1, '2022-05-25 19:02:42', '2022-05-25 19:02:42'),
(11, 9, 15, 3, 'Napa 100 ml (10 mg/ ml)', 'Paracetamol', 150.00, 170.00, 1, '2022-05-25 19:06:55', '2022-05-25 19:06:55'),
(12, 9, 16, 4, 'Hepagurd (3 gm/sachet)', 'L-Ornithine L-Aspartate', 75.00, 80.00, 1, '2022-05-25 19:11:43', '2022-05-25 19:11:43'),
(13, 9, 17, 3, 'Hyprosol 0.3% (10 ml)', 'Hypromellose', 65.00, 70.00, 1, '2022-05-25 19:15:41', '2022-05-25 19:15:41'),
(14, 9, 17, 3, 'Glucovis 0.25% (5 ml)', 'Betaxolol Hydrochloride', 200.00, 210.00, 1, '2022-05-25 19:17:21', '2022-05-25 19:17:21'),
(15, 9, 11, 3, 'Gensulin N 100 IU/ml (3 ml cartridge)', 'Insulin Human [Long-Acting]', 222.00, 230.00, 1, '2022-05-25 19:19:31', '2022-05-25 19:19:31'),
(16, 9, 11, 3, 'Gensulin N 100 IU/ml (10 ml vial))', 'Insulin Human [Long-Acting]', 415.00, 420.00, 1, '2022-05-25 19:21:22', '2022-05-25 19:21:22'),
(17, 9, 7, 4, 'Gentosep 0.3% (15mg)', 'Gentamicin Sulfate', 18.50, 22.00, 1, '2022-05-25 19:22:55', '2022-05-25 19:22:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_14_185403_create_customers_table', 1),
(6, '2022_02_15_170702_create_manufacturers_table', 2),
(7, '2022_02_15_183728_create_categories_table', 3),
(8, '2022_02_15_195014_create_units_table', 4),
(9, '2022_02_16_181527_create_types_table', 5),
(10, '2022_02_16_183911_create_medicines_table', 6),
(11, '2022_02_18_094650_create_purchases_table', 7),
(12, '2022_03_01_200047_create_purchases_table', 8),
(13, '2022_03_02_165235_create_medicines_table', 9),
(14, '2022_03_02_192245_create_medicines_table', 10),
(15, '2022_03_02_192731_create_medicines_table', 11),
(16, '2022_03_05_183212_create_payment_histories_table', 12),
(17, '2022_03_05_184019_create_payment_histories_table', 13),
(18, '2022_03_07_183830_create_medicines_table', 14),
(19, '2022_03_07_193123_create_purchases_table', 15),
(20, '2022_03_07_193600_create_invoices_table', 16),
(21, '2022_03_07_194605_create_per_unit_prices_table', 17),
(23, '2022_03_29_190212_create_expenses_table', 19),
(24, '2022_04_05_172659_create_pos_invoices_table', 20),
(25, '2022_04_05_173722_create_sale_quantities_table', 20),
(26, '2022_04_05_174103_create_sale_invoices_table', 21),
(27, '2022_04_05_184758_create_sale_revenues_table', 22),
(28, '2022_04_06_182136_create_credit_customers_table', 23),
(29, '2022_04_06_193233_add_discount_sale_revenues_table', 24),
(30, '2022_04_06_193613_add_discount_pos_invoices_table', 25),
(31, '2022_04_09_184152_add_total_amount_to_pos_invoices_table', 26),
(32, '2022_04_09_194246_add_multiple_column_to_pos_invoices', 27),
(33, '2022_04_11_185208_create_credit_payment_histories_table', 28),
(34, '2022_04_19_014930_create_sale_invoices_table', 29),
(35, '2022_04_19_021512_add_multiple_to_sale_invoices_table', 30),
(36, '2022_04_22_023953_create_return_purchases_table', 31),
(37, '2022_04_23_000623_create_sales_returns_table', 32),
(38, '2022_04_24_003934_create_sale_return_subtotals_table', 33),
(39, '2022_03_27_195315_create_stocks_table', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_histories`
--

CREATE TABLE `payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `todays_payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment_histories`
--

INSERT INTO `payment_histories` (`id`, `manufacturer_id`, `invoice_no`, `todays_payment`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '300', '2022-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pos_invoices`
--

CREATE TABLE `pos_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_unit_price` double(8,2) NOT NULL,
  `sale_unit_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `due_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pos_invoices`
--

INSERT INTO `pos_invoices` (`id`, `invoice_no`, `customer_id`, `sale_date`, `medicine_name`, `category_id`, `quantity`, `purchase_unit_price`, `sale_unit_price`, `total_price`, `subtotal`, `discount`, `total_amount`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(42, 1, 2, '2022-05-29', 'Napa', 9, 10, 2.00, 2.50, 25.00, 125.00, 5.00, 120.00, 100.00, 20.00, '2022-05-28 22:27:42', '2022-05-28 22:27:42'),
(43, 1, 2, '2022-05-29', 'Acifix(20mg)', 9, 10, 8.00, 10.00, 100.00, 125.00, 5.00, 120.00, 100.00, 20.00, '2022-05-28 22:27:42', '2022-05-28 22:27:42'),
(44, 2, 2, '2022-06-17', 'Napa', 9, 10, 2.00, 2.50, 25.00, 25.00, 0.00, 25.00, 25.00, 0.00, '2022-06-16 13:21:20', '2022-06-16 13:21:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_purchase_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id`, `manufacturer_id`, `category_id`, `type_id`, `purchase_date`, `invoice_no`, `medicine_name`, `expire_date`, `quantity`, `total_quantity`, `total_purchase_price`, `total_price`, `created_at`, `updated_at`) VALUES
(11, 9, 9, 2, '2022-05-30', 1, 'Napa', '2030-10-10', 5, 100, 600.00, 600.00, '2022-05-29 19:03:28', '2022-05-29 19:03:28'),
(12, 9, 10, 3, '2022-05-30', 1, 'Napa', '2030-10-10', 1, 100, 2000.00, 2000.00, '2022-05-29 19:03:28', '2022-05-29 19:03:28'),
(13, 7, 7, 2, '2022-06-09', 1, 'Napa', '2022-06-01', 10, 200, 200.00, 200.00, '2022-06-16 12:48:35', '2022-06-16 12:48:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `return_purchases`
--

CREATE TABLE `return_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `return_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_returns`
--

CREATE TABLE `sales_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `return_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sales_returns`
--

INSERT INTO `sales_returns` (`id`, `medicine_name`, `category_id`, `return_date`, `amount`, `quantity`, `total_amount`, `created_at`, `updated_at`) VALUES
(3, 'Napa', 9, '2022-05-26', 2.00, 5, 10.00, '2022-05-25 20:28:21', '2022-05-25 20:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `due_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sale_invoices`
--

INSERT INTO `sale_invoices` (`id`, `invoice_no`, `customer_id`, `sale_date`, `subtotal`, `discount`, `total_amount`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(32, 1, 2, '2022-05-29', 125.00, 5.00, 120.00, 120.00, 0.00, '2022-05-28 22:27:42', '2022-05-28 22:27:42'),
(33, 2, 2, '2022-06-17', 25.00, 0.00, 25.00, 25.00, 0.00, '2022-06-16 13:21:20', '2022-06-16 13:21:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_return_subtotals`
--

CREATE TABLE `sale_return_subtotals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `return_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sale_return_subtotals`
--

INSERT INTO `sale_return_subtotals` (`id`, `return_date`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, '2022-05-26', 10.00, '2022-05-25 20:28:21', '2022-05-25 20:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_revenues`
--

CREATE TABLE `sale_revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `sale_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_purchase_price` double(8,2) NOT NULL,
  `total_sale_price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sale_revenues`
--

INSERT INTO `sale_revenues` (`id`, `invoice_no`, `sale_date`, `total_purchase_price`, `total_sale_price`, `discount`, `created_at`, `updated_at`) VALUES
(89, 1, '2022-05-29', 20.00, 25.00, 5.00, '2022-05-28 22:27:42', '2022-05-28 22:27:42'),
(90, 1, '2022-05-29', 80.00, 100.00, 5.00, '2022-05-28 22:27:42', '2022-05-28 22:27:42'),
(91, 2, '2022-06-17', 20.00, 25.00, 0.00, '2022-06-16 13:21:20', '2022-06-16 13:21:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_quantity` int(11) NOT NULL,
  `box_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`id`, `manufacturer_id`, `category_id`, `invoice_id`, `medicine_name`, `in_quantity`, `box_quantity`, `created_at`, `updated_at`) VALUES
(9, 9, 9, 1, 'Napa', 100, 5, '2022-05-29 19:03:28', '2022-05-29 19:03:28'),
(10, 9, 10, 1, 'Napa', 100, 1, '2022-05-29 19:03:28', '2022-05-29 19:03:28'),
(11, 7, 7, 1, 'Napa', 200, 10, '2022-06-16 12:48:35', '2022-06-16 12:48:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `box_carton` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `box_carton`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 'Box 1', 20, '2022-05-22 19:13:14', '2022-05-22 19:13:14'),
(3, 'Carton 1', 100, '2022-05-22 19:13:34', '2022-05-22 19:13:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ml', 1, '2022-02-15 14:03:11', '2022-02-15 14:03:11'),
(4, 'mg', 1, '2022-02-17 13:33:52', '2022-02-17 13:33:52'),
(7, 'Pcs', 1, '2022-05-22 19:04:18', '2022-05-22 19:04:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rashed', 'rashed@gmail.com', NULL, '$2y$10$URLCIMkOjOb5YtB8LeuOYORz84Lcx0/ScPs1MIh1hB73/RXq.Abo.', 1, NULL, NULL, NULL),
(4, 'Kamrul Hasan', 'kamrul@gmail.com', NULL, '$2y$10$LJSV2xpzd1TB4LvuyZ1w6O13gycq9dgn06D1DI6hnpDoyGtYGQz8q', 2, NULL, NULL, '2022-05-21 19:57:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `credit_customers`
--
ALTER TABLE `credit_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `credit_payment_histories`
--
ALTER TABLE `credit_payment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_manufacturer_id_foreign` (`manufacturer_id`),
  ADD KEY `medicines_category_id_foreign` (`category_id`),
  ADD KEY `medicines_unit_id_foreign` (`unit_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `pos_invoices`
--
ALTER TABLE `pos_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `return_purchases`
--
ALTER TABLE `return_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales_returns`
--
ALTER TABLE `sales_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sale_return_subtotals`
--
ALTER TABLE `sale_return_subtotals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sale_revenues`
--
ALTER TABLE `sale_revenues`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `credit_customers`
--
ALTER TABLE `credit_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `credit_payment_histories`
--
ALTER TABLE `credit_payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pos_invoices`
--
ALTER TABLE `pos_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `return_purchases`
--
ALTER TABLE `return_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales_returns`
--
ALTER TABLE `sales_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `sale_return_subtotals`
--
ALTER TABLE `sale_return_subtotals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sale_revenues`
--
ALTER TABLE `sale_revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicines_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicines_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
