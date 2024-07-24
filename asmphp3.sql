-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 21, 2024 lúc 11:09 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asmphp3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comps`
--

CREATE TABLE `comps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comps`
--

INSERT INTO `comps` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Maida Bednar1', 'comp/gfZqAB55HDBLQOPoJ9PqKAHzRDNDdmnGbEYGUOFi.jpg', '2024-07-19 15:21:22', '2024-07-19 16:11:27'),
(2, 'Mr. Lavon Labadie Jr.', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(3, 'Breana Stokes I', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(4, 'Prof. Michel Renner DVM', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(5, 'Prof. Madalyn Ankunding', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(6, 'Mr. Hans Sipes', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(7, 'Elsa Buckridge', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(8, 'Vilma Rodriguez', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(9, 'Wilber Aufderhar Sr.', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(10, 'Prof. Stephany Gulgowski V', '', '2024-07-19 15:21:22', '2024-07-19 15:21:22'),
(11, 'Samsung', '', NULL, NULL),
(12, 'Iphone', 'comp/GLat8UnB47L571iDVNNg4grzYn1JPpcpynwyQTnM.jpg', NULL, NULL),
(13, 'Oppo', 'comp/ZCPEX0PxGGsEXLwlo8LrLVbynk8drLJmHfyZ30ok.jpg', NULL, NULL),
(14, 'iphone 16', 'comp/t02v4mBVMhfSTSg6p0AQt2bIThAogu3qGAiKYAzI.jpg', NULL, NULL),
(16, 'tung', 'comp/iZE3eXuATMru0FRtQeQjbybYpVxs3V7DNhQfkTDD.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2024_07_19_192047_create_comps_table', 1),
(18, '2024_07_19_192108_create_phones_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `mota` text NOT NULL,
  `comp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phones`
--

INSERT INTO `phones` (`id`, `name`, `cost`, `img`, `quantity`, `mota`, `comp_id`, `created_at`, `updated_at`) VALUES
(1, 'Albin Treutel', 23392, 'phone/hhDi8MpXYjCEviu8zCDJIPVbscSJN8cDjsZXs07a.jpg', 152, 'Ratione nobis occaecati neque consequatur. Voluptas illum error quisquam deleniti reiciendis repellendus qui. Est dolores suscipit excepturi ut. Repudiandae alias quis qui ducimus.', 8, '2024-07-19 15:21:38', '2024-07-20 02:58:14'),
(2, 'Brooks Keeling DDS', 13465, 'phone/NJyte4X1sM5Kc2v9WalamZw8G3w4PbTmFJPKTOq7.jpg', 180, 'Aliquid optio similique accusamus vitae. Quam quia doloribus ut aut. Quidem ullam consequatur voluptatem perferendis sit et dolores. Omnis ratione et mollitia veniam dolorum labore voluptate.', 4, '2024-07-19 15:21:38', '2024-07-20 02:58:34'),
(3, 'Amari Hudson', 17309, 'phone/prpna7bY1ZEosmpLlqvjF6tbHTTE3Ko6ufu7N18q.jpg', 115, 'Similique molestiae esse deserunt et doloribus. Reprehenderit illo similique possimus animi. Minus a libero tempora minima id. Minus dolores voluptas itaque quae illum iure et.', 1, '2024-07-19 15:21:38', '2024-07-20 02:58:39'),
(4, 'Mr. Lesley O\'Hara PhD', 10636, 'phone/GoZdHoEmdKU9KCvUcOTu5l4FQQLnL8UOOpaYEBt8.jpg', 174, 'Possimus qui id impedit. Maxime et cupiditate voluptatem itaque eveniet ut et. Porro ratione esse nam et quisquam tenetur.', 10, '2024-07-19 15:21:38', '2024-07-20 02:58:45'),
(5, 'Fred Crooks', 26152, 'phone/I7UmbV40uwKUqIzhUv7cwtp5XJbNByOtUQZdL83Y.jpg', 113, 'Harum laborum totam pariatur quia. Illo vel sit consectetur ea error. Non quisquam laudantium quibusdam eaque. Voluptates necessitatibus veniam eos.', 1, '2024-07-19 15:21:38', '2024-07-20 02:58:50'),
(6, 'Kailee Christiansen', 21890, 'phone/qZZ6hYZLDCuaLgDB4u6CHpJNrAOUKdDEkyOGzrVp.png', 195, 'A fugiat rerum voluptas voluptatem quia. Sapiente blanditiis commodi corrupti molestias. Reiciendis sit facere quis ratione deleniti. Doloremque ut quo illum officia voluptatem.', 2, '2024-07-19 15:21:38', '2024-07-20 02:58:55'),
(7, 'Prof. Arne Nader', 29161, 'phone/Hk0wt3i6h314dc989Sl0E8K32K0RTTbeX3PvSYmA.png', 132, 'Aspernatur quo mollitia ipsum dolor earum dolor est. Ab in quidem praesentium numquam quis delectus. Omnis beatae magnam a aut illo adipisci reiciendis. Autem voluptates nesciunt illo quo unde aut.', 1, '2024-07-19 15:21:38', '2024-07-20 02:59:03'),
(8, 'Hailie Deckow PhD', 26858, 'phone/fFa95wRJVL5lRsD060ligJpycE59Zm4nVOdeiVVq.png', 181, 'Dolore est sit soluta aperiam expedita veritatis similique. Ut cumque fuga quidem. Ex perspiciatis assumenda qui enim.', 10, '2024-07-19 15:21:38', '2024-07-20 02:59:10'),
(9, 'Darryl Waelchi II', 19966, 'phone/nFPPani91nJsvt9Vm6TBLrwYHEXuLNtkuOtQVHPg.jpg', 137, 'Sit velit ut quia perspiciatis rem eum. Qui enim quisquam aspernatur consequatur hic. Reiciendis atque et soluta omnis. Voluptatum et est temporibus ipsum qui nihil.', 6, '2024-07-19 15:21:38', '2024-07-20 02:59:16'),
(10, 'Laurianne Kilback', 22688, 'phone/paQJlIoUHQrYbhV80VqpMWrlh0akkQ2mAEHAG7jn.jpg', 177, 'Aliquam adipisci pariatur aut. Hic ut aliquid quas.', 4, '2024-07-19 15:21:38', '2024-07-20 02:59:23'),
(11, 'Jeremy Nicolas', 18080, 'phone/6ijXB14d2Q61rLdi74lHJM65gcPs75AoGBBXrn7z.jpg', 143, 'Nisi sit possimus voluptatem voluptate recusandae minus. Sit magni distinctio velit provident cupiditate. Aut et minima accusamus velit magni accusantium omnis.', 8, '2024-07-19 15:21:38', '2024-07-20 02:59:28'),
(12, 'Francis Gusikowski', 27406, 'phone/W9gss0JWm3aEGRPfT5J1FyZuA2bRcYt6xAdIjhvd.jpg', 150, 'Dolor minima quos ut. Eum amet consequatur rerum et quo beatae. Delectus libero quia dicta. Culpa cum quia ipsam asperiores tempore.', 2, '2024-07-19 15:21:38', '2024-07-20 02:59:35'),
(13, 'Markus Bailey', 17135, 'phone/NDwCwys1FDUnM4cM2gFbbV9eOTqiluyJODhd36Pr.jpg', 139, 'Similique inventore porro est illum quidem. Consequatur ad et possimus tempore modi eius. Nesciunt odit excepturi ut recusandae exercitationem soluta. Aut dolor optio eos vel non qui.', 6, '2024-07-19 15:21:38', '2024-07-20 02:59:44'),
(14, 'Mr. Stewart Hamill V', 15182, 'phone/2axM0PJAZIXy6D5afGIYyaqdJ8gLEAwdHRIvuZMD.png', 155, 'Magnam quo et quia similique maxime ut alias. Maiores et quia qui. Eum dolor et accusamus enim officiis est laudantium.', 8, '2024-07-19 15:21:38', '2024-07-20 02:59:51'),
(15, 'Tabitha Kemmer', 15055, 'phone/ESUBNRW2pTcr3lk9WeRPSeOFnsInIkUWQKqicqDF.png', 113, 'Assumenda sunt illo magni voluptatem repellendus. Optio esse omnis incidunt ipsam provident natus quis.', 2, '2024-07-19 15:21:38', '2024-07-20 02:59:58'),
(16, 'Antone Ankunding', 15362, 'phone/RpXHdM2R1WmeMfClg0l9ZlaWjRPazqBaPIVwyrxc.png', 127, 'Perspiciatis commodi cum et est. Qui dolor omnis voluptates. Culpa esse earum et modi nihil iure et quisquam. Rem veniam ea laborum adipisci enim eos ut.', 6, '2024-07-19 15:21:38', '2024-07-20 03:00:07'),
(17, 'Lynn Ledner', 24755, 'phone/sik0xNuGJ4YZt6QZlh43tI8lRZrTpVNrnkz0LoGS.png', 104, 'Asperiores sit nisi maiores a. Porro aliquid dolor totam laborum sed. Ab ut culpa assumenda.', 1, '2024-07-19 15:21:38', '2024-07-20 03:00:14'),
(18, 'Ms. Willa Hayes', 25036, 'phone/LMBFuO8BstokfaX5ASDla3vrr1yI1Nakb2fpc1qK.jpg', 153, 'Voluptatem cumque dolorum quia quisquam. Dolorum aliquid quasi nisi sit sunt et et. Commodi eaque et aut et atque quisquam consectetur tempora. Maiores provident molestias accusantium sed.', 10, '2024-07-19 15:21:38', '2024-07-20 03:00:22'),
(19, 'Dr. Alberto Fay V', 29322, 'phone/drpziypgsYqm3IABIrzDsJKAkAT6OThymmwxqIVO.jpg', 106, 'Eum eum non tempore omnis. Necessitatibus eveniet adipisci est eligendi. Minus corporis beatae aut tempora repellendus. Fuga et quas rerum a.', 2, '2024-07-19 15:21:38', '2024-07-20 03:00:29'),
(21, 'tung1', 12311, 'phone/CN4c3mc97oUCwXTvJPc7bPl9R9lMZ1USl4BSJP4y.jpg', 1223, 'qweqweqweqweqw1111111111111111', 3, NULL, '2024-07-19 16:49:19'),
(22, 'tung', 121, 'phone/sJx4ZQxGZ3BdP71LqGAQYbDvVEJWdi8Xpe9iZrOn.jpg', 111, 'qweqweqw', 1, NULL, NULL),
(23, 'tung', 121, 'phone/uEtl6zeYBDz7fpV40BuxK5j2MrFVSPiErFoA5fzJ.jpg', 111, 'qweqweqw', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comps`
--
ALTER TABLE `comps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phones_comp_id_foreign` (`comp_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comps`
--
ALTER TABLE `comps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_comp_id_foreign` FOREIGN KEY (`comp_id`) REFERENCES `comps` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
