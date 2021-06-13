-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.8-MariaDB
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `smart_commerce`
--

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

CREATE TABLE `board` (
  `mNo` int(10) NOT NULL,
  `pNo` int(10) NOT NULL,
  `boardTime` datetime NOT NULL,
  `board` varchar(100) DEFAULT NULL,
  `messenger` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `board`
--

INSERT INTO `board` (`mNo`, `pNo`, `boardTime`, `board`, `messenger`) VALUES
(10006, 1, '2020-10-27 22:30:36', '很好看的產品', NULL),
(10006, 4, '2020-10-27 23:18:43', '很有彈性，價格便宜~', NULL),
(10006, 5, '2020-10-27 23:19:16', '快速便宜!', NULL),
(10006, 6, '2020-10-27 23:20:30', '很可愛的襪子~', NULL),
(10006, 7, '2020-10-27 23:20:42', '會再回購!!', NULL),
(10007, 1, '2020-10-27 22:30:13', '很好穿~', NULL),
(10007, 1, '2020-10-27 22:30:18', '下次會再買', NULL),
(10007, 2, '2020-11-07 11:32:49', '很好看的商品~', NULL),
(10028, 1, '2020-12-31 09:30:27', 'chill', NULL),
(10028, 3, '2021-01-06 12:17:05', '12345', NULL),
(10029, 7, '2020-12-31 12:58:18', 'Gooooooood????', NULL),
(10029, 8, '2020-11-07 22:27:28', 'good', NULL),
(10029, 9, '2020-11-07 22:43:03', '模特有一起賣嗎', NULL),
(10031, 1, '2020-11-13 15:05:18', 'clll', NULL),
(10031, 2, '2020-11-08 16:59:04', '喜歡~', NULL),
(10031, 3, '2020-12-31 09:22:13', '可愛????', NULL),
(10031, 3, '2020-12-31 09:23:40', '好可愛<3', NULL),
(10031, 4, '2020-12-31 09:44:06', '保暖～很適合冬天！', NULL),
(10032, 8, '2020-11-13 13:26:22', '1234', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `browse`
--

CREATE TABLE `browse` (
  `mNo` int(10) NOT NULL,
  `pNo` int(10) NOT NULL,
  `browseTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `mNo` int(10) NOT NULL,
  `cartTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `cart`
--

INSERT INTO `cart` (`mNo`, `cartTime`) VALUES
(10006, '2021-01-13 12:49:55'),
(10028, '2021-06-02 03:03:02'),
(10028, '2021-06-02 03:32:15'),
(10028, '2021-06-02 03:32:30'),
(10031, '2020-12-31 01:26:47'),
(10036, '2021-06-01 04:17:21');

-- --------------------------------------------------------

--
-- 資料表結構 `contact`
--

CREATE TABLE `contact` (
  `name` varchar(100) NOT NULL,
  `contactTime` datetime NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `contact`
--

INSERT INTO `contact` (`name`, `contactTime`, `phone`, `email`, `subject`, `message`) VALUES
('duck', '2020-11-07 14:24:58', '0910498848', '1234@gmail.com', 'we', 'qwe'),
('張宜庭', '2020-11-11 21:28:12', '0922479017', 'domo880713@gmail.com', '襪子很可愛', '你們的襪子很可愛~~想要買來當聖誕禮物~~'),
('王鴨子', '2020-11-12 21:12:05', '0910498848', '12345@gmail.com', '出貨速度快', '大推，產品品質好，英倫風襪子好帥氣'),
('王鴨子', '2020-11-13 13:30:43', '0910498848', '12345@gmail.com', '王鴨子', '商品好看喔'),
('張宜庭', '2020-11-13 14:53:52', '0922479017', 'domo880713@gmail.com', '讚喔', '襪子好讚'),
('張宜庭', '2020-11-13 15:07:04', '0922479017', 'domo880713@gmail.com', '456', '123'),
('張宜庭', '2020-12-31 09:34:10', '0922479017', 'domo880713@gmail.com', '商品讚', '商品漂亮價格實在！'),
('張宜庭', '2020-12-31 09:34:16', '0922479017', 'domo880713@gmail.com', '商品讚', '商品漂亮價格實在！'),
('chang', '2020-12-31 12:52:49', '0903000000', 'judy41022@ymail.com', '主旨', '留言'),
('123', '2021-01-06 12:18:32', '0910498848', 'kellygoodluck062889@gmail.com', '123', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `favorite`
--

CREATE TABLE `favorite` (
  `mNo` int(10) NOT NULL,
  `pNo` int(10) NOT NULL,
  `likeTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `favorite`
--

INSERT INTO `favorite` (`mNo`, `pNo`, `likeTime`) VALUES
(10006, 1, '2021-01-13 18:15:25'),
(10006, 2, '2021-01-13 19:37:36'),
(10006, 4, '2021-01-13 18:15:40'),
(10006, 5, '2020-10-27 21:03:35'),
(10006, 7, '2020-10-27 22:32:14'),
(10006, 11, '2021-01-13 19:34:29'),
(10006, 13, '2021-01-13 19:37:22'),
(10007, 1, '2020-11-06 23:23:44'),
(10007, 3, '2020-11-06 23:24:00'),
(10026, 2, '2020-11-07 14:24:36'),
(10027, 1, '2020-11-11 20:34:21'),
(10027, 4, '2020-11-11 20:34:57'),
(10027, 5, '2020-12-31 12:23:50'),
(10028, 1, '2021-06-01 13:42:46'),
(10028, 2, '2021-01-13 00:00:42'),
(10028, 3, '2021-06-01 13:38:23'),
(10029, 1, '2020-11-07 22:31:45'),
(10029, 2, '2020-12-31 12:57:26'),
(10029, 3, '2020-11-07 22:31:52'),
(10029, 4, '2020-12-31 12:57:31'),
(10029, 5, '2020-12-31 12:57:34'),
(10029, 6, '2020-12-31 12:57:38'),
(10029, 7, '2020-12-31 12:57:41'),
(10031, 1, '2020-11-08 16:58:40'),
(10032, 1, '2020-11-13 13:27:35'),
(10032, 2, '2020-11-13 15:19:02'),
(10032, 3, '2020-11-13 15:18:42'),
(10033, 1, '2020-11-13 14:50:09'),
(10035, 5, '2021-06-01 12:51:10'),
(10035, 12, '2021-05-24 20:26:09');

-- --------------------------------------------------------

--
-- 資料表結構 `imagedb`
--

CREATE TABLE `imagedb` (
  `imageNo` int(10) NOT NULL,
  `pNo` int(10) NOT NULL,
  `imageName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `imagedb`
--

INSERT INTO `imagedb` (`imageNo`, `pNo`, `imageName`) VALUES
(1, 1, 'shop/products/product-1-1.jpg'),
(2, 1, 'shop/products/product-1-2.jpg'),
(3, 1, 'shop/products/product-1-3.jpg'),
(4, 2, 'shop/products/product-2-1.jpg'),
(5, 2, 'shop/products/product-2-2.jpg'),
(6, 2, 'shop/products/product-2-3.jpg'),
(7, 3, 'shop/products/product-3-1.jpg'),
(8, 3, 'shop/products/product-3-2.jpg'),
(9, 3, 'shop/products/product-3-3.jpg'),
(10, 4, 'shop/products/product-4-1.jpg'),
(11, 4, 'shop/products/product-4-2.jpg'),
(12, 4, 'shop/products/product-4-3.jpg'),
(13, 5, 'shop/products/product-5-1.jpg'),
(14, 5, 'shop/products/product-5-2.jpg'),
(15, 5, 'shop/products/product-5-3.jpg'),
(16, 6, 'shop/products/product-6-1.jpg'),
(17, 6, 'shop/products/product-6-2.jpg'),
(18, 6, 'shop/products/product-6-3.jpg'),
(19, 7, 'shop/products/product-7-1.jpg'),
(20, 7, 'shop/products/product-7-2.jpg'),
(21, 7, 'shop/products/product-7-3.jpg'),
(22, 8, 'shop/products/product-8-1.jpg'),
(23, 8, 'shop/products/product-8-2.jpg'),
(24, 8, 'shop/products/product-8-3.jpg'),
(25, 9, 'shop/products/product-9-1.jpg'),
(26, 9, 'shop/products/product-9-2.jpg'),
(27, 9, 'shop/products/product-9-3.jpg'),
(28, 10, 'shop/products/product-1-1.jpg'),
(29, 10, 'shop/products/product-1-2.jpg'),
(30, 10, 'shop/products/product-1-3.jpg'),
(31, 11, 'shop/products/product-6-1.jpg'),
(32, 11, 'shop/products/product-6-2.jpg'),
(33, 11, 'shop/products/product-6-3.jpg'),
(34, 13, 'shop/products/product-8-1.jpg'),
(35, 13, 'shop/products/product-8-2.jpg'),
(36, 13, 'shop/products/product-8-3.jpg'),
(62, 14, 'shop/products/product-14-1.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mNo` int(10) NOT NULL,
  `mName` varchar(10) CHARACTER SET big5 NOT NULL,
  `mAccount` varchar(40) NOT NULL,
  `mPassword` varchar(100) NOT NULL,
  `mBirthday` date NOT NULL,
  `mEmail` varchar(50) NOT NULL,
  `mCounty` varchar(30) CHARACTER SET big5 NOT NULL,
  `mDistrict` varchar(30) CHARACTER SET big5 NOT NULL,
  `mStreet` varchar(30) CHARACTER SET big5 NOT NULL,
  `mPhone` varchar(10) NOT NULL,
  `getPassTime` int(10) DEFAULT NULL,
  `imageName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mNo`, `mName`, `mAccount`, `mPassword`, `mBirthday`, `mEmail`, `mCounty`, `mDistrict`, `mStreet`, `mPhone`, `getPassTime`, `imageName`) VALUES
(10001, 'duck', 'duck123', '$2y$10$lI7CQJtRX1O9rhIpGpgvKuRNWJ.KkRnN92e5liPuQcJSeziqRYIQq', '2020-07-16', 'kellyho@gmail.com', 'NewTaipei', 'Forest Area', 'Learning 123', '0912345678', NULL, 'member/sad.png'),
(10006, '王小名', 'S0661020', '$2y$10$dUJ9JnkKXV.vZIcWlvW4de5xTNkteqJ10VqTk/RBnyFKJVQEbx./y', '2020-06-28', 'ken917088@gmail.com', '彰化市', '進德路', '1號', '0912345677', 1604831483, 'member/123.png'),
(10007, '陳先生', 'ken', '$2y$10$lI7CQJtRX1O9rhIpGpgvKuRNWJ.KkRnN92e5liPuQcJSeziqRYIQq', '2020-07-02', 'kelly@gmail.com', 'NewTaipei', 'hod', 'Learning 123', '0987654321', 1604758448, 'member/sad.png'),
(10023, '王寶寶', 'testduck', '$2y$10$0GfXYJWWnS2SWR.ZdTEHzeEocLmaCYq88bHYm11OfWPAvPtl42FNO', '2020-10-29', 'kellygoodluck28@yahoo.com.tw', '彰化縣', '彰化市', '彰化市進德路1號', '0912345677', NULL, NULL),
(10024, '台明碩太', 'smart123', '$2y$10$cs8MHraPMGGE8/TixNke.upuj69mdJaAEtjQtXXQv5y3Ch7ZTi4fu', '1980-01-01', '0', '0', '0', '0', '0', NULL, NULL),
(10025, 'test', 'testtest', '$2y$10$Bxqo3LkMcqqC4Nmc/rVvSuZKwGII3mfpNqMP8u3e7Jqj2Wx.nzGq6', '2013-07-17', 'test@gmail.com', '彰化縣', '彰化市', '24234', '0912345678', NULL, NULL),
(10026, 'duck', 'duck', '$2y$10$uc6DYLYH3CN.zlYYX1aKpOS0guyUI/9zxWnM1WWv.4gk1JAKwWM/S', '2006-07-05', '1234@gmail.com', '彰化縣', '彰化市', '彰化市進德路1號', '0910498848', NULL, NULL),
(10027, '吳佳馨', 's0661007', '$2y$10$F7fCshrz31pbZJbZdM1SDOj3mGYvN8LXWEMCSEGQB8f5xtJSsiSRq', '1998-12-04', 'chia5200205@gmail.com', '新竹縣', '新豐鄉', '新庄路135巷8號', '0954166469', 1609377545, 'member/1544109678683.jpg'),
(10028, 'Sheng Chin', 'test', '$2y$10$cFp1nE34.GF//KIBeOwuweR3BtEGxASn5oY85kQBxMA1.yhmPqKie', '2020-10-07', 'kellygoodluck062889@gmail.com', '雲林縣', '斗南鎮', '彰化市進德路1號', '0910498848', 1622520418, 'member/1585053699-2349f992d655d0172069dfde6ba04f9e.jpg'),
(10029, 'chang', '0661103', '$2y$10$5RXJnllns1EOCUScp1AryOcNZJj3zGUj9FjjLN.W7ThEayoC9k.06', '1998-12-14', 'judy41022@ymail.com', '彰化縣', '彰化市', '進德路', '0903000000', 1609390256, NULL),
(10030, 'test', 'S0661121', '$2y$10$PJ02adJJOg38zzkJ.7b5bOAXHdrHp2EffWZlFCetBtCNfZ25hhy1i', '2020-11-13', 'ken917088rr@gmail.com', '屏東縣', '屏東市', '測試', '0912345678', NULL, NULL),
(10031, '張宜庭', 's0661018', '$2y$10$35pgKk0ifdKoPDVihiT/1uVhPnY263nkk/OprskN8ylngMGFSV0vK', '1999-07-13', 'domo880713@gmail.com', '彰化縣', '彰化市', '竹和路76巷2-1號', '0922479017', 1609377625, 'member/HOTDOG.png'),
(10032, '王鴨子', 'kellymis123', '$2y$10$mp.E9WteFV8XZQCZhrMKTORB92r0AvdfwaEBuqxW52Li0QkVgeHxS', '1999-02-09', '12345@gmail.com', '彰化縣', '彰化市', '彰化市進德路1號', '0910498848', NULL, NULL),
(10033, '54321', '12345', '$2y$10$wXYsGAdNmvY/J7gmS4W/7Om5I3LErwHbJ1GGiotH8wAKpS9iAMWi.', '2017-07-12', 's0661018@gmail.com', '彰化縣', '彰化市', '彰化市進德路1號', '0911111111', NULL, NULL),
(10034, '湯包', 'long123', '$2y$10$.4WqZC53Z3vW9.8KZIn6deOTWbq1UqS/YZIM3yP4ccv40GyO.hV1G', '1996-10-27', 'lik@gmail.com', '新北市', '萬里區', '中正街32號', '0987987234', NULL, NULL),
(10035, '陳宥僑', 'kenken', '$2y$10$kvxgtLibZCIKtQ2i8i7HA.5kv63XUzQrG1TALiIDRzDwEaP.KjpW2', '2021-05-06', 's0661121@gm.cue.edu.tw', '宜蘭縣', '宜蘭市', '你好123號', '0912345678', NULL, 'member/123.png'),
(10036, 'Ivy', 'Ivy123', '$2y$10$wiot0NkHepxYadzlMTV/m.Dg4Hc7O3mYDkqMZV1lRYgZ2CzLtVG0.', '1999-05-26', 'Ivy551228@gmail.com', '新北市', '樹林區', '學勤路298號18樓', '0922083692', NULL, 'member/images.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `online`
--

CREATE TABLE `online` (
  `mId` int(10) NOT NULL,
  `onTime` datetime DEFAULT NULL,
  `online` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `online`
--

INSERT INTO `online` (`mId`, `onTime`, `online`) VALUES
(10001, '2020-11-07 10:14:57', 0),
(10006, '2021-01-15 11:14:27', 0),
(10007, '2020-11-07 01:21:19', 0),
(10024, '2020-10-27 11:32:43', 0),
(10025, '2020-10-27 11:51:21', 0),
(10026, '2020-11-07 02:25:03', 0),
(10027, '2020-12-31 12:23:40', 1),
(10028, '2021-06-02 11:24:27', 1),
(10029, '2020-12-31 12:57:17', 1),
(10030, '2020-11-07 11:40:32', 0),
(10031, '2020-12-31 03:00:37', 1),
(10032, '2020-11-13 03:18:33', 1),
(10033, '2020-11-13 02:53:16', 0),
(10034, '2020-12-30 10:02:27', 1),
(10035, '2021-06-02 11:05:17', 1),
(10036, '2021-06-01 12:22:50', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `pNo` int(10) NOT NULL,
  `mNo` int(10) NOT NULL,
  `cartTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`pNo`, `mNo`, `cartTime`, `amount`) VALUES
(1, 10028, '2021-06-02 03:32:15', 1),
(2, 10006, '2021-01-13 12:49:55', 3),
(3, 10028, '2021-06-02 03:03:02', 2),
(9, 10031, '2020-12-31 01:26:47', 1),
(14, 10028, '2021-06-02 03:32:30', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pNo` int(10) NOT NULL,
  `pName` varchar(100) CHARACTER SET big5 NOT NULL,
  `pUnitPrice` decimal(10,2) NOT NULL,
  `category` varchar(20) CHARACTER SET big5 DEFAULT NULL,
  `pDescription` varchar(1000) CHARACTER SET big5 DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`pNo`, `pName`, `pUnitPrice`, `category`, `pDescription`, `image`) VALUES
(1, '黑白造型條紋', '123.00', '中性長襪', '#經典不敗格紋系列\n#讓你百搭絕不NG\n→款式為黑白格紋、紅條\n→均為本店實物拍攝\n→尺寸建議22cm-26cm\n→”MIT”品質保證!', 'shop/products/product-1.jpg'),
(2, '聖誕氣氛保暖襪 – 星星款', '60.00', '中性長襪', '# 最暖心的秋冬情侶限定<br>\r\n# 限量款式，成為人群焦點<br>\r\n→ 四款冬季限定<br>\r\n→ 均為本店實物拍攝 <br>\r\n→ 尺寸建議23cm-28cm <br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-1-1.jpg'),
(3, '聖誕氣氛保暖襪 – 麋鹿款(靛藍色)', '60.00', '中性長襪', '# 最暖心的秋冬情侶限定<br>\r\n# 限量款式，成為人群焦點<br>\r\n→ 四款冬季限定<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-3.jpg'),
(4, '聖誕氣氛保暖襪 – 麋鹿款(亮藍綠色)', '60.00', '中性長襪', '# 最暖心的秋冬情侶限定<br>\r\n# 限量款式，成為人群焦點<br>\r\n→ 四款冬季限定<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-4.jpg'),
(5, '聖誕氣氛保暖襪 – 麋鹿款(深藍綠色)', '60.00', '中性長襪', '# 最暖心的秋冬情侶限定<br>\r\n# 限量款式，成為人群焦點<br>\r\n→ 四款冬季限定<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-5.jpg'),
(6, '復古條紋厚襪 – 藍白條紋', '60.00', '中性長襪', '# 簡單搭配，不失風格<br>\r\n# 讓復古引領你的潮流<br>\r\n→ 冬季保暖長襪<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-6.jpg'),
(7, '復古條紋厚襪 – 灰白款', '60.00', '中性長襪', '# 簡單搭配，不失風格<br>\r\n# 讓復古引領你的潮流<br>\r\n→ 冬季保暖長襪<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-7.jpg'),
(8, '英倫時尚長襪 – 紅藍款', '60.00', '中性長襪', '# 英倫時尚經典風情<br>\r\n# 優雅休閒穿出好氣質<br>\r\n→ 冬季保暖長襪<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-8.jpg'),
(9, '簡約時尚素色長襪 – 黑白款', '60.00', '中性長襪', '# 簡約百搭、舒適又好穿<br>\r\n# 流藏一絲俐落感<br>\r\n→ 四季皆可穿搭<br>\r\n→ 均為本店實物拍攝 <br>\r\n→ 尺寸建議23cm-28cm <br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-9.jpg'),
(10, '簡約紅白條紋', '150.00', '中性長襪', '# 經典不敗格紋系列<br>\r\n# 讓你百搭絕不NG<br>\r\n→ 款式為黑白格紋、紅條<br>\r\n→ 均為本店實物拍攝 <br>\r\n→ 尺寸建議22cm-26cm <br>\r\n→ ” MIT ”品質保證！<br>\r\n', 'shop/products/product-1.jpg'),
(11, '復古條紋厚襪 – 多色條紋', '60.00', '中性長襪', '# 簡單搭配，不失風格<br>\r\n# 讓復古引領你的潮流<br>\r\n→ 冬季保暖長襪<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-6.jpg'),
(12, '測試', '111.00', '測試款', '測試喔', 'shop/products/product-8.jpg'),
(13, '英倫時尚長襪 – 橘藍款', '60.00', '中性長襪', '# 英倫時尚經典風情<br>\r\n# 優雅休閒穿出好氣質<br>\r\n→ 冬季保暖長襪<br>\r\n→ 均為本店實物拍攝<br>\r\n→ 尺寸建議23cm-28cm<br>\r\n→ ” MIT ”品質保證！<br>', 'shop/products/product-8.jpg'),
(14, '竹炭休閒襪', '88.00', '休閒襪', '1. 嚴選台灣竹炭紗線、精梳棉織成，使足部透氣並降低臭味發生。\r\n2. 強化伸縮彈性採用spandex彈性紗，使襪口不易鬆脫。\r\n3. 專利對目無線縫合，不刺激腳背，給予足部最親膚的舒適感。\r\n4. 輕薄襪身設計更加親膚服貼，透氣輕盈無負擔。', 'shop/products/product-14.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `tNo` int(10) NOT NULL,
  `pNo` int(10) NOT NULL,
  `salePrice` decimal(10,2) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`tNo`, `pNo`, `salePrice`, `amount`) VALUES
(11, 2, '600.00', 3),
(12, 4, '1000.00', 5),
(13, 1, '3640.00', 7),
(15, 4, '200.00', 1),
(17, 1, '600.00', 4),
(18, 5, '240.00', 4),
(19, 1, '600.00', 4),
(19, 2, '360.00', 6),
(20, 1, '450.00', 3),
(20, 3, '1140.00', 19),
(26, 2, '240.00', 4),
(27, 1, '150.00', 1),
(28, 8, '60.00', 1),
(29, 9, '231200.00', 100),
(30, 2, '60.00', 1),
(31, 1, '150.00', 1),
(32, 1, '150.00', 1),
(32, 4, '60.00', 1),
(32, 8, '60.00', 1),
(33, 8, '120.00', 2),
(34, 8, '120.00', 2),
(35, 2, '120.00', 2),
(36, 1, '450.00', 3),
(37, 1, '300.00', 2),
(37, 2, '120.00', 2),
(38, 1, '300.00', 2),
(39, 1, '450.00', 3),
(39, 6, '6000.00', 100),
(39, 8, '6000.00', 100),
(40, 3, '120.00', 2),
(40, 5, '120.00', 2),
(42, 12, '333.00', 3),
(43, 6, '180.00', 3),
(44, 2, '180.00', 3),
(44, 6, '60.00', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `transaction`
--

CREATE TABLE `transaction` (
  `tNo` int(10) NOT NULL,
  `mNo` int(10) NOT NULL,
  `transTime` datetime NOT NULL,
  `name` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `county` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `district` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `tMethod` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `tBankid` varchar(14) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tBankName` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tCardType` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tCartid` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tDueDate` date DEFAULT NULL,
  `process` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `transaction`
--

INSERT INTO `transaction` (`tNo`, `mNo`, `transTime`, `name`, `county`, `district`, `street`, `tMethod`, `tBankid`, `tBankName`, `tCardType`, `tCartid`, `tDueDate`, `process`) VALUES
(11, 10006, '2020-09-13 11:13:00', 'test', '123123', '123213', '123123', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(12, 10006, '2020-09-13 12:48:00', 'test1', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(13, 10006, '2020-09-13 12:49:00', 'test2', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(15, 10006, '2020-09-13 12:59:00', 'test3', 'tset', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(17, 10006, '2020-10-03 22:35:00', 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(18, 10006, '2020-10-04 15:00:00', 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(19, 10007, '2020-10-10 22:19:00', 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(20, 10006, '2020-11-06 23:57:00', 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(26, 10007, '2020-11-07 11:42:00', '阿ken', '彰化縣', '彰化市', '測試', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(27, 10026, '2020-11-07 11:59:00', 'S0661020', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(28, 10029, '2020-11-07 22:29:00', 'chang', '彰化縣', '彰化市', '進德路', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(29, 10029, '2020-11-07 22:43:00', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(30, 10031, '2020-11-08 16:59:00', '張', '彰化縣', '500', '竹和路76巷2-1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(31, 10028, '2020-11-08 20:10:00', 'S0661020', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(32, 10027, '2020-11-11 20:36:00', 's0661007', '彰化縣', '彰化市', '中山路三段', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(33, 10032, '2020-11-12 21:05:00', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(34, 10032, '2020-11-13 13:28:00', '王小名', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(35, 10033, '2020-11-13 14:51:00', '張張張', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(36, 10031, '2020-11-13 15:06:00', '彰', '彰化', '彰化', '晉德1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(37, 10028, '2020-12-29 20:03:00', 'S0661020', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(38, 10028, '2020-12-30 21:22:00', '鴨子', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(39, 10028, '2020-12-30 22:36:00', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(40, 10031, '2020-12-31 09:24:00', '張宜庭', '高雄市', '三民區', '建元路26號17樓', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(42, 10035, '2021-05-24 20:26:00', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(43, 10036, '2021-06-01 12:15:00', '王泳曜', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(44, 10028, '2021-06-01 13:38:00', 'S0661020', '彰化市', '進德路', '彰化市進德路1號', NULL, NULL, NULL, NULL, NULL, NULL, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`mNo`,`pNo`,`boardTime`) USING BTREE,
  ADD KEY `pNo` (`pNo`),
  ADD KEY `messenger` (`messenger`);

--
-- 資料表索引 `browse`
--
ALTER TABLE `browse`
  ADD PRIMARY KEY (`mNo`,`pNo`,`browseTime`),
  ADD KEY `pNo` (`pNo`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`mNo`,`cartTime`);

--
-- 資料表索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactTime`);

--
-- 資料表索引 `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`mNo`,`pNo`),
  ADD KEY `pNo` (`pNo`);

--
-- 資料表索引 `imagedb`
--
ALTER TABLE `imagedb`
  ADD PRIMARY KEY (`imageNo`),
  ADD KEY `pNo` (`pNo`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mNo`);

--
-- 資料表索引 `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`mId`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`pNo`,`mNo`,`cartTime`),
  ADD KEY `mNo` (`mNo`,`cartTime`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pNo`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`tNo`,`pNo`),
  ADD KEY `pNo` (`pNo`);

--
-- 資料表索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tNo`),
  ADD KEY `mNo` (`mNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `imagedb`
--
ALTER TABLE `imagedb`
  MODIFY `imageNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `mNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10037;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `pNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `board_ibfk_1` FOREIGN KEY (`mNo`) REFERENCES `member` (`mNo`),
  ADD CONSTRAINT `board_ibfk_2` FOREIGN KEY (`pNo`) REFERENCES `product` (`pNo`),
  ADD CONSTRAINT `board_ibfk_3` FOREIGN KEY (`messenger`) REFERENCES `member` (`mNo`);

--
-- 資料表的限制式 `browse`
--
ALTER TABLE `browse`
  ADD CONSTRAINT `browse_ibfk_1` FOREIGN KEY (`mNo`) REFERENCES `member` (`mNo`),
  ADD CONSTRAINT `browse_ibfk_2` FOREIGN KEY (`pNo`) REFERENCES `product` (`pNo`);

--
-- 資料表的限制式 `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`mNo`) REFERENCES `member` (`mNo`);

--
-- 資料表的限制式 `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`mNo`) REFERENCES `member` (`mNo`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`pNo`) REFERENCES `product` (`pNo`);

--
-- 資料表的限制式 `imagedb`
--
ALTER TABLE `imagedb`
  ADD CONSTRAINT `imagedb_ibfk_1` FOREIGN KEY (`pNo`) REFERENCES `product` (`pNo`);

--
-- 資料表的限制式 `online`
--
ALTER TABLE `online`
  ADD CONSTRAINT `online_ibfk_1` FOREIGN KEY (`mId`) REFERENCES `member` (`mNo`);

--
-- 資料表的限制式 `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`pNo`) REFERENCES `product` (`pNo`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`mNo`,`cartTime`) REFERENCES `cart` (`mNo`, `cartTime`);

--
-- 資料表的限制式 `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`tNo`) REFERENCES `transaction` (`tNo`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`pNo`) REFERENCES `product` (`pNo`);

--
-- 資料表的限制式 `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`mNo`) REFERENCES `member` (`mNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
