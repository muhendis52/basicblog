-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Haz 2019, 17:56:43
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bitirme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_adi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `site_bilgi` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_adi`, `site_logo`, `site_bilgi`) VALUES
(1, 'HaldenAnlayan', 'HaldenAnlayan', 'İpekyolu mahallesi Şehit Zekeriya kocakoç sokak Burakcan Apartmanı Daire No :6');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `path` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `main` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `product`, `path`, `main`) VALUES
(1, '21', 'assets/upload/products/IMG-20180527-WA0026.jpg', ''),
(2, '1', 'assets/upload/products/20181124_041812.jpg', ''),
(3, '4', 'assets/upload/products/IMG-20180425-WA0015.jpg', ''),
(4, '4', 'assets/upload/products/20190430_221924.jpg', ''),
(5, '5', 'assets/upload/products/IMG-20180425-WA0041.jpg', ''),
(6, '5', 'assets/upload/products/IMG-20180425-WA0042.jpg', ''),
(7, '6', 'assets/upload/products/IMG-20180702-WA0032.jpg', ''),
(8, '6', 'assets/upload/products/IMG-20180702-WA0033.jpg', ''),
(9, '16', 'assets/upload/products/IMG-20180425-WA0016.jpg', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori_icon` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_ad` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sef` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_icon`, `kategori_ad`, `kategori_sef`) VALUES
(1, 'fas fa-blender', 'Süt Ürünleri', 'sut-urunleri'),
(2, 'fas fa-cheese', 'Peynir Çeşitleri', 'peynir-cesitleri'),
(3, 'fas fa-drumstick-bite', 'Et Ürünleri', 'et-urunleri'),
(4, 'fab fa-nutritionix', 'Fındık Ürünleri', 'findik-urunleri'),
(5, 'fas fa-carrot', 'Turşular', 'tursular'),
(6, 'fas fa-utensil-spoon', 'Bal ve Reçeller', 'bal-ve-receller'),
(7, 'fas fa-birthday-cake', 'Unlu Mamüller', 'unlu-mamuller'),
(8, 'fas fa-cow', 'Yöresel', 'yoresel');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `id` int(11) NOT NULL,
  `g_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `g_email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `g_mesaj` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `g_adsoyad`, `g_email`, `g_mesaj`) VALUES
(1, 'Muhammed Lamort', 'iletisimzafer52@hotmail.com', 'Merhaba Zafer , Nasılsın ?'),
(2, 'Okan AYRANCI', 'ayranciokan@gmail.com', 'hadi zafer sen yaparsın dksgnlsdkjflksdjfkllsdflkasjflds');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `sef` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`id`, `name`, `sef`) VALUES
(1, 'Ürün Miktarı', 'urun-miktari'),
(2, 'Ürün adedi', 'urun-adedi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL,
  `urunid` int(11) NOT NULL,
  `urunad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urunfiyat` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `alici_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `alici_email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `alici_adres` varchar(300) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`id`, `urunid`, `urunad`, `urunfiyat`, `alici_adsoyad`, `alici_email`, `alici_adres`) VALUES
(1, 8, 'Anzer Balı', 'Anzer Balı', 'Barış Kablan', 'baris@gmail.com', 'Tunceli'),
(2, 8, 'Anzer Balı', '940', 'Muhammed Lamort', 'adsad@addsfsdf', 'Elazığ'),
(3, 7, 'Pastırma', '59.9', 'Sedanur Yıldız', 'seda@gmail.com', 'Ordu'),
(4, 4, 'Kars Kaşarı', '45.5', 'Zafer Yıldız', 'iletisimzafer52@hotmail.com', 'Mazgirt');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stoklar`
--

CREATE TABLE `stoklar` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `secenek` int(11) NOT NULL,
  `miktar` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stoklar`
--

INSERT INTO `stoklar` (`id`, `product`, `secenek`, `miktar`, `stok`) VALUES
(1, 5, 2, 1, 250),
(2, 5, 1, 1, 24),
(3, 2, 4, 1, 22);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stoktipi`
--

CREATE TABLE `stoktipi` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `options` int(11) NOT NULL,
  `options2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stoktipi`
--

INSERT INTO `stoktipi` (`id`, `product`, `options`, `options2`) VALUES
(1, 10, 1, 1),
(2, 14, 1, 1),
(3, 14, 1, 1),
(4, 14, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suboptions`
--

CREATE TABLE `suboptions` (
  `id` int(11) NOT NULL,
  `optionid` int(250) NOT NULL,
  `name` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `suboptions`
--

INSERT INTO `suboptions` (`id`, `optionid`, `name`) VALUES
(1, 1, '250 gram'),
(2, 1, '500 gram'),
(3, 1, '750 gram'),
(4, 1, '1 kilogram'),
(5, 1, '2 kilogram'),
(8, 2, '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `urunsecenekleri` int(11) NOT NULL,
  `baslik` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `eski_fiyat` float NOT NULL,
  `yeni_fiyat` float NOT NULL,
  `etiket` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '0',
  `aktif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `kategori`, `urunsecenekleri`, `baslik`, `seo`, `eski_fiyat`, `yeni_fiyat`, `etiket`, `aciklama`, `complete`, `aktif`) VALUES
