-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 05:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'Tuấn vũ', 'vu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '+10984533223', NULL, NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_11_092955_create_tb_user_table', 1),
(3, '2022_10_11_154951_create_tb_user_table', 2),
(4, '2022_10_11_155232_create_tb_user_table', 3),
(5, '2022_10_13_000836_create_tb_category_table', 4),
(6, '2022_10_15_155318_add_column_delete_at_table_tb_category', 5),
(7, '2022_10_16_004043_add_column_delete_at_table_tb_user', 6),
(8, '2022_10_19_141003_create_products_table', 7),
(9, '2022_10_19_141930_create_product_images_table', 7),
(10, '2022_10_19_142051_create_tags_table', 7),
(11, '2022_10_19_142141_create_product_tags_table', 7),
(12, '2022_10_19_143653_create_product_images_table', 8),
(13, '2022_11_06_135716_create_products_table', 9),
(14, '2022_11_07_091156_add_column_discount_table_products', 10),
(15, '2022_11_07_141812_add_column_delete_at_table_products', 11),
(16, '2022_11_09_191525_add_views_products', 11),
(17, '2022_11_12_151050_customer', 12),
(18, '2022_11_12_161013_shipping', 13);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `content`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `views_count`) VALUES
(11, 'Bánh sừng bò dăm bông phô mai', '25000', 'sung_bo_dam_bong_pho_mai.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 100),
(12, 'Bánh sừng bò gà nướng', '35000', 'sung_bo_ga_nuong.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 19),
(13, 'Bánh sừng bò hạnh nhân', '40000', 'sung_bo_hanh_nhan.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 10),
(14, 'Bánh sừng bò thịt heo\r\n', '20000', 'sung_bo_thit_heo_ham_nam.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 200),
(15, 'Bánh sừng bò thịt xông khói\r\n', '30000', 'sung_bo_thit_xong_khoi.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 0),
(16, 'Bánh sừng bò thường\r\n', '30000', 'sung_bo_thuong.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 1, NULL, NULL, NULL, 10),
(17, 'Bánh sừng bò trà xanh\r\n', '35000', 'sung_bo_tra_xanh.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 0),
(18, 'Bánh sừng bò vừng\r\n', '15000', 'sung_bo_vung.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 0),
(19, 'Bánh sừng xúc xích\r\n', '18000', 'sung_bo_xuc_xich.jpg', 'Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối. Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt). Ở Việt Nam hầu hết các tiệm bán bánh sừng bò làm theo công thức của bánh mì sữa (hoặc được gọi là bánh mì tươi). Về công thức làm bánh croissant, có thể nói là bánh này đứng giữa bánh pâté chaud (xốp) và bánh mì (ruột bánh nổi bởi men).', 5, NULL, NULL, NULL, 200),
(20, 'Bánh pancake dứa\r\n', '30000', 'banh-pancake-dua.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 5, NULL, NULL, NULL, 0),
(21, 'Bánh pancake ngô ngọt xúc xích\r\n', '25000', 'banh-pancake-ngo-ngot-xuc-xich.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(22, 'Bánh pancake chuối\r\n', '15000', 'pancake_chuoi.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(23, 'Bánh pancake dâu tây\r\n', '45000', 'pancake_dautay.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(24, 'Bánh pancake dường chanh\r\n', '15000', 'pancake_duong_chanh.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(25, 'Bánh pancake trứng ốp\r\n', '50000', 'pancake_trungop.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(26, 'Bánh pancake bơ đậu phộng socola\r\n', '60000', 'pancake-bo-dau-phong-socola.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(27, 'Bánh pancake cơ bản', '10000', 'pancake-co-ban.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(28, 'Bánh pancake socola', '20000', 'pancake-socola.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 250),
(29, 'Bánh pancake trà xanh', '30000', 'pancake-tra-xanh.jpg', 'Pancake là một loại bánh phẳng, mỏng và tròn được làm từ nguyên liệu cơ bản bao gồm bột mì, trứng, sữa và bơ. Người ta thường cho một ít bơ hoặc dầu ăn phết lên chảo rồi mới cho bột bánh vào làm chín. Bánh pancake thường được sử dụng như một món ăn sáng và thưởng thức cùng với trà, cà phê hay sữa nóng.', 8, NULL, NULL, NULL, 0),
(30, 'Bánh cupcake vani', '10000', 'cupcake_vani.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 1, NULL, NULL, NULL, 0),
(31, 'Bánh cupcake oreo', '25000', 'cupcake_oreo.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 18, NULL, NULL, NULL, 0),
(32, 'Bánh cupcake nuttela', '60000', 'cupcake_nuttela.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 18, NULL, NULL, NULL, 0),
(33, 'Bánh cupcake nho', '30000', 'cupcake_nho.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 1, NULL, NULL, NULL, 0),
(34, 'Bánh cupcake kem dâu', '25000', 'cupcake_kemdau.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 8, NULL, NULL, NULL, 400),
(35, 'Bánh cupcake chocoalte', '45000', 'cupcake_chocoalte.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 18, NULL, NULL, NULL, 0),
(36, 'Bánh cupcake cam', '15000', 'cupcake_cam.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 18, NULL, NULL, NULL, 0),
(37, 'Bánh cupcake brownie', '50000', 'cupcake_brownie.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 18, NULL, NULL, NULL, 0),
(38, 'Bánh cupcake bơ lạc', '10000', 'cupcake_bolac.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 18, NULL, NULL, NULL, 0),
(39, 'Bánh cupcake bơ', '5000', 'cupcake_bo.jpg', 'Cupcake là loại bánh nướng trong khuôn nhỏ nên có kích thích nhỏ, phục vụ khẩu phần 1 người ăn, cốt bánh mềm, trọng lượng nhẹ, vị ngọt, thường được phủ một lớp bông kem dày bên trên và trang trí bằng đa dạng các nguyên liệu.', 18, NULL, NULL, NULL, 0),
(42, 'Bánh mì bơ', '65000', 'banhmi_bo.jpg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 17, NULL, NULL, NULL, 0),
(43, 'Bánh mì ca cao', '60000', 'banhmi_bocaccao.jpg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 17, NULL, NULL, NULL, 0),
(44, 'Bánh mì bơ sữa', '30000', 'banhmi_bosua.jpeg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 1, NULL, NULL, NULL, 0),
(45, 'Bánh mì kem', '40000', 'banhmi_kem.jpg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 17, NULL, NULL, NULL, 0),
(46, 'Bánh mì kem trứng', '1000000', 'banhmi_kemtrung.jpg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 17, NULL, NULL, NULL, 0),
(47, 'Bánh mì sữa chua', '200000', 'banhmi_suachua.jpg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 17, NULL, NULL, NULL, 0),
(48, 'Bánh mì sữa đặc', '400000', 'banhmi_suadac.jpg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 17, NULL, NULL, NULL, 0),
(49, 'Bánh mì sữa tươi', '350000', 'banhmi_suatuoi.jpg', 'Bánh mì bơ sữa đã là món ăn dân dã của người Việt Nam, được làm từ những nguyên liệu cơ bản như bột mì, trứng, sữa. Bánh mì gắn liền với những buổi ăn sáng, ăn vặt của nhiều thế hệ từ già đến trẻ.', 17, NULL, NULL, NULL, 0),
(50, 'Bánh cá rong biển Oreo', '250000', 'banh_ca_rong_bien_oreo.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 19, NULL, NULL, NULL, 0),
(51, 'Bánh cracker AFC', '15000', 'banh_cracker_afc.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 19, NULL, NULL, NULL, 0),
(52, 'Bánh cá tôm nướng Oreo', '40000', 'banh_ca_tom_nuong_ore.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 19, NULL, NULL, NULL, 340),
(53, 'Bánh khoai tây tảo biển', '45000', 'banh_khoai_tay_tao_bien.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 19, NULL, NULL, NULL, 0),
(54, 'Bánh meji planin', '15000', 'banh_meji_plain.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 19, NULL, NULL, NULL, 50),
(55, 'Bánh quy bơ phô mai ritz', '35000', 'banh_quy_bo_pho_mai_ritz.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 19, NULL, NULL, NULL, 0),
(56, 'Bánh sườn bò sốt cam', '25000', 'banh_suon_bo_sot_cam.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 19, NULL, NULL, NULL, 0),
(57, 'Bánh kem trung Tipo', '55000', 'banh_kem_trung_tipo.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 4, NULL, NULL, NULL, 0),
(58, 'Bánh quy bơ Banesita', '18000', 'banh_quy_bo_banesita.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 20, NULL, NULL, NULL, 0),
(59, 'Bánh quy bơ đậu phộng', '48000', 'banh_quy_bo_dau_phong.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 20, NULL, NULL, NULL, 0),
(60, 'Bánh quy bơ giòn', '40000', 'banh_quy_bo_gion.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 20, NULL, NULL, NULL, 0),
(61, 'Bánh quy bơ không đường', '70000', 'banh_quy_bo_khong_duong.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 20, NULL, NULL, NULL, 0),
(62, 'Bánh quy bơ pho mai Zes', '90000', 'banh_quy_pho_mai_zes.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 4, NULL, NULL, NULL, 0),
(63, 'Bánh trung Tipo', '40000', 'banh_trung_tipo.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 20, NULL, NULL, NULL, 0),
(64, 'Bánh vị phô mai Toktok', '20000', 'banh_vi_pho_mai_toktok.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 20, NULL, NULL, NULL, 0),
(65, 'Bánh cookienvani', '20000', 'banhcookievani.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 20, NULL, NULL, NULL, 0),
(66, 'Bánh hạt goute', '15000', 'banh_hat_goute.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 4, NULL, NULL, NULL, 0),
(67, 'Bánh quy cafe', '45000', 'banh_quy_cafe.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 0),
(68, 'Bánh quy dừa Rome', '5000', 'banh_quy_dua_rome.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 0),
(69, 'Bánh quy dừa COSY', '20000', 'banh_quy_dua_cosy.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 333),
(70, 'Bánh quy hạnh nhân', '30000', 'banh_quy_hanh_nhan.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 0),
(71, 'Bánh quy Lago', '90000', 'banh_quy_lago.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 0),
(72, 'Bánh quy me goute', '20000', 'banh_quy_me_goute.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 0),
(73, 'Bánh quy nam viet quat', '15000', 'banh_quy_nam_viet_quat.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 0),
(74, 'Bánh quy socola hạt', '100000', 'banh_quy_socola_hat.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 24, NULL, NULL, NULL, 0),
(75, 'Bánh quy sesame me', '20000', 'banh_sesame_meji.jpg', 'Bánh quy (cookie) là thực phẩm được nướng hoặc làm chín có hình dạng nhỏ, phẳng và ngọt. Bánh thường chứa bột, đường và một số loại dầu hoặc chất béo. Món này có thể bao gồm các thành phần khác như nho khô, yến mạch, sô cô la chip, các loại hạt, v.v.', 4, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `address`, `phone`, `email`, `Note`, `created_at`, `updated_at`) VALUES
(1, 'Tien Dat', 'Nam Địng', '0978084022', 'tiendat@gmail.com', 'Okela', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoriesName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `categoriesName`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bánh mì ngọt', 0, NULL, NULL, NULL),
(3, 'Bánh sinh nhật', 0, NULL, NULL, NULL),
(4, 'Bánh quy', 0, NULL, NULL, NULL),
(5, 'Bánh mì sừng bò', 1, NULL, NULL, NULL),
(8, 'Bánh Pancake', 1, NULL, '2022-10-15 17:43:44', '2022-10-15 17:43:44'),
(17, 'Bánh mì sữa', 1, NULL, NULL, NULL),
(18, 'Bánh Cupcake', 1, NULL, NULL, NULL),
(19, 'Bánh quy bơ mặn', 4, NULL, NULL, NULL),
(20, 'Bánh quy bơ ngọt', 4, NULL, NULL, NULL),
(22, 'Bánh quy kem', 4, NULL, NULL, NULL),
(23, 'Bánh quy socola', 4, NULL, NULL, NULL),
(24, 'Bánh quy dừa, mè', 4, NULL, NULL, NULL),
(25, 'Bánh bông lan trứng hấp', 17, '2022-11-12 02:12:04', '2022-11-12 02:12:11', '2022-11-12 02:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `name`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Trần Tiến Đạt', 'tiendat@gmail.com', '$2y$10$gKiwiLWLyVUpntRIgrEB6OQUB/vi9OFHTHiuFsAqbifiEkAhoVin.', '2022-10-12 07:28:45', '2022-11-12 02:07:52', NULL),
(5, 'Trương Tuấn Vũ', 'vu@gmail.com', '$2y$10$MnwR9VDYV1Yw4YdD2rf88eeB/u7xWUGT/H5Gym1qx0kRWdGy7xaqK', NULL, '2022-10-15 17:37:31', NULL),
(6, 'Phạm Văn Bình', 'binh@gmail.com', '$2y$10$9LsBsLIKnK5ltDntF3XNoun/EIslyheukALJA39.iOMJFXLg.Rvuy', NULL, '2022-10-15 17:50:51', NULL),
(7, 'Long Trung Hiếu', 'hieu@gmail.com', '$2y$10$9YLFeD9qiITIkNY8mLlW2OaVY45mQ1Fa.7EsDzpOyJWtOnwwepBFO', NULL, '2022-10-15 17:51:03', NULL),
(8, 'Bùi Thị Hà', 'ha@gmail.com', '$2y$10$L9CFZOhVwsluZ9GFISUQWuDxTFsB6X.RdxTUQdA544UkWgO/cWMi2', NULL, '2022-10-15 17:46:42', '2022-10-15 17:46:42'),
(9, 'Phương Nhung', 'nhung@gmail.com', '$2y$10$bGwAiW42S7OjxssIanWhaOK4bKkOAKF.3crR5vwuSmX.DxH6ZMhPC', '2022-10-15 10:10:13', '2022-11-07 07:19:16', '2022-11-07 07:19:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `tb_user_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
