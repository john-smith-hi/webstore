-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 01:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutuses`
--

CREATE TABLE `aboutuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutuses`
--

INSERT INTO `aboutuses` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, '<h2>Test</h2>', '2023-10-20 13:19:08', '2023-10-20 13:19:08'),
(2, '<h2>Test</h2><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p><p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test&nbsp;</p>', '2023-10-20 13:19:28', '2023-10-20 13:19:28'),
(3, '<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Penweb - Trang web bán hàng thương hiệu bút uy tín</strong></h2><p>Penweb là một trang web bán hàng thương hiệu bút uy tín tại Việt Nam. Trang web cung cấp đa dạng các loại bút, từ bút ký, bút bi, bút chì đến bút dạ, bút gel,... với nhiều thương hiệu nổi tiếng như Parker, Montblanc, Lamy,...</p><p><strong>Điểm nổi bật của trang web Penweb</strong></p><ul><li><strong>Sản phẩm đa dạng</strong></li></ul><p>Penweb cung cấp đa dạng các loại bút, từ bút ký cao cấp đến bút học sinh, bút văn phòng. Trang web luôn cập nhật những sản phẩm mới nhất của các thương hiệu nổi tiếng.</p><ul><li><strong>Giá cả cạnh tranh</strong></li></ul><p>Penweb cam kết bán hàng với giá cả cạnh tranh nhất thị trường. Trang web thường xuyên có các chương trình khuyến mãi, giảm giá hấp dẫn.</p><ul><li><strong>Dịch vụ giao hàng nhanh chóng</strong></li></ul><p>Penweb có hệ thống giao hàng toàn quốc, đảm bảo giao hàng tận nơi trong vòng 2-3 ngày.</p><p><strong>Các dịch vụ của trang web Penweb</strong></p><ul><li><strong>Mua hàng online</strong></li></ul><p>Khách hàng có thể mua hàng trực tuyến trên website Penweb. Trang web có giao diện thân thiện, dễ sử dụng.</p><ul><li><strong>Tư vấn sản phẩm</strong></li></ul><p>Penweb có đội ngũ nhân viên tư vấn chuyên nghiệp, sẵn sàng giải đáp mọi thắc mắc của khách hàng về sản phẩm.</p><ul><li><strong>Chính sách đổi trả</strong></li></ul><p>Penweb áp dụng chính sách đổi trả hàng trong vòng 7 ngày nếu sản phẩm bị lỗi.</p><p><strong>Lời kết</strong></p><p>Penweb là một địa chỉ mua sắm bút uy tín dành cho mọi khách hàng. Với đa dạng sản phẩm, giá cả cạnh tranh và dịch vụ chất lượng, Penweb chắc chắn sẽ mang đến cho bạn những trải nghiệm mua sắm tuyệt vời.</p>', '2023-10-20 13:24:55', '2023-10-20 13:24:55'),
(4, '<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Penweb - Trang web bán hàng thương hiệu uy tín</strong></h2><p>Penweb là một trang web bán hàng thương hiệu bút uy tín tại Việt Nam. Trang web cung cấp đa dạng các loại bút, từ bút ký, bút bi, bút chì đến bút dạ, bút gel,... với nhiều thương hiệu nổi tiếng như Parker, Montblanc, Lamy,...</p><p><strong>Điểm nổi bật của trang web Penweb</strong></p><ul><li><strong>Sản phẩm đa dạng</strong></li></ul><p>Penweb cung cấp đa dạng các loại bút, từ bút ký cao cấp đến bút học sinh, bút văn phòng. Trang web luôn cập nhật những sản phẩm mới nhất của các thương hiệu nổi tiếng.</p><ul><li><strong>Giá cả cạnh tranh</strong></li></ul><p>Penweb cam kết bán hàng với giá cả cạnh tranh nhất thị trường. Trang web thường xuyên có các chương trình khuyến mãi, giảm giá hấp dẫn.</p><ul><li><strong>Dịch vụ giao hàng nhanh chóng</strong></li></ul><p>Penweb có hệ thống giao hàng toàn quốc, đảm bảo giao hàng tận nơi trong vòng 2-3 ngày.</p><p><strong>Các dịch vụ của trang web Penweb</strong></p><ul><li><strong>Mua hàng online</strong></li></ul><p>Khách hàng có thể mua hàng trực tuyến trên website Penweb. Trang web có giao diện thân thiện, dễ sử dụng.</p><ul><li><strong>Tư vấn sản phẩm</strong></li></ul><p>Penweb có đội ngũ nhân viên tư vấn chuyên nghiệp, sẵn sàng giải đáp mọi thắc mắc của khách hàng về sản phẩm.</p><ul><li><strong>Chính sách đổi trả</strong></li></ul><p>Penweb áp dụng chính sách đổi trả hàng trong vòng 7 ngày nếu sản phẩm bị lỗi.</p><p><strong>Lời kết</strong></p><p>Penweb là một địa chỉ mua sắm bút uy tín dành cho mọi khách hàng. Với đa dạng sản phẩm, giá cả cạnh tranh và dịch vụ chất lượng, Penweb chắc chắn sẽ mang đến cho bạn những trải nghiệm mua sắm tuyệt vời.</p>', '2023-10-20 13:25:20', '2023-10-20 13:25:20'),
(5, '<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Penweb - Trang web bán hàng thương hiệu uy tín</strong></h2><p>Penweb là một trang web bán hàng thương hiệu bút uy tín tại Việt Nam. Trang web cung cấp đa dạng các loại bút, từ bút ký, bút bi, bút chì đến bút dạ, bút gel,... với nhiều thương hiệu nổi tiếng như Parker, Montblanc, Lamy,...</p><p><strong>Điểm nổi bật của trang web Penweb</strong></p><ul><li><strong>Sản phẩm đa dạng</strong></li></ul><p>Penweb cung cấp đa dạng các loại bút, từ bút ký cao cấp đến bút học sinh, bút văn phòng. Trang web luôn cập nhật những sản phẩm mới nhất của các thương hiệu nổi tiếng.</p><ul><li><strong>Giá cả cạnh tranh</strong></li></ul><p>Penweb cam kết bán hàng với giá cả cạnh tranh nhất thị trường. Trang web thường xuyên có các chương trình khuyến mãi, giảm giá hấp dẫn.</p><ul><li><strong>Dịch vụ giao hàng nhanh chóng</strong></li></ul><p>Penweb có hệ thống giao hàng toàn quốc, đảm bảo giao hàng tận nơi trong vòng 2-3 ngày.</p><p><strong>Các dịch vụ của trang web Penweb</strong></p><ul><li><strong>Mua hàng online</strong></li></ul><p>Khách hàng có thể mua hàng trực tuyến trên website Penweb. Trang web có giao diện thân thiện, dễ sử dụng.</p><ul><li><strong>Tư vấn sản phẩm</strong></li></ul><p>Penweb có đội ngũ nhân viên tư vấn chuyên nghiệp, sẵn sàng giải đáp mọi thắc mắc của khách hàng về sản phẩm.</p><ul><li><strong>Chính sách đổi trả</strong></li></ul><p>Penweb áp dụng chính sách đổi trả hàng trong vòng 7 ngày nếu sản phẩm bị lỗi.</p><p><strong>Lời kết</strong></p><p>Penweb là một địa chỉ mua sắm bút uy tín dành cho mọi khách hàng. Với đa dạng sản phẩm, giá cả cạnh tranh và dịch vụ chất lượng, Penweb chắc chắn sẽ mang đến cho bạn những trải nghiệm mua sắm tuyệt vời.</p>', '2023-10-20 13:25:42', '2023-10-20 13:25:42'),
(6, '<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Penweb1 - Trang web bán hàng thương hiệu uy tín</strong></h2><p>Penweb là một trang web bán hàng thương hiệu bút uy tín tại Việt Nam. Trang web cung cấp đa dạng các loại bút, từ bút ký, bút bi, bút chì đến bút dạ, bút gel,... với nhiều thương hiệu nổi tiếng như Parker, Montblanc, Lamy,...</p><p><strong>Điểm nổi bật của trang web Penweb</strong></p><ul><li><strong>Sản phẩm đa dạng</strong></li></ul><p>Penweb cung cấp đa dạng các loại bút, từ bút ký cao cấp đến bút học sinh, bút văn phòng. Trang web luôn cập nhật những sản phẩm mới nhất của các thương hiệu nổi tiếng.</p><ul><li><strong>Giá cả cạnh tranh</strong></li></ul><p>Penweb cam kết bán hàng với giá cả cạnh tranh nhất thị trường. Trang web thường xuyên có các chương trình khuyến mãi, giảm giá hấp dẫn.</p><ul><li><strong>Dịch vụ giao hàng nhanh chóng</strong></li></ul><p>Penweb có hệ thống giao hàng toàn quốc, đảm bảo giao hàng tận nơi trong vòng 2-3 ngày.</p><p><strong>Các dịch vụ của trang web Penweb</strong></p><ul><li><strong>Mua hàng online</strong></li></ul><p>Khách hàng có thể mua hàng trực tuyến trên website Penweb. Trang web có giao diện thân thiện, dễ sử dụng.</p><ul><li><strong>Tư vấn sản phẩm</strong></li></ul><p>Penweb có đội ngũ nhân viên tư vấn chuyên nghiệp, sẵn sàng giải đáp mọi thắc mắc của khách hàng về sản phẩm.</p><ul><li><strong>Chính sách đổi trả</strong></li></ul><p>Penweb áp dụng chính sách đổi trả hàng trong vòng 7 ngày nếu sản phẩm bị lỗi.</p><p><strong>Lời kết</strong></p><p>Penweb là một địa chỉ mua sắm bút uy tín dành cho mọi khách hàng. Với đa dạng sản phẩm, giá cả cạnh tranh và dịch vụ chất lượng, Penweb chắc chắn sẽ mang đến cho bạn những trải nghiệm mua sắm tuyệt vời.</p>', '2023-10-25 07:57:09', '2023-10-25 07:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `address`, `email`, `tel`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sơn Long Đồng Khánh', 'son-long-dong-khanh', NULL, NULL, 'sonlongdongkhanh@gmail.com', '012', '/storage/brands/j7RVEpmYgrzMYJPdddxXphlRPikCU5JfU2LaMpzX.png', '2023-09-30 16:33:11', '2023-10-03 21:12:35'),
(3, 'Phúc Long', 'phuc-long', '<h2>test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test</h2>', 'test test test test test test test test test test test test test test', 'phuclong@gmail.com', '0123456789', '/storage/brands/SnO2WPLzscCaHuBt3kbhO1LUoFxrhQ3Xf3nXpjTO.jpg', '2023-09-30 17:08:13', '2023-10-25 07:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(8, 9, 3, 1, '2023-10-28 08:49:34', '2023-10-28 08:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laptop', 'laptop', 0, '2023-09-30 18:13:56', '2023-09-30 18:13:56', NULL),
(3, 'Laptop cho dân văn phòng', 'laptop-cho-dan-van-phong', 1, '2023-09-30 18:23:36', '2023-09-30 18:23:36', NULL),
(4, 'Laptop gaming', 'laptop-gaming', 1, '2023-10-02 14:28:35', '2023-10-02 14:28:35', NULL),
(5, 'Điện thoại', 'dien-thoai', 0, '2023-10-02 14:28:48', '2023-10-02 14:28:48', NULL),
(6, 'Nokia', 'nokia', 5, '2023-10-02 14:28:57', '2023-10-02 14:28:57', NULL),
(7, 'Apple', 'apple', 5, '2023-10-02 14:29:08', '2023-10-02 14:29:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Bản in.pdf', '/storage/docs/vqJJZNbhzQ5X0zvmQR1YKFDdBkqkpuy6ZHrYKbxQ.pdf', '2023-10-23 06:54:38', '2023-10-23 06:54:38'),
(2, 'CV Lê Minh Nhật - an ninh mạng.pdf', '/storage/docs/CdWTYdTAoPhHacHYSvdjky959r6igi4wFZyV4YxJ.pdf', '2023-10-25 07:58:29', '2023-10-25 07:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_variables`
--

