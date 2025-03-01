-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Mar 2025, 15:24:41
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `konferans`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_img` text DEFAULT NULL,
  `dogum_tarih` varchar(255) DEFAULT NULL,
  `unvan` varchar(255) DEFAULT NULL,
  `fakulte` varchar(255) DEFAULT NULL,
  `alani` varchar(255) DEFAULT NULL,
  `universitesi` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `silindiMi` int(11) DEFAULT 0,
  `atandiMi` int(11) DEFAULT 0,
  `konferans_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `phone`, `name`, `user_img`, `dogum_tarih`, `unvan`, `fakulte`, `alani`, `universitesi`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `silindiMi`, `atandiMi`, `konferans_id`, `role_id`) VALUES
(2, '66666666666', 'Hakem', NULL, NULL, NULL, NULL, NULL, NULL, 'hakem@gmail.com', NULL, '$2y$10$y1z4kKyaulO63WlBsCF4HeS84/J29GihWrXGByW62udSBnyOMHo.6', NULL, '2025-03-01 09:07:55', '2025-03-01 09:07:55', 0, 0, 0, 1),
(3, '444444444', 'Yonetici', NULL, NULL, NULL, NULL, NULL, NULL, 'yonetici@gmail.com', NULL, '$2y$10$W.YOePRDJApCSbZmnAeox.d1wANpW0JLZl7sibUZ7eO4WfvzNyM8C', NULL, '2025-03-01 09:10:11', '2025-03-01 11:09:14', 0, 1, 4, 2),
(5, '1111111111', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', NULL, '$2y$10$vBL7pGFLoHmRxeFlZxEnnuisV5mMbs2U2em3HD/tdcSZl3ThCSazW', NULL, '2025-03-01 09:11:38', '2025-03-01 09:11:38', 0, 0, 0, 4),
(6, '+1 (145) 779-9177', 'Yonetici2', NULL, NULL, NULL, NULL, NULL, NULL, 'yonetici2@gmail.com', NULL, '$2y$10$nuzuxtP0T33jVgOAjtdD.eCa.Da2dveHuC1/GqGRGu3tFfdGpT3t2', NULL, '2025-03-01 11:07:27', '2025-03-01 11:07:27', 0, 0, 0, 2),
(7, '4325534534', 'Yonetici3', NULL, NULL, NULL, NULL, NULL, NULL, 'yonetici3@gmail.com', NULL, '$2y$10$OZ6KOriVaU8RFInbVbZPgeYoCvoIwcZAYZRKT51f7fRJe5x850iyq', NULL, '2025-03-01 11:07:59', '2025-03-01 11:07:59', 0, 0, 0, 2),
(8, '34242342343', 'Yazar', NULL, NULL, NULL, NULL, NULL, NULL, 'yazar@gmail.com', NULL, '$2y$10$cpJSoWA6f/PeMDpf5whIbuLHKwZbcsJhelB0kFhlfbaPoyxrT0vHW', NULL, '2025-03-01 11:12:37', '2025-03-01 11:12:37', 0, 0, 0, 4);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
