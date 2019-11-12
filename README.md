Git clone laravel的專案後的檔案建構

(1)composer install

(2)cp .env.example .env

(3)php artisan key:generate


---------------------------------------專案資料庫----------------------------------------------------
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `laravel`
--
CREATE DATABASE IF NOT EXISTS `laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `laravel`;

-- --------------------------------------------------------

--
-- 資料表結構 `games`
--

CREATE TABLE `games` (
  `GameID` int(10) UNSIGNED NOT NULL,
  `GameName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GameStatus` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `GameIntroduce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `games`
--

INSERT INTO `games` (`GameID`, `GameName`, `GameStatus`, `GameIntroduce`) VALUES
(1, 'SlotMachine', '1', '選定下注金額，隨機轉動出現不同圖案，出現完全相同圖案，則依其賠率勝出'),
(2, 'LittleMary', '1', '依不同賠率選擇下注金額,下注項目與轉定圖案相符，則依其賠率勝出');

-- --------------------------------------------------------

--
-- 資料表結構 `littlemarys`
--

CREATE TABLE `littlemarys` (
  `MaryID` int(10) UNSIGNED NOT NULL,
  `UserID` int(10) UNSIGNED DEFAULT NULL,
  `MaryResult` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(10) UNSIGNED NOT NULL,
  `UserID` int(10) UNSIGNED NOT NULL,
  `StoreDate` datetime NOT NULL DEFAULT current_timestamp(),
  `MoneyOrigin` enum('JkoPay','CHT','FarPass','TaiwanMobile') COLLATE utf8mb4_unicode_ci NOT NULL,
  `StoreMoney` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `slotmachines`
--

CREATE TABLE `slotmachines` (
  `SlotID` int(10) UNSIGNED NOT NULL,
  `UserID` int(10) UNSIGNED DEFAULT NULL,
  `SlotResult` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `stamps`
--

CREATE TABLE `stamps` (
  `StampID` int(10) UNSIGNED NOT NULL,
  `UserID` int(10) UNSIGNED NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp(),
  `GetWay` enum('Register','Play','Store') COLLATE utf8mb4_unicode_ci NOT NULL,
  `GameName` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BetCoin` int(10) UNSIGNED DEFAULT NULL,
  `GetCoin` int(10) UNSIGNED DEFAULT NULL,
  `GameCoin` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `stamps`
--

INSERT INTO `stamps` (`StampID`, `UserID`, `Time`, `GetWay`, `GameName`, `BetCoin`, `GetCoin`, `GameCoin`) VALUES
(1, 1, '2019-10-25 10:30:56', 'Register', NULL, NULL, NULL, 100000);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `Account` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Permission` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `Name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `Address` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `GameCoin` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`UserID`, `Account`, `Password`, `Permission`, `Name`, `Phone`, `Address`, `CreateDate`, `UpdateDate`, `GameCoin`) VALUES
(1, 'casinoGM', '$2y$10$6WJ6EhYSKEU52rUP5KNIC.R6XrhexJqqhAG.mVD1nWCX4vcOOlPfC', '2', 'GM', '', '', '2019-10-25 10:30:56', '2019-10-25 10:30:56', 100000);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`GameID`),
  ADD UNIQUE KEY `GameName` (`GameName`);

--
-- 資料表索引 `littlemarys`
--
ALTER TABLE `littlemarys`
  ADD PRIMARY KEY (`MaryID`);

--
-- 資料表索引 `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `UserID` (`UserID`);

--
-- 資料表索引 `slotmachines`
--
ALTER TABLE `slotmachines`
  ADD PRIMARY KEY (`SlotID`);

--
-- 資料表索引 `stamps`
--
ALTER TABLE `stamps`
  ADD PRIMARY KEY (`StampID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `GameName` (`GameName`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Account` (`Account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `games`
--
ALTER TABLE `games`
  MODIFY `GameID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `littlemarys`
--
ALTER TABLE `littlemarys`
  MODIFY `MaryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `slotmachines`
--
ALTER TABLE `slotmachines`
  MODIFY `SlotID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stamps`
--
ALTER TABLE `stamps`
  MODIFY `StampID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- 資料表的限制式 `stamps`
--
ALTER TABLE `stamps`
  ADD CONSTRAINT `stamps_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `stamps_ibfk_2` FOREIGN KEY (`GameName`) REFERENCES `games` (`GameName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