CREATE TABLE `global_variables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_variables`
--

INSERT INTO `global_variables` (`id`, `name`, `value`, `note`, `created_at`, `updated_at`) VALUES
(1, 'APP_NAME', 'Store', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(2, 'APP_KEY', 'base64:3AIoF7YaZ1WIqIIr177GZSPET4wQzz1BBcY3ofuc/nE=', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(3, 'APP_DEBUG', 'true', 'true/false: Bật/tắt tính năng sửa debug', '2023-10-24 13:40:40', '2023-10-24 22:26:12'),
(4, 'APP_URL', 'http://localhost', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(5, 'LOG_CHANNEL', 'stack', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(6, 'LOG_DEPRECATIONS_CHANNEL', 'null', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(7, 'LOG_LEVEL', 'debug', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(8, 'DB_CONNECTION', 'mysql', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(9, 'DB_HOST', '127.0.0.1', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(10, 'DB_PORT', '3306', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(11, 'DB_DATABASE', 'storedb', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(12, 'DB_USERNAME', 'root', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(13, 'DB_PASSWORD', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(14, 'BROADCAST_DRIVER', 'log', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(15, 'CACHE_DRIVER', 'file', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(16, 'FILESYSTEM_DISK', 'local', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(17, 'QUEUE_CONNECTION', 'sync', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(18, 'SESSION_DRIVER', 'file', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(19, 'SESSION_LIFETIME', '120', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(20, 'MEMCACHED_HOST', '127.0.0.1', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(21, 'REDIS_HOST', '127.0.0.1', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(22, 'REDIS_PASSWORD', 'null', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(23, 'REDIS_PORT', '6379', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(24, 'MAIL_MAILER', 'smtp', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(25, 'MAIL_HOST', 'smtp.gmail.com', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(26, 'MAIL_PORT', '465', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(27, 'MAIL_USERNAME', 'lmn147852369@gmail.com', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(28, 'MAIL_PASSWORD', 'iqzcdcaetfqmcjtg', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(29, 'MAIL_ENCRYPTION', 'tls', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(30, 'MAIL_FROM_ADDRESS', 'lmn147852369@gmail.com', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(31, 'MAIL_FROM_NAME', 'PenWeb', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(32, 'AWS_ACCESS_KEY_ID', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(33, 'AWS_SECRET_ACCESS_KEY', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(34, 'AWS_DEFAULT_REGION', 'us-east-1', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(35, 'AWS_BUCKET', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(36, 'AWS_USE_PATH_STYLE_ENDPOINT', 'false', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(37, 'PUSHER_APP_ID', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(38, 'PUSHER_APP_KEY', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(39, 'PUSHER_APP_SECRET', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(40, 'PUSHER_HOST', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(41, 'PUSHER_PORT', '443', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(42, 'PUSHER_SCHEME', 'https', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(43, 'PUSHER_APP_CLUSTER', 'mt1', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(44, 'VITE_PUSHER_APP_KEY', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(45, 'VITE_PUSHER_HOST', '', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(46, 'VITE_PUSHER_PORT', '443', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(47, 'VITE_PUSHER_SCHEME', 'https', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(48, 'VITE_PUSHER_APP_CLUSTER', 'mt1', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(49, 'APP_TIMEZONE', 'Asia/Ho_Chi_Minh', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(50, 'TOKEN_LENGTH', '64', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(51, 'MAX_TIME_VERIFY_TOKEN', '10', 'Đơn vị phút', '2023-10-24 13:40:40', '2023-10-25 08:19:44'),
(52, 'ADMIN_PAGINATE_NUMBER', '5', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(53, 'ADMIN_SEARCH_NAME_RESULT', '10', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(54, 'EMAIL_CONTACT', 'lmn147852369@gmail.com', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(55, 'REMEMBER_ME', '1', '', '2023-10-24 13:40:40', '2023-10-24 13:40:40'),
(59, 'ADDRESS_CONTACT_1', 'Địa chỉ 1', 'Địa chỉ liên hệ 1', '2023-10-24 13:42:05', '2023-10-24 13:42:05'),
(60, 'EMAIL_CONTACT_1', 'leminhnhat10081999@gmail.com', 'Email liên hệ 1', '2023-10-24 13:42:24', '2023-10-24 13:42:24'),
(61, 'TEL_CONTACT_1', '0969651063', 'Số điện thoại liên hệ 1', '2023-10-24 13:42:48', '2023-10-24 13:42:48'),
(62, 'ADDRESS_CONTACT_2', 'Địa chỉ 21', 'Địa chỉ liên hệ 2', '2023-10-24 13:43:19', '2023-10-25 08:01:42'),
(63, 'TEL_CONTACT_2', '0969651063', 'Số điện thoại liên hệ 2', '2023-10-24 13:45:54', '2023-10-24 13:45:54'),
(64, 'EMAIL_CONTACT_2', 'lmn147852369235435434@gmail.com', 'Email liện hệ 2', '2023-10-24 13:46:54', '2023-10-25 08:00:09'),
(65, 'USER_PAGINATE_ORDER_NUMBER', '5', 'Tổng số đơn hàng trong 1 phân trang của đặt hàng', '2023-10-24 21:13:24', '2023-10-24 21:34:54'),
(66, 'USER_PAGINATE_PRODUCT_COMMENT_NUMBER', '5', 'Tổng số bình luận hiển thị trong 1 phân trang của 1 sản phẩm', '2023-10-28 06:27:54', '2023-10-28 06:27:54'),
(67, 'USER_PAGINATE_SEARCH_PRODUCT_NUMBER', '20', 'DSADASD', '2023-10-28 09:04:37', '2023-10-28 09:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_23_083916_create_brands_table', 1),
(6, '2023_09_23_084121_create_categories_table', 1),
(7, '2023_09_23_084226_create_products_table', 1),
(8, '2023_09_23_084802_create_product_tags_table', 1),
(9, '2023_09_23_084817_create_orders_table', 1),
(10, '2023_09_23_084856_create_product_images_table', 1),
(11, '2023_09_23_084947_create_product_comments_table', 1),
(12, '2023_09_23_085002_create_product_ratings_table', 1),
(13, '2023_09_23_085232_create_order_products_table', 1),
(14, '2023_09_23_091740_create_storage_histories_table', 1),
(15, '2023_09_23_092204_create_news_table', 1),
(16, '2023_09_23_092455_create_login_logs_table', 1),
(17, '2023_09_23_092559_create_order_logs_table', 1),
(18, '2023_09_23_092807_create_search_product_logs_table', 1),
(19, '2023_09_23_092831_create_logs_table', 1),
(20, '2023_09_25_131904_create_slides_table', 1),
(21, '2023_09_29_183900_create_sale_products_table', 1),
(22, '2023_10_03_210156_create_otps_table', 2),
(23, '2023_10_05_101437_create_jobs_table', 3),
(24, '2023_10_06_203711_create_carts_table', 4),
(25, '2023_10_20_200100_create_aboutuses_table', 5),
(26, '2023_10_20_201726_create_aboutuses_table', 6),
(27, '2023_10_22_202550_create_global_variables_table', 7),
(28, '2023_10_23_132240_create_documents_table', 8),
(29, '2023_10_27_231810_create_product_reviews_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `total` bigint(20) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `shipping_address` varchar(255) NOT NULL,
  `shipping_address2` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `status_payment` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `tel`, `total`, `status`, `shipping_address`, `shipping_address2`, `payment_method`, `status_payment`, `order_date`, `delivery_date`, `receive_date`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(26, 9, 'Lê Minh', 'Nhật', 'lmn147852369@gmail.com', '123', 51170000, '0', '123 Test', NULL, NULL, 0, '2023-10-28', NULL, NULL, NULL, NULL, '2023-10-28 08:48:03', '2023-10-28 08:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_logs`
--

CREATE TABLE `order_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `origin_price` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `origin_price`, `sale_id`, `final_price`, `quantity`, `created_at`, `updated_at`) VALUES
(35, 26, 4, 10000000, 4, 5000000, 10, '2023-10-28 08:48:03', '2023-10-28 08:48:03'),
(36, 26, 3, 100000, 1, 90000, 13, '2023-10-28 08:48:03', '2023-10-28 08:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `summary` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `information` text DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `brand_id` int(11) NOT NULL DEFAULT 0,
  `status_storage` varchar(255) NOT NULL DEFAULT '0',
  `status_sell` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `summary`, `description`, `information`, `category_id`, `brand_id`, `status_storage`, `status_sell`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Laptop cho dân văn phòng 1', 'laptop-cho-dan-van-phong-1', 100000, '<p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p>', '<p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p>', '<p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test</p>', 3, 3, '1', '1', '2023-10-01 14:44:27', '2023-10-24 06:04:09', NULL),
(4, 'Điện thoại Sơn Long Đồng Khánh', 'dien-thoai-son-long-dong-khanh', 10000000, '<p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test <strong>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test&nbsp;</strong></p>', '<p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Te<strong>st Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test&nbsp;</strong></p>', '<p>Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Te<strong>st Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test&nbsp;</strong></p>', 5, 1, '1', '1', '2023-10-05 03:34:26', '2023-10-25 07:48:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `first_name`, `last_name`, `email`, `tel`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '', '', '', '', 'a', '2023-10-02 15:16:46', '2023-10-02 16:46:41'),
(2, 3, 9, '', '', '', '', 'tes', '2023-10-19 02:40:04', '2023-10-19 02:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(7, 4, '/storage/products/5pbVhW3mBivijKC8w13k9ja7jYD8IMYeTIwFmMtM.png', '2023-10-10 02:32:39', '2023-10-10 02:32:39'),
(8, 3, '/storage/products/pqYVfKap0vtajkIlov4VFhloQDaodrnzjWzZy4X5.jpg', '2023-10-19 01:54:59', '2023-10-19 01:54:59'),
(9, 3, '/storage/products/IEsopquqZyf1Hb2iKalOUYtGnhNSxbANPUxYskFW.jpg', '2023-10-19 01:54:59', '2023-10-19 01:54:59'),
(11, 4, '/storage/products/J3mJk8rg90XvXLUKGSjsiQRBsX8IotRpF4vZCXVj.png', '2023-10-20 03:13:44', '2023-10-20 03:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, NULL, '2023-10-02 16:07:46', '2023-10-24 04:03:14'),
(2, 3, 9, 1, 'test', '2023-10-27 16:16:48', '2023-10-27 16:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 9, 5, 'Test', '2023-10-27 16:27:55', '2023-10-27 16:27:55'),
(2, 3, 9, 1, '1', '2023-10-28 06:21:05', '2023-10-28 06:21:05'),
(3, 3, 9, 1, '1', '2023-10-28 06:21:19', '2023-10-28 06:21:19'),
(4, 3, 9, 5, '5', '2023-10-28 06:25:06', '2023-10-28 06:25:06'),
(5, 3, 9, 5, '1', '2023-10-28 06:25:30', '2023-10-28 06:25:30'),
(6, 3, 9, 2, '2', '2023-10-28 06:28:46', '2023-10-28 06:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag`, `created_at`, `updated_at`) VALUES
(11, 2, 'laptop', '2023-09-30 21:33:12', '2023-09-30 21:33:12'),
(12, 2, 'pc', '2023-09-30 21:33:12', '2023-09-30 21:33:12'),
(13, 2, 'new', '2023-09-30 21:33:12', '2023-09-30 21:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `sale_percent` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `product_id`, `sale_price`, `sale_percent`, `start_date`, `finish_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 10000, 0, '2023-10-01', '2023-11-30', 1, '2023-10-01 22:41:56', '2023-10-23 14:34:18'),
(4, 4, 0, 50, '2023-10-01', '2023-11-30', 1, '2023-10-23 14:26:27', '2023-10-23 14:26:27'),
(5, 3, 20000, 0, '2023-10-15', '2023-11-30', 0, '2023-10-23 14:37:14', '2023-10-25 07:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `search_product_logs`
--

CREATE TABLE `search_product_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `search_query` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage_histories`
--

CREATE TABLE `storage_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_histories`
--

INSERT INTO `storage_histories` (`id`, `product_id`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 30, 90000, 0, '2023-10-02 09:34:50', '2023-10-02 10:35:47'),
(6, 3, 10, 120000, 1, '2023-10-02 10:21:11', '2023-10-02 10:21:11'),
(7, 4, 10, 9000000, 0, '2023-10-25 07:49:14', '2023-10-25 07:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `tel`, `email`, `email_verified_at`, `token`, `first_name`, `last_name`, `gender`, `avatar`, `address`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1278282257', 'I4aGe4sV4g@gmail.com', NULL, NULL, 'HDi2N8vdXQ', 'yxSv83rRsK', '0', NULL, 'sdg2tUsA2ov2TXkSEaCYvHyzj4tyVB', 0, NULL, NULL, NULL, NULL),
(5, NULL, 'admin123@gmail.com', NULL, NULL, NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL),
(7, '0969651061', 'leminhnhat1008199@gmail.com', NULL, NULL, 'Admin', 'Nhật', '0', '/storage/avatars/NRlvSWNp1Y5LemLUicZhYJrMpLoJxQBcdt6G85w9.jpg', NULL, 1, 'l1akhm06X9mD7Fh83UUvrlIr8772DK5fcNOoALyRQs4pEGnPydrm8cs39p0z', NULL, '2023-10-27 15:15:00', NULL),
(9, '123', 'lmn147852369@gmail.com', NULL, NULL, 'Lê Minh', 'Nhật', '1', '/storage/avatars/8ca1dBcVQmL83hnUcPreogo88aMuOMie7O5tu8WL.jpg', '123 Test', 0, 'EqHlTjNebKrgh0L5wNrNmVYMJ1COAeBqap9E0F3uLcPztwyigdt5VSlkVshF', NULL, '2023-10-27 13:30:16', NULL),
(10, NULL, 'leminhnhat10081999@gmail.com', '2023-10-10 02:25:49', NULL, NULL, NULL, '0', NULL, NULL, 0, 'AZ8fH98yHJ2yTv7v9aOThlEuRSao5Jz3uZ8nmrNqbt6JkhRb8NNUkPFXGc8Z', NULL, '2023-10-10 02:26:06', NULL),
(11, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, '0', NULL, NULL, 0, NULL, '2023-10-24 20:54:20', '2023-10-24 20:54:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutuses`
--
ALTER TABLE `aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`),
  ADD UNIQUE KEY `brands_email_unique` (`email`),
  ADD UNIQUE KEY `brands_tel_unique` (`tel`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documents_name_unique` (`name`),
  ADD UNIQUE KEY `documents_link_unique` (`link`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `global_variables`
--
ALTER TABLE `global_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_product_logs`
--
ALTER TABLE `search_product_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slides_image_unique` (`image`);

--
-- Indexes for table `storage_histories`
--
ALTER TABLE `storage_histories`
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
-- AUTO_INCREMENT for table `aboutuses`
--
ALTER TABLE `aboutuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_variables`
--
ALTER TABLE `global_variables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_logs`
--
ALTER TABLE `order_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `search_product_logs`
--
ALTER TABLE `search_product_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `storage_histories`
--
ALTER TABLE `storage_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
