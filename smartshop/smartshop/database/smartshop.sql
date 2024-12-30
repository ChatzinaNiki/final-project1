-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Έκδοση διακομιστή: 10.4.32-MariaDB
-- Έκδοση PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `smartshop`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `card_types`
--

CREATE TABLE `card_types` (
  `card_type_id` int(11) NOT NULL,
  `card_type_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `card_types`
--

INSERT INTO `card_types` (`card_type_id`, `card_type_name`) VALUES
(1, 'VISA'),
(2, 'MasterCard'),
(3, 'American Express'),
(4, 'Diners');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(0, 'Αγαπημένα'),
(1, 'Ψυγεία'),
(2, 'Ηλεκτρικές Κουζίνες'),
(9, 'Πλυντήρια Ρούχων'),
(23, 'Κλιματιστικά');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit_card_type` int(11) DEFAULT NULL,
  `credit_card_number` varchar(20) DEFAULT NULL,
  `credit_card_expiration` varchar(10) DEFAULT NULL,
  `Credit_card_name` varchar(45) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `od_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payed_amount` decimal(10,2) NOT NULL,
  `pay_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_title` varchar(60) NOT NULL,
  `prod_description` longtext NOT NULL,
  `prod_photo` varchar(45) DEFAULT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`prod_id`, `prod_title`, `prod_description`, `prod_photo`, `prod_price`, `prod_stock`) VALUES