(2, 4, 2, 'Fındık Ezmesi', 'findik-ezmesi', 43, 22, 'findik,ezme', 'Hakiki Fındık Ezmesi', 0, 0),
(3, 4, 1, 'Çiğ Fındık', 'cig-findik', 27, 22, 'cig,findik', 'Karadenize ait çiğ fndık', 0, 0),
(4, 2, 1, 'Kars Kaşarı', 'kars-kasari', 50, 45.5, 'kars,kasar', 'Çok Eski kars kaşarı', 0, 0),
(5, 2, 1, 'Tel Peynir', 'tel-peynir', 34.9, 29.9, 'tel-peynir,kadayıf', 'Artvin Yöremize ait günlük tel peynir', 0, 0),
(6, 5, 2, 'Karalahana Turşusu', 'karalahana-tursusu', 59.9, 48, 'pancar,armut,elma', 'Lahana turşusu, her yemeğin yanına yakışan aperatif olarak verebileceğiniz muhteşem bir besindir. Aynı zamanda lahana turşusunun içerisinde bulunan vitaminler sayesinde  çeşitli kalp ve damar hastalıklarını da koruduğu karaciğer yağlarını da giderdiği bilinmektedir. Kış aylarının sebzeleri arasında yer alan beyaz lahana tezgahlarda da yerini aldı. \"HaldenAnlayan.com\" ekibi olarak lahana turşusunu sofralarınıza getirdik.', 0, 0),
(7, 3, 2, 'Pastırma', 'pastirma', 79.9, 59.9, 'pastirma,cemen', '', 0, 0),
(8, 6, 2, 'Anzer Balı', 'anzer-bali', 1200, 940, 'doga,anzer,bal', 'Anzer Balı Nedir ? <br>\r\nAnzer Balı Türkiye’de Rize’nin İkizdere ilçesi Anzer Yaylasi adiyla isimlendirilen ve bir diğer adıyla Anzer Ballıköy yaylasiına gelerek, Dünyada eşi emsali bulunmayan kır çiçek flora örtüsüne sahip olan  İngiliz ve Alman botanikçilerin yaptığı araştırmalarda Anzer yaylasi’nda binlerce çiçek çeşidi  olduğu görülmüş, ancak bu çiçeklerin içerisinde bazı toksonların ( çiçek türleri ) en az 80, 90 tanesinin sadece Anzer yaylasina has  endemik çiçek türü olduğu farkedilmiş ve bu endemik çiçeklerin  özlerinden Kafkas arılarının topladığı Bala Dünyaca Kalitesi ve Markasıyla bilinen meşhur   Anzer Balı Denir.\r\n\r\nAnzer yaylasi’nda Anzer’e Balı üretimi haziran ayının ilk haftasıyla bilikte kımen karlı bölgelerde kardelenlerle birlikte bahara ve yeşilliğie ilk adımını Atan Anzer Yaylasi Doğal güzelliğini haziranla başlayıp Temmuzda doruğa taşıyıp Ağustosta tamamlar.', 0, 0),
(9, 5, 1, 'Salatalık Turşusu', 'salatalik-tursusu', 29.9, 19.9, 'salatalik,tursu', 'Karadeniz Yöresine ait salatalık turşusu', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `uye_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `uye_kadi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `uye_email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `uye_rutbe` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `uye_adsoyad`, `uye_kadi`, `uye_email`, `uye_sifre`, `uye_rutbe`) VALUES
(1, 'Zafer Yıldız', 'zafer', 'iletisimzafer52@hotmail.com', '12345', 0),
(2, 'Sedanur Yıldız', 'sedanur', 'seda@gmail.com', '12345', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `y_id` int(11) NOT NULL,
  `y_adsoyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `y_email` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `y_password` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`y_id`, `y_adsoyad`, `y_email`, `y_password`) VALUES
(1, 'Zafer Yıldız', 'iletisimzafer52@hotmail.com', '1234'),
(2, 'Ayhan Yıldız', 'ayhan@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `urunid` int(11) NOT NULL,
  `g_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `g_email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yorum` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `urunid`, `g_adsoyad`, `g_email`, `yorum`, `yorum_tarih`) VALUES
(1, 8, 'Okan Ayrancı', 'okan@gmail.com', 'Bu ürün çok güzel herkese tavsiye ederim', '2019-06-10 18:48:18'),
(2, 7, 'Muhammed Öztürk', 'lamort23@gmail.com', 'Bu ürün bana gelene kadar bozulmuş. İade Talebi ile geri gönderdim', '2019-06-10 18:50:11'),
(3, 7, 'Zafer Yıldız', 'iletisimzafer52@gmail.com', 'Bence bu fiyata en uygun ürün. Kaçırmayın !!!', '2019-06-10 18:54:17'),
(4, 6, 'Sedanur Yıldız', 'seda@gmail.com', 'Güzel bir ürün. Tebrikler!!!!', '2019-06-12 09:35:51');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stoklar`
--
ALTER TABLE `stoklar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stoktipi`
--
ALTER TABLE `stoktipi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `suboptions`
--
ALTER TABLE `suboptions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`y_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `stoklar`
--
ALTER TABLE `stoklar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `stoktipi`
--
ALTER TABLE `stoktipi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `suboptions`
--
ALTER TABLE `suboptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `y_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
