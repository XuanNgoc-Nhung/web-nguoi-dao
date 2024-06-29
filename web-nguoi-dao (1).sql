-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2024 lúc 04:28 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web-nguoi-dao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cua-hang`
--

CREATE TABLE `cua-hang` (
  `id` int(12) NOT NULL,
  `chu_cua_hang` int(12) DEFAULT NULL,
  `ten_cua_hang` varchar(256) DEFAULT NULL,
  `so_dien_thoai` varchar(64) DEFAULT NULL,
  `dia_chi` varchar(256) DEFAULT NULL,
  `ban_do` varchar(2046) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cua-hang`
--

INSERT INTO `cua-hang` (`id`, `chu_cua_hang`, `ten_cua_hang`, `so_dien_thoai`, `dia_chi`, `ban_do`, `updated_at`, `created_at`) VALUES
(3, 8, 'Nhà Dao Hà Nội', '0983833618', '2W99+6CG, Khu đô thị Garden city, Thạch Bàn, Long Biên, Hà Nội, Việt Nam', 'https://maps.app.goo.gl/Mzihjq3aQr6qjBZJ6', '2024-06-18 18:40:25', '2024-06-18 18:40:25'),
(4, 4, 'Shop của Quân', '0332882442', '36 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Việt Nam', 'https://maps.app.goo.gl/1pYMQoYcR5hvzu6X9', '2024-06-18 18:41:59', '2024-06-18 18:41:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh-muc`
--

CREATE TABLE `danh-muc` (
  `id` int(12) NOT NULL,
  `id_cha` int(12) DEFAULT NULL,
  `ten` varchar(256) DEFAULT NULL,
  `slug` varchar(1024) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh-muc`
--

INSERT INTO `danh-muc` (`id`, `id_cha`, `ten`, `slug`, `avatar`, `updated_at`, `created_at`) VALUES
(7, NULL, 'Thịt', NULL, '/images/danh-muc/6672384667e97.png', '2024-06-18 18:45:42', '2024-06-18 18:45:01'),
(8, 0, 'Đồ uống', NULL, '/images/danh-muc/667238378e276.png', '2024-06-18 18:45:27', '2024-06-18 18:45:14'),
(9, NULL, 'RAU CỦ', NULL, '/images/danh-muc/6672385b1447d.png', '2024-06-18 18:46:03', '2024-06-18 18:46:03'),
(10, 7, 'Thịt lợn', 'thit-lon', '', '2024-06-18 18:46:22', '2024-06-18 18:46:22'),
(11, 7, 'Thịt trâu', 'thit-trau', '', '2024-06-18 18:46:31', '2024-06-18 18:46:31'),
(12, 7, 'Thịt bò', 'thit-bo', '', '2024-06-18 18:46:39', '2024-06-18 18:46:39'),
(13, 7, 'Thịt gà', 'thit-ga', '', '2024-06-18 18:46:46', '2024-06-18 18:46:46'),
(14, 7, 'Thịt ngan', 'thit-ngan', '', '2024-06-18 18:46:53', '2024-06-18 18:46:53'),
(15, 7, 'Thịt vịt', 'thit-vit', '', '2024-06-18 18:47:04', '2024-06-18 18:47:04'),
(16, 8, 'Rượu sâm Ngọc Linh', 'ruou-sam-ngoc-linh', '', '2024-06-18 18:47:22', '2024-06-18 18:47:22'),
(17, 8, 'Rượu Tam Thất', 'ruou-tam-that', '', '2024-06-18 18:47:35', '2024-06-18 18:47:35'),
(18, 8, 'Rượu Ba Kích', 'ruoi-ba-kich', '', '2024-06-18 18:47:44', '2024-06-18 18:47:44'),
(19, 8, 'Rượu Táo Mèo', 'ruou-tao-meo', '', '2024-06-18 18:47:57', '2024-06-18 18:47:57'),
(20, 9, 'Rau cải nương', 'rau-cai-nuong', '', '2024-06-18 18:48:17', '2024-06-18 18:48:17'),
(21, 9, 'Rau sạch', 'rau-sach', '', '2024-06-18 18:48:32', '2024-06-18 18:48:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia-chi`
--

CREATE TABLE `dia-chi` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `dia_chi` varchar(256) DEFAULT NULL,
  `sdt` varchar(16) DEFAULT NULL,
  `ho_ten` varchar(128) DEFAULT NULL,
  `ghi_chu` varchar(256) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Bàn Lục Quân', '0987654321', 2, 1, NULL, '$2y$10$7c/FTmdcwhyF5udz7sUGxufGv0MARDfsxlZNQQtJCwQbcs7HySxfa', NULL, '2024-06-18 18:31:38', '2024-06-18 18:31:38'),
(5, 'Phan Lộ', '0987654322', 0, 1, NULL, '$2y$10$qwFWi4khNPWMXelqujV39.9XNDqPGSud6VqKT.1blHodGOZitP0aa', NULL, '2024-06-18 18:32:13', '2024-06-18 18:32:13'),
(6, 'Lý Dào Quyên', '0987654323', 0, 1, NULL, '$2y$10$hfmgEcqCz.fB1Ru4Mtsqaeunv/dPqkS0J7PWx92xGcd3Nl5xR06CO', NULL, '2024-06-18 18:32:35', '2024-06-18 18:32:35'),
(7, 'Triệu Thanh Hiếu', '0987654324', 0, 1, NULL, '$2y$10$hWc72ogKObvaF28b7O33DuKeDCnVihwf0Iumq.zSM91VTKf3upzgK', NULL, '2024-06-18 18:33:01', '2024-06-18 18:33:01'),
(8, 'Bàn Tuấn Năng', '0987654320', 2, 1, NULL, '$2y$10$9dZG/yqSfCiEZtzRv7yB5u8LxOhmbXXAZ2qTE2ESXregL8i6iYhRm', NULL, '2024-06-18 18:33:24', '2024-06-18 18:33:24'),
(9, 'Phùng Xuân Ngọc', '0988505055', 1, 1, NULL, '$2y$10$zFeqD2W4x/doCBBWfl6gR.ubKNSjx/.E9AWC68Io1zpAE3344yD8S', NULL, '2024-06-18 18:34:14', '2024-06-18 18:34:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vat-pham`
--

CREATE TABLE `vat-pham` (
  `id` int(12) NOT NULL,
  `danh_muc` int(12) DEFAULT NULL,
  `ten` varchar(1024) DEFAULT NULL,
  `hinh_anh` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`hinh_anh`)),
  `cua_hang` int(12) DEFAULT NULL,
  `gia` int(12) DEFAULT 0,
  `don_vi` varchar(64) DEFAULT NULL,
  `khuyen_mai` int(12) DEFAULT 0,
  `trang_thai` int(1) DEFAULT 1,
  `mo_ta` mediumtext DEFAULT NULL,
  `chi_tiet` longtext DEFAULT NULL,
  `slug` varchar(1024) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vat-pham`
--

INSERT INTO `vat-pham` (`id`, `danh_muc`, `ten`, `hinh_anh`, `cua_hang`, `gia`, `don_vi`, `khuyen_mai`, `trang_thai`, `mo_ta`, `chi_tiet`, `slug`, `updated_at`, `created_at`) VALUES
(9, 20, 'Rau cải nương hong nắng', '[\"\\/images\\/vat-pham\\/66723dc9ef523.jpg\",\"\\/images\\/vat-pham\\/66723dc9f0b8b.jpg\",\"\\/images\\/vat-pham\\/66723dc9f10b6.jpg\"]', 4, 50000, '1kg', 5000, 1, '<p class=\"ql-align-justify\">Mùa cải, mùa vàng, mùa chênh chao trong cái hanh hao của sắc thu, trong cái se lạnh của tiết trời hòa vào vẻ sặc sỡ của những bộ váy Mông trên những mỏm đá...</p><p class=\"ql-align-justify\"><img src=\"https://images.vietnamtourism.gov.vn/vn//images/Muacainuong1.jpg\"></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 205);\">Mùa cải nương.</span></p><p class=\"ql-align-justify\">Nếu như mùa xuân là mùa của hoa mận tam hoa nở trắng cao nguyên, mùa hạ là mùa trái chín đỏ rực, mang đến sự ấm no, hạnh phúc thì khoảnh khắc giao mùa trong những ngày này là sự ngự trị của màu vàng - màu hoa cải.</p><p class=\"ql-align-justify\">Mùa này, người Tày, người Mông lên núi phát rẫy tra lúa. Lúa chín, gặt hạt về, người ta đốt nương để vãi hạt cải lấy rau ăn. Năm nào cũng thế, chẳng cần phân gio, tưới tắm gì cả, chỉ cần đốt một lượt, lấy vị mặn của tro làm phân luôn thể để trồng cải. Giống cải bẹ từ bao năm nay cứ thế mà ngọt bùi, mà vươn lên xanh tốt nơi triền núi cao này.</p><p class=\"ql-align-justify\"><img src=\"https://images.vietnamtourism.gov.vn/vn//images/Muacainuong2.jpg\"></p><p class=\"ql-align-justify\"><br></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 205);\">Hoa cải mỏng mảnh, nhỏ xinh và rực một màu vàng.</span></p><p class=\"ql-align-justify\">Người Tày, người Mông trồng cải chẳng có hàng lối gì, hạt giống đựng trong ống bầu trên gác bếp từ mùa trước mang ra ngâm nước lạnh độ nửa tiếng rồi mang ra vãi đều trên triền núi. Gặp đất tốt, gặp những cơn mưa nhẹ đầu mùa thu, cải bật mầm mọc san sát nhau trên nương. Mỗi năm có một mùa cải nương ngọt lành như thế.</p><p class=\"ql-align-justify\">Chỉ một tháng sau, cải xanh tràn khắp triền núi. Đỉnh núi, triền nương, hốc đá, mỏm đất nhờ cải mà mặc một chiếc áo mới xanh tươi một màu. Giống rau ưa đất núi mọc cao ngang ngực người, từng bẹ rau xanh, mép lá quăn tít tựa mào gà, thân căng mọng nước. Khi ấy, cải thu hoạch, cải theo người Tày, người Mông về bản làm rau ăn hàng ngày. Mấy cô sơn nữ Tày đeo gùi lúi húi nhổ cải, bên kia đồi, mấy cô gái Mông cũng xải cánh tay trong bộ váy áo sặc sỡ hái rau cải, cho vào gùi đeo nặng sau lưng. Một khung cảnh thật bình yên nơi rẻo cao giữa mùa cải.</p><p class=\"ql-align-justify\">Những ngày thu, ẩm thực của người Tày, người Mông không thể thiếu món rau cải. Món rau núi thật sạch, thật giòn và thật ngon. Cải nương được hái về còn tươi mỡ màng, ngắt bỏ cuống già, cho vào luộc nhừ rồi chấm với muối gừng thì ngon biết mấy. Cũng là món cải, miếng thịt lợn sấy trên gác bếp mùa trước, lấy xuống đập đập mấy cái cho bay mù hóng, ngâm nước sôi chừng nửa tiếng rồi thái lát mỏng xào lẫn rau cải xanh. Thế là được một đặc sản chỉ có ở nơi những bản xa này. Rau cải non rửa sạch, dùng tay vặn thành từng đoạn nhỏ mang nấu với thịt gà ri ăn thật sảng khoái. Người Mông trên núi cao có tài muối dưa cải, mà chỉ muối bằng rau cải nương mới ngon. Chỉ cần mấy củ gừng, củ giềng thái lát, rau cải phơi tái thế mà mấy bà mẹ Mông muối hàng chum dưa cải to để hong nắng ngoài triền đồi. Chỉ vài hôm sau, cải ngấm muối ngả vàng, màu vàng suộm, giòn tan, thơm thơm cay cay.</p><p class=\"ql-align-justify\">Chợ phiên ở bản Tày mỗi tuần chỉ có một lần vào chủ nhật, cải nương theo người Tày, người Mông trên núi cao, trong bản xa đến chợ. Mùa này, cải được bày bán vô số ở các dãy rau quả. Người ta súm sít lại mua rau cải nương về ăn vì đây là loại rau ngọt, thơm và đảm bảo thương hiệu rau sạch. Cả mấy vại dưa vàng ươm của mấy cô sơn nữ Mông cũng đắt như tôm tươi.</p><p class=\"ql-align-justify\">Cuối mùa cải, người ta thôi không hái cải về nữa bởi còn phải để cải đơm hoa kết trái, làm giống đến mùa sau. Thế là, núi đồi sau nhiều ngày mang trên mình màu áo xanh mỡ màng của cải nương thì giờ choàng lên màu vàng của tấm áo mới. Một mùa hoa tuyệt đẹp nơi núi rừng, mùa hoa cải, mùa hoa mang sắc vàng còn hơn cả mật ong, hơn cả nắng sớm mùa thu.</p><p class=\"ql-align-justify\">Hôm trước chỉ lác đác mấy cây cải cao lêu đêu ra hoa, mấy hôm sau, cả triền núi, cải đua nhau trổ hoa, sắc vàng lan tràn từ đỉnh núi xuống chân núi, từ đỉnh núi này sang đỉnh núi kia. Đến miền núi những ngày này, du ngoạn đến bất cứ nơi đâu, từ thung lũng trồng mận hay những bản làng trên lưng chừng núi, bạn sẽ bắt gặp những vạt cải đang mùa nở rộ. Hoa cải trải màu vàng khắp các nương ruộng bậc thang, vườn nhà...</p><p class=\"ql-align-justify\"><img src=\"https://images.vietnamtourism.gov.vn/vn//images/Muacainuong4.jpg\"></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 205);\">Ghi lại những hình ảnh đẹp của mùa cải nương...</span></p><p class=\"ql-align-justify\">Hoa cải mỏng mảnh, nhỏ xinh và rực một màu vàng. Nhiều bông hoa mọc chi chít trên một đường cành chừng hai gang tay tạo thành một dây hoa đẹp tuyệt. Lũ ong bướm từ đâu bay về ùn ùn, làm âm âm cả một vùng núi. Bọn trẻ chăn trâu buổi chiều lận vào giữa nương cải để nô đùa, còn mấy chú nghé nghịch ngợm mép dính đầy cánh hoa cải vàng.</p><p class=\"ql-align-justify\">Mùa hoa cải vàng tô điểm cho bức tranh miền núi thêm rực rỡ sắc màu. Giữa yên tĩnh, tinh khôi, chợt thấy lòng mình chùng lại, thánh thiện hơn và muốn sống hơn rất nhiều, để cảm nhận vẻ đẹp Việt Nam.</p><p><br></p>', NULL, 'rau-cai-nuong-hong-nang-66723dc9f1676', '2024-06-18 19:09:13', '2024-06-18 19:09:13'),
(10, 11, 'Thịt trâu gác bếp', '[\"\\/images\\/vat-pham\\/6672413b94e61.jpg\",\"\\/images\\/vat-pham\\/6672413b9704f.jpg\",\"\\/images\\/vat-pham\\/6672413b975a3.jpg\"]', 3, 500000, '0.5kg', 1000, 1, '<p class=\"ql-align-justify\">Thịt trâu gác bếp là món ăn đặc sản của người dân tộc Thái Đen và đất nước Thái Lan, thịt trâu gác bếp thường được dùng để thiết đãi khách quý.</p><p class=\"ql-align-justify\">Món thịt này được chế biến từ bắp thịt không có gân và bỏ các thịt thừa bèo nhèo từ trâu, bò hoặc heo nuôi thả rông trên các vùng núi Tây Bắc. Thịt được lóc và thái dọc theo thớ thịt 20cm và dày 5cm thành các miếng hình con chì.</p><p class=\"ql-align-justify\">Thịt trâu gác bếp sẽ được tẩm gia vị từ ớt, gừng và mắc khén - hạt tiêu rừng thơm đặc trưng của người dân tộc vùng núi Tây Bắc, rồi hun khói bằng khói toả ra từ các bếp than, củi. Sau khi thành phẩm, thịt trâu gác bếp sẽ có mùi khói thơm nhẹ nhưng không gây khó chịu.</p><p class=\"ql-align-justify\"><br></p><p><img src=\"https://tttt.ninhbinh.gov.vn/uploads/images/DAN%20TOC%20MN%202022/DTMN%20NAM%202023/QUY%203-4/THIT%20TRAU%20GAC%20BEP.jpg\"></p><p><br></p><p>Thịt trâu gác bếp. Ảnh: Internet</p><p class=\"ql-align-justify\">Món thịt trâu gác bếp được chế biến tự nhiên và theo các kỹ thuật gia truyền, không có chất bảo quản nhưng rất thơm ngon và có thể dự trữ ăn dần được khoảng 1 tháng.</p><p>Cách chọn mua thịt trâu ngon</p><p><br></p><p class=\"ql-align-justify\">•&nbsp;&nbsp;&nbsp;Nên chọn mua miếng thịt có màu hồng sậm hoặc đỏ sậm, thớ thịt hơi thô, thịt trâu ít cơ bắp sẽ thường có những thớ mỡ màu trắng.</p><p class=\"ql-align-justify\">•&nbsp;&nbsp;&nbsp;Thịt trâu tươi ngon thì khi dùng tay ấn vào thấy có độ kết dính và đàn hồi nhẹ, không có mùi lạ. Tốt nhất bạn nên chọn mua thịt ở những nơi phân phối uy tín, mua của người quen và các siêu thị lớn.</p><p class=\"ql-align-justify\">•&nbsp;&nbsp;&nbsp;Tránh mua loại thịt có màu sắc không đều, khác thường, màng ngoài có nhớt nhiều, thịt không có độ dẻo và khi ấn tay vào thấy nhão, quan sát thấy nước rỉ ra vì đó là loại thịt đã bị bơm nước và không an toàn cho sức khỏe.</p><p class=\"ql-align-justify\">&nbsp;Sơ chế thịt trâu: Đầu tiên, cắt thịt trâu theo thớ dọc thành các miếng có chiều dài 20cm và dày 5cm, sau đó dần thịt vài lần để thịt mềm ra.</p><p class=\"ql-align-justify\">Tiếp theo nướng thơm ớt khô, rồi giã nhuyễn hoặc băm nhỏ ớt với tỏi, gừng, sả, mắc khén, muối, đường. Sau khi giã, trộn đều để hỗn hợp gia vị sệt lại.</p><p class=\"ql-align-justify\">Cho gia vị sát lên từng miếng thịt trâu rồi nêm vào 1 ít muối, đường, bột ngọt theo khẩu vị và trộn đều, bạn ướp thịt trâu với gia vị trong 3 tiếng.</p><p>Gác bếp sấy khô</p><p><br></p><p>Sau 3 tiếng ướp thịt, thịt trâu được treo trước bếp than hoa cách bếp 60 - 70cm trong 9 - 12 giờ đồng hồ là được.</p><p class=\"ql-align-justify\">Lưu ý: Để làm thịt trâu gác bếp ngon, nên dải thịt trâu nằm lên trên các miếng dàn tre, rồi sau đó trải lá chuối lên thịt trâu để ủ thịt được nóng và chèn thêm 1 ít lá ngải cứu vào giữa thịt trâu.</p><p class=\"ql-align-justify\">Tiếp theo, đốt bếp than hoa cháy với lửa vừa để khói cháy đều rồi cho thịt lên sấy. Trong thời gian gác bếp sấy khô thịt, bạn hãy canh để lật thịt nếu thịt khô mặt, đồng thời phải kiểm tra nhiệt độ bếp.</p><p class=\"ql-align-justify\">Sau 9 - 12 tiếng sấy khô trên bếp, bạn cho thịt vào trõ hấp cách thuỷ để thịt được chín đều thêm lần nữa là hoàn thành.</p><p class=\"ql-align-justify\">&nbsp;Cách chọn mua thịt trâu gác bếp ngon</p><p class=\"ql-align-justify\">Kiểm tra hương vị: Thịt trâu gác bếp chất lượng đúng chuẩn sẽ có mùi thơm đặc trưng từ khói nhưng không gây khó chịu, cùng với các hương vị từ gia vị ướp đặc trưng.</p><p class=\"ql-align-justify\">Màu sắc của thịt: Thịt trâu gác bếp ngon sẽ có màu sắc nâu thẫm, khô ráo bên ngoài. Thớ thịt bên trong sẽ có màu sắc hồng hào, còn tươi.</p><p class=\"ql-align-justify\">Hình dáng thịt: Thịt trâu gác bếp được cắt thành miếng dẹt và dày dọc theo thớ thịt, sau sấy sẽ khá cứng thì thế khi ăn, bạn sẽ phải dùng chày để dần cho thịt mềm ra. Thịt trâu chất lượng sẽ giãn ra sau khi dần, còn nếu làm từ thịt heo thì sẽ bị nát.</p><p class=\"ql-align-justify\">Thịt trâu gác bếp có thể chấm với mắm ớt, mắm tỏi, nước tương, muối tiêu chanh,... nhưng có lẽ hợp vị nhất là chẩm chéo hoặc tương ớt để tăng thêm độ thơm ngon.</p><p class=\"ql-align-justify\">&nbsp;</p><p>Cách bảo quản thịt trâu gác bếp:</p><p>&nbsp;Thịt trâu gác bếp đã được sấy khô vì thế nếu bảo quản đúng cách, bạn sẽ có thể bảo quản thịt trâu gác bếp từ 6 - 8 tháng.</p><p>Phương pháp bảo quản tốt nhất là sử dụng máy hút chân không để hút sạch không khí trong sản phẩm thịt trâu gác bếp sau khi đóng gói trong túi, hoặc có thể tìm mua các gói thịt trâu gác bếp đã được đóng gói sẵn.</p><p class=\"ql-align-justify\">Món ăn sau khi hút chân không, bạn hãy bảo quản trong ngăn đông tủ lạnh để hạn chế vi khuẩn phát triển gây hư hỏng, tuy nhiên bạn vẫn nên ăn hết thịt trâu gác bếp trong vòng 8 tháng để hương vị thịt vẫn còn thơm ngon.</p>', '<p><br></p><ol><li>Tùy vào cách bảo quản mà thịt trâu gác bếp có hạn dùng khác nhau. Cụ thể:</li><li>– Thịt trâu gác bếp hút chân không, để ngăn đá tủ lạnh: 8 tháng – 1 năm</li><li>– Thịt trâu gác bếp hút chân không, để ngăn ở ngăn mát: 4 – 5 tháng</li><li>– Thịt trâu gác bếp hút chân không, để ở môi trường bình thường: 1 – 3 tháng</li></ol>', 'thit-trau-gac-bep-6672413b97d7e', '2024-06-19 08:28:54', '2024-06-18 19:23:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cua-hang`
--
ALTER TABLE `cua-hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh-muc`
--
ALTER TABLE `danh-muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dia-chi`
--
ALTER TABLE `dia-chi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vat-pham`
--
ALTER TABLE `vat-pham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cua-hang`
--
ALTER TABLE `cua-hang`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danh-muc`
--
ALTER TABLE `danh-muc`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `dia-chi`
--
ALTER TABLE `dia-chi`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vat-pham`
--
ALTER TABLE `vat-pham`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