(1, 'Samsung Ψυγειοκαταψύκτης NoFrost Inox A+ RB29HSR2DSA', '289lt, ( Συντήρηση: 213lt / Κατάψυξη: 76lt ), Θόρυβος: 39dB, ΥxΠxΒ: 178cm x 59.5cm x 66.8cm', '1.jpg', 389.00, 1),
(2, 'Samsung Ψυγειοκαταψύκτης NoFrost Inox A+++ RB37J5249SS', '365lt, ( Συντήρηση: 267lt / Κατάψυξη: 98lt ), Θόρυβος: 37dB, ΥxΠxΒ: 201cm x 60cm x 67.5cm', '2.jpg', 790.00, 2),
(3, 'Bosch Ψυγειοκαταψύκτης NoFrost A++ KGN36NW30', '302lt, ( Συντήρηση: 215lt / Κατάψυξη: 87lt ), Θόρυβος: 42dB, ΥxΠxΒ: 186cm x 60cm x 66cm , Κατασκευαστής: Bosch', '3.jpg', 375.00, 3),
(4, 'Bosch HKR390050', 'Kουζίνα με εστίες Κεραμικές, Κλάση: A, Φούρνος: Ηλεκτρικός 66lt, Τρόποι Ψησίματος: 7, Πλάτος: 60cm , Κατασκευαστής: Bosch', '4.png', 518.00, 1),
(5, 'Bosch HBA534ES00', 'Φούρνος άνω Πάγκου χωρίς Εστίες, Κλάση: A, Φούρνος: Ηλεκτρικός 71lt, Τρόποι Ψησίματος: 7, Πλάτος: 59.4cm , Κατασκευαστής: Bosch', '5.jpg', 544.00, 2),
(6, 'Pitsos PAC003D20', 'Kουζίνα με εστίες Αερίου, Κλάση: A, Φούρνος: Αερίου 71lt, Τρόποι Ψησίματος: 2, Πλάτος: 60cm , Κατασκευαστής: Pitsos', '6.jpg', 374.00, 3),
(7, ' Whirlpool MWO 625 SL', 'Φούρνος μικροκυμάτων 900W, Χωρητικότητα: 25lt , Κατασκευαστής: Whirlpool', '7.png', 102.00, 1),
(8, 'Bosch HMT75M451', 'Φούρνος μικροκυμάτων 800W, Χωρητικότητα: 17lt , Κατασκευαστής: Bosch', '8.jpg', 87.00, 2),
(10, 'Pitsos WQP1200G9', '9kg, Κλάση: A+++, Στροφές: 1200/λεπτό, ΥxΠxΒ: 84.8cm x 59.8cm x 59cm , Κατασκευαστής: Pitsos', '9.jpg', 390.00, 1),
(11, 'Pitsos WNP1200E8', '8kg, Κλάση: A+++, Στροφές: 1200/λεπτό, ΥxΠxΒ: 85cm x 59.8cm x 59cm , Κατασκευαστής: Pitsos', '10.jpg', 350.00, 1),
(12, 'Pitsos WFP1002B7', '7kg, Κλάση: A+++, Στροφές: 1000/λεπτό, ΥxΠxΒ: 84.8cm x 60cm x 59cm , Κατασκευαστής: Pitsos', '11.jpg', 265.00, 2),
(13, 'AEG L7FEC41S', '10kg, Κλάση: A+++, Στροφές: 1400/λεπτό, ΥxΠxΒ: 85cm x 60cm x 60.5cm , Κατασκευαστής: AEG', '12.jpg', 549.00, 1),
(14, 'Bosch SPI25CS03E', 'Εντοιχιζόμενο, Σερβίτσια: 9, Κλάση: A+, Θόρυβος: 46dB, ΥxΠxΒ: 81.5cm x 44.8cm x 57.3cm , Κατασκευαστής: Bosch', '13.jpg', 361.00, 2),
(15, 'Siemens SR236I00ME', 'Ελεύθερο, Σερβίτσια: 10, Κλάση: A+, Θόρυβος: 46dB , Κατασκευαστής: Siemens', '14.jpg', 437.99, 1),
(16, 'Morris TTB-169', 'Πάγκου, Σερβίτσια: 6, Κλάση: A+, Θόρυβος: 49dB, ΥxΠxΒ: 43.8cm x 55cm x 54.5cm , Κατασκευαστής: Morris', '15.jpg', 248.00, 3),
(17, 'Panasonic KX-TG6811 Μαύρο', 'Οθόνη 1,8’’ φωτιζόμενη με λευκό φως, μείωση εξωτερικού θορύβου και φραγή εισερχομένων ανεπιθύμητων κλήσεων', '16.jpg', 25.25, 2),
(18, 'Panasonic KX-TG6812 Duo', 'Ασύρματο τηλέφωνο με δύο συγχρονισμένα ακουστικά', '17.jpg', 37.38, 3),
(19, 'Ασύρματο τηλέφωνο με δύο συγχρονισμένα ακουστικά', 'Τύπος: Γραφείου, Οθόνη: Οθόνη, Μνήμη: 10 θέσεις, Αναγνώριση Κλήσης, Ανοιχτή Ακρόαση , Κατασκευαστής: Alcatel', '18.jpg', 16.48, 1),
(20, 'Tefal Pro Express GV9581', '2600W, Πίεση Ατμού: 8bar, Παροχή Ατμού: 180gr/min, Δοχείο: 1900ml , Κατασκευαστής: Tefal', '19.jpg', 233.00, 1),
(21, 'Philips GC4537/70', '2400W, Δοχείο: 300ml, Ατμός: 45gr/min , Κατασκευαστής: Philips', '20.jpg', 41.90, 2),
(22, 'Miele Complete C3 Excellence EcoLine SGSP3', 'Με Σακούλα, Kλάση: A+, Απορροφητικότητα σε Χαλί: B, Δάπεδο: A, Απόδοση Φίλτρου Σκόνης: A, Θόρυβος: 74dB, Βάρος: 7.41kg , Κατασκευαστής: Miele', '21.jpg', 177.00, 1),
(23, 'Philips FC9331/09', 'Χωρίς Σακούλα, Kλάση: A, Απορροφητικότητα σε Χαλί: C, Δάπεδο: A, Απόδοση Φίλτρου Σκόνης: A, Θόρυβος: 79dB, Βάρος: 4.5kg , Κατασκευαστής: Philips', '22.jpg', 86.90, 1),
(24, 'Inventor Premium PR1VI32-12WF/PR1VO32-12', '12000 BTU, Κλάση (Ψύξη/Θέρμανση): A++/A+, Θόρυβος (Μέσα/Έξω): 53dB/61dB, WiFi, Ιονιστής, Φίλτρα Αέρα , Κατασκευαστής: Inventor', '23.jpg', 448.00, 1),
(25, 'Inventor Premium PR1VI32-24WF/PR1VO32-24', '24000 BTU, Κλάση (Ψύξη/Θέρμανση): A++/A+, Θόρυβος (Μέσα/Έξω): 59dB/67dB, WiFi, Ιονιστής, Φίλτρα Αέρα , Κατασκευαστής: Inventor', '24.jpg', 968.00, 2),
(26, 'Fujitsu ASYG18KLCA', '18000 BTU, Κλάση (Ψύξη/Θέρμανση): A++/A+, Θόρυβος (Μέσα/Έξω): 60dB/61dB, Φίλτρα Αέρα , Κατασκευαστής: Fujitsu', '25.jpg', 889.00, 3),
(28, 'HP Pro G2 MT (i3-8100/4GB/1TB/W10)', 'Intel Core i3 8100 3.6GHz, RAM: 4GB DDR4, Σκληρός Δίσκος: 1TB HDD, Κάρτα Γραφικών: Intel UHD Graphics 630, Windows 10 , Κατασκευαστής: HP', '26.jpg', 358.00, 1),
(29, 'HP Prodesk 400 G6 (i7-9700/8GB/256GB/W10)', 'Intel Core i7 9700 3GHz, RAM: 8GB DDR4, Σκληρός Δίσκος: 256GB SSD, Κάρτα Γραφικών: Intel UHD Graphics 630, Windows 10 , Κατασκευαστής: HP', '27.jpg', 795.60, 1),
(30, 'HP 255 G7 (2200U/8GB/256GB/FHD/No OS)', 'Notebook, 15.6\" 1920x1080, CPU: AMD Ryzen 3 2.5GHz, RAM: 8GB, 256GB SSD, GPU: AMD Radeon Vega Graphics, No OS , Κατασκευαστής: HP', '28.jpg', 348.00, 3),
(31, 'Apple MacBook Air 2019 ', 'Apple MacBook Air 2019 (13\\\'\\\', 1,6 GHz, 8 GB, 128 GB SSD) spacegrau', '29.jpg', 1100.00, 2),
(32, 'Dell Inspiron 3585 (2500U/8GB/256GB/FHD/W10)', 'Notebook, 15.6\" 1920x1080, CPU: AMD Ryzen 5 2GHz, RAM: 8GB, 256GB SSD, GPU: AMD Radeon Vega 8, Windows 10 , Κατασκευαστής: Dell', '30.jpg', 499.00, 1),
(33, 'Σαρωτής Canon CanoScan Lide 300', 'A4, Flatbed, Σύνδεση: USB , Κατασκευαστής: Canon', '31.jpg', 50.00, 1),
(34, 'Epson Perfection V550 Photo', 'A4, Flatbed, Σύνδεση: USB , Κατασκευαστής: Epson', '32.jpg', 209.86, 1),
(35, 'HP DeskJet 2130 AiO', 'σάρωση και αντιγραφή με τον εκτυπωτή HP DeskJet Ink 2130 που φέρνει τα πάντα εις πέρας από την πρώτη στιγμή. Επιπλέον, εξοικονόμησε χώρο με τον all-in-one που είναι σχεδιασμένος να χωρά παντού.', '33.jpg', 24.90, 3),
(36, 'Brother MFC-L2710DW', 'Laser Μονόχρωμος, Εκτύπωση Mono: 30 ppm ppm, Αυτόματη Εκτύπωση Διπλής Όψης, Wi-Fi, ADF, Fax , Κατασκευαστής: Brother', '34.jpg', 139.00, 2),
(37, 'Samsung C24F390FHU', 'Το monitor της Samsung, διαθέτει κυρτή οθόνη με κομψή σχεδίαση, λεπτό περίβλημα και λειτουργίες για ομαλό gaming για να απολαμβάνεις τη κάθε στιγμή.', '35.jpg', 102.31, 1),
(38, 'Philips 322E1C/00', 'Curved 31.5\", 1920x1080, Χρόνος απόκρισης: 4ms, Αντίθεση: 3000:1, 75Hz , Κατασκευαστής: Philips', '36.jpg', 205.56, 2),
(39, 'Sony FDR-AX33 4K', '4K UHD / Σταθεροποιητής Εικόνας, 3840 x 2160 pixels, 30fps, 10x, Ανάλυση: 8.29MP, Οθόνη: 3.0\", Κάρτα Μνήμης, Συνδεσιμότητα: Composite / HDMI / USB 2.0 / Wi-Fi / Έξοδος Ακουστικών/Ηχείων , Κατασκευαστής: Sony', '37.jpg', 549.18, 1),
(40, 'Sony HDR-CX405', 'Σταθεροποιητής Εικόνας / Full HD, 1920 x 1080 pixels, 60fps, 30x, Ανάλυση: 2.29MP, Οθόνη: 2.7\", Κάρτα Μνήμης, Συνδεσιμότητα: Composite / HDMI / USB 2.0 , Κατασκευαστής: Sony', '38.jpg', 190.00, 1),
(41, 'Nikon D3500 Kit (AF-P DX 18-55mm VR) Black', 'Kit, Ανάλυση: 24.2MP, Αισθητήρας: APS-C, Οθόνη: 3\", Ανάλυση Video: 1920 x 1080 pixels, Κατασκευαστής: Nikon', '39.jpg', 439.00, 2),
(42, 'Nikon D5300 Kit (AF-P DX 18-55mm', ' Κατασκευαστής: Nikon', '40.jpg', 519.00, 3),
(43, 'Cambridge Audio Azur 752BD', 'Μονάδα Αναπαραγωγής: Blu-Ray, Λειτουργίες: MHL / 4K UHD Upscale , Κατασκευαστής: Cambridge Audio', '41.jpg', 1039.00, 2),
(44, 'LG DP132', 'Μονάδα Αναπαραγωγής: DVD , Κατασκευαστής: LG', '42.jpg', 26.80, 1),
(45, 'Samsung QE55Q60R', '55\", 4K Ultra HD, Smart, HDR, QLED, Μοντέλο: 2019 , Κατασκευαστής: Samsung', '43.jpg', 669.00, 2),
(46, 'LG 43UM7000', '43\", 4K Ultra HD, Smart, HDR, Edge LED, Μοντέλο: 2019 , Κατασκευαστής: LG', '44.jpg', 278.00, 1),
(47, 'Philips 55OLED754 Ambilight', '55\", 4K Ultra HD, Smart, HDR, OLED, Μοντέλο: 2019 , Κατασκευαστής: Philips', '45.jpg', 999.00, 1),
(48, 'Sony KD-49XG9005', '49\", 4K Ultra HD, Smart, HDR, Full Array LED, Μοντέλο: 2019 , Κατασκευαστής: Sony', '46.jpg', 889.00, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prod_cat`
--

CREATE TABLE `prod_cat` (
  `prod_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `prod_cat`
--

INSERT INTO `prod_cat` (`prod_id`, `cat_id`) VALUES
(1, 0),
(1, 1),
(2, 1),
(3, 1),
(4, 0),
(4, 2),
(5, 2),
(6, 0),
(6, 2),
(7, 2),
(8, 0),
(10, 0),
(10, 9),
(11, 9),
(12, 9),
(13, 9),
(16, 0),
(17, 0),
(23, 0),
(24, 23),
(25, 23),
(26, 23),
(30, 0),
(32, 0),
(36, 0),
(37, 0),
(41, 0),
(43, 0),
(46, 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `stock_status`
--

CREATE TABLE `stock_status` (
  `product_status_id` int(11) NOT NULL,
  `product_status_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `stock_status`
--

INSERT INTO `stock_status` (`product_status_id`, `product_status_description`) VALUES
(1, 'Σε απόθεμα'),
(2, 'Παράδοση σε 5 εργάσιμες'),
(3, 'Εξαντλημένο');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_title` varchar(20) NOT NULL,
  `user_street_and_number` varchar(30) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_zipcode` varchar(10) NOT NULL,
  `user_country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_fname`, `user_lname`, `user_title`, `user_street_and_number`, `user_city`, `user_state`, `user_zipcode`, `user_country`) VALUES
(1, 'user', '123', 'user@gmail.com', 'Στέλιος', 'Κιουχουλάκης', '', 'Εδέσσης 91', 'Αιγάλεω', 'Αθήνα', '12345', 'Ελλάδα'),
(2, 'niki', '123', 'niki@gmail.gr', 'Νίκη ', 'Νίκη', '', 'Αθήνα', 'Χολαργός', 'Αθήνα', '11111', 'Ελλάδα');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `card_types`
--
ALTER TABLE `card_types`
  ADD PRIMARY KEY (`card_type_id`);

--
-- Ευρετήρια για πίνακα `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`prod_id`),
  ADD KEY `fk_basket_product_id` (`prod_id`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_or_users_idx` (`user_id`),
  ADD KEY `fk_od_cc_idx` (`credit_card_type`);

--
-- Ευρετήρια για πίνακα `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`prod_id`),
  ADD KEY `fk_pro_id_idx` (`prod_id`);

--
-- Ευρετήρια για πίνακα `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FK_PaymentOrder` (`order_id`),
  ADD KEY `FK_PaymentCust` (`customer_id`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_product_status_idx` (`prod_stock`);

--
-- Ευρετήρια για πίνακα `prod_cat`
--
ALTER TABLE `prod_cat`
  ADD KEY `fk_category_id` (`cat_id`),
  ADD KEY `fk_product_id` (`prod_id`);

--
-- Ευρετήρια για πίνακα `stock_status`
--
ALTER TABLE `stock_status`
  ADD PRIMARY KEY (`product_status_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT για πίνακα `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_car_product_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `fk_cart_uid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Περιορισμοί για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_or_cc` FOREIGN KEY (`credit_card_type`) REFERENCES `card_types` (`card_type_id`),
  ADD CONSTRAINT `fk_or_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Περιορισμοί για πίνακα `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_od_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_pro_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Περιορισμοί για πίνακα `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_PaymentCust` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_PaymentOrder` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Περιορισμοί για πίνακα `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_status` FOREIGN KEY (`prod_stock`) REFERENCES `stock_status` (`product_status_id`);

--
-- Περιορισμοί για πίνακα `prod_cat`
--
ALTER TABLE `prod_cat`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
